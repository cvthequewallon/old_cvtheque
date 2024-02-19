<div class="d-flex justify-content-center">
  <h2 class="text-secondary mt-3">Veuillez saisir vos identifiants pour vous connectez.</h2>
</div>

<?php if(isset($_POST['ConnectionEleve']) || isset($_POST['ConnectionEntreprise']) || isset($_POST['ConnectionProfesseur'])){
    $controleur  = new controlleurConnection();
    $controleur->SeConnecter();
}?>
<?php if(isset($_GET['err'])): ?>
<?php if($_GET['err'] == 'identification') {
  $message = "L'identifiant et/ou le mot de passe est incorrect.";
}
else{
  $message="L'entreprise n'est pas encore validée. Connexion impossible.";
}
?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#Erreur').modal('show');
  });

  function Fermer(){
    $('#Erreur').modal('hide');
  }
</script>

<!-- fenetre en cas d'erreur -->
<div class="modal fade" id="Erreur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Erreur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Fermer()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= $message ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="Fermer()">Fermer</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<div class="d-flex flexlogin justify-content-center">
  <span class="border border-secondary">
    <div class="row m-3">
      <div class="col-auto">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            <form name="Connection" method="post" class="form-inline form1 user-select-none needs-validation" novalidate>
              <!-- =======================================-->
              <h2 class="text-secondary">Comptes Eleve</h2>
              <div class="input-group mt-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">&#128231</div>
                </div>
                <input type="text" class="form-control " name="Email" id="email_login" placeholder="Email" required>
              </div>
              <div class="input-group mt-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">&#128274</div>
                </div>
                <input type="password" class="form-control" name="Mdp" id="mdp_login" placeholder="MDP" required>
              </div>

              <button type="submit" name="ConnectionEleve" class="btn btn-primary mt-2">Valider</button>
            </form><!-- =======================================-->
          </div>
          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
            <form name="Connection" method="post" class="form-inline form1 user-select-none needs-validation" novalidate>
              <!-- =======================================-->
              <h2 class="text-secondary">Comptes Entreprise</h2>
              <div class="input-group mt-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">&#128231</div>
                </div>
                <input type="text" class="form-control" name="Email" id="email_login" placeholder="Email" required>
              </div>
              <div class="input-group mt-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">&#128274</div>
                </div>
                <input type="password" class="form-control" name="Mdp" id="mdp_login" placeholder="MDP" required>
              </div>

              <button type="submit" name="ConnectionEntreprise" class="btn btn-primary mt-2">Valider</button>
            </form><!-- =======================================-->
          </div>
          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
            <form name="Connection" method="post" class="form-inline form1 user-select-none needs-validation" novalidate>
              <!-- =======================================-->
              <h2 class="text-secondary">Comptes Professeur</h2>
              <div class="input-group mt-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">&#128231</div>
                </div>
                <input type="text" class="form-control" name="Email" id="email_login" placeholder="Email" required>
              </div>
              <div class="input-group mt-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">&#128274</div>
                </div>
                <input type="password" class="form-control" name="Mdp" id="mdp_login" placeholder="MDP" required>
              </div>
              <button type="submit" name="ConnectionProfesseur" class="btn btn-primary mt-2">Valider</button>
            </form><!-- =======================================-->
          </div>
        </div>
      </div>
      <div class="col-auto mt-4">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-Eleves-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="home">Eleves</a>
          <a class="list-group-item list-group-item-action" id="list-Entreprises-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Entreprises</a>
          <a class="list-group-item list-group-item-action" id="list-Professeurs-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Professeurs</a>
        </div>
      </div>
    </div>
  </span>
</div>

<script>
  // Example starter Javascript for disabling form submissions if there are invalid fields
  (function() {
    'use strict'
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>