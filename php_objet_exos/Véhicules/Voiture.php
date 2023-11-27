<?php

require_once("./Moteur.php");

class Voiture
{
    protected string $brand;
    protected string $model;
    protected int $weight;
    public $maxSpeed;
    public $motor;

    public function __construct(string $brand, string $model, int $weight, $motor)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->weight = $weight;
        $this->motor = $motor;
        $this->maxSpeed = $this->getmaxSpeed();
    }

    public function getBrand() : string
    {
        return $this->brand;
    }

    public function getModel() : string
    {
        return $this->model;
    }

    public function getWeight() : int
    {
        return $this->weight;
    }

    public function getmaxSpeed() : int
    {
        $this->maxSpeed = $this->motor->maxSpeed - ($this->weight * 8 / 100);
        return $this->maxSpeed;
    }

    public function getMotorBrand() : string
    {
        return $this->motor->brand;
    }

    public function getMotormaxSpeed() : int
    {
        return $this->motor->maxSpeed;
    }
}

$peugeot = new Voiture("Peugeot", "SUV 5008", 1500, new Moteur("Renault", 300));

echo "Voiture : ";
echo"<br>";

echo $peugeot->getBrand();
echo"<br>";

echo $peugeot->getModel();
echo"<br>";

echo $peugeot->getWeight() . " kg";
echo"<br>";

echo $peugeot->getmaxSpeed() . " KmH";
echo"<br>";
echo"<br>";

echo "Moteur : ";
echo "<br>";

echo $peugeot->getMotorBrand();
echo"<br>";

echo $peugeot->getMotormaxSpeed() . " KmH";
echo"<br>";
echo"<br>";

var_dump($peugeot);
