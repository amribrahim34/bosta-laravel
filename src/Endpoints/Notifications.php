<?php

namespace amribrahim34\BostaEgypt\Endpoints;


class Notifications extends BaseEndpoint
{
    public function getAll()
    {
        return $this->request('GET', '/notifications');
    }

    public function getCount()
    {
        return $this->request('GET', '/notifications/count');
    }
}
