<?php

namespace amribrahim34\BostaEgypt\Endpoints;

use amribrahim34\BostaEgypt\BostaApi;

class Pricing extends BostaApi
{
    public function calculateShipment($params)
    {
        return $this->request('GET', '/pricing/shipment/calculator', $params);
    }
}
