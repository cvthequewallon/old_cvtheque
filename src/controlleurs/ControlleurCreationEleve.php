<?php
class controlleurCreation
{
    public function afficher()
    {
        if ($_SESSION['connected'] == True) {
            if ($_SESSION['status'] == 'professeurs' || $_SESSION['status'] == 'administrateurs') {
                require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
                require_once __DIR__ . '/../view/templates/CreationEleves.html.php';
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
    public function ajoutereleve($Nom, $Email, $MDPe, $Prenom, $Datenaiss, $Adresse, $Ville, $CP, $classe)
    {
        require_once __DIR__.'/ControlleurProfil.php';
        $controleurP = new controlleurProfil();
        $MDP = $controleurP->FixSymbole($MDPe);

        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->ajoutereleve($Nom, $Email, $MDP, $Prenom, $Datenaiss, $Adresse, $Ville, $CP, $classe);
    }
    public function DateFr($DateAn)
    {
        $DateExploser = explode("-", $DateAn);
        $DateFr = mktime(0, 0, 0, $DateExploser[1], $DateExploser[2], $DateExploser[0]);
        return $DateFr;
        var_dump($DateFr);
    }

    public function afficherEmail()
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->AfficherEmail();
    }
}
