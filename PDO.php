<?php


class PDO
{


    public function __construct()
    {
        try {
            $maConnexion = new PDO("localhost", "root", "root");
            // autres commandes (voir plus loin)
        } catch (PDOException $e) {
            print "Erreur de connexion à la base de donnée : " . $e->getMessage();
            die();
        }
    }
}