<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    include "models/Connexion.php";

    $maConnexion = Connexion::getInstance();

    $maRequete = "SELECT dresseur_id, dresseur_nom FROM db_pokemon.dresseur";
    $state = $maConnexion->prepare( $maRequete );
    $state->execute();
    $tableau = [];

    $tabResultat = $state->FETCHALL();
    var_export($tabResultat);
    // var_dump($tabResultat[0]->dresseur_nom);
    var_dump($tabResultat[1]["dresseur_nom"]);

    // while( $ligne = $state->fetch() )
    // {
    //     var_dump($ligne);
    // }

    ?>
    
</body>
</html>
