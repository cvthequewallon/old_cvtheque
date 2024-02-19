<?php

class controlleurConnection {
    public function afficher() {        
        require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
        require_once __DIR__ . '/../view/templates/Connection.html.php';
        require_once __DIR__ . '/../view/templates/FinHtml.html.php';
    }

    private function VerifTypesEleves($Email){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        $IDCompte = $controleur->RecupDonneesEleve($Email);
        $listeID = $controleur->RecupIdEleves();
        foreach($listeID as $unID){
            if($IDCompte['id'] == $unID['id']){
                return 'eleves';
            }
        }
        return 0;
    }

    private function VerifTypesProfesseur($Email){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        $IDCompte = $controleur->RecupDonneesProfesseur($Email);
        $listeID = $controleur->RecupIdProfesseur();
        foreach($listeID as $unID){
            if($IDCompte['id'] == $unID['id']){
                if($IDCompte['Droit Administrateur'] === '1'){
                    return 'administrateurs';
                }
                else{
                    return 'professeurs';
                }
            }
        }
        return 0;
    }

    private function VerifTypesEntreprise($Email){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        $IDCompte = $controleur->RecupDonneesEntreprise($Email);
        $listeID = $controleur->RecupIdEntreprise();
        foreach($listeID as $unID){
            if($IDCompte['id'] == $unID['id']){
                return 'entreprises';
            }
        }
        return 0;
    }

    private function VerifValidation($Email){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        $Validiter = $controleur->RecupDonneesEntreprise($Email);
        return $Validiter['Valider'];
    }

    public function SeConnecter(){
        $recupIdentifiant = filter_input(INPUT_POST, 'Email');
        $recupMotsDePass = filter_input(INPUT_POST, 'Mdp');
        $controleur = new controlleurConnection();
        require_once __DIR__.'/ControlleurProfil.php';
        $controleurP = new controlleurProfil();
        $recupMotsDePasse = $controleurP->FixSymbole($recupMotsDePass);
        $Valider = true;
        require_once __DIR__ . '/../view/scripts/Connection.php';
        if(isset($_POST['ConnectionEleve'])){
            $veriftypes = $controleur->VerifTypesEleves($recupIdentifiant);
        }
        elseif(isset($_POST['ConnectionProfesseur'])){
            $veriftypes = $controleur->VerifTypesProfesseur($recupIdentifiant);
        }
        else{
            $veriftypes = $controleur->VerifTypesEntreprise($recupIdentifiant);
            if($controleur->VerifValidation($recupIdentifiant) === '0'){
                $veriftypes = 0;
                $Valider = false;
            }
        }

        if($veriftypes === 0){
            $verifconnection['Connecté'] = '0';
        }
        else{
            $verifconnection = VerifIdentifiant($recupIdentifiant, $recupMotsDePasse);
        }

        if($verifconnection['Connecté'] === '0'){
            if($Valider == true){
?>  
    <div class="d-flex justify-content-center mt-5">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Erreur de connexion</h4>
            <p>L'identifiant et/ou le mot de passe est/sont incorrect(s).</p>
            <p>Veuillez réessayer.</p>
        </div>
    </div>
<?php
                }
                else{
                    ?>
                        <div class="d-flex justify-content-center mt-5">
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Erreur de connexion</h4>
                                <p>Ce compte entreprise n'est pas encore validé.</p>
                                <p>Veuillez réessayer plus tard.</p>
                            </div>
                        </div>
                    <?php
                }
                return;
            }
            elseif($verifconnection['Connecté'] === '1'){
                Donnees($recupIdentifiant, $recupMotsDePasse, $veriftypes);
                ?> <script>document.location.href="/home"</script><?php
                return;
            }
            else{
                header('location: /erreur');
                return;
            }
    }
}