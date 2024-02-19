<?php
class Connexion{
/* ================= $Conexion Base De données ================= */

    public function ConnexionBDD() {
        $Connexion = 'mysql:host=' . bdd_hote . ';port=' . bdd_port . ';dbname=' . bdd_nom . ';charset=utf8';
        try {
            $ConexionBaseDeDonner = new PDO($Connexion, bdd_util, bdd_mdp);
            return $ConexionBaseDeDonner;
        } catch (PDOException $e) {
            return $e;
        }
    }
/* Connexion au compte */
    public function ConnexionCompte($Email, $mdp){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "SELECT SeConnecter('".$Email."', '".$mdp."') AS 'Connecté';";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indice = $requete_execution->fetch(PDO::FETCH_ASSOC);
                return $indice;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }
/* Récupère les informations */
    public function RecupDonneesEleve($Email){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherInfosEleveParEmail('".$Email."');";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indice = $requete_execution->fetch(PDO::FETCH_ASSOC);
                return $indice;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function RecupDonneesProfesseur($Email){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherInfosProfesseur('".$Email."');";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indice = $requete_execution->fetch(PDO::FETCH_ASSOC);
                return $indice;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function RecupEleveSupprimer(){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherEleveSupprimer();";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $lignes = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $lignes;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function RecupDonneesEntreprise($Email){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherInfosEntreprise('".$Email."');";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indice = $requete_execution->fetch(PDO::FETCH_ASSOC);
                return $indice;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function RecupIdEleves(){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherIdEleves";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function RecupEleves(){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherEleves";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function RecupIdProfesseur(){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherIdProfesseurs";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function RecupProfesseur(){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherProfesseurs";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function RecupIdEntreprise(){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherIdEntreprises";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function RecupEntreprise(){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherEntreprise";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function AfficherEmail(){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherEmail()";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $lignes = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $lignes;
            }
        
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function suppentreprise($id){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL SupprimerEntreprise('".$id."')";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function supprimerCompteEleveDef($id){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL SupprimeCompteAttenteParId(".$id.");";
            $requete_execution = $connexion->exec($requete);
            if($requete_execution === false){
                return -1;
            }
            return 0;
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function validentreprise($id){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AccepterEntreprise('".$id."')";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function RecupCV($idClasse){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherCVParClasse(".$idClasse.");";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function RecupallCV(){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherTousCV";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function ModifCV($IdCV, $NomCV, $NomC, $PrenomC, $TelC, $VilleC, $CPC, $AdresseC, $EmailC, $Permis, $LibelleO, $FonctionP, $EntrepriseP, $VilleP, $DateDebutP, $DateFinP, $DescriptionP, $LibelleC, $NiveauC, $LibelleLangue, $NiveauLangue, $LibelleAtout, $LibelleInformatique, $LibelleCentre){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL ModifierCV(".$IdCV.", '".$NomCV."', '".$NomC."', '".$PrenomC."', '".$TelC."', '".$VilleC."', '".$CPC."', '".$AdresseC."', '".$EmailC."', ".$Permis.", '".$LibelleO."', '".$FonctionP."', '".$EntrepriseP."', '".$VilleP."', '".$DateDebutP."', '".$DateFinP."', '".$DescriptionP."', '".$LibelleC."', '".$NiveauC."', '".$LibelleLangue."', '".$NiveauLangue."', '".$LibelleAtout."', '".$LibelleInformatique."', '".$LibelleCentre."');";
            $requete_execution = $connexion->exec($requete);
            if($requete_execution === false){
                return -1;
            }
            return 0;
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function SuppCVParId($idCV){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL SupprimerCVParId(".$idCV.");";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function ajoutereleves($nom,$prenom,$datenaiss,$classe){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL ajouterEleve('".$nom."', '".$nom.".".$prenom."@supwallon.com', 'MDP', '".$prenom."', '".$datenaiss."', 'adresse', 'ville', 'CP', 'TEL', ".$classe.")";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function ajoutereleve($Nom,$Email,$MDP,$Prenom,$Datenaiss,$Adresse,$Ville,$CP,$classe){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL ajouterEleve('".$Nom."', '".$Email."', '".$MDP."', '".$Prenom."', '".$Datenaiss."', '".$Adresse."', '".$Ville."', '".$CP."', '0', ".$classe.")";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function suppeleve($id){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL SupprimerEleve('".$id."')";
            $requete_execution = $connexion->exec($requete);
            if($requete_execution === false){
                return -1;
            }
            return 0;
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function ajouterProfesseurUneClasse($nom, $mail, $mdp, $prenom, $droit, $idclasse){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL ajouterProfesseurUneClasse('".$nom."','".$mail."', '".$mdp."', '".$prenom."', ".$droit.", ".$idclasse.");";
            $requete_execution = $connexion->exec($requete);
            if($requete_execution === false){
                return -1;
            }
            return 0;
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function assignerClasseProfesseur($idprofesseur, $idclasse){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL assignerClasseProfesseur(".$idprofesseur.", ".$idclasse.");";
            $requete_execution = $connexion->exec($requete);
            if($requete_execution === false){
                return -1;
            }
            return 0;
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function suppprofesseur($id){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL SupprimerProfesseur('".$id."')";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }


/* Gestion de modèleCV */
        public function AfficherModeleParClasse($NomClasse){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL AfficherModeleParClasse('".$NomClasse."');";
                $requete_execution = $connexion->query($requete);
                if($requete_execution === false){
                    return -1;
                }
                else{
                    $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                    return $indices;
                }
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function AjouterUnNouveauModele($Balise, $NomCV){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL AjouterModele('".$Balise."', '".$NomCV."');";
                $requete_execution = $connexion->exec($requete);
                if($requete_execution === false){
                    return -1;
                }
                return 0;
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function AfficherModele(){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL AfficherModele;";
                $requete_execution = $connexion->query($requete);
                if($requete_execution === false){
                    return -1;
                }
                else{
                    $ligne = $requete_execution->fetch(PDO::FETCH_ASSOC);
                    return $ligne;
                }
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function ObtenirIDModele($Nom, $balise){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "SELECT IdModeleCV AS 'id' FROM modelecv WHERE Nom = '".$Nom."' AND balise = '".$balise."';";
                $requete_execution = $connexion->query($requete);
                if($requete_execution === false){
                    return -1;
                }
                else{
                    $ligne = $requete_execution->fetch(PDO::FETCH_ASSOC);
                    return $ligne;
                }
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function VerifExiste($Nom){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "SELECT Nom FROM modelecv WHERE Nom = '".$Nom."';";
                $requete_execution = $connexion->query($requete);
                if($requete_execution === false){
                    return -1;
                }
                else{
                    $ligne = $requete_execution->fetch(PDO::FETCH_ASSOC);
                    if(empty($ligne)){
                        return 1;
                    }
                    else{
                        return 2;
                    }
                }
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function AssocierModeleClasse($IdClasse, $IDModele){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL AssocierModeleCVClasse(".$IdClasse.", ".$IDModele.");";
                $requete_execution = $connexion->exec($requete);
                if($requete_execution === false){
                    return -1;
                }
                return 0;
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function SupprimerModele($IDModele){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL SupprimerModele(".$IDModele.");";
                $requete_execution = $connexion->exec($requete);
                if($requete_execution === false){
                    return -1;
                }
                return 0;
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function AfficherModeleParId($id){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL AfficherModeleParId(".$id.");";
                $requete_execution = $connexion->query($requete);
                if($requete_execution === false){
                    return -1;
                }
                else{
                    $ligne = $requete_execution->fetch(PDO::FETCH_ASSOC);
                    return $ligne;
                }
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function VerifCVUtiliseModele($idModele){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL VerifCVUtiliseModele(".$idModele.");";
                $requete_execution = $connexion->query($requete);
                if($requete_execution === false){
                    return -1;
                }
                else{
                    $resultat = $requete_execution->fetch(PDO::FETCH_ASSOC);
                    return $resultat;
                }
            }
            catch(Exception $e){
                return $e;
            }
        }

/* Gestion Entreprise*/
        public function InscriptionEntreprise($Nom, $RCS, $MDP, $Email, $Adresse, $CP, $Ville, $Telephone){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                if($RCS === ''){
                    $requete = "CALL ajouterEntrepriseEnAttenteSansSiret('".$Nom."', '".$Email."', '".$MDP."', '".$Adresse."', '".$CP."', '".$Ville."', '".$Telephone."');";
                }
                else{
                    $requete = "CALL ajouterEntrepriseEnAttenteAvecSiret('".$Nom."', '".$Email."', '".$MDP."', '".$RCS."', '".$Adresse."', '".$CP."', '".$Ville."', '".$Telephone."');";
                }
                $requete_execution = $connexion->exec($requete);
                if($requete_execution === false){
                    return -1;
                }
                return 0;
            }
            catch(Exception $e){
                return -1;
            }
        }
/* Sauvegarde CV */
        public function PremiereSauvegardeCV($idEleve, $idModele, $NomCV, $NomC, $PrenomC, $TelC, $VilleC, $CPC, $AdresseC, $EmailC, $Permis, $LibelleO, $FonctionP, $EntrepriseP, $VilleP, $DateDebutP, $DateFinP, $DescriptionP, $LibelleC, $NiveauC, $LibelleLangue, $NiveauLangue, $LibelleAtout, $LibelleInformatique, $LibelleCentre){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL PremiereSauvegardeCV(".$idEleve.",".$idModele.", '".$NomCV."', '".$NomC."', '".$PrenomC."', '".$TelC."', '".$VilleC."', '".$CPC."', '".$AdresseC."', '".$EmailC."', ".$Permis.", '".$LibelleO."', '".$FonctionP."', '".$EntrepriseP."', '".$VilleP."', '".$DateDebutP."', '".$DateFinP."', '".$DescriptionP."', '".$LibelleC."', '".$NiveauC."', '".$LibelleLangue."', '".$NiveauLangue."', '".$LibelleAtout."', '".$LibelleInformatique."', '".$LibelleCentre."');";
                $requete_execution = $connexion->exec($requete);
                return 0;
            }
            catch(Exception $e){
                return $e;
            }
        }

        public function RecupIdCV($IdEleve, $NomCV){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "SELECT IdEnregistrerCV FROM cvenregistrer WHERE IdEleve = ".$IdEleve." AND Nom = '".$NomCV."';";
                $requete_execution = $connexion->query($requete);
                if($requete_execution === false){
                    return -2;
                }
                else{
                    $indice = $requete_execution->fetch(PDO::FETCH_ASSOC);
                    return $indice;
                }
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function AjouterCompetence($idCV, $libelle, $niveau){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL AjouterCompetence(".$idCV.", '".$libelle."', '".$niveau."');";
                $requete_execution = $connexion->exec($requete);
                if($requete_execution === false){
                    return -1;
                }
                return 0;
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function AjouterLangue($idCV, $libelle, $niveau){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL AjouterLangue(".$idCV.", '".$libelle."', '".$niveau."');";
                $requete_execution = $connexion->exec($requete);
                if($requete_execution === false){
                    return -1;
                }
                return 0;
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function AjouterAtout($idCV, $libelle){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL AjouterAtout(".$idCV.", '".$libelle."');";
                $requete_execution = $connexion->exec($requete);
                if($requete_execution === false){
                    return -1;
                }
                return 0;
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function AjouterCentreInteret($idCV, $libelle){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL AjouterCentreInteret(".$idCV.", '".$libelle."');";
                $requete_execution = $connexion->exec($requete);
                if($requete_execution === false){
                    return -1;
                }
                return 0;
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function AjouterInformatique($idCV, $libelle){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL AjouterInformatique(".$idCV.", '".$libelle."');";
                $requete_execution = $connexion->exec($requete);
                if($requete_execution === false){
                    return -1;
                }
                return 0;
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function AjouterParcours($idCV, $fonction, $entreprise, $ville, $datedebut, $datefin, $description){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL AjouterParcours(".$idCV.", '".$fonction."', '".$entreprise."', '".$ville."', '".$datedebut."', '".$datefin."', '".$description."');";
                $requete_execution = $connexion->exec($requete);
                if($requete_execution === false){
                    return -1;
                }
                return 0;
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function AfficherCVParEleve($ideleve){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL AfficherCVParEleve(".$ideleve.");";
                $requete_execution = $connexion->query($requete);
                if($requete_execution === false){
                    return -2;
                }
                else{
                    $lesCV = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                    return $lesCV;
                }
            }
            catch(Exception $e){
                return -1;
            }
        }
        public function AfficherSauvegardeCV($ideleve){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL AfficherSauvegardeCV(".$ideleve.");";
                $requete_execution = $connexion->query($requete);
                if($requete_execution === false){
                    return -1;
                }
                return 0;
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function AfficherUnCV($IdCV){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL AfficherUnCV(".$IdCV.");";
                $requete_execution = $connexion->query($requete);
                if($requete_execution === false){
                    return -2;
                }
                else{
                    $infos = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                    return $infos;
                }
            }
            catch(Exception $e){
                return -1;
            }
        }
/* Mise à jour profil */
        public function MiseAJourInfo($id, $type, $modification, $status){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL MettreAJourInformation(".$id.",'".$type."','".$modification."', '".$status."');";
                $requete_execution = $connexion->exec($requete);
                if($requete_execution === false){
                    return -1;
                }
                return 0;
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function ChangerMDP($id, $AncienMDP, $NouveauMDP){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "SELECT ChangerMDP(".$id.", '".$AncienMDP."', '".$NouveauMDP."');";
                $requete_execution = $connexion->query($requete);
                if($requete_execution === false){
                    return -1;
                }
                else{
                    $resultat = $requete_execution->fetch(PDO::FETCH_ASSOC);
                    return $resultat;
                }
            }
            catch(Exception $e){
                return -1;
            }
        }

        public function ChangerMDPOublie($Email, $MDP){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL ChangerMDPOublier('".$Email."', '".$MDP."');";
                $requete_execution = $connexion->exec($requete);
                if($requete_execution === false){
                    return -1;
                }
                return 0;
            }
            catch(Exception $e){
                return -1;
            }
        }

/* Restauration compte */
        public function RestaurationEleve($idSupprime){
            try{
                $controleur = new Connexion();
                $connexion = $controleur->ConnexionBDD();
                $requete = "CALL RestaurerEleve(".$idSupprime.");";
                $requete_execution = $connexion->exec($requete);
                if($requete_execution === false){
                    return -1;
                }
                return 0;
            }
            catch(Exception $e){
                return -1;
            }
        }
/* Darkmod */
        public function UpdatedarkmodByUser($iddark, $id){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "UPDATE compte SET darkmod = ".$iddark." WHERE IdCompte = ".$id.";";
            $requete_execution = $connexion->exec($requete);
            if($requete_execution === false){
                return -1;
            }
            return 0;
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function DecoReco($id, $status){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherInfosParId(".$id.", '".$status."');";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return "erreur";
            }
            else{
                $indice = $requete_execution->fetch(PDO::FETCH_ASSOC);
                return $indice;
            }
        }
        catch(Exception $e){
            return "erreur";
        }
    }

    /* Gestion des Inforamtions sur les Stages */

    public function AfficherInfosStage(){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherInfosStage();";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $resultat = $requete_execution->fetch(PDO::FETCH_ASSOC);
                return $resultat;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function AjouterPeriodeStage($laclasse, $ladate_debut, $ladate_fin, $lesattente){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AjouterPeriodeStage('".$laclasse."', '".$ladate_debut."', '".$ladate_fin."', '".$lesattente."');";
            $requete_execution = $connexion->exec($requete);
            if($requete_execution === false){
                return -1;
            }
            return 0;
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function ModifierInfosStage($lId_infosatge, $laclasse, $ladate_debut, $ladate_fin, $lesattente){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL ModifierInfoStage(".$lId_infosatge." , '".$laclasse."', '".$ladate_debut."', '".$ladate_fin."', '".$lesattente."');";
            $requete_execution = $connexion->exec($requete);
            if($requete_execution === false){
                return -1;
            }
            return 0;
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function SupprimerInfoStage($lId_infostage){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL SupprimerInfoStage(".$lId_infostage.");";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }
    /* Gestion des classes */
    public function RecupClassesProfesseur($Id){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL ToutesClassesProfesseur(".$Id.");";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function allclasse(){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AfficherToutesClasses";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            else{
                $indices = $requete_execution->fetchAll(PDO::FETCH_ASSOC);
                return $indices;
            }
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function AjouterClasse($NomC){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL AjouterClasse('".$NomC."');";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            return 0;
        }
        catch(Exception $e){
            return -1;
        }
    }

    public function SupprimerClasse($id){
        try{
            $controleur = new Connexion();
            $connexion = $controleur->ConnexionBDD();
            $requete = "CALL SupprimerClasse(".$id.");";
            $requete_execution = $connexion->query($requete);
            if($requete_execution === false){
                return -1;
            }
            return 0;
        }
        catch(Exception $e){
            return -1;
        }
    }
}