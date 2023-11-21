<?php

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

function sortItems(array $array) : array
{
    if (!empty($array)){
        return arsort($array);
    }
    else{
        return null;
    }
}

//echo sortItems($names);

print_r(array_values($names));
