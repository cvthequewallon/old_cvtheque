<?php
class controlleurnavBar
{
    public function afficher()
    {
        if ($_SESSION['connected'] == True) {
            switch ($_SESSION['status']) {
                case 'entreprises':
                    require_once __DIR__ . '/../view/templates/navbar/EnteteConnecterEntreprises.html.php';
                    break;
                case 'eleves':
                    require_once __DIR__ . '/../view/templates/navbar/EnteteConnecterEleves.html.php';
                    break;
                case 'professeurs':
                    require_once __DIR__ . '/../view/templates/navbar/EnteteConnecterProfesseurs.html.php';
                    break;
                case 'administrateurs':
                    require_once __DIR__.'/../view/templates/navbar/EnteteConnecterAdmin.html.php';
                    break;
                default:
                    require_once __DIR__ . '/../view/templates/navbar/EnteteDeconnecter.html.php';
                    break;
            }
        } else {
            require_once __DIR__ . '/../view/templates/navbar/EnteteDeconnecter.html.php';
        };
    }

    public function UpdatedarkmodByUser($iddark, $id){
        require_once __DIR__ . '/../kernel/DataBase.php';
        $controleur = new Connexion(); 
        return $controleur->UpdatedarkmodByUser($iddark, $id);
    }
}
