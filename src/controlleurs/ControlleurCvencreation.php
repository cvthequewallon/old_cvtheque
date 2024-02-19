<?php

class controlleurProfil
{
    public function afficher()
    {
        if ($_SESSION['connected'] == True) {
            if ($_SESSION['status'] == 'eleves') {
                require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
                require_once __DIR__ . '/../view/templates/CVencreation.html.php';
                require_once __DIR__ . '/../view/templates/FinHtml.html.php';
            }
        }
    }

    public function RecupCV($idEleve, $NomCV){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->RecupIdCV($idEleve, $NomCV);
    }

    public function AfficherSauvegardeCV($ideleve)
    {
        require_once __DIR__ . '/../Kernel/DataBase.php';
        $controleur = new Connexion();
        $controleur->AfficherSauvegardeCV($ideleve);
    }

    public function pdf($chema)
    {
        require_once "../kernel/Dompdf.php";
    }

    public function AfficherModele($id){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        return $controleur->AfficherModeleParId($id);
    }

    public function DetectionCategorie($ElementAAnalyser){
        //Initialise les variables que la fonction à besoin
        $StockerListe = array();
        $Listediv = array('divImage', 'divProfil', 'divObjectif', 'divParcour', 'divCompetences', 'divlangues', 'divAtouts', 'divInformatique', 'divCentredinteret');

        //Vérifie si la div existe en fonction des div prédéfinis dans le tableau
        foreach($Listediv as $unediv){
            $analyse = stristr($ElementAAnalyser, $unediv);
            if($analyse != false){
                //Si la balise existe alors l'ajouter dans le menu
                switch($unediv){
                    case 'divImage':
                        $ElementBaliseA = '<a class="list-group-item list-group-item-action" id="list-Img-list" data-bs-toggle="list" href="#list-Img" role="tab" aria-controls="Img">Image</a>';
                        array_push($StockerListe, $ElementBaliseA);
                        break;
                    case 'divProfil':
                        $ElementBaliseA = '<a class="list-group-item list-group-item-action active" id="list-Coordonée-list" data-bs-toggle="list" href="#list-Coordonée" role="tab" aria-controls="Coordonée">Coordonnées</a>';
                        array_push($StockerListe, $ElementBaliseA);
                        break;
                    case 'divObjectif':
                        $ElementBaliseA = '<a class="list-group-item list-group-item-action" id="list-Objectif-list" data-bs-toggle="list" href="#list-Objectif" role="tab" aria-controls="Objectif">Objectif</a>';
                        array_push($StockerListe, $ElementBaliseA);
                        break;
                    case 'divParcour':
                        $ElementBaliseA = '<a class="list-group-item list-group-item-action" id="list-Parcoursprofessionnel-list" data-bs-toggle="list" href="#list-Parcoursprofessionnel" role="tab" aria-controls="Parcoursprofessionnel">Parcours professionnel</a>';
                        array_push($StockerListe, $ElementBaliseA);
                        break;
                    case 'divCompetences':
                        $ElementBaliseA = '<a class="list-group-item list-group-item-action" id="list-Compétences-list" data-bs-toggle="list" href="#list-Compétences" role="tab" aria-controls="Compétences">Compétences</a>';
                        array_push($StockerListe, $ElementBaliseA);
                        break;
                    case 'divlangues':
                        $ElementBaliseA = '<a class="list-group-item list-group-item-action" id="list-Langues-list" data-bs-toggle="list" href="#list-Langues" role="tab" aria-controls="langues">Langues</a>';
                        array_push($StockerListe, $ElementBaliseA);
                        break;
                    case 'divAtouts':
                        $ElementBaliseA = '<a class="list-group-item list-group-item-action" id="list-Atouts-list" data-bs-toggle="list" href="#list-Atouts" role="tab" aria-controls="Atouts">Atouts</a>';
                        array_push($StockerListe, $ElementBaliseA);
                        break;
                    case 'divInformatique':
                        $ElementBaliseA = '<a class="list-group-item list-group-item-action" id="list-Informatique-list" data-bs-toggle="list" href="#list-Informatique" role="tab" aria-controls="Informatique">Informatique</a>';
                        array_push($StockerListe, $ElementBaliseA);
                        break;
                    case 'divCentredinteret':
                        $ElementBaliseA = '<a class="list-group-item list-group-item-action" id="list-interet-list" data-bs-toggle="list" href="#list-interet" role="tab" aria-controls="Centredinteret">Centre d\'intérêt</a>';
                        array_push($StockerListe, $ElementBaliseA);
                        break;
                }
            }
        }
        return $StockerListe;
    }
}
