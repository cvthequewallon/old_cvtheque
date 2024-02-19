<?php
class controlleurProfil
{
    public function afficher()
    {
        if ($_SESSION['connected'] == True) {
            if ($_SESSION['status'] == 'eleves') {
                require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
                require_once __DIR__ . '/../view/templates/CVchoisir.html.php';
                require_once __DIR__ . '/../view/templates/FinHtml.html.php';
            }
        } else {
            require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
            require_once __DIR__ . '/../view/templates/Erreur.html.php';
            require_once __DIR__ . '/../view/templates/FinHtml.html.php';
        }
    }

    public function ModeleParClasse($NomClasse)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->AfficherModeleParClasse($NomClasse);
    }
}
