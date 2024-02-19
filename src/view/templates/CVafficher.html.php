<?php $controlleur = new controlleurProfil();
$allclasse = $controlleur->allclasse();

if(!(empty($_POST['id']))):
  $idCV = filter_input(INPUT_POST, 'id');
  $controlleur->SuppCVParId($idCV);
  if(!($controlleur === false)):?>
    <div class="d-flex justify-content-center mt-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Suppression réussi</h4>
                <p>La suppression de votre CV a été effectuer avec succès.</p>
                <a class="btn btn-outline-secondary col" href="/CV?afficher">Retour</a>
        </div>
    </div>
  <?php endif;
else: ?>
  <div id="accordion" class="ml-3 mr-3 mt-3">
  <?php if($_SESSION['status'] == 'eleves'):?>
    <div class="alert <?= $_SESSION['classe'] ?> mt-3" role="alert">
      <button class="btn shadow-none" id="btn_accordion_1" data-toggle="collapse" data-target="#collapse<?= $_SESSION['classe'] ?>">
        <?= $_SESSION['classe'] ?>
      </button>
    </div>
    <?php $recupCVEleve = $controlleur->AfficherCVParEleve($_SESSION['id']); ?>
    <div class="collapse" id="collapse<?= $_SESSION['classe'] ?>" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="row">
          <?php foreach($recupCVEleve as $UnCV): ?>
            <div class="col-2 mb-3">
              <div class="card h-100">
                <div class="card-header"><?= $UnCV['Nom']; ?></div>
                <div class="card-footer">
                  <form method="post" action="/CVmodification">
                    <input type="hidden" name="idCV" value="<?= $UnCV['IdEnregistrerCV']; ?>">
                    <input type="hidden" name="idModele" value="<?= $UnCV['IdModele']; ?>">
                    <button type="submit" class="btn btn-outline-success mr-auto ml-auto col" disabled>Modifier</button>
                  </form>

                  <button id="test" type="submit" data-target="#SupprimerUnCV" data-toggle="modal" onclick="recupId(<?= $UnCV['IdEnregistrerCV']; ?>)" class="btn btn-outline-danger mr-auto ml-auto col mt-3">Supprimer</button>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
      </div>
    </div>

  <div class="modal fade" id="SupprimerUnCV" tabindex="-1" role="dialog" aria-labelledby="SupprimerUnCV1" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">                                            
              <div class="modal-header">
                  <h5 class="modal-title" id="SupprimerUnCV1">Attention</h5>
              </div>
          <div class="modal-body">
              <p>Voulez-vous supprimer ?</p>
              <p>Si vous cliquez sur "Supprimer", vous aurez la possibilité de restaurer votre CV, il sera perdu définitivement.</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <form method="post" name="envoyer">
                      <input type="hidden" name="id" value="null" />
                      <button type="submit" class="btn btn-outline-danger">Supprimer</button>
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

  <?php elseif($_SESSION['status'] == 'professeurs' || $_SESSION['status'] == 'administrateurs'): ?>
    <?php $recupClasseProf = $controlleur->RecupClassesProfesseur($_SESSION['id']); ?>
    <?php foreach($recupClasseProf as $classe): ?>
      <div class="alert <?= $classe['Classe'] ?> mt-3" role="alert">
        <button class="btn shadow-none" id="btn_accordion_1" data-toggle="collapse" data-target="#collapse<?= $classe['Classe'] ?>">
          <?= $classe['Classe'] ?>
        </button>
      </div>
      <?php $recupcvParClasse = $controlleur->RecupCV($classe['id']); ?>
      <div class="collapse" id="collapse<?= $classe['Classe'] ?>" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="row">
          <?php foreach($recupcvParClasse as $unCV): ?>
          <div class="col-3 mb-3">
            <div class="card <?= $classe['Classe'] ?> h-100">
              <div class="card-header"><?= $unCV['PrenomEleve'].".".$unCV['NomEleve'] ?></div>
              <div class="card-body">
                <div style="height: 7rem;">
                    <p class="card-text">Nom du CV : <?= $unCV['NomCV'] ?></p>
                </div>
              </div>
              <div class="card-footer">
              <form method="post" action="/VisionCV";>
                <input type="hidden" value="<?= $unCV['IdCV'] ?>" name="idCV">
                <input type="submit" class="btn btn-secondary mr-auto ml-auto col" name="Valider" value="Voir le CV">
              </form>
              </div>
            </div>
          </div>   
          <?php endforeach; ?>
        </div>
      </div>         
    <?php endforeach; ?>

  <?php else: ?>
    <?php foreach($allclasse as $classe): ?>
      <div class="alert <?= $classe['Libelle'] ?> mt-3" role="alert">
        <button class="btn shadow-none" id="btn_accordion_1" data-toggle="collapse" data-target="#collapse<?= $classe['Libelle'] ?>">
          <?= $classe['Libelle'] ?>
        </button>
      </div>
      <?php $recupcvParClasse = $controlleur->RecupCV($classe['IdClasse']); ?>
      <div class="collapse" id="collapse<?= $classe['Libelle'] ?>" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="row">
          <?php foreach($recupcvParClasse as $unCV): ?>
          <div class="col-3 mb-3">
            <div class="card <?= $classe['Libelle'] ?> h-100">
              <div class="card-header"><?= $unCV['PrenomEleve'].".".$unCV['NomEleve'] ?></div>
              <div class="card-body">
                <div style="height: 7rem;">
                    <p class="card-text">Nom du CV : <?= $unCV['NomCV'] ?></p>
                </div>
              </div>
              <div class="card-footer">
              <form method="post" action="/VisionCV";>
                <input type="hidden" value="<?= $unCV['IdCV'] ?>" name="idCV">
                <input type="submit" class="btn btn-secondary mr-auto ml-auto col" name="Valider" value="Voir le CV">
              </form>
              </div>
            </div>
          </div>   
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
  </div>
  <script>
    var id = <?php echo json_encode($id); ?>;
    $('#'+id).attr('src', '/photos/CV'+id+'.jpg');
  </script>
<?php endif; ?>
