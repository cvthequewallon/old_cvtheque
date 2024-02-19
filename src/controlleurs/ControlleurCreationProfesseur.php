<?php
class controlleurCreationProfesseur
{
    public function afficher()
    {
        if ($_SESSION['connected'] == True) {
            if ($_SESSION['status'] == 'administrateurs') {
                require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
                require_once __DIR__ . '/../view/templates/CreationProfesseur.html.php';
                require_once __DIR__ . '/../view/templates/FinHtml.html.php';
            }
        }
    }

    public function AjouterProfesseur(){
        $controleur = new controlleurCreationProfesseur();
        $nom = filter_input(INPUT_POST, 'Nom');
        $prenom = filter_input(INPUT_POST, 'Prenom');
        $mdpe = filter_input(INPUT_POST, 'MDP');
        require_once __DIR__.'/ControlleurProfil.php';
        $controleurP = new controlleurProfil();
        $mdp = $controleurP->FixSymbole($mdpe);
        $email = filter_input(INPUT_POST, 'Email');

        $indiceclasse = count($controleur->allclasse());
        $lesnomsclasses = array();
        for ($i = 1; $i < $indiceclasse; $i++) {
            $classe = filter_input(INPUT_POST, 'listeclasse' . $i);
            array_push($lesnomsclasses, $classe);
        }
        
            $uneclasse2 = true;
            $foreach = false;
            $iddejautiliser = array();
            foreach ($lesnomsclasses as $uneclasse) {
                foreach ($controleur->allclasse() as $uneclasse3) {
                    if ($uneclasse === $uneclasse3['IdClasse']) {
                        if (empty($iddejautiliser)) {
                            $laclasse = $uneclasse3['IdClasse'];
                            $foreach = true;
                            array_push($iddejautiliser, $laclasse);
                        } else {
                        foreach ($iddejautiliser as $unid) {
                            if ($unid !== $uneclasse3['IdClasse']) {
                                $laclasse = $uneclasse3['IdClasse'];
                                array_push($iddejautiliser, $laclasse);
                            }
                        }
                    }
                } else {
                    require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
                    require_once __DIR__ . '/../view/templates/Erreur.html.php';
                    require_once __DIR__ . '/../view/templates/FinHtml.html.php';
                }
            }
            if ($uneclasse2 == true && isset($_POST['Administrateur']) && $foreach == true) {
                $controleur->ajouterProfesseurUneClasse($nom, $email, $mdp, $prenom, 1, $laclasse);
                $uneclasse2 = false;
            } elseif ($uneclasse2 == true && $foreach == true) {
                $controleur->ajouterProfesseurUneClasse($nom, $email, $mdp, $prenom, 0, $laclasse);
                $uneclasse2 = false;
            } elseif ($uneclasse2 == false && $foreach == true) {
                $idprofesseur = $controleur->recupid($email);
                $controleur->assignerClasseProfesseur($idprofesseur['id'], $laclasse);
            }
        }
        ?> <script>document.location.href="/gestionprofesseur?ajouter"</script><?php
}
    public function allclasse()
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->allclasse();
    }
    public function ajouterProfesseurUneClasse($nom, $email, $mdp, $prenom, $droit, $idclasse)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->ajouterProfesseurUneClasse($nom, $email, $mdp, $prenom, $droit, $idclasse);
    }
    public function assignerClasseProfesseur($idprofesseur, $idclasse)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->assignerClasseProfesseur($idprofesseur, $idclasse);
    }
    public function recupid($email)
    {
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->RecupDonneesProfesseur($email);
    }

    public function afficherEmail(){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->AfficherEmail();
    }
}
