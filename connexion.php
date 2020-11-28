<?php

class connexion {
    public function connexion(){
        $user="root";
        $mdp="root";
        $serveur="localhost"; // ou information fournie par l'hébergeur
        $bd="belma";
        $dns="mysql:host=$serveur;dbname=$bd";

        try {
            $maConnexion = new PDO($dns, $user, $mdp);
            // autres commandes (voir plus loin)
        }
        catch (PDOException $e) {
            print "Erreur de connexion à la base de donnée : " .$e->getMessage();
            die();
        }

    }
}



?>

