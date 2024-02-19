<?php $controlleur = new controlleurProfil(); 
$recupE = $controlleur->RecupEntreprise();?>

<div class="d-flex justify-content-center">
    <h2 class="text-secondary mt-5">Gestion des Entreprises</h2>
</div>
<?php if(!empty($_POST['supp'])): ?>
  <?php
  $id = filter_input(INPUT_POST, 'supp');
  $controlleur->suppentreprise($id); 
  ?> <script>document.location.href="/GestionEntreprise";</script> <?php
  
  elseif(!empty($_POST['valid'])):

    $id = filter_input(INPUT_POST, 'valid');
    $controlleur->validentreprise($id);
    ?> <script>document.location.href="/GestionEntreprise";</script> <?php

  elseif(empty($_POST)):?>

<div id="accordion" class="ml-3 mr-3 mt-3">
    <!-- ===============DEBUT Valider======================== -->
  <div class="alert alert-success mt-3" role="alert">
    <button class="btn shadow-none" id="btn_accordion_1" data-toggle="collapse" data-target="#collapse1">
      Entreprise(s) Valider
    </button>
  </div>

  <div class="collapse" id="collapse1" aria-labelledby="headingOne" data-parent="#accordion">
    <div class="row">

      <?php foreach($recupE as $E): ?>
        <?php if($E['Valider'] == "1"): ?>
          <div class="col-3 mb-3">
            <div class="card alert-success h-100">
              <div class="card-header"><?= $E['Nom entreprise'] ?></div>
                <div class="card-body">
                  <div style="height: 5rem;">
                    <p class="card-text">Adresse:</p>
                    <p class="card-text"><?= $E['Adresse']." ".$E['Ville']." ".$E['Code Postal'] ?></p>
                  </div>
                  <hr>
                  <div>
                    <p class="card-text">Téléphone:</p>
                    <p class="card-text"><?= $E['Telephone'] ?></p>
                  </div>
                  <hr>
                  <div>
                    <p class="card-text">Email:</p>
                    <p class="card-text"><?= $E['Email'] ?></p>
                  </div>
                  <hr>
                  <div>
                    <p class="card-text">Numéro de Siret:</p>
                    <p class="card-text"><?php echo $E['Numéro de Siret'] ? $E['Numéro de Siret'] : "Aucun enregistré."; ?></p>
                  </div>
                </div>
                <div class="card-footer">
                  <form method="POST">
                    <button type="submit" class="btn btn-danger mr-auto ml-auto col" name="supp" value="<?= $E['id Entreprise'] ?>" href="/GestionEntreprise">Supprimer</button>
                  </form>
                </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div><!-- ===============FIN Valider======================== -->




<!-- ===============DEBUT Attente======================== -->
  <div class="alert alert-warning" role="alert">
    <button class="btn shadow-none" id="btn_accordion_2" data-toggle="collapse" data-target="#collapse2">
      Entreprise(s) En Attente
    </button>
  </div>

  <div class="collapse" id="collapse2" class="collapse show" data-parent="#accordion">
  <div class="row">
  
      <?php foreach($recupE as $E): ?>
        <?php if($E['Valider'] == 0): ?>
          <div class="col-3 mb-3">
            <div class="card alert-warning h-100">
              <div class="card-header"><?= $E['Nom entreprise'] ?></div>
              <div class="card-body">
              <div style="height: 5rem;">
                    <p class="card-text">Adresse:</p>
                    <p class="card-text"><?= $E['Adresse']." ".$E['Ville']." ".$E['Code Postal'] ?></p>
                  </div>
                  <hr>
                  <div>
                    <p class="card-text">Téléphone:</p>
                    <p class="card-text"><?= $E['Telephone'] ?></p>
                  </div>
                  <hr>
                  <div>
                    <p class="card-text">Email:</p>
                    <p class="card-text"><?= $E['Email'] ?></p>
                  </div>
                  <hr>
                  <div>
                    <p class="card-text">Numéro de Siret:</p>
                    <p class="card-text"><?php echo $E['Numéro de Siret'] ? $E['Numéro de Siret'] : "Aucun enregistré."; ?></p>
                  </div>
                <div class="card-footer">
                  <form method="POST">
                    <button type="submit" class="btn btn-warning mr-auto ml-auto col" name="valid" value="<?= $E['id Entreprise'] ?>">Valider</button>
                  </form>
                  <form method="POST">
                    <button type="submit" class="btn btn-danger mr-auto ml-auto col mt-2" name="supp" value="<?= $E['id Entreprise'] ?>" >Supprimer</button>
                  </form>
                </div>
            </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div><!-- ===============FIN Attente======================== -->
<?php endif; ?>