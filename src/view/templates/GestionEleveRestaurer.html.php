<?php $controlleur = new controlleurGestionEleveRestaurer();
$recupeleve = $controlleur->RecupEleveSupprimer();
$allclasse = $controlleur->RecupClassesProfesseur($_SESSION['id']);
if(isset($_POST['Restaurer'])){
    $id = filter_input(INPUT_POST, 'id');
    $controlleur->RestaurationEleve($id);
    ?> <script>document.location.href="?restaurer";</script><?php
}
elseif(isset($_POST['Supprimer'])){
    $id = filter_input(INPUT_POST, 'id');
    $controlleur->SupprimerDefinitivementEleve($id);
    ?> <script>document.location.href="?restaurer";</script><?php
}
?>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    Cette page est actuellement en cours de modification. Merci de ne pas l'utiliser.
  </div>
</div>
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
            <?php if($eleve['Classe'] == $classe['id']): ?>
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
                        <div style="height: 7rem;">
                            <p class="card-text">Date de Suppression :</p>
                            <p class="card-text"><?= $eleve['DateSuppression'] ?></p>
                        </div>
                    </div>
                        <div class="card-footer">
                        <button id="recupId" type="submit" class="btn btn-warning w-100" data-target="#RestaurerUnEleve" data-toggle="modal"  onclick="recupId(<?= $eleve['IdSupprime']; ?>)">Restaurer</button>
                        <button id="recupId" type="submit" class="btn btn-danger w-100 mt-1" data-target="#SupprimerUnEleve" data-toggle="modal" onclick="recupId(<?= $eleve['IdSupprime']; ?>)">Supprimer définitivement</button>
                    </div>
                </div>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
<script>
    function recupId(id){
        var id2 = document.getElementById('recupId').value = id;
        document.forms['envoyer'].elements['id'].value = id2;
        document.forms['envoyer2'].elements['id'].value = id2;
    }
</script>
<!-- modal pour restaurer élève -->
<div class="modal fade" id="RestaurerUnEleve" tabindex="-1" role="dialog" aria-labelledby="RestaurerUnEleve2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                                            
            <div class="modal-header">
                <h5 class="modal-title" id="RestaurerUnEleve2">Attention</h5>
            </div>
            <div class="modal-body">
                <p>Voulez-vous vraiment restaurer cet élève ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form method="post" name="envoyer">
                    <input type="hidden" name="id" value="null" />
                    <button type="submit" class="btn btn-outline-warning" name="Restaurer">Restaurer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal pour supprimer élève -->
<div class="modal fade" id="SupprimerUnEleve" tabindex="-1" role="dialog" aria-labelledby="SupprimerUnEleve2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                                            
            <div class="modal-header">
                <h5 class="modal-title" id="SupprimerUnEleve2">Attention</h5>
            </div>
            <div class="modal-body">
                <p>Voulez-vous vraiment supprimer cet élève de manière définitive ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form method="post" name="envoyer2">
                    <input type="hidden" name="id" value="null" />
                    <button type="submit" class="btn btn-outline-danger" name="Supprimer">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>