<?php 
class controlleurErreur{
    public function afficher(){
        require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
        require_once __DIR__ . '/../view/templates/Erreur.html.php';
        require_once __DIR__ . '/../view/templates/FinHtml.html.php';
    }
}