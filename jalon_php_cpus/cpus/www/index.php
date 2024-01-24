<!DOCTYPE html>
<html lang="fr-be">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les CPUs en vente</title>
    <link rel="stylesheet" href="./assets/cpus.css">
</head>
<body>
    <header>
        <h1>Les micro-processeurs INTEL en vente</h1>
    </header>
    <main>

        <h2>Ajouter un nouveau micro-processeur</h2>

        <!-- <p>
            Remplacer ce paragraphe par un formulaire permettant l'ajout d'un nouveau micro-processeur.
        </p> -->

        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
            
            <?php

                require_once "Connexion.php";

                if (!empty($_POST)) {

                    $monPDO = Connexion::getinstance();

                    // $rq = "INSERT INTO db_cpu.cpu_intel VALUES (:fam, :mod, :fre)";
                    $rq = "INSERT INTO db_cpu.cpu_intel (cpu_family, cpu_model, cpu_mhz) VALUES (:fam, :mod, :fre)";

                    $state=$monPDO->prepare($rq);

                    // $state->bindPARAM(':id', $_POST['id'], PDO::PARAM_INT);
                    $state->bindPARAM(':fam', $_POST['fam'], PDO::PARAM_STR);
                    $state->bindPARAM(':mod', $_POST['mod'], PDO::PARAM_STR);
                    $state->bindPARAM(':fre', $_POST['fre'], PDO::PARAM_INT);

                    $state->execute();

                    if ($state->rowcount() > 0) {
                        header("Location: index.php");                    
                    }                
                }                 
                else {                    
                    echo "<p>Remplissez le formulaire d'ajout</p>";                
                }

            ?>

            <!-- <section>
                <label for="id">Identifiant du micro-processeur</label>
                <input type="number" name="id" id="id" required>
            </section> -->
                
            <section>
                <label for="fam">Famille du micro-processeur</label>
                <input type="text" name="fam" id="fam" minlength="2" maxlength="2" required>
            
            </section>

            <section>
                <label for="mod">Modèle du micro-processeur</label>
                <input type="text" name="mod" id="mod" minlength="6" maxlength="7" required>
            </section>

            <section>
                <label for="fre">Fréquence en Mhz</label>
                <input type="number" name="fre" id="fre" step="1" min="1600" max="5000" required>
            </section>

            <section>
                <input type="submit" value="Ajouter un micro-processeur" id="ajout" name="ajout">
            </section>

        </form>

        <h2>Liste des micro-processeurs disponibles</h2>

        <?php

        require_once "Connexion.php";

        $monPDO = Connexion::getinstance();

        $rq = "SELECT cpu_id, cpu_family, cpu_model, cpu_mhz FROM db_cpu.cpu_intel";

        $state=$monPDO->prepare($rq);
        $state->execute();
        $data = [];
        $nb = 0;

        ?>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Famille</th>
                    <th>Modèle</th>
                    <th>Fréquence de base</th>
                </tr>
            </thead>
            <tbody>
                
                <!-- <tr>
                    <td colspan="4">
                        Remplacer cette cellule par le listing des CPU référencés en base de données
                    </td>
                </tr> -->
                
                <?php
                while ($obj = $state->fetch()) {
                    echo "<tr>";
                    $nb++;
                    array_push($data, $obj);
        
                    foreach ($obj as $key => $value) {
                        echo '<td>' . $obj->$key . '</td>';
                    }
                    echo "</tr>";
                }
                

echo       "</tbody>";  
echo   "</table>";
?>
    </main>
    
</body>
</html>
