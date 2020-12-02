<?php
require_once ("connexion.php");
$PDO = new connexion();
    $langue = $_POST['langue'];
    $correcteur = $_POST['correcteur'];
    $niveau = $_POST['niveau'];
    $nbre_copies = $_POST['copies'];
    $date_remise = $_POST['start'];
    $date_retour = $_POST['stop'];
    $nom_ste = $_POST['societe'];

    try {
        if ($langue != null && $correcteur != null && $nbre_copies != null && $date_remise != null && $date_retour != null && $nom_ste != null) {
            $PDO->insert_copies($langue, $niveau, $correcteur, $nbre_copies, $date_remise, $date_retour, $nom_ste);

        }
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }


