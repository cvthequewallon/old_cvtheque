<?php $controleur = new controlleurGestionClasseGestion(); $allclasse = $controleur->allclasse(); ?>
<?php
if(isset($_POST['Supprimer'])):
    $id = filter_input(INPUT_POST, 'id');
    $controleur->supprimerclasse($id); ?>
    <div class="d-flex justify-content-center mt-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Suppression</h4>
            <p>La suppression de la classe a était un succès.</p>
            <hr>
            <a class="mb-0 btn btn-dark w-100" href="/gestionclasse?gestion">retour</a>
        </div>
    </div>
<?php else: ?>
<div id="accordion" class="ml-3 mr-3 mt-3">
    <div class="alert classe mt-3" role="alert" style="background-color: red;">
        <button class="btn shadow-none" id="btn_accordion_1" data-toggle="collapse" data-target="#collapseclasse">Les Classes</button>
    </div>

    <div class="collapse" id="collapseclasse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="row">
            <?php foreach($allclasse as $uneclasse): ?>
                <div class="col-3 mb-3">
                    <div class="card <?= $uneclasse['Libelle'] ?> h-100">
                        <div class="card-header"><?= $uneclasse["Libelle"] ?></div>
                        <div class="card-body">
                            <div style="height: 7rem;">
                                <p class="card-text">Nom : <?= $uneclasse['Libelle'] ?></p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button id="test" type="submit" class="btn btn-danger w-100" data-target="#SupprimerUneClasse" data-toggle="modal" onclick="recupId(<?= $uneclasse['IdClasse']; ?>)">Supprimer</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="SupprimerUneClasse" tabindex="-1" role="dialog" aria-labelledby="SupprimerUneClasse2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                                            
            <div class="modal-header">
                <h5 class="modal-title" id="SupprimerUneClasse2">Attention</h5>
            </div>
        <div class="modal-body">
            <p>Voulez-vous supprimer la classe de manière définitive ?</p>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form method="post" name="envoyer">
                    <input type="hidden" name="id" value="null" />
                    <button type="submit" class="btn btn-outline-danger" name="Supprimer">Supprimer</button>
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