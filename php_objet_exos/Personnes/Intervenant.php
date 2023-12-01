<?php

require_once("Personne.php");

class Intervenant extends Personne
{
    private float $salary;
    private float $otherSalary;
    private float $taxes;

    public function __construct(string $firstName, string $lastName, string $birthday, float $salary, $otherSalary)
    {
        parent::__construct($firstName, $lastName, $birthday);
        $this->salary = $salary;
        $this->otherSalary = $otherSalary;
        $this->taxes = $this->getTaxes();
    }

    public function getSalary() : float
    {
        return $this->salary;
    }

    public function getOtherSalary() : float
    {
        return $this->otherSalary;
    }

    public function getTaxes() : float
    {
        $this->taxes = ($this->salary * 20 /100) + ($this->otherSalary * 15 / 100);
        return $this->taxes;
    }
}

$florian = new Intervenant("Florian", "Schieber", "1997-07-05", 100, 100);

echo $florian->getFirstName();
echo "<br>";
echo $florian->getLastName();
echo "<br>";
echo $florian->getBirthday();
echo "<br>";
echo $florian->getSalary();
echo "<br>";
echo $florian->getOtherSalary();
echo "<br>";
echo $florian->getTaxes();
echo "<br>";
var_dump($florian);
echo "<br>";
echo "<br>";
