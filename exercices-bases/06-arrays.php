<?php

// Fini : 6.A, 6.B, 6.C, 6.D 
// Reste : 

$names = ["Joe", "Jack", "Léa", "Zoé", "Néo"];

function firstItem(array $array) : mixed
{
    if($array[0] != ""){
        return $array[0];
    }

    else{
        return null;
    }
}

//echo firstItem($names);

function lastItem(array $array) : mixed
{
    if(end($array) != ""){
        return end($array);
    }
    else{
        return null;
    }
}

//echo lastItem($names);

function sortItems(array $array) : mixed
{
    if (!empty($array)){
        arsort($array);
        return implode(", ", $array);
    }
    else{
        return "Tableau vide";
    }
}

//echo sortItems($names);

function stringItems(array $array) : mixed
{
    if (!empty($array)){
        asort($array);
        return implode(", ", $array);
    }
    else{
        return "Nothing to display";
    }
}

//echo stringItems($names);

//print_r(array_values($names));
