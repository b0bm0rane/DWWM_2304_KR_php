<!doctype html>
<html lang="Fr">

<head>
  <meta charset="utf-8">
  <title>Entrainement Centre de Readaptation</title>
  <link rel="stylesheet" media="screen" href="css/style.css">
  <link rel="stylesheet" media="print" href="css/style2.css">
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







        <h1 style=" text-align:center">formulaire de recherche d'emploi ou stage</h1>
        <form name="selection" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">
          <label for="dep">Choisir votre département :</label>
          <select name="dep" id="dep">
            <option value="">Selectionner un département</option>
            <?php
            include "models/Connexion.php";
            $connect = Connexion::getinstance();
            $rq = "SELECT id_dep, Name FROM departements WHERE dep_actif=1";
            $state = $connect->prepare($rq);
            $state->execute();
            while ($obj = $state->fetch()) {

              if (isset($_POST["dep"]) && !empty($_POST["dep"])  && $obj->id_dep == $_POST["dep"]) {
                echo '<option value="' . $obj->id_dep . '" selected="true" >' . $obj->name . '</option>';
              } else {
                echo '<option value="' . $obj->id_dep . '">' . $obj->name . '</option>';
              }
            }




            ?>
          </select>
          <br>
          <hr>
          <br>
          <fieldset>
            <legend>Sélectionner le type d'établissement</legend>
            <div>

              <input type="checkbox" name="choix[]" id="tpe" value="TPE" <?php
                                                                          if (isset($_POST["choix"])) {

                                                                            foreach ($_POST["choix"] as $key =>  $value) {
                                                                              if ($value == "TPE") {
                                                                                echo "checked='true'";
                                                                              }
                                                                            }
                                                                          } ?> />
              <label for="tpe"> TPE</label>

            </div>
            <div>
              <input type="checkbox" name="choix[]" id="pme" value="PME">
              <label for="pme">PME</label>
            </div>
            <div>
              <input type="checkbox" name="choix[]" id="ge" value="GE">
              <label for="ge">Grande Entreprise</label>
            </div>
            <div>
              <input type="checkbox" name="choix[]" id="ct" value="CT">
              <label for="ct">Collectivité Territoriale</label>
            </div>
            <div>
              <input type="checkbox" name="choix[]" id="assoc" value="ASSOC">
              <label for="assoc">Association</label>
            </div>
            <div>
              <input type="checkbox" name="choix[]" id="autres" value="AUTRES">
              <label for="autre">Autres...</label>
            </div>

          </fieldset>

          <?php

          //  var_export($_POST);
          ?>

          <input type="submit" value="Valider" name="validation" id="validation">
        </form>
        <aside>

        </aside>
      </section>




      <?php

      // var_dump($_POST["choix"]);

      // var_dump($_POST);
      $finrq = "";
      if (isset($_POST["choix"]) && count($_POST["choix"]) > 0) {
        $liste = "";
        for ($i = 0; $i < count($_POST["choix"]); $i++) {

          $liste .= ",'" . $_POST["choix"][$i] . "'";
        }
        $liste = substr($liste, 1);


        $finrq = " AND type_etab IN(" . $liste . ")";
      }



      $connect = Connexion::getinstance();
      $rq = "SELECT nom_etab, type_etab, nom_resp, adresse, ville, cp, Telephone, email FROM institutions WHERE depart=:departement " . $finrq;
      $state = $connect->prepare($rq);
      $state->bindParam(":departement", $_POST["dep"], PDO::PARAM_STR);
      $state->execute();
      $data = [];
      $nbEntr = 0;

      echo "<caption > Resultats de votre recherche </caption><table class='table table-striped table-hover'>";
      echo "<thead><tr><th>Nom etablissement</th> <th> type etab</th> <th> Nom resp</th> <th>adresse</th><th>code postal</th><th>ville</th><th>Tél</th><th>mail</th></tr></thead><tbody>";


      while ($obj = $state->fetch()) {
        echo "<tr>";
        $nbEntr++;
        array_push($data, $obj);
        foreach ($obj as $key => $value) {
          echo '<td> ' . utf8_decode($obj->$key) . '</td>';
        }
        echo "</tr>";
      }
      //var_dump($data);
      echo "</tbody></table>";

      ?>
    </main>
    <footer>
      Copyright
    </footer>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>