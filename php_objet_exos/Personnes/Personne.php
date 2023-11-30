<?php

class Personne
{
    public string $firstName;
    public string $lastName;
    public string $birthday;

    public function __construct(string $firstName, string $lastName, string $birthday) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthday = $birthday;
    }

    public function getFirstName() : string
    {
        return $this->firstName;
    }

    public function getLastName() : string
    {
        return $this->lastName;
    }
    
    public function getBirthday() : string
    {
        return $this->birthday;
    }

}

$kevin = new Personne("Kévin", "Roussotte", "1993-07-16");

echo $kevin->getFirstName();
echo "<br>";
echo $kevin->getLastName();
echo "<br>";
echo $kevin->getBirthday();
echo "<br>";
var_dump($kevin);
