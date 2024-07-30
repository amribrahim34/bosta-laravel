<?php

namespace amribrahim34\BostaEgypt\ValueObjects;

class Contact
{
    private $phone;
    private $secondPhone;

    public function __construct($phone, $secondPhone = null)
    {
        $this->phone = $phone;
        $this->secondPhone = $secondPhone;
    }

    public function toArray(): array
    {
        return [
            'phone' => $this->phone,
            'secondPhone' => $this->secondPhone,
        ];
    }

    public function equals(Contact $other): bool
    {
        return $this->phone === $other->phone
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
}
