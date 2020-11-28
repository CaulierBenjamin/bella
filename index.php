<?php
require_once("connexion.php");
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
<h1>Salut</h1>

<form method="post" action="traitement.php">

    <label>Veuillez choisir une langue :
        <select name="langue" >
            <option value="0">Français</option>
            <option value="1">Anglais</option>
        </select>
    </label>
    <label>Veuillez choisir un correcteur :
        <select name="correcteur" >
            <option value="0">Caulier Benjamin</option>
            <option value="1">Paque Sanddy</option>
        </select>
    </label>
    <br>
    <label>Veuillez choisir un niveau :
        <select name="niveau" >
            <option value="0">facile</option>
            <option value="1">moyen</option>
            <option value="2">Difficile</option>
        </select>
    </label>
    <br>
    <p>
        <label>Le nom de la societe</label> : <input type="text" name="societe" />
    </p>
    <p>
        <label>Votre nombre de copies</label> : <input type="text" name="copies" />
    </p>
    <label for="dateRemise">Date debut:
        <input type="date" id="start" name="trip-start" value="2020-11-28">
    </label>
    <br>
    <label for="dateRetour">Date retour:
        <input type="date" id="start" name="trip-start" value="2020-11-28">
    </label>



</form>
<?php

$connexion = new connexion()








?>
</body>
</html>
