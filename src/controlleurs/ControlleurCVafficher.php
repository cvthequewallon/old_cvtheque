<?php
class controlleurProfil
{
    public function afficher()
    {
        if ($_SESSION['connected'] == True) {
                require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
                require_once __DIR__ . '/../view/templates/CVafficher.html.php';
                require_once __DIR__ . '/../view/templates/FinHtml.html.php';
        } else {
            require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
            require_once __DIR__ . '/../view/templates/Erreur.html.php';
            require_once __DIR__ . '/../view/templates/FinHtml.html.php';
        }
    }
    public function RecupCV($idProf)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->RecupCV($idProf);
    }

    public function SuppCVParId($idCV)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->SuppCVParId($idCV);
    }

    public function allclasse()
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->allclasse();
    }

    public function AfficherCVParEleve($ideleve){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->AfficherCVParEleve($ideleve);
    }

    public function RecupClassesProfesseur($idProf){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->RecupClassesProfesseur($idProf);
    }
}
