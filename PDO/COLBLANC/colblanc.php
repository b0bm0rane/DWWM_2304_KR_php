<!doctype html>
<html lang="Fr">

<head>
  <meta charset="utf-8">
  <title>Entrainement Centre de Readaptation</title>
  <link rel="stylesheet" media="screen" href="css/style.css">
</head>

<body>

  <div id="page">
    <div id="header">
      <img src="contenu/header.jpg" width="980" height="176" alt="colblanc entete">
    </div>

    <div id="menu">
      <ul>
        <li><a href="#">Entreprises</a>
          <ul>
            <li><a href="#" target="_self">Visualiser</a>
            </li>
            <li><a href="filtre.php">Rechercher</a>
            </li>
            <li><a href="#">Ajouter</a>
            </li>
          </ul>
        </li>
        <li><a href="#">Candidats</a>
          <ul>
            <li><a href="#" target="_self">Listing</a>
            </li>
            <li><a href="#">rechercher</a>
            </li>
            <li><a href="#">Ajouter</a>
            </li>
            <li><a href="#">CVthèque</a>
            </li>
          </ul>
        </li>
        <li><a href="#">Projets</a>

        </li>
        <li><a href="#">offres</a>
          <ul>

            <li><a href="#">Par secteur</a>

            </li>

            <li><a href="#">Par entreprises</a>

            </li>
          </ul>
        </li>
      </ul>
    </div>

    <main>
      <section>

        <h1 style=" text-align:center">Rechrche d'emploi par département</h1>

        <form name="selection" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">
          <label for="depSelect">Choisissez votre département : </label>
          <select name="depSelect" id="depSelect">
            <option value="">Choix du département</option>
            <?php

            include "./models/Connexion.php";

            $maConnexion = Connexion::getInstance();

            $rq = "SELECT id_dep, name FROM db_col_blanc.departements WHERE dep_actif = 1";
            $state = $maConnexion->prepare($rq);
            $state->execute();

            while ($obj = $state->fetch()) {
              if (isset($_POST["depSelect"]) && !empty($_POST["depSelect"]) && $obj->id_dep == $_POST["depSelect"]) {
                echo '<option value=""' . $obj->id_dep . '"selected="true">' . $obj->name . '</option>';
              } else {
                echo '<option value="' . $obj->id_dep . '">' . $obj->name . '</option>';
              }
            }

            ?>

          </select>

          <br>
          <br>

          <fieldset>
            <legend>Sélectionner votre type d'établissement</legend>
          
            <div>

              <br>
              <input type="checkbox" name="choix[]" id="tpe" value="TPE">
              <label for="tpe">TPE</label>
              <br>
              <input type="checkbox" name="choix[]" id="pme" value="PME">
              <label for="pme">PME</label>
              <br>
              <input type="checkbox" name="choix[]" id="ge" value="GE">
              <label for="ge">GRANDE ENTREPRISE</label>
              <br>
              <input type="checkbox" name="choix[]" id="ct" value="CT">
              <label for="ct">COLLECTIVITE TER</label>
              <br>
              <input type="checkbox" name="choix[]" id="asso" value="ASSO">
              <label for="asso">ASSOCIATION</label>
              <br>
              <input type="checkbox" name="choix[]" id="autres" value="AUTRES">
              <label for="autres">AUTRES(secteur public)</label>

            </div>

          </fieldset>

          <br>

          <button type="print">Imprimer</button>
          <button type="submit">Valider</button>



        </form>
        
        <br>
        
        <aside>

        </aside>
      </section>
    </main>

    <?php

    var_export($_POST);
    // var_export($_POST["choix"]);

    if (isset($_POST["depSelect"]) && !empty($_POST["depSelect"])) {

      // echo $_POST["depSelect"];

      $maConnexion = Connexion::getInstance();
      
      $rq2 = "SELECT nom_etab, type_etab, nom_resp, adresse, ville, cp, telephone, email FROM db_col_blanc.institutions WHERE depart=:departement";
      $state2 = $maConnexion->prepare($rq2);
      $state2->bindParam(":departement", $_POST["depSelect"], PDO::PARAM_STR);
      $state2->execute();
      $data = [];
      $nb = 0;
      while ($obj = $state2->fetch()) {
        $nb++;
        array_push($data, $obj);
      }
      var_export($data);
      } else {
        echo "Veuillez choisir un département";
      }

    ?>

    <footer>
      Copyright
    </footer>
  </div>
</body>

</html>