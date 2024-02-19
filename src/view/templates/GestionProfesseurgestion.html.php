<?php $controlleur = new controlleurGestionProfesseurGestion(); 
$recupprof = $controlleur->RecupProfesseur();
$allclasse = $controlleur->allclasse();
?>

<?php 
if(isset($_POST['Supprimer'])):
    $id = filter_input(INPUT_POST, 'id');
    $controlleur->suppprofesseur($id);?>
    <div class="d-flex justify-content-center mt-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Suppression</h4>
            <p>La suppression du professeur a était un succès.</p>
            <hr>
            <a class="mb-0 btn btn-dark w-100" href="/gestionprofesseur?gestion">retour</a>
        </div>
    </div>
<?php
else:
?>

    <div id="accordion" class="ml-3 mr-3 mt-3">
        <?php foreach($allclasse as $classe): ?>
        <?php if($_SESSION['classe'] ==  $classe['Libelle'] || $_SESSION['status'] == "administrateurs"): ?><!-- ===============DEBUT SIO1======================== -->
        <div class="alert <?= $classe['Libelle'] ?> mt-3" role="alert">
            <button class="btn shadow-none" id="btn_accordion_1" data-toggle="collapse" data-target="#collapse<?= $classe['Libelle'] ?>">
                <?= $classe['Libelle'] ?>
            </button>
        </div>

        <div class="collapse" id="collapse<?= $classe['Libelle'] ?>" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="row">

            
            <?php foreach($recupprof as $prof): ?>
            <?php if($prof['Libelle'] == $classe['Libelle']): ?>
                <div class="col-3 mb-3">
                <div class="card <?= $classe['Libelle'] ?> h-100">
                    <div class="card-header"><?= $prof['Prenom']." ".$prof['Nom'] ?></div>
                    <div class="card-body">
                        <div style="height: 7rem;">
                            <p class="card-text">Email:</p>
                            <p class="card-text"><?= $prof['Email'] ?></p>
                        </div>
                        <div style="height: 7rem;">
                            <p class="card-text">Grade:</p>
                            <?php if($prof['Administrateur'] == 1): ?>
                                <p class="card-text">Administrateur</p>
                            <?php else: ?>
                                <p class="card-text">Simple Professeur</p>
                            <?php endif; ?>
                        </div>
                    </div>
                        <div class="card-footer">
                        <button id="test" type="submit" class="btn btn-danger w-100" data-target="#SupprimerUnProf" data-toggle="modal" onclick="recupId(<?= $prof['Id_professeur']; ?>)">Supprimer</button>
                    </div>
                </div>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?><!-- ===============FIN SIO1======================== -->
    <?php endforeach; ?>
    </div>
    <!-- formulaire pour confirmer la suppression -->
    <div class="modal fade" id="SupprimerUnProf" tabindex="-1" role="dialog" aria-labelledby="SupprimerUnProf2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">                                            
                <div class="modal-header">
                    <h5 class="modal-title" id="SupprimerUnProf2">Attention</h5>
                </div>
            <div class="modal-body">
                <p>Voulez-vous supprimer le professeur de manière définitive ?</p>
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