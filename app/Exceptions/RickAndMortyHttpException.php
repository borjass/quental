<?php

namespace App\Exceptions;

use Throwable;

class RickAndMortyHttpException extends RickAndMortyApiException
{
public function __construct(string $message, int $code,  Throwable $previous)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getStatusCode(): int
    {
        return $this->code;
    }
}
