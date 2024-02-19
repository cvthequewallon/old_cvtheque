<?php
    $controleur = new controlleurInscription();
    if(isset($_POST['Valider'])){
        $existeEmail = false;
        $EmailRentrant = filter_input(INPUT_POST, 'Email');
        foreach($controleur->AfficherEmail() as $unEmail){
            if($unEmail['Email'] == $EmailRentrant){
                $existeEmail = true;
                break;
            }
        }
        if($existeEmail == false){
            $controleur->AjoutEntreprise();
            ?>
                <div class="d-flex justify-content-center mt-5">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Inscription validée</h4>
                            <p>La création de votre compte entreprise a été enregistrée.</p>
                            <p>Vous devez attendre que votre demande d'inscription soit acceptée par un professeur avant toute nouvelle connexion</p>
                    </div>
                </div>
            <?php
        }
        else{
            ?>
                <div class="d-flex justify-content-center mt-5">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Erreur</h4>
                            <p>L'adresse email que vous avez saisi existe déjà dans la base de données.</p>
                            <p>Veuillez recommencer en saisisant une autre adresse email.</p>
                    </div>
                </div>
            <?php
        }
    }
?>
<div class="d-flex justify-content-center">
    <h2 class="text-secondary mt-5">Inscription Entreprise</h2>
</div>
<div class="d-flex flexincri justify-content-center">
    <span class="border border-secondary">
        <div class="row m-3">
            <div class="col-auto">
            <span id="test"></span>
                <form class="form-inline form1 needs-validation" method="post" novalidate>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">&#128394</div>
                        </div>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Nom" name="Nom" required>
                        <div class="input-group-prepend ml-2">
                            <div class="input-group-text">&#128203</div>
                        </div>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="RCS" name="RCS">
                    </div>
                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">&#128205</div>
                        </div>
                        <input type="text" class="form-control" id="validationCustom03" placeholder="Adresse" name="Adresse" required>
                        <div class="input-group-prepend ml-2">
                            <div class="input-group-text">&#128205</div>
                        </div>
                        <input type="text" class="form-control" id="validationCustom04" placeholder="Ville" name="Ville" required>
                        <div class="input-group-prepend ml-2">
                            <div class="input-group-text">&#128205</div>
                        </div>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="Code Postal" name="CP" required>
                    </div>
                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">&#128231</div>
                        </div>
                        <input type="text" class="form-control" id="validationCustom06" placeholder="Email" name="Email" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">&#128241</div>
                        </div>
                        <input type="text" clas="form-control" id="validationCustom07" placeholder="Telephone" name="Telephone" required>
                        <div class="input-group-prepend ml-2">
                            <div class="input-group-text">&#128274</div>
                        </div>
                        <input type="password" class="form-control" id="validationCustom08" id="mdp_login" placeholder="MDP" name="MDP" required>
                    </div>
                    <div class="col-12" data-toggle="modal" data-target="#myModal">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck" data-toggle="modal" data-target="#myModal">
                                Conditions d'utilisation
                            </label>
                        </div>
                    </div>
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Conditions d'utilisation</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <p>Vous attestez avoir pris connaissance des Mentions légales et de la Politique de confidentialité.</p>
                                    <p>Celles ci sont disponibles dans le pied de page.</p>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2" name="Valider">Valider</button>
                </form>
            </div>
        </div>
    </span>
</div>
<script>
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