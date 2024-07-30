<?php

namespace amribrahim34\BostaEgypt\ValueObjects;

class Receiver
{
    private $phone;
    private $secondPhone;
    private $fullName;

    public function __construct($phone, $secondPhone = null, $fullName = null)
    {
        $this->phone = $phone;
        $this->secondPhone = $secondPhone;
        $this->fullName = $fullName;
    }

    public function toArray(): array
    {
        return [
            'phone' => $this->phone,
            'secondPhone' => $this->secondPhone,
            'fullName' => $this->fullName
        ];
    }

    public function equals(Receiver $other): bool
    {
        return $this->phone === $other->phone
            && $this->fullName === $other->fullName
            && $this->secondPhone === $other->secondPhone;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getSecondPhone(): string
    {
        return $this->secondPhone;
    }

    public function getFullName(): string
    {
        return $this->secondPhone;
    }
}
