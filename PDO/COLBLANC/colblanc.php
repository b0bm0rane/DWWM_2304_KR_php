<!doctype html>
<html lang="fr-fr">

<head>
  <meta charset="utf-8">
  <title>Entrainement Centre de Readaptation</title>
  <link rel="stylesheet" media="screen" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                echo '<option value="'. $obj->id_dep .'" selected="true" >' . $obj->name . '</option>';
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
              <input type="checkbox" name="choix[]" id="tpe" value="TPE"
              <?php
              if (isset($_POST["choix"])) {

                foreach ($_POST["choix"] as $key =>  $value) {
                  if ($value == "TPE") {
                   echo "checked='true'";
                  }
                }
              } ?> >
              <label for="tpe">TPE</label>
              <br>
              <input type="checkbox" name="choix[]" id="pme" value="PME"
              <?php
              if (isset($_POST["choix"])) {

                foreach ($_POST["choix"] as $key =>  $value) {
                  if ($value == "PME") {
                    echo "checked='true'";
                  }
                }
              } ?> >
              <label for="pme">PME</label>
              <br>
              <input type="checkbox" name="choix[]" id="ge" value="GE"
              <?php
              if (isset($_POST["choix"])) {

                foreach ($_POST["choix"] as $key =>  $value) {
                  if ($value == "GE") {
                   echo "checked='true'";
                  }
                }
              } ?> >
              <label for="ge">GRANDE ENTREPRISE</label>
              <br>
              <input type="checkbox" name="choix[]" id="ct" value="CT"
              <?php
              if (isset($_POST["choix"])) {

                foreach ($_POST["choix"] as $key =>  $value) {
                  if ($value == "CT") {
                    echo "checked='true'";
                  }
                }
              } ?> >
              <label for="ct">COLLECTIVITE TER</label>
              <br>
              <input type="checkbox" name="choix[]" id="asso" value="ASSOC"
              <?php
              if (isset($_POST["choix"])) {

                foreach ($_POST["choix"] as $key =>  $value) {
                  if ($value == "ASSOC") {
                    echo "checked='true'";
                  }
                }
              } ?> >
              <label for="asso">ASSOCIATION</label>
              <br>
              <input type="checkbox" name="choix[]" id="autres" value="AUTRES"
              <?php
              if (isset($_POST["choix"])) {

                foreach ($_POST["choix"] as $key =>  $value) {
                  if ($value == "AUTRES") {
                    echo "checked='true'";
                  }
                }
              } ?> >
              <label for="autres">AUTRES(secteur public)</label>

            </div>

          </fieldset>

          <br>

          <button type="print" id="print">Imprimer</button>
          <button type="submit" id="submit">Valider</button>

        </form>
        
        <br>
        
        <aside>

        </aside>
      </section>
    </main>

    <?php

    // var_export($_POST);
    // var_export($_POST["choix"]);

    if (isset($_POST["depSelect"]) && !empty($_POST["depSelect"])) {

      // echo $_POST["depSelect"];

      $finrq = "";

      if (isset($_POST["choix"]) && count($_POST["choix"]) > 0){
        $liste = "";

        // var_dump($_POST["choix"]);

        for ($i=0; $i < count($_POST["choix"]); $i++) { 
          $liste.=", '".$_POST["choix"]["$i"]."'";
        }
        $liste=substr($liste,1);

        // echo $liste;

        $finrq = "AND type_etab IN(".$liste.")";
      }



      $maConnexion = Connexion::getInstance();
      
      $rq2 = "SELECT nom_etab, type_etab, nom_resp, adresse, ville, cp, telephone, email FROM db_col_blanc.institutions WHERE depart=:departement " . $finrq;
      $state2 = $maConnexion->prepare($rq2);
      $state2->bindParam(":departement", $_POST["depSelect"], PDO::PARAM_STR);
      $state2->execute();
      $data = [];
      $nb = 0;

      echo "<caption> Résultats : </caption><table class='table table-striped table-hover'>";
      echo "<thead> <tr>  
                      <th> Nom de l'établissement </th> 
                      <th> Type d'établissement </th> 
                      <th> Nom du responsable </th> 
                      <th> Adresse </th> 
                      <th> Code postal </th> 
                      <th> Ville </th> 
                      <th> Téléphone </th> 
                      <th> Mail </th> 
            </tr> </thead>";

      while ($obj = $state2->fetch()) {
        echo "<tr>";
        $nb++;
        array_push($data, $obj);
        foreach ($obj as $key => $value){
          echo '<td>' .$obj->$key. '</td>';
        }
      }
      // var_export($data);

      echo $nb;

      } else {
        echo "Veuillez choisir un département";
      }

      echo "</tbody></table>";

    ?>

    <footer>
      Copyright
    </footer>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>
