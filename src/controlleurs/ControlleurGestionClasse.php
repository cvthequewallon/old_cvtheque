<?php
class controlleurGestionClasse{
    public function afficher(){
        if($_SESSION['connected'] == True){
            if($_SESSION['status'] == 'administrateurs'){
                require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
                require_once __DIR__ . '/../view/templates/GestionClasse.html.php';
                require_once __DIR__ . '/../view/templates/FinHtml.html.php';
            }
        }
        else{
            require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
            require_once __DIR__ . '/../view/templates/Erreur.html.php';
            require_once __DIR__ . '/../view/templates/FinHtml.html.php';
        }
    }
}
?>