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
    <title>Accueil</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<div class="container bg-light">
    <header>
        <?php $contenu->navbar();?>
    </header>


</div>

</body>
</html>
