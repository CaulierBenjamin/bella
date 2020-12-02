<?php
require_once("connexion.php");
require_once("contenu.php");
$PDO = new connexion();
$contenu = new contenu();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>list specialité</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container bg-light">
    <header>
        <?php $contenu->navbar(); ?>
    </header>
    <div>
        <h4 class="display-4">Consulter la liste des spécialités </h4>
        <br>
        <div>
            <?php $PDO->requeteSpecialite();?>
        </div>
    </div>
</div>
</body>
</html>
