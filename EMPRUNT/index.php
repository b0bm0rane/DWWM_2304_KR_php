<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prêt</title>
</head>
<body>
    <?php

    include "./models/Pret.php";
    $monPret=new Pret(10000,3,3);

    echo "mensualité constante :".$monPret->calculMensualite()."€";
    echo "<caption>Tableau d'amortissement prêt</caption>" . $monPret->tableauAmortissement();
    $mesdata=$monPret->getTableauAmortissement();
    $json=json_encode($mesdata,JSON_PRETTY_PRINT);
    file_put_contents("tableau_pret.json",$json);

    ?>
</body>
</html>
