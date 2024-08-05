<?php

namespace amribrahim34\BostaEgypt\Endpoints;

use amribrahim34\BostaEgypt\Builders\DeliverySearchBuilder;
use amribrahim34\BostaEgypt\Builders\UpdateDeliveryBuilder;

class Deliveries extends BaseEndpoint
{
    public function create($data)
    {
        return $this->request('POST', '/deliveries', $data);
    }

    public function searchDeliveries(DeliverySearchBuilder $builder)
    {
        $data = $builder->build();
        return $this->request('POST', '/deliveries/search', $data);
    }

    public function track($trackingNumber)
    {
        return $this->request('GET', '/deliveries/business/' . $trackingNumber);
    }

    public function updateDelivery($trackingNumber, UpdateDeliveryBuilder $data)
    {
        return $this->request('PUT', '/deliveries/business/' . $trackingNumber, $data);
    }
}
