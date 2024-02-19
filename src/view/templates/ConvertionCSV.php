<?php
$controlleur = new controlleurProfil();

if(empty($_FILES)||empty($_POST)): ?>
    <div class="d-flex justify-content-center mt-5">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Erreur de transmission d'information(s)</h4>
            <p>Il y a eu un problèmes lors de la récupération du fichier ou de la classe saisie.</p>
            <p>Vous avez sûrement oublié de rentré une des information dites.</p>
            <hr>
            <a class="mb-0 btn btn-dark w-100" href="/creationeleves">retour</a>
        </div>
    </div>
    <?php
    die;
    endif;

$file = $_FILES['customFile']['tmp_name'];
$newfile = __DIR__.'/../../../import/test.csv';
$_FILES = $newfile;

if (!copy($file, $newfile)) {
    echo "La copie $file du fichier a échoué...\n";
}

function read($csv){
    $file = fopen($_FILES, "r");
    while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024);
    }
    fclose($file);
    return $line;
}
// Définir le chemin d'accès au fichier CSV
$csv = $_FILES;
$csv = read($csv);
$row = 1 ;
foreach($csv as $ligne){
    $ligne = implode(";",$ligne);
    $mot = explode(";",$ligne);
    if($row == 1){
        $row = 2;
    }
    else{
        if(empty($mot[5])){
            $NomPrenom = explode(" ", $mot[0]);
            $nom = $NomPrenom[0];
            $prenom = $NomPrenom[1];
    
            $datenaiss = $mot[2];
            $datepete = explode("/", $datenaiss);
            $annee = $datepete[2];
            $moi = $datepete[1];
            $jour = $datepete[0];
            $datenaiss = $annee."/".$moi."/".$jour;

            $classe = $_POST['radioclasse'];
            $controlleur->ajoutereleves($nom,$prenom,$datenaiss,$classe);
        }
    }
}
if(unlink($newfile)): ?>
    <div class="d-flex justify-content-center mt-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Enregistrement des élèves effectuer</h4>
            <p>Tous les élèves ont était enregistré dans la Base de donnée et aucune information n'a était enregistré.</p>
            <hr>
            <a class="mb-0 btn btn-dark w-100" href="/home">retour</a>
        </div>
    </div>
<?php else: ?>
    <div class="d-flex justify-content-center mt-5">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Enregistrement des élèves impossible</h4>
            <p>Il y a eu un problèmes lors de la suppréssion du fichier.</p>
            <hr>
            <a class="mb-0 btn btn-dark w-100" href="/home">retour</a>
        </div>
    </div>
<?php endif; ?>