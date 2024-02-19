<?php $controlleur = new controlleurGestionEleveGestion(); 
$recupeleve = $controlleur->AfficherEleves();
$allclasse = $controlleur->RecupClassesProfesseur($_SESSION['id']);?>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    La suppréssion d'élève est actuellement en cours de modification. Merci de ne pas l'utiliser.
  </div>
</div>
<?php 
if(isset($_POST['Valider'])):
    $id = filter_input(INPUT_POST, 'id');
    $erreur = $controlleur->suppeleve($id);?>
    <?php if($erreur == 0): ?>
    <div class="d-flex justify-content-center mt-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Suppression</h4>
            <p>La suppression de l'élève a était un succès.</p>
            <hr>
            <a class="mb-0 btn btn-dark w-100" href="/gestioneleve?gestion">retour</a>
        </div>
    </div>
    <?php else: ?>
        <div class="d-flex justify-content-center mt-5">
        <div class="alert alert-alert" role="alert">
            <h4 class="alert-heading">Erreur</h4>
            <p>Une erreur s'est produite lors de la suppression du compte.</p>
            <hr>
            <a class="mb-0 btn btn-dark w-100" href="/gestioneleve?gestion">retour</a>
        </div>
    </div>
    <?php endif; ?>
<?php
else:
?>

    <div id="accordion" class="ml-3 mr-3 mt-3">
        <?php foreach($allclasse as $classe): ?>
        <?php if($_SESSION['classe'] ==  $classe['Classe'] || $_SESSION['status'] == "entreprises" || "administrateur"): ?>
        <div class="alert <?= $classe['Classe'] ?> mt-3" role="alert">
            <button class="btn shadow-none" id="btn_accordion_1" data-toggle="collapse" data-target="#collapse<?= $classe['Classe'] ?>">
                <?= $classe['Classe'] ?>
            </button>
        </div>

        <div class="collapse" id="collapse<?= $classe['Classe'] ?>" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="row">

            
            <?php foreach($recupeleve as $eleve): ?>
            <?php if($eleve['Id_classe'] == $classe['id']): ?>
                <div class="col-3 mb-3">
                <div class="card <?= $classe['Classe'] ?> h-100">
                    <div class="card-header"><?= $eleve['Prenom']." ".$eleve['Nom'] ?></div>
                    <div class="card-body">
                        <div style="height: 7rem;">
                            <p class="card-text">Email:</p>
                            <p class="card-text"><?= $eleve['Email'] ?></p>
                        </div>
                        <div style="height: 7rem;">
                            <p class="card-text">Date de Naissance:</p>
                            <p class="card-text"><?= $eleve['DateDeNaissance'] ?></p>
                        </div>
                    </div>
                        <div class="card-footer">
                        <button id="test" type="submit" class="btn btn-danger w-100" data-target="#SupprimerUnEleve" data-toggle="modal" onclick="recupId(<?= $eleve['id_eleve']; ?>)">Supprimer</button>
                    </div>
                </div>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
    </div>
    <!-- formulaire pour confirmer la suppression -->
    <div class="modal fade" id="SupprimerUnEleve" tabindex="-1" role="dialog" aria-labelledby="SupprimerUnEleve2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">                                            
                <div class="modal-header">
                    <h5 class="modal-title" id="SupprimerUnEleve2">Attention</h5>
                </div>
            <div class="modal-body">
                <p>Voulez-vous supprimer ?</p>
                <p>Si vous cliquez sur "Supprimer", vous aurez la possibilité de restaurer le compte pendant le mois qui suit après ça suppression</p>
                <p>Au-dela de cette date, le compte sera supprimer définitivement.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <form method="post" name="envoyer">
                        <input type="hidden" name="id" value="null" />
                        <button type="submit" class="btn btn-outline-danger" name="Valider">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function recupId(id){
            var id2 = document.getElementById('test').value = id;
            document.forms['envoyer'].elements['id'].value = id2;
        }
    </script>
<?php endif; ?>