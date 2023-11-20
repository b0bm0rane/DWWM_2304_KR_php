<?php

function getToday() : string
{
    $date = date_create();

    return date_format($date, "d/m/Y");
}

//echo getToday();

function getTimeLeft(string $date) : string
{
    $dateAuj = new dateTime();
    $date = DateTime::createFromFormat("Y-m-d", $date);
    $interval = date_diff($dateAuj, $date);

    if($date > $dateAuj){
        return $interval -> format('%R%a %Y %m %d');
    }
    
    else if($date < $dateAuj){
        return "Évènement passé";
    }

    else{
        return "Aujourd'hui";
    }
}

// echo getTimeLeft(2023-11-10);
// echo getTimeLeft(2023-11-20);
// echo getTimeLeft(2023-11-30);
// echo getTimeLeft(2023-12-20);
// echo getTimeLeft(2024-11-20);
 echo getTimeLeft("2025-11-20");
