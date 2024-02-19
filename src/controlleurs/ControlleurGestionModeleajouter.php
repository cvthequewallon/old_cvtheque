<?php
class controlleurGestionModeleajouter
{

    public function afficher()
    {
        if ($_SESSION['connected'] == True) {
            if ($_SESSION['status'] == 'professeurs' || $_SESSION['status'] == 'administrateurs') {
                require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
                require_once __DIR__ . '/../view/templates/GestionModeleajouter.html.php';
                require_once __DIR__ . '/../view/templates/FinHtml.html.php';
            }
        } else {
            require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
            require_once __DIR__ . '/../view/templates/Erreur.html.php';
            require_once __DIR__ . '/../view/templates/FinHtml.html.php';
        }
    }
    public function bddInsertionModelCv($CorpCv, $NomCV, $idProf)
    {
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        $controleur->AjouterUnNouveauModele($CorpCv, $NomCV);
        $IdModele = $controleur->ObtenirIDModele($NomCV, $CorpCv);
        $ProfClasse = $controleur->RecupClassesProfesseur($idProf);
        foreach($ProfClasse as $UneClasse){
            if(isset($_POST['UneClasse'.$UneClasse['id']])){
                if($_POST['UneClasse'.$UneClasse['id']] === $UneClasse['id']){
                    $controleur->AssocierModeleClasse($UneClasse['id'], $IdModele['id']);
                }
            }
        }
    }

    public function RecupClassesProf($idProf){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->RecupClassesProfesseur($idProf);
    }
}
