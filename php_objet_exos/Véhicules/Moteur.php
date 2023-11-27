<?php

class Moteur
{
    public string $brand;
    public int $maxSpeed;

    public function __construct(string $brand, $maxSpeed)
    {
        $this->brand = $brand;
        $this->maxSpeed = $maxSpeed;
    }

    public function getBrand() : string
    {
        return $this->brand;
    }

    public function getmaxSpeed() : int
    {
        return $this->maxSpeed;
    }
}
