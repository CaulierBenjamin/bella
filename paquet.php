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
    <title>Enregistrement paquet</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container bg-light">
    <header>
        <?php $contenu->navbar(); ?>
    </header>
    <div>
        <h2 class="display-2">Enregistrement de paquet</h2>
        <div>
            <?php
            $contenu->idLangue("paquet.php");
            $PDO = new connexion();
            if(!empty($_POST['langue'])) {
            ?>
            <form action="/bella/enregitrement.php" method='post'>
                <label>Veuillez choisir un correcteur :
                    <select class='form-control' name='correcteur'>
                        <?php $PDO->requeteLangue($_POST['langue']); ?>
                    </select>
                </label>
                <br>
                <label>Veuillez choisir un niveau :
                    <select class='form-control' name='niveau' >
                        <option value='0'>facile</option>
                        <option value='1'>moyen</option>
                        <option value='2'>Difficile</option>
                    </select>
                </label>
                <br>
                <div class='form-check mb-2'>
                    <label>Le nom de la societe :</label>
                    <input type='text' name='societe' />
                </div>
                <div class='form-check mb-2'>
                    <label>Votre nombre de copies :</label>
                    <input type='text' name='copies' />
                </div>
                <label for='dateRemise'>Date debut:
                    <input type='date' name='start' name='trip-start' value=''>
                </label>
                <br>
                <label for='dateRetour'>Date retour:
                    <input type='date' name='stop' name='trip-start'>
                </label>
                <input type="hidden" name="langue" value="<?php echo $_POST['langue'];?>" />
                <button class='btn btn-primary' type='submit'>test</button>
            </form>
        <?php

        }

        //            $idlangue = $_POST['langue'];
        //            $idCorrecteur = $_POST['correcteur'];
        //            $idNiveau = $_POST['niveau'];
        //            $nombreCopies = $_POST['copies'];
        //            $dateRemise = $_POST['start'];
        //            $dateRetour = $_POST['stop'];
        //            $nomSociete = $_POST['societe'];
        ?>

        </div>
    </div>
</div>
</body>
</html>