<?php
class controlleurProfil
{
    public function afficher()
    {
        if ($_SESSION['connected'] == True) {
            if ($_SESSION['status'] == 'professeurs' || $_SESSION['status'] == 'administrateurs') {
                require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
                require_once __DIR__ . '/../view/templates/GestionEntreprise.html.php';
                require_once __DIR__ . '/../view/templates/FinHtml.html.php';
            }
        } else {
            require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
            require_once __DIR__ . '/../view/templates/Erreur.html.php';
            require_once __DIR__ . '/../view/templates/FinHtml.html.php';
        }
    }

    public function RecupEntreprise()
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->RecupEntreprise();
    }

    public function suppentreprise($id)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->suppentreprise($id);
    }

    public function validentreprise($id)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->validentreprise($id);
    }
}
