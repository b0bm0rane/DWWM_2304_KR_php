<?php

// Fini : 3.A, 3.B, 3.C, 3.D 
// Reste : 

function getMC2() : string
{
    return 'Albert Einstein';
}

//echo getMC2();

function getUserName(string $firstName, string $lastName) : string
{
    return $firstName . $lastName;
}

//echo getUserName('Kévin', 'Roussotte');

function getFullName( string $firstName, string $lastName) : string
{
    return $firstName . " " . mb_convert_case($lastName, MB_CASE_UPPER, "UTF-8");
}

//echo getFullName('Kévin', 'Roussotte');

function askUser(string $firstName, string $lastName) : string
{
    return 'Bonjour ' . getFullName($firstName, $lastName) . ', connaissez-vous ' . getMC2() . ' ?';
}

//echo askUser('Kévin', 'Roussotte');
