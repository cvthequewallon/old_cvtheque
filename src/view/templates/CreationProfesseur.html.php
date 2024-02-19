<?php $controlleur = new controlleurCreationProfesseur(); $classes = $controlleur->allclasse();
if(isset($_POST['Valider'])){
    $Email = filter_input(INPUT_POST, 'Email');
    $existeEmail = false;
    foreach($controlleur->afficherEmail() as $unEmail){
        if($unEmail['Email'] == $Email){
            $existeEmail = true;
            break;
        }
    }
    if($existeEmail == true): ?>
        <div class="d-flex justify-content-center mt-5">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Erreur</h4>
                <p>L'adresse email que vous avez saisi existe déjà. Veillez saisir une nouvelle adresse email.</p>
            </div>
        </div>
    <?php else:
    $erreur = $controlleur->AjouterProfesseur();
    if($erreur == 0): ?>
        <div class="d-flex justify-content-center mt-5">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Enregistré</h4>
                <p>Le compte professeur s'est créé avec succès.</p>
            </div>
        </div>
    <?php else: ?>
        <div class="d-flex justify-content-center mt-5">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Erreur</h4>
                <p>Une erreur s'est produite lors de la création du compte professeur.</p>
            </div>
        </div>
    <?php endif;
endif;
}
?>

<div class="d-flex justify-content-center">
    <h2 class="text-secondary mt-5">Creation Professeur</h2>
</div>
<div class="d-flex justify-content-center flexprof">
<div class="row m-3">
    <div class="col-auto">
        <div class="d-flex flexincri justify-content-start">
            <span class="border border-secondary">
                <div class="row m-3">
                    <div class="col-12">
                        <form class="form-inline form1 needs-validation" method="post" novalidate>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">&#128394</div>
                                </div>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Nom" name="Nom" required>
                                <div class="input-group-prepend ml-2">
                                    <div class="input-group-text">&#128394</div>
                                </div>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Prenom" name="Prenom" required>
                            </div>
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">&#128274</div>
                                </div>
                                <input type="password" class="form-control" id="validationCustom03" placeholder="MDP" name="MDP" required>
                                <div class="input-group-prepend ml-2">
                                    <div class="input-group-text">&#128274</div>
                                </div>
                                <input type="text" class="form-control" id="validationCustom04" id="mdp_login" placeholder="Email" name="Email" required>
                            </div>
                            <div class="input-group justify-content-center">
                                <div class="form-group mt-2">
                                    <input type="checkbox" class="form-check-input" id="Administrateur" name="Administrateur">
                                    <label class="form-check-label" for="Administrateur">Donner les droits administrateurs</label>
                                </div>
                            </div>
                            <div class="input-group justify-content-center">
                                <p class="text-secondary">Selectionner la ou les classe(s) enseigné(s)</p>
                            </div>
                            <div id="formulaireajoutprofesseur">
                            <select class="custom-select mr-sm-1 mt-2" id="inlineFormCustomSelect" name="listeclasse1">
                                <?php $selected = true; ?>
                                <?php foreach($classes as $classe): ?>
                                    <?php if($selected == true): ?>
                                        <?php $selected = false; ?>
                                        <option value="<?= $classe['IdClasse'] ?>" selected><?= $classe['Libelle']; ?></option>
                                    <?php else: ?>
                                        <option value="<?= $classe['IdClasse'] ?>"><?= $classe['Libelle']; ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                            </select>
                            </div>
                            <div class="input-group-prepend">
                                <bouton class="btn btn-danger mt-2 w-100" onclick='SupprimerFormulaire()'>Supprimer une classe</bouton>
                            </div>
                            <div class="input-group-prepend">
                                <bouton class="btn btn-success mt-2 w-100" onclick='AjouterFormulaire()'>Ajouter une classe</bouton>
                            </div>
                                <script type="text/javascript">
                                    var nombre = 1;
                                    function AjouterFormulaire(){
                                        nombre = nombre + 1;
                                        var b = document.getElementById('formulaireajoutprofesseur');
                                        var newDiv = document.createElement('div');
                                        var newContent = '<select class="custom-select mr-sm-1 mt-2" id="inlineFromCustomSelect' + nombre + '" name="listeclasse' + nombre + '">' +
                                            '<?php $selected = true; ?>' +
                                            '<?php foreach($classes as $classe): ?>' +
                                            '<?php if($selected == true): ?>' +
                                            '<?php $selected = false ?>' +
                                            '<option value="<?= $classe['IdClasse'] ?>" selected><?= $classe['Libelle']; ?></option>' +
                                            '<?php else: ?>' +
                                            '<option value="<?= $classe['IdClasse']; ?>"><?= $classe['Libelle']; ?></option>' +
                                            '<?php endif; ?>' +
                                            '<?php endforeach; ?>' +
                                            '</select>';
                                        b.insertAdjacentHTML('beforeend',newContent);
                                    }
                                    function SupprimerFormulaire(){
                                        var retirer = document.getElementById('inlineFromCustomSelect' + nombre);
                                        retirer.remove();
                                        nombre = nombre - 1;
                                    }
                                </script>
                            <button type="submit" class="btn btn-primary mt-2" name="Valider">Valider</button>
                        </form>
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>
</div>