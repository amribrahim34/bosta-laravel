<?php

namespace amribrahim34\BostaEgypt\Endpoints;

use amribrahim34\BostaEgypt\BostaApi;

class Notifications extends BostaApi
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
