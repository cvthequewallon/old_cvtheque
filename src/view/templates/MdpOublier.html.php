<div class="d-flex justify-content-center">
    <h2 class="text-secondary mt-3">Veuillez saisir votre email pour changer votre Mot de passe.</h2>
</div>
<?php $controleur = new controlleurMdpOublier(); ?>
<?php if(isset($_POST['envoyer'])){
    $existantemail = $controleur->VerifEmail();
    if($existantemail == true){
        $controleur->EnvoyerMail();
    }
    else{
        ?>
        <div class="d-flex justify-content-center mt-5">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Erreur</h4>
            <p>L'adresse mail que vous avez saisi n'existe pas dans la base de données.</p>
            <p>Veuillez réessayer.</p>
        </div>
    </div>
        <?php
    }
}    
?>
<div class="d-flex flexmdp justify-content-center">
    <span class="border border-secondary">
        <div class="row m-3">
            <div class="col-auto">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <form class="form-inline form1 user-select-none needs-validation" name="MDPO" method="post">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">&#128231</div>
                                </div>
                                <input type="text" class="form-control " name="Email" id="email_login" placeholder="Email" required>
                            </div>
                            <button type="submit" name="envoyer" class="btn btn-primary mt-2">Valider</button>
                        </form>
                    </div>
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