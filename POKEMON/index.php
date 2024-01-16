<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Pokédex</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div>
        <img src="./img/logo_pokemon.png" alt="Logo pokémon" id="logo">
    </div>

    <h1>Mon pokédex</h1>

    <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST" enctype="multipart/form-data">
        <section>
            <h2>Ajout d'un pokémon</h2>
        </section>

        <section>
            <label for="numero">Numéro national (1-1024) : </label>
            <input type="number" name="numero" id="numero" step="1" placeholder="1" min="1" max="1024">
        </section>
        
        <section>
            <label for="espece">Espèce du pokémon : </label>
            <input type="text" name="espece" id="espece" placeholder="pikachu">
        </section>
        
        <section>
            <label for="niveau">Niveau du pokémon : </label>
            <input type="number" name="niveau" id="niveau" step="1" placeholder="1" min="1" max="100">
        </section>
        
        <section>
            <label for="type1">Type 1 du pokémon : </label>
            <input type="text" name="type1" id="type1" placeholder="eau">
        </section>
        
        <section>
        <label for="type2">Type 2 du pokémon : </label>
            <input type="text" name="type2" id="type2" placeholder="feu">
        </section>

        <section>
            <input type="submit" value="Ajouter à mon Pokédex" id="ajout">
        </section>

        <section>
            <h3>Mes pokémon</h3>
            <select name="liste" id="liste">
                <option value="">numero - espece - niveau - type1 - type2</option>
                <?php
                    require_once "Connexion.php";

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
                require_once "Connexion.php";

                $monPDO=Connexion::getinstance();
                $rq="SELECT numero, espece, niveau, type_1, type_2 FROM pokemon";
                $state=$monPDO->prepare($rq);
                $state->execute();
                $data = [];
                $nb = 0;

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

    </form>

    

</body>

</html>
