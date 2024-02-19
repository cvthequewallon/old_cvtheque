<?php
class controlleurGestionProfesseurGestion
{
    public function afficher()
    {
        if ($_SESSION['connected'] == True) {
            if ($_SESSION['status'] == 'administrateurs') {
                require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
                require_once __DIR__ . '/../view/templates/GestionProfesseurgestion.html.php';
                require_once __DIR__ . '/../view/templates/FinHtml.html.php';
            }
        } else {
            require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
            require_once __DIR__ . '/../view/templates/Erreur.html.php';
            require_once __DIR__ . '/../view/templates/FinHtml.html.php';
        }
    }
    public function allclasse()
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->allclasse();
    }
    public function RecupProfesseur()
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->RecupProfesseur();
    }
    public function suppprofesseur($id)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->suppprofesseur($id);
    }
}
