<?php
    $controlleur = new controlleurGestionClasseAjout();
    if(isset($_POST['Valider'])){
        $NomC = filter_input(INPUT_POST, 'NomClasse');
        $erreur = $controlleur->AjouterClasse($NomC);
        if($erreur == 0): ?>
        <div class="d-flex justify-content-center mt-5">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Enregistré</h4>
                <p>La classe s'est créé avec succès.</p>
            </div>
        </div>
<?php
        else: ?>
        <div class="d-flex justify-content-center mt-5">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Erreur</h4>
                <p>Une erreur s'est produite lors de la création de la classe.</p>
            </div>
        </div>
<?php endif;
    }
?>
<div class="d-flex justify-content-center">
    <h2 class="text secondary mt-5">Création d'une classe</h2>
</div>
<div class="d-flex justify-content-center flexprof">
    <div class="row m-3">
        <div class="col-auto">
            <div class="d-flex flexincri justify-content-start">
                <span class="border border-secondary">
                    <div class="row m-3">
                        <form class="form-inline form1 needs-validation" method="post" novalidate>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">&#128394</div>
                                </div>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Nom de la classe" name="NomClasse" required> 
                            </div>
                            <button type="submit" class="btn btn-primary mt-2" name="Valider">Valider</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>