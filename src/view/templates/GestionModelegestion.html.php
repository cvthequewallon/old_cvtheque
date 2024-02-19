<?php $controlleur = new controlleurGestionModelegestion(); ?>
<?php $LesClasses = $controlleur->AfficherClassesProfesseur($_SESSION['id']); ?>
<?php if(isset($_POST['Supprimer'])){
    $controlleur->SupprimerModele();
    header('location ?gestion');
}
?>
<div id="accordion" class="ml-3 mr-3 mt-3">
    <?php foreach($LesClasses as $UneClasse):?>
        <div class="alert <?= $UneClasse['Classe'] ?>" role="alert">
        <button class="btn shadow-none" id="btn_accordion_1" data-toggle="collapse" data-target="#UneClasse<?= $UneClasse['id']; ?>">
            <?php echo $UneClasse['Classe']; ?>
        </button>
        </div>
        <div class="collapse" id="UneClasse<?= $UneClasse['id']; ?>" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="row">
                <?php $LesModeles = $controlleur->ModeleCVParClasse($UneClasse['Classe']); ?>
                    <?php foreach($LesModeles as $UnModeleCV): ?>
                        <div class="col-3 mb-3">
                            <div class="card <?= $UneClasse['Classe'] ?> h-100">
                                <div class="card-header"><?php echo $UnModeleCV['NomModele'] ?></div>
                                <div class="card-body">
                                    <img class="card-img-bottom" src="https://file.diplomeo-static.com/file/00/00/01/48/14858.svg"></img>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-outline-success">Modifier</button>
                                    <button id="test" type="submit" class="btn btn-outline-danger" data-target="#SupprimerUnModele" data-toggle="modal" onclick="recupId(<?= $UnModeleCV['idModele']; ?>)">Supprimer</button>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>    
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- formulaire pour confirmer la suppression -->
<div class="modal fade" id="SupprimerUnModele" tabindex="-1" role="dialog" aria-labelledby="SupprimerUnModele2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                                            
            <div class="modal-header">
                <h5 class="modal-title" id="SupprimerUnModele2">Attention</h5>
            </div>
        <div class="modal-body">
            <p>Voulez-vous supprimer le modèle de manière définitive ?</p>
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