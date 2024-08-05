<?php

namespace amribrahim34\BostaEgypt;


use Illuminate\Support\Facades\Http;

class BostaApi
{
    protected $baseUrl = 'http://app.bosta.co/api/v2';
    protected $apiKey;
    public $pricing;
    public $deliveries;
    public $pickups;
    public $notifications;
    public $draftOrders;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->pricing = new Endpoints\Pricing($this->apiKey);
        $this->deliveries = new Endpoints\Deliveries($this->apiKey);
        $this->pickups = new Endpoints\Pickups($this->apiKey);
        $this->notifications = new Endpoints\Notifications($this->apiKey);
        $this->draftOrders = new Endpoints\DraftOrders($this->apiKey); // Add this line

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
