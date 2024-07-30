<?php

namespace amribrahim34\BostaEgypt\ValueObjects;

class Address
{
    private $districtId;
    private $firstLine;
    private $secondLine;
    private $floor;
    private $apartment;
    private $cityId;
    private $cityName;

    public function __construct($districtId, $firstLine, $secondLine, $floor, $apartment, $cityId, $cityName)
    {
        $this->districtId = $districtId;
        $this->firstLine = $firstLine;
        $this->secondLine = $secondLine;
        $this->floor = $floor;
        $this->apartment = $apartment;
        $this->cityId = $cityId;
        $this->cityName = $cityName;
    }

    public function toArray(): array
    {
        return [
            'districtId' => $this->districtId,
            'firstLine' => $this->firstLine,
            'secondLine' => $this->secondLine,
            'floor' => $this->floor,
            'apartment' => $this->apartment,
            'cityId' => $this->cityId,
            'cityName' => $this->cityName,
        ];
    }

    public function equals(Address $other): bool
    {
        return $this->districtId === $other->districtId
            && $this->firstLine === $other->firstLine
            && $this->secondLine === $other->secondLine
            && $this->floor === $other->floor
            && $this->apartment === $other->apartment
            && $this->cityId === $other->cityId
            && $this->cityName === $other->cityName;
    }

    public function getDistrictId(): string
    {
        return $this->districtId;
    }

    public function getFirstLine(): string
    {
        return $this->districtId;
    }
    public function getSecondLine(): string
    {
        return $this->districtId;
    }
    public function getFloor(): string
    {
        return $this->districtId;
    }
    public function getApartment(): string
    {
        return $this->districtId;
    }
    public function getCityId(): string
    {
        return $this->districtId;
    }
    public function getCityName(): string
    {
        return $this->districtId;
    }
}
