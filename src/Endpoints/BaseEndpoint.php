<?php

namespace amribrahim34\BostaEgypt\Endpoints;

use Illuminate\Support\Facades\Http;

abstract class BaseEndpoint
{
    protected $apiKey;
    protected $baseUrl = 'http://app.bosta.co/api/v2';

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    protected function request($method, $endpoint, $data = [])
    {
        $url = $this->baseUrl . $endpoint;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->$method($url, $data);

        return $response->json();
    }
}
