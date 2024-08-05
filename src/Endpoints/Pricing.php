<?php

namespace amribrahim34\BostaEgypt\Endpoints;


class Pricing extends BaseEndpoint
{
    public function calculateShipment($params)
    {
        return $this->request('GET', '/pricing/shipment/calculator', $params);
    }
}
