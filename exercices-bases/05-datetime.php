<?php

// Fini : 5.A 
// Reste : 5.B 

function getToday() : string
{
    $date = date_create();

    return date_format($date, "d/m/Y");
}

//echo getToday();

function getTimeLeft(string $date) : string
{
    $date = DateTime::createFromFormat("Y-m-d", $date);
    $dateAuj = new DateTime();
    $interval = date_diff($dateAuj, $date); $dateAuj->diff($date);
    $interval = $dateAuj->diff($date);

    if($date > $dateAuj){
        return 'Dans ' . $interval->format('%R%a jours %Y ans %m mois %d jours') . " ";
    }
    
    else if($date < $dateAuj){
        return "Évènement passé ";
    }

    else if($date = $dateAuj){
        return "Aujourd'hui ";
    }

    else{
        return "La date n'est pas valide ";
    }
}

echo getTimeLeft("2023-11-10");
echo getTimeLeft("2023-11-21");
echo getTimeLeft("2023-11-30");
echo getTimeLeft("2023-12-20");
echo getTimeLeft("2024-11-20");
echo getTimeLeft("2025-11-20");
