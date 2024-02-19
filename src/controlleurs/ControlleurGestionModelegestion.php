<?php
class controlleurGestionModelegestion
{

    public function afficher()
    {
        if ($_SESSION['connected'] == True) {
            if ($_SESSION['status'] == 'professeurs' || $_SESSION['status'] == 'administrateurs') {
                require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
                require_once __DIR__ . '/../view/templates/GestionModelegestion.html.php';
                require_once __DIR__ . '/../view/templates/FinHtml.html.php';
            }
        } else {
            require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
            require_once __DIR__ . '/../view/templates/Erreur.html.php';
            require_once __DIR__ . '/../view/templates/FinHtml.html.php';
        }
    }

    public function AfficherClassesProfesseur($Id)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->RecupClassesProfesseur($Id);
    }

    public function ModeleCVParClasse($Nom)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->AfficherModeleParClasse($Nom);
    }

    public function SupprimerUnModele($IDModele)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->SupprimerModele($IDModele);
    }

    public function SupprimerModele(){
        $recupid = filter_input(INPUT_POST, 'id');
        $controleur = new controlleurGestionModelegestion();
        $controleur->SupprimerUnModele($recupid);
    }
}
