<?php


namespace amribrahim34\BostaEgypt\Builders;

class DeliveryBuilder
{
    private $data = [];

    public function setType($type)
    {
        $this->data['type'] = $type;
        return $this;
    }

    public function setSpecs($packageType, $size, $itemsCount, $description)
    {
        $this->data['specs'] = [
            'packageType' => $packageType,
            'size' => $size,
            'packageDetails' => [
                'itemsCount' => $itemsCount,
                'description' => $description
            ]
        ];
        return $this;
    }

    public function setNotes($notes)
    {
        $this->data['notes'] = $notes;
        return $this;
    }

    public function setCod($cod)
    {
        $this->data['cod'] = $cod;
        return $this;
    }

    public function setDropOffAddress($city, $zoneId, $districtId, $firstLine, $secondLine, $buildingNumber, $floor, $apartment)
    {
        $this->data['dropOffAddress'] = [
            'city' => $city,
            'zoneId' => $zoneId,
            'districtId' => $districtId,
            'firstLine' => $firstLine,
            'secondLine' => $secondLine,
            'buildingNumber' => $buildingNumber,
            'floor' => $floor,
            'apartment' => $apartment
        ];
        return $this;
    }

    public function setPickupAddress($city, $zoneId, $districtId, $firstLine, $secondLine, $buildingNumber, $floor, $apartment)
    {
        $this->data['pickupAddress'] = [
            'city' => $city,
            'zoneId' => $zoneId,
            'districtId' => $districtId,
            'firstLine' => $firstLine,
            'secondLine' => $secondLine,
            'buildingNumber' => $buildingNumber,
            'floor' => $floor,
            'apartment' => $apartment
        ];
        return $this;
    }

    public function setReturnAddress($city, $zoneId, $districtId, $firstLine, $secondLine, $buildingNumber, $floor, $apartment)
    {
        $this->data['returnAddress'] = [
            'city' => $city,
            'zoneId' => $zoneId,
            'districtId' => $districtId,
            'firstLine' => $firstLine,
            'secondLine' => $secondLine,
            'buildingNumber' => $buildingNumber,
            'floor' => $floor,
            'apartment' => $apartment
        ];
        return $this;
    }

    public function setBusinessReference($businessReference)
    {
        $this->data['businessReference'] = $businessReference;
        return $this;
    }

    public function setReceiver($firstName, $lastName, $phone, $email)
    {
        $this->data['receiver'] = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'phone' => $phone,
            'email' => $email
        ];
        return $this;
    }

    public function setWebhookUrl($webhookUrl)
    {
        $this->data['webhookUrl'] = $webhookUrl;
        return $this;
    }

    public function build()
    {
        return $this->data;
    }
}
