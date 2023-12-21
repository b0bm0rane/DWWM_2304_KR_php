<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
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

    // if(isset($_POST["log"], $_POST["pass"]) && !empty($_POST["log"]) && !empty($_POST["pass"])){
    //     $verifOk = loginVoilier($_POST["log"], $_POST["pass"]);
    //     if($verifOk){
            
    //         echo "<a href='./liste.php' target='_blank'>Lien accès membre</a>";

    //         //header('Location:http://localhost/dwwm2304/PDO/VOILIERS/liste.php');
    //     }
    // }
    // else{
    //     echo "remplissez tous les champs";
    // }

    /*if(session existe){

    }
    else{

    }*/

    ?>
            <form action="index.php" method="POST" enctype="multipart/form-data">
                
                <fieldset>
                    <legend>ACCES MEMBRES</legend>
                    <br>
                    <label for="email" id="email">email</label>
                    <br>
                    <input type="email" name="log">
                    <br>
                    <br>
                    <label for="pass" id="pass">Mot de passe</label>
                    <br>
                    <input type="password" name="pass">
                    <br>
                    <br>
                    <div>
                    <?php

                    $verifOk = false;
                    if(isset($_POST["login"], $_POST["log"], $_POST["pass"]) && !empty($_POST["log"]) && !empty($_POST["pass"])){
                        $verifOk = loginVoilier($_POST["log"], $_POST["pass"]);
                    }
                    if ($verifOk){
                        
                        echo "<button id='deconnexion' type='submit'>Déconnecter</button>";
                    }
                    else{
                        
                        echo "<button id='ok' type='submit' name='login'>Valider</button>";
                    }
                    ?>                    

                    </div>

                </fieldset>

            </form>
    <?php

        
        
        if($verifOk){

            echo "<br>";
            echo "<a href='./liste.php' target='_blank'>Lien accès membre</a>";
                
            //header('Location:http://localhost/dwwm2304/PDO/VOILIERS/liste.php');
        }
        else{

            echo "<br>";
            echo "Remplissez tous les champs";
    
        }

?>
</body>
</html>
