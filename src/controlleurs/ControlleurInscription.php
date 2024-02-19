<?php
class controlleurInscription
{
    public function afficher()
    {
        require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
        require_once __DIR__ . '/../view/templates/formulairdinscription.html.php';
        require_once __DIR__ . '/../view/templates/FinHtml.html.php';
    }

    public function AjouterEntreprise($Nom, $RCS, $MDP, $Email, $Adresse, $CP, $Ville, $Telephone){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->InscriptionEntreprise($Nom, $RCS, $MDP, $Email, $Adresse, $CP, $Ville, $Telephone);
    }

    public function afficherEmail(){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->AfficherEmail();
    }

    public function AjoutEntreprise(){
        $recupNom = filter_input(INPUT_POST, 'Nom');
        $recupRCS = filter_input(INPUT_POST, 'RCS');
        $recupEmail = filter_input(INPUT_POST, 'Email');
        $recupeMDP = filter_input(INPUT_POST, 'MDP');
        $recupAdress = filter_input(INPUT_POST, 'Adresse');
        $recupVille = filter_input(INPUT_POST, 'Ville');
        $recupCP = filter_input(INPUT_POST, 'CP');
        $recupTelephone = filter_input(INPUT_POST, 'Telephone');

        require_once __DIR__.'/ControlleurProfil.php';
        $controleurP = new controlleurProfil();
        $recupMDP = $controleurP->FixSymbole($recupeMDP);
        $recupAdresse = $controleurP->FixSymbole($recupAdress);

        $controleur = new controlleurInscription();
        $controleur->AjouterEntreprise($recupNom, $recupRCS, $recupMDP, $recupEmail, $recupAdresse, $recupCP, $recupVille, $recupTelephone);
    }
}
