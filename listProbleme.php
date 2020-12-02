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
    <title>listProbleme</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class='container'>
    <header>
        <?php $contenu->navbar();?>
    </header>
    <div class="container bg-light">
        <h4 class="display-4">Consulter pour une langue l’ensemble des problèmes définis et pour un problème les questions </h4>
        <div>
            <?php $contenu->dropdownLangue("listProbleme.php"); ?>
        </div>
    </div>
</div>

</body>
</html>
