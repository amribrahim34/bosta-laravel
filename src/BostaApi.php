<?php

namespace amribrahim34\BostaEgypt;



class BostaApi
{
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
        $this->draftOrders = new Endpoints\DraftOrders($this->apiKey);
    }
}
