<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription candidat Jeu-Concours</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
    session_start();
    ?>

    <h1>Inscription candidat Jeu-Concours</h1>

    <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST" enctype="multipart/form-data">

        <section>
            <label for="nom">Nom</label>
            <br>
            <input type="text" name="nom" id="nom" placeholder="votre nom">
        </section>
        <section>
            <label for="prenom">Prénom</label>
            <br>
            <input type="text" name="prenom" id="prenom" placeholder="votre prénom">
        </section>
        <section>
            <label for="email">email</label>
            <br>
            <input type="mail" name="email" id="email" placeholder="identifiant">
        </section>
        <section>
            <label for="pass">Mot de passe</label>
            <br>
            <input type="password" name="pass" id="pass">
        </section>
        
        <section>
            <label for="verifPass">Vérification du Mot de passe</label>
            <br>
            <input type="password" name="verifPass" id="verifPass">
        </section>
        
        <section>
            <label for="avatar">Choisissez votre avatar</label>
            <br>
            <input type="file" name="avatar" id="avatar" accept="image/png, image/jpeg">
        </section>

        <section>
            <label for="dep">Département de votre domicile principal</label>
            <br>
            <select name="dep" id="dep">
                <option value="">Choisir un Département</option>

                <?php

                    require_once "models/Connexion.php";

                    $monPDO=Connexion::getinstance();
                    $rq="SELECT id_dep, nom_dep FROM departements WHERE dep_actif=1";
                    $state=$monPDO->prepare($rq);
                    //BindParam
                    $state->execute();

                    while ($ligne = $state->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value="' . $ligne['id_dep'] . '">' . $ligne['nom_dep'] . '</option>';
                    }
                ?>

            </select>
        </section>
        <section>
            <label for="age">Votre age</label>
            <br>
            <input type="number" name="age" id="age" min="18" max="100" step="1" placeholder="18">
        </section>
        <section>
            <input type="submit" value="Valider" name="valider" id="valider">
        </section>

    </form>
</body>
</html>
