<?php

namespace amribrahim34\BostaEgypt\Builders;

class DeliverySearchBuilder
{
    private $data = [];

    public function setType($type)
    {
        $this->data['type'] = $type;
        return $this;
    }

    public function setTrackingNumbers($trackingNumbers)
    {
        $this->data['trackingNumbers'] = $trackingNumbers;
        return $this;
    }

    public function setNumberOfAttempts($numberOfAttempts)
    {
        $this->data['numberOfAttempts'] = $numberOfAttempts;
        return $this;
    }

    public function setCustomersFirstNames($customersFirstNames)
    {
        $this->data['customersFirstNames'] = $customersFirstNames;
        return $this;
    }

    public function setCustomersLastNames($customersLastNames)
    {
        $this->data['customersLastNames'] = $customersLastNames;
        return $this;
    }

    public function setCustomersFullNames($customersFullNames)
    {
        $this->data['customersFullNames'] = $customersFullNames;
        return $this;
    }

    public function setMobilePhones($mobilePhones)
    {
        $this->data['mobilePhones'] = $mobilePhones;
        return $this;
    }

    public function setNotes($notes)
    {
        $this->data['notes'] = $notes;
        return $this;
    }

    public function setBusinessReference($businessReference)
    {
        $this->data['businessReference'] = $businessReference;
        return $this;
    }

    public function setState($state)
    {
        $this->data['state'] = $state;
        return $this;
    }

    public function setPickupZoneIds($pickupZoneIds)
    {
        $this->data['pickupZoneIds'] = $pickupZoneIds;
        return $this;
    }

    public function setPickupCityIds($pickupCityIds)
    {
        $this->data['pickupCityIds'] = $pickupCityIds;
        return $this;
    }

    public function setPickupDistrict($pickupDistrict)
    {
        $this->data['pickupDistrict'] = $pickupDistrict;
        return $this;
    }

    public function setDropOffZoneIds($dropOffZoneIds)
    {
        $this->data['dropOffZoneIds'] = $dropOffZoneIds;
        return $this;
    }

    public function setDropOffCityIds($dropOffCityIds)
    {
        $this->data['dropOffCityIds'] = $dropOffCityIds;
        return $this;
    }

    public function setDropOffDistrict($dropOffDistrict)
    {
        $this->data['dropOffDistrict'] = $dropOffDistrict;
        return $this;
    }

    public function setCustomerCityIds($customerCityIds)
    {
        $this->data['customerCityIds'] = $customerCityIds;
        return $this;
    }

    public function setCustomerZoneIds($customerZoneIds)
    {
        $this->data['customerZoneIds'] = $customerZoneIds;
        return $this;
    }

    public function build()
    {
        return $this->data;
    }
}
