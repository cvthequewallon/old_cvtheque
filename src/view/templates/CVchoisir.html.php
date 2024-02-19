<?php $controleurCVchoisir = new controlleurProfil(); ?>
<?php $ModeleCV = $controleurCVchoisir->ModeleParClasse($_SESSION['classe']); ?>
<div id="accordion" class="ml-3 mr-3 mt-3">
    <div class="alert <?= $_SESSION['classe'] ?>" role="alert">
      <button class="btn shadow-none" id="btn_accordion_1" data-toggle="collapse" data-target="#collapse1">
        <i id="fleche1" class="fas fa-caret-down"></i>
        <?php echo $_SESSION['classe'];?>
      </button>
    </div>

    <div class="collapse" id="collapse1" aria-labelledby="headingOne" data-parent="#accordion">
    <div class="row">
    <?php foreach($ModeleCV as $UnModeleCV): $id = $UnModeleCV['idModele'];?>
        <!-- card -->
          <div class="col-3 mb-3">
            <div class="card <?= $_SESSION['classe'] ?> h-100">
            <?php $NomModele = explode(".", $UnModeleCV['NomModele']); ?>
              <div class="card-header"><?php echo $NomModele[0] ?></div>
              <div class="card-body">
                    <img class="card-img-bottom ml-5" id="<?= $id ?>" style="width: 150px;height: 200px;"></img>
              </div>
                <div class="card-footer">
                <form method="post" action="/CVcreation">
                  <input type="hidden" name="idmodele" value="<?= $id ?>">
                  <input type="submit" class="btn btn-dark mr-auto ml-auto col" name="Choisir" value="Choisir">
                </form>
                </div>
            </div>
          </div>
          <script>
          var id = <?php echo json_encode($id); ?>;
          $('#'+id).attr('src', '/photos/CV'+id+'.jpg');
          </script>
      <?php endforeach; ?>
      </div>
    </div>
  </div>