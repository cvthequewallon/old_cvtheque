<?php
class controlleurMdpOublier
{
    public function afficher()
    {
        require_once __DIR__ . '/../view/templates/EnteteHtml.html.php';
        require_once __DIR__ . '/../view/templates/MdpOublier.html.php';
        require_once __DIR__ . '/../view/templates/FinHtml.html.php';

    }

    public function EnvoyerMail(){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        $recupEmail = filter_input(INPUT_POST, 'Email');

        $longueur = 10;
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurmax = strlen($caracteres);
        $chaineAleatoire = '';
        for($i = 0; $i < $longueur; $i++){
            $chaineAleatoire .= $caracteres[rand(0, $longueurmax - 1)];
        }
        var_dump($chaineAleatoire);
        //$controleur->ChangerMDPOublie($recupEmail, $chaineAleatoire);
        //mail('pierrebraem@orange.fr', 'test', 'ceci est un test PHP');
    }

    public function VerifEmail(){
        require_once __DIR__.'/../kernel/DataBase.php';
        $controleur = new Connexion();
        $recupEmail = filter_input(INPUT_POST, 'Email');
        $listeEmail = $controleur->AfficherEmail();
        foreach($listeEmail as $UnEmail){
            if($UnEmail['Email'] == $recupEmail){
                return true;
            }
        }
        return false;
    }
}
