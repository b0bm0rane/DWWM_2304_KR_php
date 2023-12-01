<?php

class Adresse
{
    public int $number;
    public string $nameStreet;
    public int $postalCode;
    public string $city;
    public string $adress;

    public function __construct(int $number, string $nameStreet, int $postalCode, string $city)
    {
        $this->number = $number;
        $this->nameStreet = $nameStreet;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->adress = $this->setAdress();
    }

    public function getNumber() : int
    {
        return $this->number;
    }
    public function getNameStreet() : string
    {
        return $this->nameStreet;
    }
    public function getPostalCode() : int
    {
        return $this->postalCode;
    }
    public function getCity() : string
    {
        return $this->city;
    }

    public function getAdress() : string
    {
        return $this->number . " " . $this->nameStreet . " " . $this->postalCode . " " . $this->city;
    }

    public function setAdress() : string
    {
        return $this->number . " " . $this->nameStreet . " " . $this->postalCode . " " . $this->city;
    }
}

$chezFlo = new Adresse(1, "rue des Connards", 68000, "Mulhouse");

echo $chezFlo->getNumber();
echo "<br>";
echo $chezFlo->getNameStreet();
echo "<br>";
echo $chezFlo->getPostalCode();
echo "<br>";
echo $chezFlo->getCity();
echo "<br>";
echo $chezFlo->getAdress();
echo "<br>";
echo "<br>";
