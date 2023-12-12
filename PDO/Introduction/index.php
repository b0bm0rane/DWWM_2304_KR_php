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

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $id = 1;
    $nouv = "Dresseur picatchou";

    $maRequete2 = "UPDATE db_pokemon.dresseur SET dresseur_nom =:nouveauNom WHERE dresseur_id =:id";
    $state2 = $maConnexion->prepare( $maRequete2 );
    $state2->bindParam( ":id", $id, PDO::PARAM_INT );
    $state2->bindParam( ":nouveauNom", $nouv, PDO::PARAM_STR );

    $state2->execute();

    echo $state2->rowCount();

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $id2 = 2;
    $nouv2 = "Dresseur test";

    $maRequete3 = "UPDATE db_pokemon.dresseur SET dresseur_nom =? WHERE dresseur_id =?";
    $state3 = $maConnexion->prepare( $maRequete3 );
    $state3->execute( [ $nouv2, $id2 ] );

    echo $state3->rowCount();

    ?>
    
</body>
</html>
