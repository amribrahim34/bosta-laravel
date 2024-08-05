<?php

namespace amribrahim34\BostaEgypt\Builders;

class UpdateDeliveryBuilder
{
    private $data = [];

    public function setAllowToOpenPackage($allowToOpenPackage)
    {
        $this->data['allowToOpenPackage'] = $allowToOpenPackage;
        return $this;
    }

    public function setCod($cod)
    {
        $this->data['cod'] = $cod;
        return $this;
    }

    public function setDropOffAddress($districtId, $firstLine, $secondLine, $floor, $apartment, $cityId, $cityName)
    {
        $this->data['dropOffAddress'] = [
            'districtId' => $districtId,
            'firstLine' => $firstLine,
            'secondLine' => $secondLine,
            'floor' => $floor,
            'apartment' => $apartment,
            'city' => [
                '_id' => $cityId,
                'name' => $cityName
            ]
        ];
        return $this;
    }

    public function setReceiver($phone, $secondPhone)
    {
        $this->data['receiver'] = [
            'phone' => $phone,
            'secondPhone' => $secondPhone
        ];
        return $this;
    }

    public function build()
    {
        return $this->data;
    }
}
