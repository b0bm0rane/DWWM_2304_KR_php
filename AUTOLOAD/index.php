<?php
require 'vendor/autoload.php';
use App\Card;
$card = new Card("Nom de l'inventeur du web ?", "Tim Berners-Lee");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Affichage d'une instance de classe</title>
</head>
<body>
  <?php
  echo <<<EOT
  <dl>
    <dt>Question</dt>
    <dd>$card->question </dd>
    <dt>Réponse</dt>
    <dd>$card->answer </dd>
</dl>
EOT;
?>
<dt>Date</dt>
<dd><?= $card->date->format('Y-m-d H:i:s') ?></dd>
  
</body>
</html>
