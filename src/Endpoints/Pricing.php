<?php

namespace amribrahim34\BostaEgypt\Endpoints;


class Pricing extends BaseEndpoint
{
    public function calculateShipment($params)
    {
        $requiredParams = ['cod', 'dropOffCity', 'pickupCity', 'size'];
        foreach ($requiredParams as $param) {
            if (!isset($params[$param]) || empty($params[$param])) {
                throw new \InvalidArgumentException("Missing or empty required parameter: $param");
            }
        }
        unset($params['type']);
        return $this->request('GET', '/pricing/shipment/calculator', $params);
    }
}
