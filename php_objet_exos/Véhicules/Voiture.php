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
        $this->maxSpeed = $this->getMaxSpeed();
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

    public function getMaxSpeed() : float
    {
        $this->maxSpeed = $this->motor->maxSpeed - ($this->weight * 8 / 100);
        return $this->maxSpeed;
    }

    public function getMotorBrand() : string
    {
        return $this->motor->brand;
    }

    public function getMotorMaxSpeed() : float
    {
        return $this->motor->maxSpeed;
    }

}

$peugeotSUV = new Voiture("Peugeot", "SUV 5008", 1500, new Moteur("Renault", 300));

echo "Voiture : 5008";
echo"<br>";

echo $peugeotSUV->getBrand();
echo"<br>";

echo $peugeotSUV->getModel();
echo"<br>";

echo $peugeotSUV->getWeight() . " kg";
echo"<br>";

echo $peugeotSUV->getmaxSpeed() . " KmH";
echo"<br>";
echo"<br>";

echo "Moteur : ";
echo "<br>";

echo $peugeotSUV->getMotorBrand();
echo"<br>";

echo $peugeotSUV->getMotormaxSpeed() . " KmH";
echo"<br>";
echo"<br>";

var_dump($peugeotSUV);
echo"<br>";
echo"<br>";
