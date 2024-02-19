<?php
class controlleurHome
{
    public function afficher()
    {
        require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
        require_once __DIR__ . '/../view/templates/Accueil.html.php';
        require_once __DIR__ . '/../view/templates/FinHtml.html.php';
    }

    public function BDDConnexion(){
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion(); 
        return $controleur->ConnexionBDD();
    }

    function BonjourBonsoir()
    {
        date_default_timezone_set('Europe/Paris');
        $date = date('H:i:s');
        if ($date > "18:00:00" || $date < "03:00:00") {
            return "Bonsoir";
        } else {
            return "Bonjour";
        }
    }
}
