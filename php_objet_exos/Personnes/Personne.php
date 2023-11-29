<?php

class Personne
{
    public string $firstName;
    public string $lastName;
    public DateTime $birthday;

    public function __construct(string $firstName, string $lastName, DateTime $birthday) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthday = $birthday;
    }
}
