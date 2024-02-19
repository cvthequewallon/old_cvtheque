<?php

use controlleurProfil as GlobalControlleurProfil;

class controlleurProfil{
    public function afficher(){
        require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
        require_once __DIR__ . '/../view/templates/Profil.html.php';
        require_once __DIR__ . '/../view/templates/FinHtml.html.php';
    }

    public function AfficherInput($id, $status){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->DecoReco($id, $status);
    }

    public function UpdateInfo($id, $type, $modification, $status){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->MiseAJourInfo($id, $type, $modification, $status);
    }

    public function ChangerMDP($id, $AncienMDP, $NouveauMDP){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->ChangerMDP($id, $AncienMDP, $NouveauMDP);
    }

    public function DeterminerBouton(){
        switch(isset($_POST)){
            case isset($_POST['MNom']):
                return 'MNom';
            case isset($_POST['MPrenom']):
                return 'MPrenom';
            case isset($_POST['MDDN']):
                return 'MDDN';
            case isset($_POST['MEmail']):
                return 'MEmail';
            case isset($_POST['MTelephone']):
                return 'MTelephone';
            case isset($_POST['MAdresse']):
                return 'MAdresse';
            case isset($_POST['MVille']):
                return 'MVille';
            case isset($_POST['MCP']):
                return 'MCP';
        }
    }

    public function ChangerInformation(){
        $controleur = new controlleurProfil();
        $controleurP = new GlobalControlleurProfil();
        $bouton = $controleur->DeterminerBouton();
        $valider = false;
        switch($bouton){
            case 'MNom':
                $modification = filter_input(INPUT_POST, 'Nom');
                ?>
                <div class="d-flex justify-content-center mt-5">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Enregistré</h4>
                        <p>Votre Nom a été changé avec succés.</p>
                        <p>Si vous ne voyez pas de changement, réactuliser la page.</p>
                    </div>
                </div>
                <?php
                $valider = true;
            break;
            case 'MPrenom':
                $modification = filter_input(INPUT_POST, 'Prenom');
                ?>
                <div class="d-flex justify-content-center mt-5">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Enregistré</h4>
                        <p>Votre Prenom a été changé avec succés.</p>
                        <p>Si vous ne voyez pas de changement, réactuliser la page.</p>
                    </div>
                </div>
                <?php
                $valider = true;
            break;
            case 'MDDN':
                $modification = filter_input(INPUT_POST, 'DateDeNaissance');
                ?>
                <div class="d-flex justify-content-center mt-5">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Enregistré</h4>
                        <p>Votre date de naissance a été changée avec succés.</p>
                        <p>Si vous ne voyez pas de changement, réactuliser la page.</p>
                    </div>
                </div>
                <?php
                $valider = true;
            break;
            case 'MEmail':
                $modification = filter_input(INPUT_POST, 'Email');
                $valider = true;
                foreach($controleur->afficherEmail() as $unEmail){
                    if($unEmail['Email'] == $modification){
                        $valider = false;
                        break;
                    }
                }
                if($valider == true){
                    ?>
                <div class="d-flex justify-content-center mt-5">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Enregistré</h4>
                        <p>Votre adresse email a été changée avec succés.</p>
                        <p>Si vous ne voyez pas de changement, réactuliser la page.</p>
                    </div>
                </div>
                <?php
                }
                else{
                    ?>
                        <div class="d-flex justify-content-center mt-5">
                            <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Erreur</h4>
                            <p>L'adresse email que vous avez saisis existe déjà.</p>
                            <p>Veuillez recommencer en saisissant une autre adresse email.</p>
                            </div>
                        </div>
                    <?php
                }
            break;
            case 'MTelephone':
                $modification = filter_input(INPUT_POST, 'Telephone');
                ?>
                <div class="d-flex justify-content-center mt-5">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Enregistré</h4>
                        <p>Votre numéro de téléphone a été changé avec succés.</p>
                        <p>Si vous ne voyez pas de changement, réactuliser la page.</p>
                    </div>
                </div>
                <?php
                $valider = true;
            break;
            case 'MAdresse':
                $modificatio = filter_input(INPUT_POST, 'Adresse');
                $modification = $controleurP->FixSymbole($modificatio);
                ?>
                <div class="d-flex justify-content-center mt-5">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Enregistré</h4>
                        <p>Votre adresse postale a été changée avec succés.</p>
                        <p>Si vous ne voyez pas de changement, réactuliser la page.</p>
                    </div>
                </div>
                <?php
                $valider = true;
            break;
            case 'MVille':
                $modification = filter_input(INPUT_POST, 'Ville');
                ?>
                <div class="d-flex justify-content-center mt-5">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Enregistré</h4>
                        <p>Votre ville de résidence a été changée avec succés.</p>
                        <p>Si vous ne voyez pas de changement, réactuliser la page.</p>
                    </div>
                </div>
                <?php
                $valider = true;
            break;
            case 'MCP':
                $modification = filter_input(INPUT_POST, 'CP');
                ?>
                <div class="d-flex justify-content-center mt-5">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Enregistré</h4>
                        <p>Votre code postal a été changé avec succés.</p>
                        <p>Si vous ne voyez pas de changement, réactuliser la page.</p>
                    </div>
                </div>
                <?php
                $valider = true;
            break;
            }
        if($valider == true){
            $controleur->UpdateInfo($_SESSION['id'], $bouton, $modification, $_SESSION['status']);
        }
    }

    public function ChangerMotPasse(){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur =  new Connexion();
        $controleurP = new GlobalControlleurProfil();
        $ancien = filter_input(INPUT_POST, 'ancien');
        $anciens = $controleurP->FixSymbole($ancien);
        $nouveau = filter_input(INPUT_POST, 'nouveau');
        $nouveaux = $controleurP->FixSymbole($nouveau);
        $controleur->ChangerMDP($_SESSION['id'], $anciens, $nouveaux);
    }

    public function afficherEmail(){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->AfficherEmail();
    }

    public function FixSymbole($Chaine){
        $trouve = "'";
        $position = strpos($Chaine, $trouve);
        if ($position === false)
        {
            $ChaineVerif = $Chaine;
        }
        else
        {
            $ChaineVerif = str_replace("'","\'", $Chaine);
        }
        return $ChaineVerif;
    }
}