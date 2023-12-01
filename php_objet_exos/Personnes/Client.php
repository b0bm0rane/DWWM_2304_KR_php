<?php

require_once("Personne.php");
require_once("Adresse.php");

class Client extends Personne
{
    private int $id;

    public function __construct(string $firstName, string $lastName, string $birthday, int $id)
    {
        parent::__construct($firstName, $lastName, $birthday, $id);
        $this->id = $id;
    }

    public function getId() : int
    {
        return $this->id;
    }
}

$natana = new Client("Natana", "Robson", "1988-01-27", 123);

echo $natana->getFirstName();
echo "<br>";
echo $natana->getLastName();
echo "<br>";
echo $natana->getBirthday();
echo "<br>";
echo $natana->getId();
echo "<br>";
var_dump($natana);
echo "<br>";
echo "<br>";
