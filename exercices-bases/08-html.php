<?php
 
$names = ['Joe', 'Jack', 'Léa', 'Zoé', 'Néo' ];
 
function  htmlList(string $nameList , array $liste ) {
 
$resultat = "";
 
if ( count($liste) > 0 ) {
 
$resultat = '<h3>'.$nameList.'</h3><ul>';
 
for ( $i = 0; $i < count($liste)-1; $i++) {
 
    $resultat.= '<li>'.$liste[$i].'</li>';
}
 
$resultat .= '</ul>';
}
else
{
    $resultat = "<p>Aucun résultat</p>";
}
 
return $resultat;
 
 
 
}
 
 
$names2 = [];
 
echo " test 1 ".htmlList("Liste des personnes", $names );
echo "\n test 2 ".htmlList("Liste des personnes", $names2 );
 
?>