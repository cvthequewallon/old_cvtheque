<?php $controleur = new controlleurProfil(); $information = $controleur->AfficherInput($_SESSION['id'], $_SESSION['status']); ?>
<?php  if(isset($_POST['MNom']) || isset($_POST['MPrenom']) || isset($_POST['MDDN']) || isset($_POST['MEmail']) || isset($_POST['MTelephone']) || isset($_POST['MAdresse']) || isset($_POST['MVille']) || isset($_POST['MCP'])){
    $controleur->ChangerInformation();
    ?><script>document.location.href="/profil";</script><?php
}
if(isset($_POST['Changer'])){
    $controleur->ChangerMotPasse();
    ?><script>document.location.href="/profil";</script><?php
}
?>
<div class="d-flex justify-content-center">
    <div class="mt-3">
        <h3 class="text-secondary">Bienvenue sur votre profil.</h3>
    </div>
</div>
<?php if($_SESSION['status'] == ("eleves" || "professeurs" || "entreprises") ):?>
    <div class="d-flex flexdrop justify-content-center">
        <div class="shadow p-3 mb-5 rounded">
                <div class="fallback">
                    <div class="custom-file">
                        
                        <img src="https://file.diplomeo-static.com/file/00/00/01/48/14858.svg" class="custom-file-label rounded-circle img float-left ml-2 mt-2" for="dropzoneBasicUpload"></img>
                    </div>
                </div>
            <?php if($_SESSION['status'] !== ("entreprises")):?>
                <p class="float-right col-auto mr-5 float1"><?= $information['Prenom'].".".$information['Nom']."#".$information['id'];?></p>
            <?php else: ?>
                <p class="float-right col-auto mr-5 float1"><?= $information['Nom']."#".$information['id']; ?></p>
            <?php endif; ?>
            <div class="shadow sha2 p-3 mb-2 rounded">
                <p class="float-bottom" >Veuillez cliquez sur le haut de l'image pour la modifier.</p>
                <div>
                    <div class="col-auto">
                        <form class="form-inline form1" method="post">
                            <span class="badge badge-secondary col-3">Nom</span>
                            <div class="input-group mt-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">&#128394</div>
                                </div>
                                <input type="text" class="form-control" id="" placeholder="Nom" value="<?= $information['Nom'] ?>" name="Nom" required>
                                <button type="submit" class="btn btn-secondary ml-2" name="MNom">Modifier</button>
                            </div>
                        </form>
                        <?php if($_SESSION['status'] !== "entreprises"):?>
                            <form class="form-inline form1 mt-3" method="post">
                                <span class="badge badge-secondary col-3">Prenom</span>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&#128394</div>
                                    </div>
                                    <input type="text" class="form-control" id="" placeholder="Prenom" value="<?= $information['Prenom'] ?>" name="Prenom" required>
                                    <button type="submit" class="btn btn-secondary ml-2" name="MPrenom">Modifier</button>
                                </div>
                            </form>
                        <?php endif ?>
                        <?php if($_SESSION['status'] !== "entreprises" && $_SESSION['status'] !== "professeurs" && $_SESSION['status'] !== 'administrateurs'):?>
                            <form class="form-inline form1 mt-3" method="post">
                                <span class="badge badge-secondary col-4">Date de Naissance</span>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&#127874</div>
                                    </div>
                                    <input type="date" class="form-control" id="" placeholder="Date de Naissance" value="<?= $information['Date de Naissance']; ?>" name="DateDeNaissance" required>
                                    <button type="submit" class="btn btn-secondary ml-2" name="MDDN">Modifier</button>
                                </div>
                            </form>
                        <?php endif ?>
                        <form class="form-inline form1 mt-3" method="post">
                            <span class="badge badge-secondary col-3">E-mail</span>
                            <div class="input-group mt-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">&#128231</div>
                                </div>
                                <input type="email" class="form-control" id="" placeholder="E-mail" value="<?= $information['Email']; ?>" name ="Email" required>
                                <button type="submit" class="btn btn-secondary ml-2" name="MEmail">Modifier</button>
                            </div>
                        </form>
                        <?php if($_SESSION['status'] == "eleves" || $_SESSION['status'] == "entreprises"):?>
                            <form class="form-inline form1 mt-3" method="post">
                                <span class="badge badge-secondary col-3">Telephone</span>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&#128241</div>
                                    </div>
                                    <input type="text" class="form-control" id="" placeholder="Telephone" value="<?= $information['Telephone']; ?>" name="Telephone" required>
                                    <button type="submit" class="btn btn-secondary ml-2" name="MTelephone">Modifier</button>
                                </div>
                            </form>
                            <form class="form-inline form1 mt-3" method="post">
                                <span class="badge badge-secondary col-3">Adresse</span>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&#128205</div>
                                    </div>
                                    <input type="text" class="form-control" id="" placeholder="Adresse" value="<?= $information['Adresse']; ?>" name="Adresse" required>
                                    <button type="submit" class="btn btn-secondary ml-2" name="MAdresse">Modifier</button>
                                </div>
                            </form>
                            <form class="form-inline form1 mt-3" method="post">
                                <span class="badge badge-secondary col-3">Ville</span>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&#128205</div>
                                    </div>
                                    <input type="text" class="form-control" id="" placeholder="Ville" value="<?= $information['Ville']; ?>" name="Ville" required>
                                    <button type="submit" class="btn btn-secondary ml-2" name="MVille">Modifier</button>
                                </div>
                            </form>
                            <form class="form-inline form1 mt-3" method="post">
                                <span class="badge badge-secondary col-3">Code Postal</span>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&#128205</div>
                                    </div>
                                    <input type="text" class="form-control" id="" placeholder="Code Postal" value="<?= $information['Code postal'] ?>" name="CP" required>
                                    <button type="submit" class="btn btn-secondary ml-2" name="MCP">Modifier</button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <hr class="mt-4">
            <span class="badge badge-info col-auto">MOT DE PASSE</span>
            <br>
            <button type="button" class="btn btn-secondary mt-3" data-toggle="modal" data-target="#modal">Changer le mot de passe</button>

            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Changer votre mot de passe</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-inline form1 mt-3" method="post">
                            <label class="ml-2 mt-2">Saissiez votre mot de passe actuel puis votre nouveau.</label>
                            <div class="modal-body">
                                <span class="badge badge-secondary col-auto">Ancien</span>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&#128275</div>
                                    </div>
                                    <input type="password" class="form-control" id="" placeholder="ancien" name="ancien">
                                </div>
                                <span class="badge badge-secondary col-auto mt-2">Nouveau</span>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">&#128274</div>
                                    </div>
                                    <input type="password" class="form-control" id="" placeholder="nouveau" name="nouveau">
                                </div>  
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-success" name="Changer">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>