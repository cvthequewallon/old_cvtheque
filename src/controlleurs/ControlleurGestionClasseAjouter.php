<?php
class controlleurGestionClasseAjout{
    public function afficher(){
        if($_SESSION['connected'] == True){
            if($_SESSION['status'] == 'administrateurs'){
                require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
                require_once __DIR__ . '/../view/templates/GestionClasseAjouter.html.php';
                require_once __DIR__ . '/../view/templates/FinHtml.html.php';
            }
        }
        else{
            require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
            require_once __DIR__ . '/../view/templates/Erreur.html.php';
            require_once __DIR__ . '/../view/templates/FinHtml.html.php';
        }
    }

    public function AjouterClasse($NomC){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->AjouterClasse($NomC);
    }
}
?>