<?php 
class controlleurGestionEleveRestaurer{
    public function afficher(){
        require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
        require_once __DIR__ . '/../view/templates/GestionEleveRestaurer.html.php';
        require_once __DIR__ . '/../view/templates/FinHtml.html.php';
    }

    public function RecupClassesProfesseur($Id)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->RecupClassesProfesseur($Id);
    }

    public function RecupEleveSupprimer()
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->RecupEleveSupprimer();
    }

    public function RestaurationEleve($idSupprime)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->RestaurationEleve($idSupprime);
    }

    public function SupprimerDefinitivementEleve($idSupprime){
        require_once __DIR__. '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->supprimerCompteEleveDef($idSupprime);
    }
}
