<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calcul impôt</title>
</head>
<body>
    
    <?php
    
    require "models/Contribuable.php";

    $resultat = 0;

    if(isset($_GET["validation"])){
        if(!empty($_GET["nom"]) && !empty($_GET["revenu"])){

            $monContribuable = new Contribuable($_GET["nom"], $_GET["revenu"]);
            $resultat = $monContribuable->calculImpot();

        }

        else{
            echo "Veuillez remplir tous les champs";
        }
    }

    else{
        echo "Veuillez remplir nom et revenu";
    }

    ?>

    <form action="index.php" method="get">
        <label for="nom">Nom : </label>
        <input type="text" name="nom" id="nom" value="<?php echo isset($_GET["nom"])? $_GET["nom"] : "" ?>">
        <br>
        <label for="revenu">Revenu annuel : </label>
        <input type="number" step="0.01" name="revenu" id="revenu" value="<?php echo isset($_GET["revenu"])? $_GET["revenu"] : 0 ?>">
        <br>
        <input type="submit" value="Valider" name="validation" id="validation">
        <br>
        <label for="resultat">Résultat : </label>
        <input type="text" value="<?php echo $resultat ?>" readonly = "true" id="resultat"> <!-- <?= $resultat ?> = echo-->
    </form>

</body>
</html>
