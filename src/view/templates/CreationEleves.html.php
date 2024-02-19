<?php
$controlleur = new controlleurCreation();
$classes = $controlleur->allclasse();
?>
<div class="d-flex justify-content-center">
    <h2 class="text-secondary mt-5">Creation Eleve</h2>
</div>
<?php if(!empty($_POST)):
    $Nom = filter_input(INPUT_POST, 'Nom');
    $Email = filter_input(INPUT_POST, 'Email');
    $MDP = filter_input(INPUT_POST, 'MDP');
    $Prenom = filter_input(INPUT_POST, 'Prenom');
    $Datenaiss = filter_input(INPUT_POST, 'Datenaiss');
    $Adresse = filter_input(INPUT_POST, 'Adresse');
    $Ville = filter_input(INPUT_POST, 'Ville');
    $CP = filter_input(INPUT_POST, 'CP');
    $classe = filter_input(INPUT_POST, 'radioclasse');

    $existeEmail = false;
    foreach($controlleur->afficherEmail() as $unEmail){
        if($unEmail['Email'] == $Email){
            $existeEmail = true;
            break;
        }
    }
    if($existeEmail == false):
        $controlleur->ajoutereleve($Nom,$Email,$MDP,$Prenom,$Datenaiss,$Adresse,$Ville,$CP,$classe); ?>
        <div class="d-flex justify-content-center mt-5">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Enregistrer</h4>
                <p>La création de l'élève a était un succès.</p>
                <hr>
                <a class="mb-0 btn btn-dark w-100" href="?ajouter">Retour</a>
            </div>
        </div>
    <?php else: ?>
        <div class="d-flex justify-content-center mt-5">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Erreur</h4>
                <p>L'adresse email que vous avez saisi existe déjà. Veillez saisir une nouvelle adresse email.</p>
                <hr>
                <a class="mb-0 btn btn-dark w-100" href="?ajouter">Retour</a>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php if(empty($_POST)): ?>
    <div class="row">
        <div class="col-6">
            <div class="d-flex flexincri justify-content-start ml-5">
                <span class="border border-secondary">
                    <div class="row m-3">
                        <div class="col-auto">
                            <form class="form-inline form1 needs-validation" method="POST" novalidate>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&#128394</div>
                                    </div>
                                    <input type="text" class="form-control" id="validationCustom01" name="Nom" placeholder="Nom" required>
                                    <div class="input-group-prepend ml-2">
                                        <div class="input-group-text">&#128394</div>
                                    </div>
                                    <input type="text" class="form-control" id="validationCustom01" name="Prenom" placeholder="Prenom" required>
                                    <div class="input-group-prepend ml-2">
                                        <div class="input-group-text">&127874</div>
                                    </div>
                                    <input type="date" class="form-control" id="validationCustom01" name="Datenaiss" required>
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&#128274</div>
                                    </div>
                                    <input type="password" class="form-control" id="validationCustom03" name="MDP" placeholder="MDP" required>
                                    <div class="input-group-prepend ml-2">
                                        <div class="input-group-text">&#128231</div>
                                    </div>
                                    <input type="text" class="form-control" id="validationCustom04" id="mdp_login" name="Email" placeholder="Email" required>
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&#128205</div>
                                    </div>
                                    <input type="text" class="form-control col-auto" id="validationCustom03" name="Adresse" placeholder="Adresse" required>
                                    <div class="input-group-prepend  ml-2">
                                        <div class="input-group-text">&#128205</div>
                                    </div>
                                    <input type="text" class="form-control col-auto" id="validationCustom03" name="CP" placeholder="CP" required>
                                    <div class="input-group-prepend ml-2">
                                        <div class="input-group-text">&#128205</div>
                                    </div>
                                    <input type="text" class="form-control col-auto" id="validationCustom03" name="Ville" placeholder="Ville" required>
                                </div>
                                <div class="form-check form-inline mt-3">
                                    <?php foreach($classes as $classe): ?>
                                        <input class="form-check-input ml-2" type="radio" name="radioclasse" id="<?= $classe['Libelle'] ?>" value="<?= $classe['IdClasse'] ?>" required>
                                        <label class="form-check-label" for="<?= $classe['Libelle'] ?>">
                                            <?= $classe['Libelle'] ?>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                                <button type="submit" href="/creationeleves" class="btn btn-primary mt-2">Valider</button>
                            </form>
                        </div>
                    </div>
                </span>
            </div>
        </div>
        <div class="col-5 mr-3 mb-5 d-flex flexchoix justify-content-center">
            <span class="border border-secondary">
                <div class="row m-4">
                    <form class="form" action="/conversioncsv" method="POST" enctype="multipart/form-data" novalidate>
                        <label class="form-label" for="customFile">Choisissez votre fichier contenant les élèves (1 seul à la fois):</label>
                        <input type="file" class="form-control h-25" id="customFile" name="customFile"required/>
                        <div class="form-check form-inline mt-3">
                            <?php foreach($classes as $classe): ?>
                                <input class="form-check-input ml-2" type="radio" name="radioclasse" id="<?= $classe['Libelle'] ?>" value="<?= $classe['IdClasse'] ?>" required>
                                <label class="form-check-label" for="<?= $classe['Libelle'] ?>">
                                    <?= $classe['Libelle'] ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 w-100">Valider</button>
                    </form>
                </div>
            </span>
        </div>
    </div>
<?php endif; ?>

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