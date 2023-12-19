<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Liste des voiliers disponibles à la location</title>
</head>

<body>

<?php
	session_start();
	if (isset($_SESSION["nom"]))

	{
		echo $_SESSION["nom"] . " " . $_SESSION["prenom"] . " Bienvenue sur notre site";
?>

		<ul>
			<li  class="">
				<a  class="" href="/edel/edel2" >
					<span class="">Edel Grand-large</span>
				</a>
			</li>
			<li  class="">
				<a class="" href="/edel/edel2" >
					
					<span class="">Edel 2</span>	
				</a>
			</li>
			<li  class="">
				<a class="" href="/edel/edel3" >
					
					<span class="">Edel 3</span>	
				</a>
			</li>
			<li  class="">
				<a class="" href="/edel/edel4" >
					
					<span class="">Edel 4</span>
				</a>
			</li>
			<li  class="">
				<a  class="" href="/edel/edel-5-545" >
					
					<span class="">Edel 5 / 545 / Dayboat</span>	
				</a>
			</li>
			<li  class="">
				<a  class="" href="/edel/edel600" >
					
					<span class="">Edel 600</span>	
					
				</a></li>
				<li  class="">
					<a class="" href="/edel/edel-6-660-665" >
						
						<span class="">Edel 6 / 660 / 665</span>
						
					</a>
				</li>
				<li  class="">
					<a class="" href="/edel/edel730" >
						
						
						<span class="">Edel 730</span>	
						
					</a>
				</li>

				<li  class="">
					<a  class="" href="/edel/edel820" >
						
						<span class="">Edel 820</span>	
					</a>
				</li>
			</ul>
<?php
	}
	else{
		echo "Vous n'êtes pas autorisé, veuillez vous connecter : <a href='index.php' target ='_blank' > lien accès membre </a>";
	}
?>

</body>
</html>
