<?php

class Moteur
{
    public string $brand;
    public float $maxSpeed;

    public function __construct(string $brand, float $maxSpeed)
    {
        $this->brand = $brand;
        $this->maxSpeed = $maxSpeed;
    }

    public function getBrand() : string
    {
        return $this->brand;
    }

    public function getMaxSpeed() : float
    {
        return $this->maxSpeed;
    }
}
