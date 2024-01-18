<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Pokédex</title>
    <link rel="stylesheet" href="./style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

</head>


<body>
    <?php
    
        
       
        //  require_once "Connexion.php"
       
       require_once "Connexion.php";
       if (isset($_POST) && !empty($_POST["numero"]))
       {

          $monPDO=Connexion::getinstance();
      
          $rq="INSERT INTO pokemon VALUES (:numero, :espece, :niveau, :type1, :type2)";
          
          $state=$monPDO->prepare($rq);
          $state->bindParam(':numero', $_POST['numero'], PDO::PARAM_INT);
          $state->bindParam(':espece', $_POST['espece'], PDO::PARAM_STR);
          $state->bindParam(':niveau', $_POST['niveau'], PDO::PARAM_INT);
          $state->bindParam(':type1', $_POST['type1'], PDO::PARAM_STR);
          $state->bindParam(':type2', $_POST['type2'], PDO::PARAM_STR);
          $state->execute();
            if( $state->rowcount()>0)
            {
                
                // unset($_POST);
                // header("refresh");
                header("Location: pokemon.php");                
            
            }

       
      } else {
        echo "<p>1er affichage du formulaire</p>";   
      }
      
     

    
    
    
    
    ?>

    <div>
        <img src="./img/logo_pokemon.png" alt="Logo pokémon" id="logo">
    </div>

    <h1>Mon pokédex</h1>

    <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" enctype="multipart/form-data">
        <section>
            <h2>Ajout d'un pokémon</h2>
        </section>

        <section>
            <label for="numero">Numéro national (1-1024) : </label>
            <input type="number" name="numero" id="numero" step="1" placeholder="1" min="1" max="1024" required="true">
        </section>
        
        <section>
            <label for="espece">Espèce du pokémon : </label>
            <input type="text" name="espece" id="espece" placeholder="pikachu" required>
        </section>
        
        <section>
            <label for="niveau">Niveau du pokémon : </label>
            <input type="number" name="niveau" id="niveau" step="1" placeholder="1" min="1" max="100" required>
        </section>
        
        <section>
            <label for="type1">Type 1 du pokémon : </label>
            <input type="text" name="type1" id="type1" placeholder="eau" required>
        </section>
        
        <section>
        <label for="type2">Type 2 du pokémon : </label>
            <input type="text" name="type2" id="type2" placeholder="feu">
        </section>

        <section>
            <input type="submit" value="Ajouter à mon Pokédex" id="ajout" name="ajout">
        </section>
        </form>
        <section>
            <h3>Mes pokémon</h3>
            <select name="liste" id="liste">
                <option value="">numero - espece - niveau - type1 - type2</option>
                <?php
                  

                    $monPDO=Connexion::getinstance();
                    $rq="SELECT numero, espece, niveau, type_1, type_2 FROM pokemon";
                    $state=$monPDO->prepare($rq);
                    $state->execute();
                    
                    while ($ligne = $state->fetch(PDO::FETCH_ASSOC)){

                        //  echo '<option value="' . $ligne['numero'] . '">' . $ligne['espece'] . $ligne['niveau'] . $ligne['type_1'] . $ligne['type_2'] . '</option>';
                        
                            echo '<option value="'  . '">' . $ligne['numero'] . ' - ' . $ligne['espece'] . ' - ' . $ligne['niveau'] . ' - ' . $ligne['type_1'] . ' - ' . $ligne['type_2'] . '</option>';
                    
                    }    
                ?>
            </select>
        </section>

        <section>
            <?php
               //require_once "Connexion.php";

                $monPDO=Connexion::getinstance();
                $rq="SELECT numero, espece, niveau, type_1, type_2 FROM pokemon";
                $state=$monPDO->prepare($rq);
                $state->execute();
                $data = [];
                $nb = 0;

                echo "<h3>Mes pokémon</h3>";
                // echo "<caption> Mes pokémon : </caption><table class='table table-striped table-hover'>";
                echo "  <table> 
                            <thead> 
                                <tr> 
                                    <th>Numéro national</th>
                                    <th>Espèce</th>
                                    <th>Niveau</th>
                                    <th>Type 1</th>
                                    <th>Type 2</th> 
                                </tr> 
                            </thead>
                            <tbody>";

                                while ($obj = $state->fetch()) {
                                echo "<tr>";
                                            $nb++;
                                            array_push($data, $obj);
                                            foreach ($obj as $key => $value) {
                                               echo '<td>' .$obj->$key. '</td>';
                                            }
                                echo "</tr>";
                                }
                echo"       </tbody>
                        </table>";

           
                // echo   "<table>
                //             <thead>
                //                 <tr>
                //                     <th>Numéro national</th>
                //                     <th>Espèce</th>
                //                     <th>Niveau</th>
                //                     <th>Type 1</th>
                //                     <th>Type 2</th> 
                //                 </tr>
                //             </thead>
                //                 <tbody>";
                //                     while ($obj = $state->fetch()){
                //                         echo "  <tr>";
                //                                     $nb++;
                //                                     array_push($data, $obj);
                //                                     foreach ($obj as key => $value){
                //                                         echo '<td>' . $obj->key . '</td>';
                //                                     }
                //                         echo "  /tr";
                //                     }
                // echo "          </tbody>
                //         </table>";

                // echo $nb;

            ?>
        </section>



    

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>
