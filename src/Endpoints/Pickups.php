<?php

namespace amribrahim34\BostaEgypt\Endpoints;


class Pickups extends BaseEndpoint
{
    public function create($data)
    {
        return $this->request('POST', '/pickups', $data);
    }

    public function getAvailableDates()
    {
        return $this->request('GET', '/pickups/available-dates');
    }

    public function getById($id)
    {
        return $this->request('GET', "/pickups/{$id}");
    }

    public function updatePickup($id, $data)
    {
        $endpoint = "/pickups/{$id}";
        return $this->request('PUT', $endpoint, $data);
    }
}
