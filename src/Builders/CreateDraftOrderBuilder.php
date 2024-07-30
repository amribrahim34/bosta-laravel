<?php

namespace amribrahim34\BostaEgypt\Builders;

class CreateDraftOrderBuilder
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

    public function setDropOffAddress($apartment, $buildingNumber, $districtId, $floor, $secondLine, $firstLine)
    {
        $this->data['dropOffAddress'] = [
            'apartment' => $apartment,
            'buildingNumber' => $buildingNumber,
            'districtId' => $districtId,
            'floor' => $floor,
            'secondLine' => $secondLine,
            'firstLine' => $firstLine,
        ];
        return $this;
    }

    public function setNotes($notes)
    {
        $this->data['notes'] = $notes;
        return $this;
    }

    public function setReceiver($secondPhone, $phone, $fullName)
    {
        $this->data['receiver'] = [
            'secondPhone' => $secondPhone,
            'phone' => $phone,
            'fullName' => $fullName,
        ];
        return $this;
    }

    public function setSpecs($description, $itemsCount)
    {
        $this->data['specs'] = [
            'packageDetails' => [
                'description' => $description,
                'itemsCount' => $itemsCount,
            ],
        ];
        return $this;
    }

    public function setType($type)
    {
        $this->data['type'] = $type;
        return $this;
    }

    public function getData()
    {
        return $this->data;
    }
}
