<?php

function isMajor(int $age) : bool
{
    if($age >= 18){
        return true;
    }
    else{
        return false;
    }
}

//echo var_dump(isMajor(12));
//echo var_dump(isMajor(18));
//echo var_dump(isMajor(42));

function getRetired(int $age) : string
{
    $ageRetired = 60;

    if($age >= 0 && $age < $ageRetired){
        return 'Il vous reste ' . $ageRetired - $age . ' ans avant la retraite';
    }

    else if($age === $ageRetired){
        return "Vous êtes à la retraite cette année";
    }

    else if ($age > $ageRetired){
        return 'Vous êtes à la retraite depuis ' . $age - $ageRetired . ' ans';
    }

    else{
        return "Vous n'êtes pas encore né";
    }
}

//echo getRetired(12);
//echo getRetired(60);
//echo getRetired(72);
//echo getRetired(-2);









function getMax(float $nb1, float $nb2, float $nb3) : float
{
    if ($nb1 > $nb2 && $nb1 > $nb3){
        return $nb1;
    }

    else if ($nb2 > $nb1 && $nb2 > $nb3){
        return $nb2;
    }

    else if ($nb3 > $nb1 && $nb3 > $nb2){
        return $nb3;
    }

    else{
        return 0;
    }
}

//echo getMax(3, 1, 2);
//echo getMax(1, 3, 2);
//echo getMax(1, 2, 3);
//echo getMax(1, 3, 3);

function capitalCity(string $countrie) : string
{
    switch($countrie) {
        case $countrie == "France";
        return "Paris";
        break;

        case $countrie == "Allemagne";
        return "Berlin";
        break;

        case $countrie == "Italie";
        return "Rome";
        break;

        case $countrie == "Maroc";
        return "Rabat";
        break;

        case $countrie == "Espagne";
        return "Madrid";
        break;

        case $countrie == "Portugal";
        return "Lisbonne";
        break;

        case $countrie == "Angleterre";
        return "Londres";
        break;

        default : 
        return "Capitale inconnue";
    }
}

//echo capitalCity("France");
//echo capitalCity("Allemagne");
//echo capitalCity("Italie");
//echo capitalCity("Maroc");
//echo capitalCity("Espagne");
//echo capitalCity("Portugal");
//echo capitalCity("Angleterre");
//echo capitalCity("Russie");
