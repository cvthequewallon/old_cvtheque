<?php
//SauvegardeCV dans la BDD

//require_once __DIR__.'/ControlleurCvencreation.php';
$controleurSauvegarde = new ControlleurPDF();
$controleurSauvegarde->SauvegarderCV();

function recupPartiText($Text, $Debut, $Fin)
{
    $substr = substr($Text, strlen($Debut) + strpos($Text, $Debut), (strlen($Text) - strpos($Text, $Fin)) * (-1));
    return $substr;
}
$Corpcv = filter_input(INPUT_POST, 'test');/*
$cvreprduction = "<divImage".recupPartiText($Corpcv, '<divImage', 'height:')."height:";
$Recup1 = strlen(recupPartiText($Corpcv, '<divImage', 'height:'));
$Recup2 = recupPartiText($Corpcv, '<divImage', 'px;');
$Recup3 = strlen('height:');
$Recup4 = $Recup1 + $Recup3;
$Recup5 = substr($Recup2, $Recup4); 
$Recup6 = $Recup5 / 840*100;

$cvreprduction = $cvreprduction.$Recup10;

//$Recup1 = recupPartiText($Corpcv, '<divImage', '</divImage');
//$Recup2 = strlen("<divImage".$Recup1."</divImage>");

var_dump($cvreprduction);
var_dump($Recup8);


*/
use Dompdf\Dompdf;
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cv Wallon</title>
</head>
<body>
'.$Corpcv.'
</body>
</html>');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("mon-super-cv2.pdf");

class ControlleurPDF{
    public function RecupCV($idEleve, $NomCV){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->RecupIdCV($idEleve, $NomCV);
    }

    public function AjouterLangue($idCV, $libelle, $niveau)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        $controleur->AjouterLangue($idCV, $libelle, $niveau);
    }

    public function AjouterAtout($idCV, $libelle)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        $controleur->AjouterAtout($idCV, $libelle);
    }

    public function AjouterCentreInteret($idCV, $libelle)
    {
        require_once __DIR__.'/ControlleurProfil.php';
        $controleurP = new controlleurProfil();
        $libell = $controleurP->FixSymbole($libelle);

        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        $controleur->AjouterCentreInteret($idCV, $libell);
    }

    public function AjouterInformatique($idCV, $libelle)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        $controleur->AjouterInformatique($idCV, $libelle);
    }

    public function AjouterCompetence($idCV, $libelle, $niveau)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        $controleur->AjouterCompetence($idCV, $libelle, $niveau);
    }

    public function AjouterParcours($idCV, $fonction, $entreprise, $ville, $dateDebut, $dateFin, $description)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        $test = $controleur->AjouterParcours($idCV, $fonction, $entreprise, $ville, $dateDebut, $dateFin, $description);
        var_dump($test);
    }

    public function PremiereSauvegardeCV($idEleve, $idModele, $NomCV, $NomC, $PrenomC, $TelC, $VilleC, $CPC, $AdresseC, $EmailC, $Permis, $LibelleO, $FonctionP, $EntrepriseP, $VilleP, $DateDebutP, $DateFinP, $DescriptionP, $LibelleC, $NiveauC, $LibelleLangue, $NiveauLangue, $LibelleAjout, $LibelleInformatique, $LibelleCentre)
    {

        require_once __DIR__.'/ControlleurProfil.php';
        $controleurP = new controlleurProfil();
        $AdressC = $controleurP->FixSymbole($AdresseC);
        $FonctioP = $controleurP->FixSymbole($FonctionP);
        $DescriptioP = $controleurP->FixSymbole($DescriptionP);
        $LibelleCentr = $controleurP->FixSymbole($LibelleCentre);

        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->PremiereSauvegardeCV($idEleve, $idModele, $NomCV, $NomC, $PrenomC, $TelC, $VilleC, $CPC, $AdressC, $EmailC, $Permis, $LibelleO, $FonctioP, $EntrepriseP, $VilleP, $DateDebutP, $DateFinP, $DescriptioP, $LibelleC, $NiveauC, $LibelleLangue, $NiveauLangue, $LibelleAjout, $LibelleInformatique, $LibelleCentr);
    }

    public function SauvegarderCV(){
        $controleur = new controlleurPDF();
        //Récupère tous les données du CV
        //Coordonnées
        $recupNomCV = filter_input(INPUT_POST, 'MonCV');
        $recupIdModele = filter_input(INPUT_POST, 'idmodele');
        $recupNom = filter_input(INPUT_POST, 'nom');
        $recupPrenom = filter_input(INPUT_POST, 'prenom');
        $recupTel = filter_input(INPUT_POST, 'tel');
        $recupVilleC = filter_input(INPUT_POST, 'villeC');
        $recupCP = filter_input(INPUT_POST, 'CP');
        $recupAdresse = filter_input(INPUT_POST, 'adresse');
        $recupEmail = filter_input(INPUT_POST, 'Email');
        $recupPermis = filter_input(INPUT_POST, 'Permis');
        //Objectif
        $recupobjectif = filter_input(INPUT_POST, 'objectif');
        //Entreprise
        $recupFonction1 =  filter_input(INPUT_POST, 'Fonction1');
        $recupFonction2 = filter_input(INPUT_POST, 'Fonction2');
        $recupFonction3 = filter_input(INPUT_POST, 'Fonction3');
        $recupEntreprise1 = filter_input(INPUT_POST, 'Entreprise1');
        $recupEntreprise2 = filter_input(INPUT_POST, 'Entreprise2');
        $recupEntreprise3 = filter_input(INPUT_POST, 'Entreprise3');
        $recupVilleP1 =  filter_input(INPUT_POST, 'VilleP1');
        $recupVilleP2 =  filter_input(INPUT_POST, 'VilleP2');
        $recupVilleP3 =  filter_input(INPUT_POST, 'VilleP3');
        $recupDateDebut1 = filter_input(INPUT_POST, 'DateDebut1');
        $recupDateDebut2 = filter_input(INPUT_POST, 'DateDebut2');
        $recupDateDebut3 = filter_input(INPUT_POST, 'DateDebut3');
        $recupDateFin1 = filter_input(INPUT_POST, 'DateFin1');
        $recupDateFin2 = filter_input(INPUT_POST, 'DateFin2');
        $recupDateFin3 = filter_input(INPUT_POST, 'DateFin3');
        $recupDescriptionP1 = filter_input(INPUT_POST, 'DescriptionP1');
        $recupDescriptionP2 = filter_input(INPUT_POST, 'DescriptionP2');
        $recupDescriptionP3 = filter_input(INPUT_POST, 'DescriptionP3');
        //Compétence
        $recupCompetence1 = filter_input(INPUT_POST, 'Competence1');
        $recupCompetence2 = filter_input(INPUT_POST, 'Competence2');
        $recupCompetence3 = filter_input(INPUT_POST, 'Competence3');
        $recupCompetence4 = filter_input(INPUT_POST, 'Competence4');
        $recupNiveauC1 = filter_input(INPUT_POST, 'NiveauC1');
        $recupNiveauC2 = filter_input(INPUT_POST, 'NiveauC2');
        $recupNiveauC3 = filter_input(INPUT_POST, 'NiveauC3');
        $recupNiveauC4 = filter_input(INPUT_POST, 'NiveauC4');
        //Langues
        $recupLibelleLangue1 = filter_input(INPUT_POST, 'LibelleLangue1');
        $recupNiveauLangue1 = filter_input(INPUT_POST, 'NiveauLangue1');
        $recupLibelleLangue2 = filter_input(INPUT_POST, 'LibelleLangue2');
        $recupNiveauLangue2 = filter_input(INPUT_POST, 'NiveauLangue2');
        $recupLibelleLangue3 = filter_input(INPUT_POST, 'LibelleLangue3');
        $recupNiveauLangue3 = filter_input(INPUT_POST, 'NiveauLangue3');
        //Atout
        $recupLibelleAtout1 = filter_input(INPUT_POST, 'LibelleAtout1');
        $recupLibelleAtout2 = filter_input(INPUT_POST, 'LibelleAtout2');
        $recupLibelleAtout3 = filter_input(INPUT_POST, 'LibelleAtout3');
        //Centre Interet
        $recupLibelleCentre1 = filter_input(INPUT_POST, 'LibelleInteret1');
        $recupLibelleCentre2 = filter_input(INPUT_POST, 'LibelleInteret2');
        $recupLibelleCentre3 = filter_input(INPUT_POST, 'LibelleInteret3');
        //Informatique
        $recupLibelleInformatique1 = filter_input(INPUT_POST, 'LibelleInformatique1');
        $recupLibelleInformatique2 = filter_input(INPUT_POST, 'LibelleInformatique2');
        $recupLibelleInformatique3 = filter_input(INPUT_POST, 'LibelleInformatique3');

        //Convertion recupPermis en tinyint
        if($recupPermis === ''){
            $recupPermis = 0;
        }
        else{
            $recupPermis = 1;
        }

        //Enregistre les informations pricipales
        $controleur->PremiereSauvegardeCV($_SESSION['id'], $recupIdModele, $recupNomCV, $recupNom, $recupPrenom, $recupTel, $recupVilleC, $recupCP, $recupAdresse, $recupEmail, $recupPermis, $recupobjectif, $recupFonction1, $recupEntreprise1, $recupVilleP1, $recupDateDebut1, $recupDateFin1, $recupDescriptionP1, $recupCompetence1, $recupNiveauC1, $recupLibelleLangue1, $recupNiveauLangue1, $recupLibelleAtout1, $recupLibelleInformatique1, $recupLibelleCentre1);
        
        //Si il y a plusieurs informations, alors continuer à enregistrer
        $idCV2 = $controleur->RecupCV($_SESSION['id'], $recupNomCV);
        $idCV = $idCV2['IdEnregistrerCV'];
        
        //Ajout informations sup à pour professionnel
        if($recupFonction2 !== '' && $recupEntreprise2 !== '' && $recupVilleP2 !== '' && $recupDateDebut2 !== '' && $recupDateFin2 !== '' && $recupDescriptionP2 !== '' || $recupFonction3 !== '' && $recupEntreprise3 !== '' && $recupVilleP3 !== '' && $recupDateDebut3 !== '' && $recupDateFin3 !== '' && $recupDescriptionP3 !== ''){
            if($recupFonction2 !== '' && $recupEntreprise2 !== '' && $recupVilleP2 !== '' && $recupDateDebut2 !== '' && $recupDateFin2 !== '' && $recupDescriptionP2 !== '' && $recupFonction3 !== '' && $recupEntreprise3 !== '' && $recupVilleP3 !== '' && $recupDateDebut3 !== '' && $recupDateFin3 !== '' && $recupDescriptionP3 !== ''){
                for($i=0; $i<2; $i++){
                    if($i == 0){
                        $controleur->AjouterParcours($idCV, $recupFonction2, $recupEntreprise2, $recupVilleP2, $recupDateDebut2, $recupDateFin2, $recupDescriptionP2);
                    }
                    else{
                        $controleur->AjouterParcours($idCV, $recupFonction3, $recupEntreprise3, $recupVilleP3, $recupDateDebut3, $recupDateFin3, $recupDescriptionP3);
                    }
                }
            }
            elseif($recupFonction2 !== '' && $recupEntreprise2 !== '' && $recupVilleP2 !== '' && $recupDateDebut2 !== '' && $recupDateFin2 !== '' && $recupDescriptionP2 !== ''){
                $controleur->AjouterParcours($idCV, $recupFonction2, $recupEntreprise2, $recupVilleP2, $recupDateDebut2, $recupDateFin2, $recupDescriptionP2);
            }
            else{
                $controleur->AjouterParcours($idCV, $recupFonction3, $recupEntreprise3, $recupVilleP3, $recupDateDebut3, $recupDateFin3, $recupDescriptionP3);
            }
        }

        //Ajout informations sup à Comptétence
        if($recupCompetence2 !== '' && $recupNiveauC2 !== '' || $recupCompetence3 !== '' && $recupNiveauC3 !== '' || $recupCompetence4 !== '' && $recupNiveauC4 !== ''){
            if($recupCompetence2 !== '' && $recupNiveauC2 !== '' && $recupCompetence3 !== '' && $recupNiveauC3 !== '' && $recupCompetence4 !== '' && $recupNiveauC4 !== ''){
                for($i=0; $i<3; $i++){
                    if($i==0){
                        $controleur->AjouterCompetence($idCV, $recupCompetence2, $recupNiveauC2);
                    }
                    elseif($i==1){
                        $controleur->AjouterCompetence($idCV, $recupCompetence3, $recupNiveauC3);
                    }
                    else{
                        $controleur->AjouterCompetence($idCV, $recupCompetence4, $recupNiveauC4);
                    }
                }
            }
            else{
                if($recupCompetence2 !== '' && $recupNiveauC2 !== '' || $recupCompetence3 !== '' && $recupNiveauC3 !== ''){
                    for($i=0;$i<2;$i++){
                        if($i==0){
                            $controleur->AjouterCompetence($idCV, $recupCompetence2, $recupNiveauC2);
                        }
                        else{
                            $controleur->AjouterCompetence($idCV, $recupCompetence3, $recupNiveauC3);
                        }
                    }
                }
                elseif($recupCompetence2 !== '' && $recupNiveauC2 !== '' || $recupCompetence4 !== '' && $recupNiveauC4 !== ''){
                    for($i=0;$i<2;$i++){
                        if($i==0){
                            $controleur->AjouterCompetence($idCV, $recupCompetence2, $recupNiveauC2);
                        }
                        else{
                            $controleur->AjouterCompetence($idCV, $recupCompetence4, $recupNiveauC4);
                        }
                    }
                }
                elseif($recupCompetence4 !== '' && $recupNiveauC4 !== '' || $recupCompetence3 !== '' && $recupNiveauC3 !== ''){
                    for($i=0;$i<2;$i++){
                        if($i==0){
                            $controleur->AjouterCompetence($idCV, $recupCompetence3, $recupNiveauC3);
                        }
                        else{
                            $controleur->AjouterCompetence($idCV, $recupCompetence4, $recupNiveauC4);
                        }
                    }
                }
                else{
                    if($recupCompetence2 !== '' && $recupNiveauC2 !== ''){
                        $controleur->AjouterCompetence($idCV, $recupCompetence2, $recupNiveauC2);
                    }
                    elseif($recupCompetence3 !== '' && $recupNiveauC3 !== ''){
                        $controleur->AjouterCompetence($idCV, $recupCompetence3, $recupNiveauC3);
                    }
                    else{
                        $controleur->AjouterCompetence($idCV, $recupCompetence4, $recupNiveauC4);
                    }
                }
            }
        }

        //Ajout informations sup à Langue
        if($recupLibelleLangue2 !== '' && $recupNiveauLangue2 !== '' || $recupLibelleLangue3 !== '' && $recupNiveauLangue3 !== ''){
            if($recupLibelleLangue2 !== '' && $recupNiveauLangue2 !== '' && $recupLibelleLangue3 !== '' && $recupNiveauLangue3 !== ''){
                for($i=0; $i<2; $i++){
                    if($i == 0){
                        $controleur->AjouterLangue($idCV, $recupLibelleLangue2, $recupNiveauLangue2);
                    }
                    else{
                        $controleur->AjouterLangue($idCV, $recupLibelleLangue3, $recupNiveauLangue3);
                    }
                }
            }
            elseif($recupLibelleLangue2 !== '' && $recupNiveauLangue2 !== '' ){
                $controleur->AjouterLangue($idCV, $recupLibelleLangue2, $recupNiveauLangue2);
            }
            else{
                $controleur->AjouterLangue($idCV, $recupLibelleLangue3, $recupNiveauLangue3);
            }
        }

        //Ajout informations sup à Atout
        if($recupLibelleAtout2 !== '' || $recupLibelleAtout3 !== ''){
            if($recupLibelleAtout2 !== '' && $recupLibelleAtout3 !== ''){
                for($i=0; $i<2; $i++){
                    if($i == 0){
                        $controleur->AjouterAtout($idCV, $recupLibelleAtout2);
                    }
                    else{
                        $controleur->AjouterAtout($idCV, $recupLibelleAtout3);
                    }
                }
            }
            elseif($recupLibelleAtout2 !== ''){
                $controleur->AjouterAtout($idCV, $recupLibelleAtout2);
            }
            else{
                $controleur->AjouterAtout($idCV, $recupLibelleAtout3);
            }
            
        }

        //Ajout informations sup à Centre d'interet
        if($recupLibelleCentre2 !== '' || $recupLibelleCentre3 !== ''){
            if($recupLibelleCentre2 !== '' && $recupLibelleCentre3 !== ''){
                for($i=0; $i<2; $i++){
                    if($i == 0){
                        $controleur->AjouterCentreInteret($idCV, $recupLibelleCentre2);
                    }
                    else{
                        $controleur->AjouterCentreInteret($idCV, $recupLibelleCentre3);
                    }
                }
            }
            elseif($recupLibelleCentre2 !== ''){
                $controleur->AjouterCentreInteret($idCV, $recupLibelleCentre2);
            }
            else{
                $controleur->AjouterCentreInteret($idCV, $recupLibelleCentre3);
            }
            
        }

        //Ajout informations sup à Informatique
        if($recupLibelleInformatique2 !== '' || $recupLibelleInformatique3 !== ''){
            if($recupLibelleInformatique2 !== '' && $recupLibelleInformatique3 !== ''){
                for($i=0; $i<2; $i++){
                    if($i == 0){
                        $controleur->AjouterInformatique($idCV, $recupLibelleInformatique2);
                    }
                    else{
                        $controleur->AjouterInformatique($idCV, $recupLibelleInformatique3);
                    }
                }
            }
            elseif($recupLibelleInformatique2 !== ''){
                $controleur->AjouterInformatique($idCV, $recupLibelleInformatique2);
            }
            else{
                $controleur->AjouterInformatique($idCV, $recupLibelleInformatique3);
            }
            
        }
        
    }
}