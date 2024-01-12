<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription candidat Jeu-Concours</title>
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
            <label for="dep">Département de votre domicile principal</label>
            <br>
            <select name="dep" id="dep">
                <option value="">Choisir un Département</option>

                <?php

                    require_once "./ECF_WEB_ENTRAINEMENT/models/Connexion.php";

                    $monPDO
                ?>

            </select>
        </section>
        <section>
            <label for="age">Votre age</label>
            <br>
            <input type="number" name="age" id="age" min="18" max="100" placeholder="18">
        </section>
        <section>
            <input type="submit" value="Valider">
        </section>

    </form>
</body>
</html>