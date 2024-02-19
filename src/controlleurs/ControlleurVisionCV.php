<?php
class ControlleurVisionCV{
    public function afficher(){
        if($_SESSION['connected'] == true){
            if($_SESSION['status'] == 'entreprises' || $_SESSION['status'] == 'professeurs' || $_SESSION['status'] == 'administrateurs'){
                require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
                require_once __DIR__ . '/../view/templates/VIsionCV.html.php';
                require_once __DIR__ . '/../view/templates/FinHtml.html.php';
            }
            else{
                require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
                require_once __DIR__ . '/../view/templates/Erreur.html.php';
                require_once __DIR__ . '/../view/templates/FinHtml.html.php';
            }
        }
    }

    public function RecupInfosCV($idCV){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controlleur = new Connexion();
        return $controlleur->AfficherUnCV($idCV);
    }

    public function AfficherModele($id){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->AfficherModeleParId($id);
    }
}