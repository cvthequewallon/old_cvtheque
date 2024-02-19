<?php
$controleur = new controlleurGestionModeleajouter();
$ProfClasse = $controleur->RecupClassesProf($_SESSION['id']);
 ?>
<form action="/gestionmodele?ajouter" method="post">
    <div class="row m-3">
        <div class="col-6">
            <input type="text" class="form-control mt-2" placeholder="MonCv" aria-label="NomCv" value="Mon Cv" name="MonCV">

        </div>
        <div class="col-3">
            <p class="mt-3 text-right">Couleur Cv :</p>
        </div>
        <div class="col-3">
            <input type="color" class="form-control mt-2 form-control-color" id="20" value="#ADD8E6">
        </div>
    </div>

    <div class="row">
        <div class="col-6">

            <!-- ==== Gauche ==== -->
            <div class="row">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action" id="list-Img-list" data-bs-toggle="list" href="#list-Img" role="tab" aria-controls="Img">Image</a>
                        <a class="list-group-item list-group-item-action active" id="list-Coordonée-list" data-bs-toggle="list" href="#list-Coordonée" role="tab" aria-controls="Coordonée">Coordonnées</a>
                        <a class="list-group-item list-group-item-action" id="list-Parcoursprofessionnel-list" data-bs-toggle="list" href="#list-Parcoursprofessionnel" role="tab" aria-controls="Parcoursprofessionnel">Parcours professionnel</a>
                        <a class="list-group-item list-group-item-action" id="list-Competences-list" data-bs-toggle="list" href="#list-Competences" role="tab" aria-controls="Competences">Competences</a>
                        <a class="list-group-item list-group-item-action" id="list-Objectif-list" data-bs-toggle="list" href="#list-Objectif" role="tab" aria-controls="Objectif">Objectif</a>
                        <a class="list-group-item list-group-item-action" id="list-langues-list" data-bs-toggle="list" href="#list-langues" role="tab" aria-controls="langues">Langues</a>
                        <a class="list-group-item list-group-item-action" id="list-Atouts-list" data-bs-toggle="list" href="#list-Atouts" role="tab" aria-controls="Atouts">Atouts</a>
                        <a class="list-group-item list-group-item-action" id="list-Informatique-list" data-bs-toggle="list" href="#list-Informatique" role="tab" aria-controls="Informatique">Informatique</a>
                        <a class="list-group-item list-group-item-action" id="list-Centredinteret-list" data-bs-toggle="list" href="#list-Centredinteret" role="tab" aria-controls="Centredinteret">Centre d'intérêt</a>
                        <a class="list-group-item list-group-item-action" id="list-PDF-list" data-bs-toggle="list" href="#list-PDF" role="tab" aria-controls="PDF">Sauvegarde</a>
                    </div>
                </div>
                <div class="col-8 user-select-none">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active mt-3" id="list-Coordonée" role="tabpanel" aria-labelledby="list-Coordonée-list">
                            <h4>Coordonnées</h4>
                            <!-- === Debut From Coordonée === -->
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeProfilheight" name="rangeProfilheight" min="0" max="840" step="0.5" value="160" />
                                </div>
                                <div class="col">
                                    <label>Alignement Hauteur</label>
                                </div>
                            </div>
                            <div class="row mt-3">

                                <div class="col">
                                    <input type="range" class="rangeProfilwidth" name="rangeProfilwidth" min="0" max="594" step="0.5" value="438" />
                                </div>
                                <div class="col">
                                    <label>Alignement Largeur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeProfilleft" name="rangeProfilleft" min="0" max="594" step="0.5" value="160" />
                                </div>
                                <div class="col">
                                    <label>Alignement Horizontal</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeProfiltop" name="rangeProfiltop" min="0" max="840" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Vetrical</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur de Fond</label>
                                    <input type="color" onclick="changerCouleurProfil()" class="form-control mt-2 form-control-color" name="ProfilCoulleur" id="ProfilCoulleur" value="#ADADAD">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur Text</label>
                                    <input type="color" onclick="changerCouleurTextProfil()" class="form-control mt-2 form-control-color" name="ProfilTextCoulleur" id="ProfilTextCoulleur" value="#000000">
                                </div>
                            </div>
                            <!-- === Fin From Coordonée === -->
                        </div>
                        <div class="tab-pane fade mt-3" id="list-Objectif" role="tabpanel" aria-labelledby="list-Objectif-list">
                            <h4>Objectif</h4>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeObjectifheight" id="rangeObjectifheight" name="rangeObjectifheight" min="0" max="840" step="0.5" value="160" />
                                </div>
                                <div class="col">
                                    <label>Alignement Hauteur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeObjectifwidth" name="rangeObjectifwidth" min="0" max="594" step="0.5" value="594" />
                                </div>
                                <div class="col">
                                    <label>Alignement Largeur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeObjectifleft" name="rangeObjectifleft" min="0" max="594" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Horizontal</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeObjectiftop" name="rangeObjectiftop" min="0" max="840" step="0.5" value="680" />
                                </div>
                                <div class="col">
                                    <label>Alignement Vetrical</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur de Fond</label>
                                    <input type="color" onclick="changerCouleurObjectif()" name="ObjectifCoulleur" class="form-control mt-2 form-control-color" id="ObjectifCoulleur" value="#ADADAD">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur de Fond</label>
                                    <input type="color" onclick="changerCouleurTextObjectif()" name="ObjectifTextCoulleur" class="form-control mt-2 form-control-color" id="ObjectifTextCoulleur" value="#000000">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button type="button" onclick="ajouteroptionObjectif()" class="btn btn-primary mb-2">Ajouter le Formulaire objectif</button>
                                </div>
                                <div class="col">
                                    <button type="button" onclick="suprimeroptionObjectif()" class="btn btn-primary mb-2">Supprimer le Formulaire objectif</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade m-3" id="list-Parcoursprofessionnel" role="tabpanel" aria-labelledby="list-Parcoursprofessionnel-list">
                            <h4>Parcours professionnel</h4>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeParcoursheight" name="rangeParcoursheight" min="0" max="840" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Hauteur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeParcourswidth" name="rangeParcourswidth" min="0" max="594" step="0.5" value="297" />
                                </div>
                                <div class="col">
                                    <label>Alignement Largeur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeParcoursleft" name="rangeParcoursleft" min="0" max="594" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Horizontal</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeParcourstop" name="rangeParcourstop" min="0" max="840" step="0.5" value="160" />
                                </div>
                                <div class="col">
                                    <label>Alignement Vetrical</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur de Fond</label>
                                    <input type="color" onclick="changerCouleurParcours()" class="form-control mt-2 form-control-color" name="ParcoursCouleur" id="ParcoursCoulleur" value="#FFFFFF">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur de Text</label>
                                    <input type="color" onclick="changerCouleurTextParcours()" class="form-control mt-2 form-control-color" name="ParcoursTextCoulleur" id="ParcoursTextCoulleur" value="#000000">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button type="button" onclick="ajouteroptionParcours()" class="btn btn-primary mb-2">Ajouter le formulaire parcours professionnels</button>
                                </div>
                                <div class="col">
                                    <button type="button" onclick="suprimeroptionParcours()" class="btn btn-primary mb-2">Supprimer le formulaire parcours professionnels</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" id="list-Competences" role="tabpanel" aria-labelledby="list-Competences-list">
                            <h4>Competences</h4>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeCompetencesheight" name="rangeCompetencesheight" min="0" max="840" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Hauteur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeCompetenceswidth" name="rangeCompetenceswidth" min="0" max="594" step="0.5" value="297" />
                                </div>
                                <div class="col">
                                    <label>Alignement Largeur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeCompetencesleft" name="rangeCompetencesleft" min="0" max="594" step="0.5" value="297" />
                                </div>
                                <div class="col">
                                    <label>Alignement Horizontal</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeCompetencestop" name="rangeCompetencestop" min="0" max="840" step="0.5" value="190" />
                                </div>
                                <div class="col">
                                    <label>Alignement Vetrical</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur de Fond</label>
                                    <input type="color" onclick="changerCouleurCompetences()" name="CompetencesCoulleur" class="form-control mt-2 form-control-color" id="CompetencesCoulleur" value="#FFFFFF">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur de Text</label>
                                    <input type="color" onclick="changerCouleurTextCompetences()" name="CompetencesTextCoulleur" class="form-control mt-2 form-control-color" id="CompetencesTextCoulleur" value="#000000">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button type="button" onclick="ajouteroptionCompetences()" class="btn btn-primary mb-2">Ajouter le formulaire competences</button>
                                </div>
                                <div class="col">
                                    <button type="button" onclick="suprimeroptionCompetences()" class="btn btn-primary mb-2">Supprimer le formulaire competences</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" id="list-Img" role="tabpanel" aria-labelledby="list-Img-list">
                            <h4>Image</h4>
                            <div class="row mt-3">
                                <div class="col">
                                <input type="range" class="rangeImageheight" name="rangeImageheight" min="0" max="840" step="0.5" value="160" />
                                </div>
                                <div class="col">
                                    <label>Alignement Hauteur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                <input type="range" class="rangeImagewidth" name="rangeImagewidth" min="0" max="594" step="0.5" value="160" />
                                </div>
                                <div class="col">
                                    <label>Alignement Largeur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeImageleft" name="rangeImageleft" min="0" max="594" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Horizontal</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeImagetop" name="rangeImagetop" min="0" max="840" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Vetrical</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur de Fond</label>
                                    <input type="color" onclick="changerImageCouleur()" class="form-control mt-2 form-control-color" name="changerCouleurImage" id="changerCouleurImage" value="#ADADAD">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" id="list-PDF" role="tabpanel" aria-labelledby="list-PDF-list">
                            <h4>Assigner le modèle à une ou des classe(s)</h4>
                            <div class="row mt-3">
                                <div class="col">
                                    <?php foreach($ProfClasse as $Classe): ?>
                                        <label><?= $Classe['Classe']; ?></label>
                                        <input type="checkbox" name="UneClasse<?= $Classe['id']; ?>" value="<?= $Classe['id'] ?>"><br>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <h4>Enregistrer</h4>
                            <div class="row mt-3">
                                <div class="col">
                                    <center><button name="Enregistrer" type="submit" class="btn btn-danger">Enregistrer</button></center>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" id="list-langues" role="tabpanel" aria-labelledby="list-langues-list">
                            <h4>Langues</h4>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangelanguesheight" name="rangelanguesheight" min="0" max="840" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Hauteur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangelangueswidth" name="rangelangueswidth" min="0" max="594" step="0.5" value="135" />
                                </div>
                                <div class="col">
                                    <label>Alignement Largeur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangelanguesleft" name="rangelanguesleft" min="0" max="594" step="0.5" value="320" />
                                </div>
                                <div class="col">
                                    <label>Alignement Horizontal</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangelanguestop" name="rangelanguestop" min="0" max="840" step="0.5" value="385" />
                                </div>
                                <div class="col">
                                    <label>Alignement Vetrical</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur de Fond</label>
                                    <input type="color" onclick="changerCouleurFonlangue()" name="changerCouleurlangues" class="form-control mt-2 form-control-color" id="changerCouleurlangues" value="#FFFFFF">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur text</label>
                                    <input type="color" onclick="changerCouleurTextmdr()" name="changerCouleurlanguetext" class="form-control mt-2 form-control-color" id="changerCouleurlanguetext" value="#000000">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button type="button" onclick="ajouteroptionlangues()" class="btn btn-primary mb-2">Ajouter le formulaire langues</button>
                                </div>
                                <div class="col">
                                    <button type="button" onclick="suprimeroptionlangues()" class="btn btn-primary mb-2">Supprimer le formulaire langues</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" id="list-Atouts" role="tabpanel" aria-labelledby="list-Atouts-list">
                            <h4>Atouts</h4>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeAtoutsheight" name="rangeAtoutsheight" min="0" max="840" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Hauteur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeAtoutswidth" name="rangeAtoutswidth" min="0" max="594" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Largeur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeAtoutsleft" name="rangeAtoutsleft" min="0" max="594" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Horizontal</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeAtoutstop" name="rangeAtoutstop" min="0" max="840" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Vetrical</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur de Fond</label>
                                    <input type="color" onclick="changerCouleurAtouts()" name="AtoutsCoulleur" class="form-control mt-2 form-control-color" id="AtoutsCoulleur" value="#000000">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur de Fond</label>
                                    <input type="color" onclick="changerCouleurTextAtouts()" name="AtoutsTextCoulleur" class="form-control mt-2 form-control-color" id="AtoutsTextCoulleur" value="#FFFFFF">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button type="button" onclick="ajouteroptionAtouts()" class="btn btn-primary mb-2">Ajouter le formulaire atouts</button>
                                </div>
                                <div class="col">
                                    <button type="button" onclick="suprimeroptionAtouts()" class="btn btn-primary mb-2">Supprimer le formulaire atouts</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" id="list-Informatique" role="tabpanel" aria-labelledby="list-Informatique-list">
                            <h4>Informatique </h4>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeInformatiqueheight" name="rangeInformatiqueheight" min="0" max="840" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Hauteur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeInformatiquewidth" name="rangeInformatiquewidth" min="0" max="594" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Largeur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeInformatiqueleft" name="rangeInformatiqueleft" min="0" max="594" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Horizontal</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeInformatiquetop" name="rangeInformatiquetop" min="0" max="840" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Vetrical</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur de Fond</label>
                                    <input type="color" onclick="changerCouleurInformatique()" class="form-control mt-2 form-control-color" name="InformatiqueCoulleur" id="InformatiqueCoulleur" value="#000000">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur Text</label>
                                    <input type="color" onclick="changerCouleurTextInformatique()" class="form-control mt-2 form-control-color" name="InformatiqueTextCoulleur" id="InformatiqueTextCoulleur" value="#FFFFFF">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button type="button" onclick="ajouteroptionInformatique()" class="btn btn-primary mb-2">Ajouter le formulaire informatique</button>
                                </div>
                                <div class="col">
                                    <button type="button" onclick="suprimeroptionInformatique()" class="btn btn-primary mb-2">Supprimer le formulaire informatique</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" id="list-Centredinteret" role="tabpanel" aria-labelledby="list-Centredinteret-list">
                            <h4>Centre d'intérêt</h4>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeCentredinteretheight" name="rangeCentredinteretheight" min="0" max="840" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Hauteur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeCentredinteretwidth" name="rangeCentredinteretwidth" min="0" max="594" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Largeur</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeCentredinteretleft" name="rangeCentredinteretleft" min="0" max="594" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Horizontal</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="range" class="rangeCentredinterettop" name="rangeCentredinterettop" min="0" max="840" step="0.5" value="0" />
                                </div>
                                <div class="col">
                                    <label>Alignement Vetrical</label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur de Fond</label>
                                    <input type="color" onclick="changerCouleurCentredinteret()" class="form-control mt-2 form-control-color" name="CentredinteretCoulleur" id="CentredinteretCoulleur" value="#000000">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label>Couleur Text</label>
                                    <input type="color" onclick="changerCouleurTextCentredinteret()" class="form-control mt-2 form-control-color" name="CentredinteretTextCoulleur" id="CentredinteretTextCoulleur" value="#FFFFFF">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button type="button" onclick="ajouteroptionCentredinteret()" class="btn btn-primary mb-2">Ajouter le formulaire centre d'interet</button>
                                </div>
                                <div class="col">
                                    <button type="button" onclick="suprimeroptionCentredinteret()" class="btn btn-primary mb-2">Supprimer le formulaire centre d'interet</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ==== Fin Gauche ==== -->
        </div>
        <div class="col-6">
            <div class="row " id="corpcv">
                <div id="corpcvblanc">
                <divtest style="width:100%; height:100%; display:block;">
                        <divImage style="background-color:#ADADAD; position:absolute;  height:160px; width:160px; margin-left: 0px;margin-top: 0px;"><img id="photo_upload" style="width: 150px;height: 150px;margin:3%" class="border border-secondary"/></divImage>
                        <divProfil style="background-color:#ADADAD; position:absolute;  height:160px; width:438px; margin-left: 160px;margin-top: 0px;"><Nom style="font-size:90%;">Nom</Nom><prenom style="font-size:90%;">Prenom</prenom><br>Tel: <Tel style="font-size:70%;">06 ** ** ** **</Tel><br>Adresse: <br><Adresse style="font-size:70%;">5 Rue de Paris</Adresse><br><ville style="font-size:70%;">Valenciennes</ville><cp style="font-size:70%;">59700</cp><br>Email: <Email style="font-size:70%;">Test.test@gmail.com</Email><br><Permis></Permis></divProfil>
                        <divObjectif style="background-color:#ADADAD; position:absolute;  height:160px; width:594px; margin-left: 0px;margin-top: 680px;"><p style="margin-top: 50px;">Objectif</p><div style="line-height:10px;"><Objectif style=" margin-top:10px;font-size:70%;">Description de ton Objectif</Objectif><br></div></divObjectif>
                        <divParcour style="background-color:#000000; position:absolute;  height:0px; width:297px; margin-left: 0px;margin-top: 160px;"><p style="margin-top: 10px;"> Parcours professionnel</p><div class="row"><div class="col" style="line-height:20px;"><Debut style="font-size:70%;">Date debut</Debut><br><Fin style="font-size:70%;">Date Fin</Fin></div><div class="col" style="line-height:20px;"><Entreprise style="font-size:70%;">entreprise d accueil</Entreprise><br><VilleP style="font-size:70%;">Ville</VilleP><br><Fonction style="font-size:70%;">Fonction</Fonction></div></div><div style="line-height:10px;"><DescriptionP style="font-size:70%;">Description</DescriptionP><br><br></div><div class="row"><div class="col" style="line-height:20px;"><Debut2 style="font-size:70%;">Date debut</Debut2><br><Fin2 style="font-size:70%;">Date Fin</Fin2></div><div class="col" style="line-height:20px;"><Entreprise2 style="font-size:70%;">entreprise d accueil</Entreprise2><br><VilleP2 style="font-size:70%;">Ville</VilleP2><br><Fonction2 style="font-size:70%;">Fonction</Fonction2></div></div><div style="line-height:10px;"><DescriptionP2 style="font-size:70%;">Description</DescriptionP2><br><br></div><div class="row"><div class="col" style="line-height:20px;"><Debut3 style="font-size:70%;">Date Debut</Debut3><br><Fin3 style="font-size:70%;">Date Fin</Fin3><Fonction3 style="font-size:70%;">Fonction</Fonction3></div><div class="col" style="line-height:20px;"><Entreprise3 style="font-size:70%;">entreprise d accueil</Entreprise3><br><br></div></div><div style="line-height:10px;"><DescriptionP3 style="font-size:70%;">Description</DescriptionP3><br><br></div></divParcour>
                        <divCompetences style="background-color:#000000; position:absolute;  height:0px; width:297px; margin-left: 320px;margin-top: 190px;">Competences<p style="line-height:10px;"><Competence style="font-size:60%;">Competences</Competence><a1 style="font-size:60%;"> :</a1><br><Competencev2 style="font-size:70% ;">Acquis</Competencev2><br><br><Competence2 style="font-size:70%;">Competences</Competence2><a1 style="font-size:60%;"> :</a1><br><Competence2v2 style="font-size:70%;">Acquis</Competence2v2><br><br><Competence3 style="font-size:70%;">Competences</Competence3><a1 style="font-size:60%;"> :</a1><br><Competence3v2 style="font-size:70%;">Acquis</Competence3v2><br><br> <Competence4 style="font-size:70%;">Competences</Competence4><a1 style="font-size:60%;"> :</a1><br><Competence4v2 style="font-size:70%;">Acquis</Competence4v2><br><br></p></divCompetences>
                    </divtest>
                </div>
            </div>
        </div>
        <!-- ==== Fin Droit ==== -->
    </div>
</form>
<?php
if (isset($_POST['Enregistrer'])) {
    $NomCV = filter_input(INPUT_POST, 'MonCV', FILTER_SANITIZE_STRING);

    $rangeImageheight = filter_input(INPUT_POST, 'rangeImageheight', FILTER_SANITIZE_STRING);
    $rangeImagewidth = filter_input(INPUT_POST, 'rangeImagewidth', FILTER_SANITIZE_STRING);
    $rangeImageleft = filter_input(INPUT_POST, 'rangeImageleft', FILTER_SANITIZE_STRING);
    $rangeImagetop = filter_input(INPUT_POST, 'rangeImagetop', FILTER_SANITIZE_STRING);
    $changerCouleurImage = filter_input(INPUT_POST, 'changerCouleurImage', FILTER_SANITIZE_STRING);

    $rangeProfilheight = filter_input(INPUT_POST, 'rangeProfilheight', FILTER_SANITIZE_STRING);
    $rangeProfilwidth = filter_input(INPUT_POST, 'rangeProfilwidth', FILTER_SANITIZE_STRING);
    $rangeProfilleft = filter_input(INPUT_POST, 'rangeProfilleft', FILTER_SANITIZE_STRING);
    $rangeProfiltop = filter_input(INPUT_POST, 'rangeProfiltop', FILTER_SANITIZE_STRING);
    $ProfilCoulleur = filter_input(INPUT_POST, 'ProfilCoulleur', FILTER_SANITIZE_STRING);
    $ProfilTextCoulleur = filter_input(INPUT_POST, 'ProfilTextCoulleur', FILTER_SANITIZE_STRING);

    $CorpCv = '<divImage style="background-color:'.$changerCouleurImage.'; position:absolute;  height:'.$rangeImageheight.'px; width:'.$rangeImagewidth.'px; margin-left: '.$rangeImageleft.'px;margin-top: '.$rangeImagetop.'px;"><img id="photo_upload" style="width: 150px;height: 150px;margin:3%" class="border border-secondary"/></divImage>
    <divProfil style="background-color:'.$ProfilCoulleur.';color:'.$ProfilTextCoulleur.'; position:absolute;  height:'.$rangeProfilheight.'px; width:'.$rangeProfilwidth.'px; margin-left: '.$rangeProfilleft.'px;margin-top: '.$rangeProfiltop.'px;"><Nom style="font-size:90%;">Nom</Nom><prenom style="font-size:90%;">Prenom</prenom><br>Tel: <Tel style="font-size:70%;">06 ** ** ** **</Tel><br>Adresse: <br><Adresse style="font-size:70%;">5 Rue de Paris</Adresse><br><ville style="font-size:70%;">Valenciennes</ville><cp style="font-size:70%;">59700</cp><br>Email: <Email style="font-size:70%;">Test.test@gmail.com</Email><br><Permis></Permis></divProfil>';
    
    $rangeObjectifheight = filter_input(INPUT_POST, 'rangeObjectifheight', FILTER_SANITIZE_STRING);
    $rangeObjectifwidth = filter_input(INPUT_POST, 'rangeObjectifwidth', FILTER_SANITIZE_STRING);
    $rangeObjectifleft = filter_input(INPUT_POST, 'rangeObjectifleft', FILTER_SANITIZE_STRING);
    $rangeObjectiftop = filter_input(INPUT_POST, 'rangeObjectiftop', FILTER_SANITIZE_STRING);
    $ObjectifCoulleur = filter_input(INPUT_POST, 'ObjectifCoulleur', FILTER_SANITIZE_STRING);
    $ObjectifTextCoulleur = filter_input(INPUT_POST, 'ObjectifTextCoulleur', FILTER_SANITIZE_STRING);
    
    if(!($rangeObjectifheight == 0 && $rangeObjectifwidth == 0 && $rangeObjectifleft == 0 && $rangeObjectiftop == 0)){
        $CorpCv = $CorpCv.'<divObjectif style="background-color:'.$ObjectifCoulleur.';color:'.$ObjectifTextCoulleur.'; position:absolute;  height:'.$rangeObjectifheight.'px; width:'.$rangeObjectifwidth.'px; margin-left: '.$rangeObjectifleft.'px;margin-top: '.$rangeObjectiftop.'px;"><p style="margin-top: 50px;">Objectif</p><div style="line-height:10px;"><Objectif style=" margin-top:10px;font-size:70%;">Description de ton Objectif</Objectif><br></div></divObjectif>';
    }
    
    $rangeParcoursheight = filter_input(INPUT_POST, 'rangeParcoursheight', FILTER_SANITIZE_STRING);
    $rangeParcourswidth = filter_input(INPUT_POST, 'rangeParcourswidth', FILTER_SANITIZE_STRING);
    $rangeParcoursleft = filter_input(INPUT_POST, 'rangeParcoursleft', FILTER_SANITIZE_STRING);
    $rangeParcourstop = filter_input(INPUT_POST, 'rangeParcourstop', FILTER_SANITIZE_STRING);
    $CouleurParcours = filter_input(INPUT_POST, 'ParcoursCouleur', FILTER_SANITIZE_STRING);
    $ParcoursTextCoulleur = filter_input(INPUT_POST, 'ParcoursTextCoulleur', FILTER_SANITIZE_STRING);

    if(!($rangeParcoursheight == 0 && $rangeParcourswidth == 0 && $rangeParcoursleft == 0 && $rangeParcourstop == 0)){
        $CorpCv = $CorpCv.'<divParcour style="background-color:'.$CouleurParcours.';color:'.$ParcoursTextCoulleur.'; position:absolute;  height:'.$rangeParcoursheight.'px; width:'.$rangeParcourswidth.'px; margin-left: '.$rangeParcoursleft.'px;margin-top: '.$rangeParcourstop.'px;"><p style="margin-top: 10px;"> Parcours professionnel</p><div class="row"><div class="col" style="line-height:20px;"><Debut style="font-size:70%;">Date debut</Debut><br><Fin style="font-size:70%;">Date Fin</Fin></div><div class="col" style="line-height:20px;"><Entreprise style="font-size:70%;">entreprise d accueil</Entreprise><br><VilleP style="font-size:70%;">Ville</VilleP><br><Fonction style="font-size:70%;">Fonction</Fonction></div></div><div style="line-height:10px;"><DescriptionP style="font-size:70%;">Description</DescriptionP><br><br></div><div class="row"><div class="col" style="line-height:20px;"><Debut2 style="font-size:70%;">Date debut</Debut2><br><Fin2 style="font-size:70%;">Date Fin</Fin2></div><div class="col" style="line-height:20px;"><Entreprise2 style="font-size:70%;">entreprise d accueil</Entreprise2><br><VilleP2 style="font-size:70%;">Ville</VilleP2><br><Fonction2 style="font-size:70%;">Fonction</Fonction2></div></div><div style="line-height:10px;"><DescriptionP2 style="font-size:70%;">Description</DescriptionP2><br><br></div><div class="row"><div class="col" style="line-height:20px;"><Debut3 style="font-size:70%;">Date Debut</Debut3><br><Fin3 style="font-size:70%;">Date Fin</Fin3><Fonction3 style="font-size:70%;">Fonction</Fonction3></div><div class="col" style="line-height:20px;"><Entreprise3 style="font-size:70%;">entreprise d accueil</Entreprise3><br><br></div></div><div style="line-height:10px;"><DescriptionP3 style="font-size:70%;">Description</DescriptionP3><br><br></div></divParcour>';
    }

    $rangelanguesheight = filter_input(INPUT_POST, 'rangelanguesheight', FILTER_SANITIZE_STRING);
    $rangelangueswidth = filter_input(INPUT_POST, 'rangelangueswidth', FILTER_SANITIZE_STRING);
    $rangelanguesleft = filter_input(INPUT_POST, 'rangelanguesleft', FILTER_SANITIZE_STRING);
    $rangelanguestop = filter_input(INPUT_POST, 'rangelanguestop', FILTER_SANITIZE_STRING);
    $changerCouleurlangues = filter_input(INPUT_POST, 'changerCouleurlangues', FILTER_SANITIZE_STRING);
    $changerCouleurlanguetext = filter_input(INPUT_POST, 'changerCouleurlanguetext', FILTER_SANITIZE_STRING);

    if(!($rangelanguesheight == 0 && $rangelangueswidth == 0 && $rangelanguesleft == 0 && $rangelanguestop == 0)){
        $CorpCv = $CorpCv.'<divlangues style="background-color:'.$changerCouleurlangues.';color:'.$changerCouleurlanguetext.'; position:absolute;  height:'.$rangelanguesheight.'px; width:'.$rangelangueswidth.'px; margin-left: '.$rangelanguesleft.'px;margin-top: '.$rangelanguestop.'px;">Langues<p style="line-height:10px;"><Langues style="font-size:60%;"></Langues> <NiveauxLangues style="font-size:60%;"></NiveauxLangues></br><Langues2 style="font-size:60%;"></Langues2> <NiveauxLangues2 style="font-size:60%;"></NiveauxLangues2></br><Langues3 style="font-size:60%;"></Langues3> <NiveauxLangues3 style="font-size:60%;"></NiveauxLangues3></p></divlangues>';
    }

    $rangeCompetencesheight = filter_input(INPUT_POST, 'rangeCompetencesheight', FILTER_SANITIZE_STRING);
    $rangeCompetenceswidth = filter_input(INPUT_POST, 'rangeCompetenceswidth', FILTER_SANITIZE_STRING);
    $rangeCompetencesleft = filter_input(INPUT_POST, 'rangeCompetencesleft', FILTER_SANITIZE_STRING);
    $rangeCompetencestop = filter_input(INPUT_POST, 'rangeCompetencestop', FILTER_SANITIZE_STRING);
    $CompetencesCoulleur = filter_input(INPUT_POST, 'CompetencesCoulleur', FILTER_SANITIZE_STRING);
    $CompetencesTextCoulleur = filter_input(INPUT_POST, 'CompetencesTextCoulleur', FILTER_SANITIZE_STRING);

    if(!($rangeCompetencesheight == 0 && $rangeCompetenceswidth == 0 && $rangeCompetencesleft == 0 && $rangeCompetencestop == 0)){
        $CorpCv = $CorpCv.'<divCompetences style="background-color:'.$CompetencesCoulleur.';color:'.$CompetencesTextCoulleur.'; position:absolute;  height:'.$rangeCompetencesheight.'px; width:'.$rangeCompetenceswidth.'px; margin-left: '.$rangeCompetencesleft.'px;margin-top: '.$rangeCompetencestop.'px;">Competences<p style="line-height:10px;"><Competence style="font-size:60%;">Competences</Competence><a1 style="font-size:60%;"> :</a1><br><Competencev2 style="font-size:70% ;">Acquis</Competencev2><br><br><Competence2 style="font-size:70%;">Competences</Competence2><a1 style="font-size:60%;"> :</a1><br><Competence2v2 style="font-size:70%;">Acquis</Competence2v2><br><br><Competence3 style="font-size:70%;">Competences</Competence3><a1 style="font-size:60%;"> :</a1><br><Competence3v2 style="font-size:70%;">Acquis</Competence3v2><br><br> <Competence4 style="font-size:70%;">Competences</Competence4><a1 style="font-size:60%;"> :</a1><br><Competence4v2 style="font-size:70%;">Acquis</Competence4v2><br><br></p></divCompetences>';
    }

    $rangeAtoutsheight = filter_input(INPUT_POST, 'rangeAtoutsheight', FILTER_SANITIZE_STRING);
    $rangeAtoutswidth = filter_input(INPUT_POST, 'rangeAtoutswidth', FILTER_SANITIZE_STRING);
    $rangeAtoutsleft = filter_input(INPUT_POST, 'rangeAtoutsleft', FILTER_SANITIZE_STRING);
    $rangeAtoutstop = filter_input(INPUT_POST, 'rangeAtoutstop', FILTER_SANITIZE_STRING);
    $AtoutsCoulleur = filter_input(INPUT_POST, 'AtoutsCoulleur', FILTER_SANITIZE_STRING);
    $AtoutsTextCoulleur = filter_input(INPUT_POST, 'AtoutsTextCoulleur', FILTER_SANITIZE_STRING);

    if(!($rangeAtoutsheight == 0 && $rangeAtoutswidth == 0 && $rangeAtoutsleft == 0 && $rangeAtoutstop == 0)){
        $CorpCv = $CorpCv.'<divAtouts style="background-color:'.$AtoutsCoulleur.';color:'.$AtoutsTextCoulleur.'; position:absolute;  height:'.$rangeAtoutsheight.'px; width:'.$rangeAtoutswidth.'px; margin-left: '.$rangeAtoutsleft.'px;margin-top: '.$rangeAtoutstop.'px;">Atouts<p style="margin-top: 10px;"><Atout style="font-size:60%;"></Atout></br><Atout2 style="font-size:60%"></Atout2></br><Atout3 style="font-size:60%"></Atout3></p></divAtouts>';
    }

    $rangeInformatiqueheight = filter_input(INPUT_POST, 'rangeInformatiqueheight', FILTER_SANITIZE_STRING);
    $rangeInformatiquewidth = filter_input(INPUT_POST, 'rangeInformatiquewidth', FILTER_SANITIZE_STRING);
    $rangeInformatiqueleft = filter_input(INPUT_POST, 'rangeInformatiqueleft', FILTER_SANITIZE_STRING);
    $rangeInformatiquetop = filter_input(INPUT_POST, 'rangeInformatiquetop', FILTER_SANITIZE_STRING);
    $InformatiqueCoulleur = filter_input(INPUT_POST, 'InformatiqueCoulleur', FILTER_SANITIZE_STRING);
    $InformatiqueTextCoulleur = filter_input(INPUT_POST, 'InformatiqueTextCoulleur', FILTER_SANITIZE_STRING);

    if(!($rangeInformatiqueheight == 0 && $rangeInformatiquewidth == 0 && $rangeInformatiqueleft == 0 && $rangeInformatiquetop == 0)){
        $CorpCv = $CorpCv.'<divInformatique style="background-color:'.$InformatiqueCoulleur.';color:'.$InformatiqueTextCoulleur.'; position:absolute;  height:'.$rangeInformatiqueheight.'px; width:'.$rangeInformatiquewidth.'px; margin-left: '.$rangeInformatiqueleft.'px;margin-top: '.$rangeInformatiquetop.'px;">Informatique<p style="margin-top: 10px;"><Informatique style="font-size:60%"></Informatique></br><Informatique2 style="font-size:60%"></Informatique2></br><Informatique3 style="font-size:60%"></Informatique3></p></divInformatique>';
    }

    $rangeCentredinteretheight = filter_input(INPUT_POST, 'rangeCentredinteretheight', FILTER_SANITIZE_STRING);
    $rangeCentredinteretwidth = filter_input(INPUT_POST, 'rangeCentredinteretwidth', FILTER_SANITIZE_STRING);
    $rangeCentredinteretleft = filter_input(INPUT_POST, 'rangeCentredinteretleft', FILTER_SANITIZE_STRING);
    $rangeCentredinterettop = filter_input(INPUT_POST, 'rangeCentredinterettop', FILTER_SANITIZE_STRING);
    $CentredinteretCoulleur = filter_input(INPUT_POST, 'CentredinteretCoulleur', FILTER_SANITIZE_STRING);
    $CentredinteretTextCoulleur = filter_input(INPUT_POST, 'CentredinteretTextCoulleur', FILTER_SANITIZE_STRING);

    if(!($rangeCentredinteretheight == 0 && $rangeCentredinteretwidth == 0 && $rangeCentredinteretleft == 0 && $rangeCentredinterettop == 0)){
        $CorpCv = $CorpCv.'<divCentredinteret style="background-color:'.$CentredinteretCoulleur.';color:'.$CentredinteretTextCoulleur.'; position:absolute;  height:'.$rangeCentredinteretheight.'px; width:'.$rangeCentredinteretwidth.'px; margin-left: '.$rangeCentredinteretleft.'px;margin-top: '.$rangeCentredinterettop.'px;">Centre dintêret<p style="font-size: 10px;"><interet style="font-size:60%"></interet></br><interet2 style="font-size:60%"></interet2></br><interet3 style="font-size:60%"></interet3></p></divCentredinteret>';
    }

    $Envoyer = new controlleurGestionModeleajouter();
    $controlleur = $Envoyer->bddInsertionModelCv($CorpCv, $NomCV, $_SESSION['id']);
    echo $CorpCv;
}
?>
<script>
    //===================================================
    $(document).ready(function() {

        $('.rangeProfilheight').next(); // Valeur par défaut
        $('.rangeProfilheight').on('input', function() {
            var $set = $(this).val();
            $("divProfil").css('height', $set + "px");
        });
        $('.rangeProfilwidth').next(); // Valeur par défaut
        $('.rangeProfilwidth').on('input', function() {
            var $set = $(this).val();
            $("divProfil").css('width', $set + "px");
        });
        $('.rangeProfilleft').next(); // Valeur par défaut
        $('.rangeProfilleft').on('input', function() {
            var $set = $(this).val();
            $("divProfil").css('margin-left', $set + "px");
        });
        $('.rangeProfiltop').next(); // Valeur par défaut
        $('.rangeProfiltop').on('input', function() {
            var $set = $(this).val();
            $("divProfil").css('margin-top', $set + "px");
        });

        $('.rangeObjectifheight').next(); // Valeur par défaut
        $('.rangeObjectifheight').on('input', function() {
            var $set = $(this).val();
            $("divObjectif").css('height', $set + "px");
        });
        $('.rangeObjectifwidth').next(); // Valeur par défaut
        $('.rangeObjectifwidth').on('input', function() {
            var $set = $(this).val();
            $("divObjectif").css('width', $set + "px");
        });
        $('.rangeObjectifleft').next(); // Valeur par défaut
        $('.rangeObjectifleft').on('input', function() {
            var $set = $(this).val();
            $("divObjectif").css('margin-left', $set + "px");
        });
        $('.rangeObjectiftop').next(); // Valeur par défaut
        $('.rangeObjectiftop').on('input', function() {
            var $set = $(this).val();
            $("divObjectif").css('margin-top', $set + "px");
        });

        $('.rangeParcoursheight').next(); // Valeur par défaut
        $('.rangeParcoursheight').on('input', function() {
            var $set = $(this).val();
            $("divParcour").css('height', $set + "px");
        });
        $('.rangeParcourswidth').next(); // Valeur par défaut
        $('.rangeParcourswidth').on('input', function() {
            var $set = $(this).val();
            $("divParcour").css('width', $set + "px");
        });
        $('.rangeParcoursleft').next(); // Valeur par défaut
        $('.rangeParcoursleft').on('input', function() {
            var $set = $(this).val();
            $("divParcour").css('margin-left', $set + "px");
        });
        $('.rangeParcourstop').next(); // Valeur par défaut
        $('.rangeParcourstop').on('input', function() {
            var $set = $(this).val();
            $("divParcour").css('margin-top', $set + "px");
        });

        $('.rangeCompetencesheight').next(); // Valeur par défaut
        $('.rangeCompetencesheight').on('input', function() {
            var $set = $(this).val();
            $("divCompetences").css('height', $set + "px");
        });
        $('.rangeCompetenceswidth').next(); // Valeur par défaut
        $('.rangeCompetenceswidth').on('input', function() {
            var $set = $(this).val();
            $("divCompetences").css('width', $set + "px");
        });
        $('.rangeCompetencesleft').next(); // Valeur par défaut
        $('.rangeCompetencesleft').on('input', function() {
            var $set = $(this).val();
            $("divCompetences").css('margin-left', $set + "px");
        });
        $('.rangeCompetencestop').next(); // Valeur par défaut
        $('.rangeCompetencestop').on('input', function() {
            var $set = $(this).val();
            $("divCompetences").css('margin-top', $set + "px");
        });

        $('.rangeImageheight').next(); // Valeur par défaut
        $('.rangeImageheight').on('input', function() {
            var $set = $(this).val();
            $("divImage").css('height', $set + "px");
        });
        $('.rangeImagewidth').next(); // Valeur par défaut
        $('.rangeImagewidth').on('input', function() {
            var $set = $(this).val();
            $("divImage").css('width', $set + "px");
        });
        $('.rangeImageleft').next(); // Valeur par défaut
        $('.rangeImageleft').on('input', function() {
            var $set = $(this).val();
            $("divImage").css('margin-left', $set + "px");
        });
        $('.rangeImagetop').next(); // Valeur par défaut
        $('.rangeImagetop').on('input', function() {
            var $set = $(this).val();
            $("divImage").css('margin-top', $set + "px");
        });

        $('.rangelanguesheight').next(); // Valeur par défaut
        $('.rangelanguesheight').on('input', function() {
            var $set = $(this).val();
            $("divlangues").css('height', $set + "px");
        });
        $('.rangelangueswidth').next(); // Valeur par défaut
        $('.rangelangueswidth').on('input', function() {
            var $set = $(this).val();
            $("divlangues").css('width', $set + "px");
        });
        $('.rangelanguesleft').next(); // Valeur par défaut
        $('.rangelanguesleft').on('input', function() {
            var $set = $(this).val();
            $("divlangues").css('margin-left', $set + "px");
        });
        $('.rangelanguestop').next(); // Valeur par défaut
        $('.rangelanguestop').on('input', function() {
            var $set = $(this).val();
            $("divlangues").css('margin-top', $set + "px");
        });

        $('.rangeAtoutsheight').next(); // Valeur par défaut
        $('.rangeAtoutsheight').on('input', function() {
            var $set = $(this).val();
            $("divAtouts").css('height', $set + "px");
        });
        $('.rangeAtoutswidth').next(); // Valeur par défaut
        $('.rangeAtoutswidth').on('input', function() {
            var $set = $(this).val();
            $("divAtouts").css('width', $set + "px");
        });
        $('.rangeAtoutsleft').next(); // Valeur par défaut
        $('.rangeAtoutsleft').on('input', function() {
            var $set = $(this).val();
            $("divAtouts").css('margin-left', $set + "px");
        });
        $('.rangeAtoutstop').next(); // Valeur par défaut
        $('.rangeAtoutstop').on('input', function() {
            var $set = $(this).val();
            $("divAtouts").css('margin-top', $set + "px");
        });

        $('.rangeInformatiqueheight').next(); // Valeur par défaut
        $('.rangeInformatiqueheight').on('input', function() {
            var $set = $(this).val();
            $("divInformatique").css('height', $set + "px");
        });
        $('.rangeInformatiquewidth').next(); // Valeur par défaut
        $('.rangeInformatiquewidth').on('input', function() {
            var $set = $(this).val();
            $("divInformatique").css('width', $set + "px");
        });
        $('.rangeInformatiqueleft').next(); // Valeur par défaut
        $('.rangeInformatiqueleft').on('input', function() {
            var $set = $(this).val();
            $("divInformatique").css('margin-left', $set + "px");
        });
        $('.rangeInformatiquetop').next(); // Valeur par défaut
        $('.rangeInformatiquetop').on('input', function() {
            var $set = $(this).val();
            $("divInformatique").css('margin-top', $set + "px");
        });
        
        $('.rangeCentredinteretheight').next(); // Valeur par défaut
        $('.rangeCentredinteretheight').on('input', function() {
            var $set = $(this).val();
            $("divCentredinteret").css('height', $set + "px");
        });
        $('.rangeCentredinteretwidth').next(); // Valeur par défaut
        $('.rangeCentredinteretwidth').on('input', function() {
            var $set = $(this).val();
            $("divCentredinteret").css('width', $set + "px");
        });
        $('.rangeCentredinteretleft').next(); // Valeur par défaut
        $('.rangeCentredinteretleft').on('input', function() {
            var $set = $(this).val();
            $("divCentredinteret").css('margin-left', $set + "px");
        });
        $('.rangeCentredinterettop').next(); // Valeur par défaut
        $('.rangeCentredinterettop').on('input', function() {
            var $set = $(this).val();
            $("divCentredinteret").css('margin-top', $set + "px");
        });
    });

    function changerCouleurFonlangue() {
        var contenu = document.getElementById('changerCouleurlangues').value;
        console.log(contenu);
        var contenu2 = 'divlangues';
        $(contenu2).css('background-color', contenu);
    }

    function changerCouleurInformatique() {
        var contenu = document.getElementById('InformatiqueCoulleur').value;
        console.log(contenu);
        var contenu2 = 'divInformatique';
        $(contenu2).css('background-color', contenu);
    }

    function changerCouleurCentredinteret() {
        var contenu = document.getElementById('CentredinteretCoulleur').value;
        console.log(contenu);
        var contenu2 = 'divCentredinteret';
        $(contenu2).css('background-color', contenu);
    }

    function changerCouleurProfil() {
        var contenu = document.getElementById('ProfilCoulleur').value;
        var contenu2 = 'divProfil';
        $(contenu2).css('background-color', contenu);
    }

    function changerCouleurAtouts() {
        var contenu = document.getElementById('AtoutsCoulleur').value;
        var contenu2 = 'divAtouts';
        $(contenu2).css('background-color', contenu);
    }

    function changerCouleurObjectif() {
        var contenu = document.getElementById('ObjectifCoulleur').value;
        var contenu2 = 'divObjectif';
        $(contenu2).css('background-color', contenu);
    }

    function changerCouleurParcours() {
        var contenu = document.getElementById('ParcoursCoulleur').value;
        var contenu2 = 'divParcour';
        $(contenu2).css('background-color', contenu);
    }

    function changerCouleurCompetences() {
        var contenu = document.getElementById('CompetencesCoulleur').value;
        var contenu2 = 'divCompetences';
        $(contenu2).css('background-color', contenu);
    }

    function changerImageCouleur() {
        var contenu = document.getElementById('changerCouleurImage').value;
        var contenu2 = 'divImage';
        $(contenu2).css('background-color', contenu);
    }

    function changerCouleurTextProfil() {
        var contenu = document.getElementById('ProfilTextCoulleur').value;
        var contenu2 = 'divProfil';
        $(contenu2).css('color', contenu);
    }

    function changerCouleurTextInformatique() {
        var contenu = document.getElementById('InformatiqueTextCoulleur').value;
        var contenu2 = 'divInformatique';
        $(contenu2).css('color', contenu);
    }

    function changerCouleurTextAtouts() {
        var contenu = document.getElementById('AtoutsTextCoulleur').value;
        var contenu2 = 'divAtouts';
        $(contenu2).css('color', contenu);
    }

    function changerCouleurTextmdr() {
        var contenu = document.getElementById('changerCouleurlanguetext').value;
        var contenu2 = 'divlangues';
        $(contenu2).css('color', contenu);
    }

    function changerCouleurTextObjectif() {
        var contenu = document.getElementById('ObjectifTextCoulleur').value;
        var contenu2 = 'divObjectif';
        $(contenu2).css('color', contenu);
    }

    function changerCouleurTextParcours() {
        var contenu = document.getElementById('ParcoursTextCoulleur').value;
        var contenu2 = 'divParcour';
        $(contenu2).css('color', contenu);
    }

    function changerCouleurTextCompetences() {
        var contenu = document.getElementById('CompetencesTextCoulleur').value;
        var contenu2 = 'divCompetences';
        $(contenu2).css('color', contenu);
    }

    function changerCouleurTextCentredinteret() {
        var contenu = document.getElementById('CentredinteretTextCoulleur').value;
        var contenu2 = 'divCentredinteret';
        $(contenu2).css('color', contenu);
    }

    function suprimeroptionObjectif() {
        $('divObjectif').remove();
    }

    function ajouteroptionObjectif() {
        jQuery('divtest').append('<divObjectif style="background-color:#ADADAD; position:absolute;  height:150px; width:320px; margin-left: 100px;margin-top: 0px;"><p style="margin-top: 50px;">Objectif</p><div style="line-height:10px;"><Objectif style=" margin-top:10px;font-size:70%;">Description de ton Objectif</Objectif><br></div></divObjectif>');
    }

    function ajouteroptionParcours() {
        jQuery('divtest').append('<divParcour style="background-color:#117596; position:absolute;  height:0px; width:0px; margin-left: 0px;margin-top: 0px;"><p style="margin-top: 10px;"> Parcours professionnel</p><div class="row"><div class="col" style="line-height:20px;"><Debut style="font-size:70%;">Date debut</Debut><br><Fin style="font-size:70%;">Date Fin</Fin></div><div class="col" style="line-height:20px;"><Entreprise style="font-size:70%;">entreprise d accueil</Entreprise><br><VilleP style="font-size:70%;">Ville</VilleP><br><Fonction style="font-size:70%;">Fonction</Fonction></div></div><div style="line-height:10px;"><DescriptionP style="font-size:70%;">Description</DescriptionP><br><br></div><div class="row"><div class="col" style="line-height:20px;"><Debut2 style="font-size:70%;">Date debut</Debut2><br><Fin2 style="font-size:70%;">Date Fin</Fin2></div><div class="col" style="line-height:20px;"><Entreprise2 style="font-size:70%;">entreprise d accueil</Entreprise2><br><VilleP2 style="font-size:70%;">Ville</VilleP2><br><Fonction2 style="font-size:70%;">Fonction</Fonction2></div></div><div style="line-height:10px;"><DescriptionP2 style="font-size:70%;">Description</DescriptionP2><br><br></div><div class="row"><div class="col" style="line-height:20px;"><Debut3 style="font-size:70%;">Date Debut</Debut3><br><Fin3 style="font-size:70%;">Date Fin</Fin3><Fonction3 style="font-size:70%;">Fonction</Fonction3></div><div class="col" style="line-height:20px;"><Entreprise3 style="font-size:70%;">entreprise d accueil</Entreprise3><br><br></div></div><div style="line-height:10px;"><DescriptionP3 style="font-size:70%;">Description</DescriptionP3><br><br></div></divParcour>');
    }

    function suprimeroptionParcours() {
        $('divParcour').remove();
    }

    function ajouteroptionCompetences() {
        jQuery('divtest').append('<divCompetences style=" background-color:#117596;color: #000000;position: Absolute ;height:46%;width: 50%;margin-left: 50%;margin-top: 77%;">Competences<p style="line-height:10px;"><Competence style="font-size:60%;">Competences</Competence><a1 style="font-size:60%;"></a1><br><Competencev2 style="font-size:70% ;">Acquis</Competencev2><br><br><Competence2 style="font-size:70%;">Competences</Competence2><a1 style="font-size:60%;"></a1><br><Competence2v2 style="font-size:70%;">Acquis</Competence2v2><br><br><Competence3 style="font-size:70%;">Competences</Competence3><a1 style="font-size:60%;"></a1><br><Competence3v2 style="font-size:70%;">Acquis</Competence3v2><br><br> <Competence4 style="font-size:70%;">Competences</Competence4><a1 style="font-size:60%;"></a1><br><Competence4v2 style="font-size:70%;">Acquis</Competence4v2><br><br></p></divCompetences>');
    }

    function suprimeroptionCompetences() {
        $('divCompetences').remove();
    }

    function ajouteroptionlangues() {
        $('divtest').append('<divlangues style="background-color:#117596; position:absolute;  height:100px; width:100px; margin-left: 0px;margin-top: 100px;">Langues<p style="line-height:10px;"><Langues style="font-size:60%;"></Langues> <NiveauxLangues style="font-size:60%;"></NiveauxLangues></br><Langues2 style="font-size:60%;"></Langues2> <NiveauxLangues2 style="font-size:60%;"></NiveauxLangues2></br><Langues3 style="font-size:60%;"></Langues3> <NiveauxLangues3 style="font-size:60%;"></NiveauxLangues3></p></divlangues>');
    }

    function suprimeroptionlangues() {
        $('divlangues').remove();
    }

    function ajouteroptionAtouts() {
        $('divtest').append('<divAtouts style="background-color:#117596; position:absolute;  height:0px; width:0px; margin-left: 0px;margin-top: 0px;">Atouts<p style="margin-top: 10px;"><Atout style="font-size:60%;"></Atout></br><Atout2 style="font-size:60%"></Atout2></br><Atout3 style="font-size:60%"></Atout3></p></divAtouts>');
    }

    function suprimeroptionAtouts() {
        $('divAtouts').remove();
    }

    function ajouteroptionInformatique() {
        $('divtest').append('<divInformatique style="background-color:#117596; position:absolute;  height:0px; width:0px; margin-left: 0px;margin-top: 0px;">Informatique<p style="margin-top: 10px;"><Informatique style="font-size:60%"></Informatique></br><Informatique2 style="font-size:60%"></Informatique2></br><Informatique3 style="font-size:60%"></Informatique3></p></divInformatique>');
    }

    function suprimeroptionInformatique() {
        $('divInformatique').remove();
    }

    function ajouteroptionCentredinteret() {
        $('divtest').append('<divCentredinteret style="background-color:#117596; position:absolute;  height:0px; width:0px; margin-left: 0px;margin-top: 0px;">Centre dintêret<p style="font-size: 10px;"><interet style="font-size:60%"></interet></br><interet2 style="font-size:60%"></interet2></br><interet3 style="font-size:60%"></interet3></p></divCentredinteret>');
    }

    function suprimeroptionCentredinteret() {
        $('divCentredinteret').remove();
    }
</script>