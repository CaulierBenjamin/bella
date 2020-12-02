<?php
class connexion
{
    private $user = "root";
    private $mdp = "root";
    private $dns = "mysql:host=localhost;dbname=belma";

    public function connexion()
    {
        try {
            $maConnexion = new PDO($this->dns, $this->user, $this->mdp);
        } catch (PDOException $e) {
            print "Erreur de connexion à la base de donnée : " . $e->getMessage();
            die();
        }

    }

    public function requeteLangue($prm)
    {
        $maConnexion = new PDO($this->dns, $this->user, $this->mdp);
        $affichage = "";
        $reponse = $maConnexion->query('SELECT correcteur.id_correcteur , correcteur.nom ,correcteur.prenom FROM (correcteur INNER JOIN specialite ON correcteur.id_correcteur = specialite.id_correcteur)INNER JOIN langue ON specialite.id_langue = langue.id_langue where langue.id_langue=' . $prm);
        while ($donnes = $reponse->fetch()) {

            echo "<option value=" . $donnes['id_correcteur'] . ">" . $donnes['nom'] . " " . $donnes['prenom'] . "</option>";

        }

    }

    public function requeteSpecialite()
    {
        //connexion bdd
        $maConnexion = new PDO($this->dns, $this->user, $this->mdp);

        //requete pour savoir le nom et le nombre de langue
        $langue = $maConnexion->query('Select id_langue , libelle FROM langue');

        //Partie affichage
        echo "<div class='card-deck'>";

        //Boucle temps qu'il y a des langue
        while ($donneLangue = $langue->fetch()) {
            if ($donneLangue['id_langue'] != 0) {
                echo "<div class='card'>";
                echo "<h5 class='card-title'>" . $donneLangue['libelle'] . "</h5>";
                //Inscrie le nom et prenom des personnes qui on la specialiter dans la langue selectionner
                $reponse = $maConnexion->query('SELECT langue.id_langue , langue.libelle , correcteur.nom ,correcteur.prenom FROM (correcteur INNER JOIN specialite ON correcteur.id_correcteur = specialite.id_correcteur)INNER JOIN langue ON specialite.id_langue = langue.id_langue where langue.id_langue = ' . $donneLangue['id_langue']);
                while ($donneReponse = $reponse->fetch()) {
                    echo "<p> - " . $donneReponse['nom'] . " " . $donneReponse['prenom'] . "</p>";
                }
                echo "</div>";
            }
        }
        echo "</div>";
        //Fin affichage
    }


    public function requeteProblemeQuestion($prm)
    {
        //connexion bdd
        $maConnexion = new PDO($this->dns, $this->user, $this->mdp);
        $probleme = $maConnexion->query("SELECT langue.id_langue , probleme.id_probleme , probleme.libelle , probleme.description  FROM langue INNER JOIN probleme on langue.id_langue=probleme.id_langue  WHERE langue.id_langue =" . $prm);

        while ($donneProbleme = $probleme->fetch()) {
            echo "<div class='card'>";
            echo "<h5 class='card-title'>" . $donneProbleme['libelle'] . "</h5>";
            $question = $maConnexion->query("SELECT enonce  FROM probleme INNER JOIN question ON probleme.id_probleme=question.id_probleme WHERE probleme.id_probleme = " . $donneProbleme['id_probleme']);
            while ($donneQuestion = $question->fetch()) {
                echo "<p>" . $donneQuestion["enonce"] . "</p>";
            }
            echo "</div>";

        }


    }

    //Requete pour afficher les options dans le dropdown
    public function idLangue()
    {
        //connexion bdd
        $maConnexion = new PDO($this->dns, $this->user, $this->mdp);
        $langue = $maConnexion->query('Select id_langue , libelle FROM langue');
        while ($donneLangue = $langue->fetch()) {
            if ($donneLangue['id_langue'] != 0) {
                if ($donneLangue['id_langue'] == 1) {
                    echo "<option value='" . $donneLangue['id_langue'] . "' selected >" . $donneLangue['libelle'] . "</option>";
                } else {
                    echo "<option value=" . $donneLangue['id_langue'] . ">" . $donneLangue['libelle'] . "</option>";
                }
            }
        }
    }

    public function insert_copies($langue, $niveau, $correcteur, $nbre_copies, $date_remise, $date_retour, $nom_ste)
    {
        //connexion bdd
        $maConnexion = new PDO($this->dns, $this->user, $this->mdp);

        $sql = $maConnexion->prepare('INSERT INTO paquet ( id_specorrecteur,id_niveau, id_spelangue, id_langue, nbcopies, dateremise, dateretour, nomsociete) VALUES
                                                (:correcteur,:niveau,:langue1,:langue2,:nbre_copies,:date_remise,:date_retour,:nom_ste)');


        $sql->bindParam(':correcteur',$id2 );
        $sql->bindParam(':niveau', $id3);
        $sql->bindParam(':langue1', $id4);
        $sql->bindParam(':langue2', $id5);
        $sql->bindParam(':nbre_copies', $id6);
        $sql->bindParam(':date_remise', $id7);
        $sql->bindParam(':date_retour', $id8);
        $sql->bindParam(':nom_ste', $id9);


        try {
            // Préparation des données

            $id2 =$correcteur;
            $id3 =$niveau;
            $id4 =$langue;
            $id5 =$langue;
            $id6 =$nbre_copies;
            $id7 =$date_remise;
            $id8 =$date_retour;
            $id9 =$nom_ste;

            // Envoi de la requête avec les données
            $success = $sql->execute();

            if ($success) {
                echo "Enregistrement réussi";
            }
        } catch (Exception $e) {
            echo 'Erreur de requète : ', $e->getMessage();


        }
    }
}


?>

