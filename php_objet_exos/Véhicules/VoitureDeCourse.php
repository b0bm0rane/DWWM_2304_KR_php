<?php

require_once("./Voiture.php");
require_once("./Moteur.php");

class VoitureDeCourse extends Voiture
{
    public function __construct(string $brand, string $model, int $weight, $motor)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->weight = $weight;
        $this->motor = $motor;
        $this->maxSpeed = $this->getmaxSpeed();
    }
}

$peugeot = new VoitureDeCourse("Peugeot", "9X8", 1030, new Moteur("Peugeot", ))


