<?php

namespace App\Services\RickAndMorty;

use App\Exceptions\RickAndMortyApiException;
use App\Exceptions\RickAndmortyResourceNotFoundException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Throwable;

class RickAndMortyApiClient
{
    /**
     * Create a new class instance.
     */

    protected string $baseUrl;
    protected int $timeout;
    protected int $retryTimes;
    protected int $retrySleep;

    public function __construct(string $baseUrl, int $timeout, int $retryTimes, int $retrySleep)
    {
        $this->baseUrl = $baseUrl ?? config('rickandmorty.base_url', 'https://rickandmortyapi.com/api');
        $this->timeout = $timeout ?? config('rickandmorty.timeout', 5);
        $this->retryTimes = $retryTimes ?? config('rickandmorty.retry.times', 3);
        $this->retrySleep = $retrySleep ?? config('rickandmorty.retry.sleep', 1);
    }

    public function get(string $endpoint, array $params = [])
    {
        $url = $this->baseUrl . '/' . ltrim($endpoint, '/');

       try {
            $response = Http::timeout($this->timeout)
                ->retry($this->retryTimes, $this->retrySleep)
                ->acceptJson()
                ->get($url, $params);

        } catch (ConnectionException $e) {
            throw new \App\Exceptions\RickAndMortyConnectionException("Connection error occurred: " . $e->getMessage(), 0, $e->getCode());
        } catch (Throwable $e) {
            throw new RickAndMortyApiException("An error occurred while making the API request: " . $e->getMessage(), 0, $e);
        }
        if($response->status() === 404) {
                throw new RickAndMortyApiException("Resource not found at endpoint: " . $endpoint, 404);
        }
        if(!$response->successful()) {
            throw new RickAndMortyApiException("API request failed with status code: " . $response->status(), $response->status());
        }

        return $response->json();
    }
}
