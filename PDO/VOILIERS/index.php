<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location de voilier</title>
</head>
<body>

    <?php

    session_start();

    include "./models/Connexion.php";

    function loginVoilier(string $_log, string $_pass) : bool
    {
        $trouveOk = false;

        $rq = "SELECT * FROM db_location.utilisateurs WHERE mail_user =:mail";
        $myPdo = Connexion::getInstance();
        $state = $myPdo->prepare($rq);
        $state->bindParam(":mail", $_log, PDO::PARAM_STR);
        $state->execute();
        $nb = $state->rowCount();
        if($nb>0){
            $line = $state->fetch();
            $empreinte = $line["pass_user"];
            if(password_verify($_pass, $empreinte)){
                $_SESSION["nom"] = $line["lastname_user"];
                $_SESSION["prenom"] = $line["firstname_user"];
                $trouveOk = true;
            }
            else{
                $trouveOk = false;
                echo "erreur pass";
            }
        }
        else{
            $trouveOk = false;
            echo "erreur login";
        }

        return $trouveOk;
    }

    if(isset($_POST["log"], $_POST["pass"]) && !empty($_POST["log"]) && !empty($_POST["pass"])){
        $verifOk = loginVoilier($_POST["log"], $_POST["pass"]);
        if($verifOk){
            header('Location:http://localhost/dwwm2304/PDO/VOILIERS/liste.php');
        }
    }
    else{
        echo "remplissez tous les champs";
    }

    ?>

    <form action="index.php" method="POST" enctype="multipart/form-data">
        
        <label for="email">email</label>
        <input type="email" name="log" id="email">
        
        <label for="pass">Mot de passe</label>
        <input type="password" name="pass" id="pass">

        <button type="submit">Valider</button>

    </form>

</body>
</html>
