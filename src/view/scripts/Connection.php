<?php
function Donnees($Email,$Mdp, $type){
    require_once __DIR__. '/../../kernel/DataBase.php';
    $controleur = new Connexion();
    switch($type){
        case 'eleves':
            $information = $controleur->RecupDonneesEleve($Email);
        break;
        case 'professeurs':
            $information = $controleur->RecupDonneesProfesseur($Email);
        break;
        case 'entreprises':
            $information = $controleur->RecupDonneesEntreprise($Email);
        break;
        case 'administrateurs':
            $information = $controleur->RecupDonneesProfesseur($Email);
        break;
    }
    $_SESSION['connected'] = True;
    $_SESSION['status'] = $type;
    if($type != 'entreprises' && $type != 'administrateurs' && $type != 'professeurs'){
        $_SESSION['classe'] = $information['Classe'];
    }
    $_SESSION['id'] = $information['id'];
    $_SESSION['Nom'] = $information['Nom'];
    if($type != 'entreprises'){
        $_SESSION['Prenom'] = $information['Prenom'];
    }
    $_SESSION['darkmod'] = $information['darkmod'];
}

function VerifIdentifiant($Email, $mdp){
    require_once __DIR__ . '/../../kernel/DataBase.php';
    $controleur = new Connexion();
    return $controleur->ConnexionCompte($Email, $mdp);
}
function Darkmod(){
    $id = $_SESSION['id'];
    $status = $_SESSION['status'];
    require_once __DIR__. '/../../kernel/DataBase.php';
    $controleur = new Connexion();
    $information = $controleur->DecoReco($id, $status);
    $_SESSION['connected'] = True;
    $_SESSION['status'] = $status;
    if($status != 'entreprises'){
        $_SESSION['classe'] = $information['Classe'];
    }
    $_SESSION['id'] = $information['id'];
    $_SESSION['Nom'] = $information['Nom'];
    if($_SESSION['status'] == "eleves"):
    $_SESSION['Prenom'] = $information['Prenom'];
    endif;
    $_SESSION['darkmod'] = $information['darkmod'];
}