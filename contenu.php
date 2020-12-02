<?php
require_once ("connexion.php");
class contenu{
    public function __construct(){}

    //dropdown pour choisir les langues
    public function idLangue($url){
        $PDO = new connexion();
        ?>
        <form action="/bella/<?php echo $url?>" method="post">
            <label>Veuillez choisir une langue :
                <select class='form-control' name="langue" >
                    <?php $PDO->idLangue();?>
                </select>
            </label>
            <button class="btn btn-danger" type="submit">ok</button>
        </form>
        <?php
    }

    //Nav Bar en haut pour selectionner les pages
    public function navbar(){
        ?><nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <a class="navbar-brand" href="index.php">Accueil</a>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="paquet.php">Recpetion de paquet</a>
                    <a class="nav-link" href="listSpe.php">Liste specialités</a>
                    <a class="nav-link active" href="listProbleme.php">Problemes par langue</a>
                </div>
            </div>
        </nav>
        <?php
    }

    //Pour page Problemes par langue
    public  function dropdownLangue($prm){
        $this->idLangue($prm);
        $PDO = new connexion();
        if(!empty($_POST['langue'])) {
            $PDO->requeteProblemeQuestion($_POST['langue']);
        }

    }



}
