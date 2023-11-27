<?php

// Fini : 8.A 
// Reste : 

$names = ["Joe", "Jack", "Léa", "Zoé", "Néo"];

function htmlList(string $nameList, array $arrayList)
{
    if(empty($arrayList)){
        echo $nameList;
        return "Aucun résultat";
    }

    sort($arrayList);
    $names = "";
    foreach ($arrayList as $value) {
        $names = "<li>{$value}</li>";
    }
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 8.A</title>
</head>
<body>
    <main>
        <ul>
            <?= htmlList("Liste des personnes : ", $names) ?>
        </ul>
    </main>
</body>
</html>
