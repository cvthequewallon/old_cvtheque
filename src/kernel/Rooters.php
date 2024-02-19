<?php
class Routeur
{
    function Rooter()
    {
        $UrlTotal = $_SERVER['REQUEST_URI'];
        return $UrlTotal;
    }

    function recuperePageAAfficher()
    {

        $urlTotal = $this->Rooter();
        $controlleur = null;
        switch ($urlTotal) {
            case '/':
            case '/home':
                require_once __DIR__ . '/../controlleurs/ControlleurHome.php';
                $controlleur = new controlleurHome();
                break;
            case '/InfoStage':
                    require_once __DIR__ . '/../controlleurs/ControlleurInfoStage.php';
                    $controlleur = new controlleurInfoStage();
                    break;
            case '/login':
                    require_once __DIR__ . '/../controlleurs/ControlleurConnection.php';
                    $controlleur = new controlleurConnection();
                    break;
            case '/CV?afficher':
                require_once __DIR__ . '/../controlleurs/ControlleurCVafficher.php';
                $controlleur = new controlleurProfil();
                break;
            case '/CV?choisir':
                require_once __DIR__ . '/../controlleurs/ControlleurCVchoisir.php';
                $controlleur = new controlleurProfil();
                break;
            case '/CV':
                require_once __DIR__ . '/../controlleurs/ControlleurCV.php';
                $controlleur = new controlleurProfil();
                break;
            case '/profil':
                require_once __DIR__ . '/../controlleurs/ControlleurProfil.php';
                $controlleur = new controlleurProfil();
                break;
            case '/CVcreation':
                require_once __DIR__ . '/../controlleurs/ControlleurCvencreation.php';
                $controlleur = new controlleurProfil();
                break;
            case '/CVmodification':
                    require_once __DIR__ . '/../controlleurs/ControlleurCVenmodification.php';
                    $controlleur = new controlleurProfil();
                    break;
            case '/VisionCV':
                require_once __DIR__.'/../controlleurs/ControlleurVisionCV.php';
                $controlleur = new controlleurVisionCV();
                break;
            case '/deconnection':
                require_once __DIR__ . '/../controlleurs/ControlleurDeconnection.php';
                $controlleur = new controlleurDeconnection();
                break;
            case '/conversioncsv':
                require_once __DIR__.'/../controlleurs/ControlleurConverionCSV.php';
                $controlleur = new controlleurProfil();
                break;
            case '/upload':
                require_once __DIR__ . '/../controlleurs/ControlleurUpload.php';
                $controlleur = new controlleurUpload();
                break;
            case '/pdf':
                require_once __DIR__ . '/../controlleurs/ControlleurPdf.php';
                break;
            case '/profil':
                require_once __DIR__ . '/../controlleurs/ControlleurProfil.php';
                $controlleur = new controlleurProfil();
                break;
            case '/gestioneleve':
                require_once __DIR__ . '/../controlleurs/ControlleurGestionEleve.php';
                $controlleur = new controlleurGestionEleve();
                break;
            case '/gestioneleve?ajouter':
                require_once __DIR__ . '/../controlleurs/ControlleurCreationEleve.php';
                $controlleur = new controlleurCreation();
                break;
            case '/gestioneleve?gestion':
                require_once __DIR__ . '/../controlleurs/ControlleurGestionEleveGestion.php';
                $controlleur = new controlleurGestionEleveGestion();
                break;
            case '/gestioneleve?restaurer':
                require_once __DIR__ . '/../controlleurs/ControlleurGestionEleveRestaurer.php';
                $controlleur = new controlleurGestionEleveRestaurer();
                break;
            case '/gestionmodele':
                require_once __DIR__ . '/../controlleurs/ControlleurGestionModele.php';
                $controlleur = new controlleurGestionModele();
                break;
            case '/gestionmodele?ajouter':
                require_once __DIR__ . '/../controlleurs/ControlleurGestionModeleajouter.php';
                $controlleur = new controlleurGestionModeleajouter();
                break;
            case '/gestionmodele?gestion':
                require_once __DIR__ . '/../controlleurs/ControlleurGestionModelegestion.php';
                $controlleur = new controlleurGestionModelegestion();
                break;
            case '/GestionEntreprise':
                require_once __DIR__ . '/../controlleurs/ControlleurGestionEntreprise.php';
                $controlleur = new controlleurProfil();
                break;
            case '/gestionprofesseur':
                require_once __DIR__ . '/../controlleurs/ControlleurGestionProfesseur.php';
                $controlleur = new controlleurGestionProfesseur();
                break;
            case '/gestionprofesseur?ajouter':
                require_once __DIR__ . '/../controlleurs/ControlleurCreationProfesseur.php';
                $controlleur = new controlleurCreationProfesseur();
                break;
            case '/gestionprofesseur?gestion':
                require_once __DIR__ . '/../controlleurs/ControlleurGestionProfesseurgestion.php';
                $controlleur = new controlleurGestionProfesseurGestion();
                break;
            case '/inscription':
                require_once __DIR__ . '/../controlleurs/ControlleurInscription.php';
                $controlleur = new controlleurInscription();
                break;
            case '/inscription?err=email':
                require_once __DIR__ . '/../controlleurs/ControlleurInscription.php';
                $controlleur = new controlleurInscription();
                break;
            case '/MdpOublier':
                require_once __DIR__ . '/../controlleurs/ControlleurMdpOublier.php';
                $controlleur = new controlleurMdpOublier();
                break;
            case '/gestionclasse':
                require_once __DIR__.'/../controlleurs/ControlleurGestionClasse.php';
                $controlleur = new controlleurGestionClasse();
                break;
            case '/gestionclasse?ajouter':
                require_once __DIR__.'/../controlleurs/ControlleurGestionClasseAjouter.php';
                $controlleur = new controlleurGestionClasseAjout();
                break;
            case '/gestionclasse?gestion':
                require_once __DIR__.'/../controlleurs/ControlleurGestionClasseGestion.php';
                $controlleur = new controlleurGestionClasseGestion();
                break;
            default:
                require_once __DIR__ . '/../controlleurs/ControlleurErreur.php';
                $controlleur = new controlleurErreur();
                break;
        }
        return $controlleur;
    }
}
