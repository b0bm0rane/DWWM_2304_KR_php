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
    // $date = $date->format("Y-m-d");
    // var_export($date);
    $dateAuj = new DateTime();
    $interval = date_diff($dateAuj, $date); $dateAuj->diff($date);
    $interval = $dateAuj->diff($date);
    
    if($date==true){

        if($date > $dateAuj){
            return 'Dans ' . $interval->format('%R%a jours = %Y ans %m mois %d jours <br> ');
        }
        
        else if($date->format("Y-m-d") < $dateAuj->format("Y-m-d")){
            return "Évènement passé <br> ";
        }
        
        else{
            return "Aujourd'hui <br> ";
        }
    }
    
    else{
        return "La date n'est pas valide <br> ";
    }
}

echo getTimeLeft("2023-11-10"); // PASSÉ 
echo getTimeLeft("2023-11-21"); // PASSÉ 
echo getTimeLeft("2023-11-30"); // FUTUR 
echo getTimeLeft("2023-11-23"); // AUJOURD'HUI 
echo getTimeLeft("2024-11-20"); // FUTUR 
echo getTimeLeft("3025-11-20"); // FUTUR 
echo getTimeLeft("20/11/2025"); // INVALIDE 

// $test = preg_match("%^[0-9]{4}-[0-1]{1}[0-9]{1}-[0-3]{1}[0-9]{1}$%", "2023-12-10");
// var_export($test);
