<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Rick and Morty API Configuration
    |--------------------------------------------------------------------------
    |
    | This file is for storing the configuration for the Rick and Morty API.
    | You can set the base URL, endpoints, and other related settings here.
    |
    */

    'base_url' => env('RICK_AND_MORTY_API_BASE_URL', 'https://rickandmortyapi.com/api'),
     'timeout' => env('RICK_AND_MORTY_API_TIMEOUT', 10),
     'retry' => [
        'times' => env('RICK_AND_MORTY_API_RETRY_TIMES', 3),
        'sleep' => env('RICK_AND_MORTY_API_RETRY_SLEEP', 100),
     ]
];
