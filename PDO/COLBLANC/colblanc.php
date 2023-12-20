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
         </ul></li>
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

     <button type="button">Imprimer</button>
     <button type="submit">Valider</button>
     
      <h1 style=" text-align:center">Votre travail ici</h1>
  <?php

    include "./ClassConnexion.php";

    $maConnexion = Connexion::getInstance();

    $rq = "SELECT * FROM db_col_blanc.departements WHERE id_dep = 1";
    $state = $maConnexion->prepare($rq);
    $state->execute();

  ?>
   <aside>

</aside>
 </section>
    </main>



<footer>
  Copyright
</footer> 
</div>
</body>
</html>
