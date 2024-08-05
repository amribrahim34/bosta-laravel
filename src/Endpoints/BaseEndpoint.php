<?php

namespace amribrahim34\BostaEgypt\Endpoints;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

abstract class BaseEndpoint
{
    protected $apiKey;
    protected $baseUrl = 'https://app.bosta.co/api/v2';

    public function __construct($apiKey)
    {
        if (empty($apiKey)) {
            throw new \InvalidArgumentException("API key cannot be empty");
        }
        $this->apiKey = $apiKey;
    }

    protected function request($method, $endpoint, $data = [])
    {
        $url = $this->baseUrl . $endpoint;
        if ($method === 'GET' && !empty($data)) {
            $url .= '?' . http_build_query($data);
        }

        // Log::info("Sending $method request to: $url");
        // Log::info("Request data:", $data);

        try {
            $response = Http::withHeaders([
                'Authorization' => $this->apiKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]);

            if ($method === 'GET') {
                $response = $response->get($url, $data);
            } else {
                $response = $response->$method($url, $data);
            }
            Log::info("Response received:", $response->json());

            if (!$response->successful()) {
                $errorMessage = 'Bosta API Error: ' . $response->status() . ' - ' . $response->body();
                Log::error('Bosta API Error: ' . $response->status() . ' - ' . $response->body());
                throw new \Exception($errorMessage);
            }

            return $response->json();
        } catch (\Exception $e) {
            Log::error('Bosta API Request Failed: ' . $e->getMessage());
            throw $e;
        }
    }
}
