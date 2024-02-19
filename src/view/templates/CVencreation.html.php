<?php
$controleur = new ControlleurProfil();
$idmodele = filter_input(INPUT_POST, 'idmodele');
$HTMLModele = $controleur->AfficherModele($idmodele);
$HTML = '<div class="col-6">
            <div class="row" id="corpcv">
                <div id="corpcvblanc">
                <divtest style="width:100%; height:100%; display:block;">
                    ' . $HTMLModele['balise'] . '
                    </divtest>
                    </div>
            </div>
        </div> ';
$menu = $controleur->DetectionCategorie($HTML); ?>
<form action="/pdf" method="post">

    <div class="row m-3">
        <div class="col-6">
            <input type="hidden" name="idmodele" value="<?= $idmodele ?>">
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
                        <?php foreach ($menu as $unElement) : ?>
                            <?= $unElement; ?>
                        <?php endforeach; ?>
                        <a class="list-group-item list-group-item-action" id="list-PDF-list" data-bs-toggle="list" href="#list-PDF" role="tab" aria-controls="PDF">Sauvegarde et conversion PDF</a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active mt-3" id="list-Coordonée" role="tabpanel" aria-labelledby="list-Coordonée-list">
                            <h4>Coordonnées</h4>
                            <!-- === Debut From Coordonée === -->
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Nom" aria-label="Nom" id="1" name="nom">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Prenom" aria-label="Prenom" id="2" name="prenom">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Tel" aria-label="Tel" id="3" name="tel">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Ville" aria-label="Ville" id="4" name="villeC">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="CP" aria-label="CP" id="5" name="CP">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Adresse" aria-label="Adresse" id="6" name="adresse">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Email" aria-label="Email" id="7" name="Email">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="exampleFormControlSelect1">Niveau Permis</label>
                                    <select class="form-control" id="17" name="Permis">
                                        <option value="">Aucun</option>
                                        <option value="Permis: Véhiculer">Permis</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col">
                                    <input name="file" type="file" id="18" />
                                </div>
                            </div>
                            <!-- === Fin From Coordonée === -->
                        </div>
                        <div class="tab-pane fade mt-3" id="list-Objectif" role="tabpanel" aria-labelledby="list-Objectif-list">
                            <h4>Objectif</h4>
                            <div class="row mt-3">
                                <div class="col">
                                    <Input class="form-control w-100" placeholder="Objectif" id="10" name="objectif"></Input>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade m-3" id="list-Parcoursprofessionnel" role="tabpanel" aria-labelledby="list-Parcoursprofessionnel-list">
                            <?php
                            $i = 1;
                            while ($i < 4) {
                            ?>
                                <h4 class="mt-4">Parcours professionnel n°<?= $i ?></h4>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Fonction" aria-label="Fonction" id="11.<?php echo $i ?>" name="Fonction<?= $i ?>">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Entreprise" aria-label="Entreprise" id="12.<?php echo $i ?>" name="Entreprise<?= $i ?>">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Ville" aria-label="VilleParcour" id="13.<?php echo $i ?>" name="VilleP<?= $i ?>">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="date" class="form-control" placeholder="Debut" aria-label="DebutParcour" id="14.<?php echo $i ?>" name="DateDebut<?= $i ?>">
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" placeholder="Fin" aria-label="FinParcour" id="15.<?php echo $i ?>" name="DateFin<?= $i ?>">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <input type="text" class="form-control w-100" placeholder="Description" id="16.<?php echo $i ?>" name="DescriptionP<?= $i ?>"></input>
                                    </div>
                                </div>
                            <?php
                                $i++;
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade mt-3" id="list-Compétences" role="tabpanel" aria-labelledby="list-Compétences-list">
                            <?php
                            $i = 1;
                            while ($i < 5) {
                            ?>
                                <h4 class="mt-4">Compétences n°<?= $i ?></h4>
                                <div class="row mt-3">
                                    <div class="col mt-4">
                                        <input type="text" class="form-control mt-2" placeholder="Compétences" aria-label="Compétences" id="8.<?php echo $i ?>" name="Competence<?= $i ?>">
                                    </div>
                                    <div class="col mb-4">
                                        <label for="exampleFormControlSelect1">Niveau Compétences</label>
                                        <select class="form-control" id="8.<?php echo $i ?>.1" name="NiveauC<?= $i ?>">
                                            <option value="">choisir</option>
                                            <option value="En cours d\'acquisition">En cours d'acquisition</option>
                                            <option value="Acquis">Acquis</option>
                                        </select>
                                    </div>
                                </div>
                            <?php
                                $i++;
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade mt-3" id="list-Langues" role="tabpanel" aria-labelledby="list-Langues-list">
                            <?php
                            $i = 1;
                            while ($i < 4) {
                            ?>
                                <h4 class="mt-4">Langues n°<?= $i ?></h4>
                                <div class="row mt-3">
                                    <div class="col mt-4">
                                        <input type="text" class="form-control" placeholder="Langue" aria-label="LibelleLangue" id="21.<?php echo $i ?>" name="LibelleLangue<?= $i ?>">
                                    </div>
                                    <div class="col mb-4">
                                        <label for="exampleFromControlSelect1">Niveau Langues</libel>
                                            <select class="form-control" id="22.<?php echo $i ?>" name="NiveauLangue<?= $i ?>">
                                                <option value="">Choisir</option>
                                                <option value="A1">A1</option>
                                                <option value="A2">A2</option>
                                                <option value="B1">B1</option>
                                                <option value="B2">B2</option>
                                                <option value="C1">C1</option>
                                                <option value="C2">C2</option>
                                            </select>
                                    </div>
                                </div>
                            <?php
                                $i++;
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade mt-3" id="list-Atouts" role="tabpanel" aria-labelledby="list-Atouts-list">
                            <?php
                            $i = 1;
                            while ($i < 4) {
                            ?>
                                <h4 class="mt-4">Atout n°<?= $i ?></h4>
                                <div class="row mt-3">
                                    <div class="col mt-4">
                                        <input type="text" class="form-control" placeholder="Atout" aria-label="LibelleAtout" id="23.<?php echo $i ?>" name="LibelleAtout<?= $i ?>">
                                    </div>
                                </div>
                            <?php
                                $i++;
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade mt-3" id="list-Informatique" role="tabpanel" aria-labelledby="list-Informatique-list">
                            <?php
                            $i = 1;
                            while ($i < 4) {
                            ?>
                                <h4 class="mt-4">Informatique n°<?= $i ?></h4>
                                <div class="row mt-3">
                                    <div class="col mt-4">
                                        <input type="text" class="form-control" placeholder="Informatique" aria-label="LibelleInformatique" id="24.<?php echo $i ?>" name="LibelleInformatique<?= $i ?>">
                                    </div>
                                </div>
                            <?php
                                $i++;
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade mt-3" id="list-interet" role="tabpanel" aria-labelledby="list-interet-list">
                            <?php
                            $i = 1;
                            while ($i < 4) {
                            ?>
                                <h4 class="mt-4">Centre d'interet n°<?= $i ?></h4>
                                <div class="row mt-3">
                                    <div class="col mt-4">
                                        <input type="text" class="form-control" placeholder="Centre d'interet" aria-label="LibelleInteret" id="25.<?php echo $i ?>" name="LibelleInteret<?= $i ?>">
                                    </div>
                                </div>
                            <?php
                                $i++;
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade mt-3 user-select-none" id="list-PDF" role="tabpanel" aria-labelledby="list-PDF-list">
                            <h4>Telechargement</h4>
                            <div class="row mt-3">
                                <div class="col">
                                    <input name="test" id="test" value='<?php echo $HTMLModele['balise'] ?>'>
                                    <center><button type="submit" class="btn btn-danger">Convertisseur PDF</button></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ==== Fin Gauche ==== -->
        </div>
        <?= $HTML ?>
        <!-- ==== Fin Droit ==== -->
    </div>
</form>
<script>
    $(document).ready(function() {
        $("input").keyup(function(event) {
            // ==========================
            var contenu = document.getElementById('1').value;
            $("Nom").html(contenu);
            // ==========================
            var contenu = document.getElementById('2').value;
            $("Prenom").html(contenu);
            // ==========================
            var contenu = document.getElementById('3').value;
            $("Tel").html(contenu);
            // ==========================
            var contenu = document.getElementById('4').value;
            $("Ville").html(contenu);
            // ==========================
            var contenu = document.getElementById('5').value;
            $("cp").html(contenu);
            // ==========================
            var contenu = document.getElementById('6').value;
            $("Adresse").html(contenu);
            // ==========================
            var contenu = document.getElementById('7').value;
            $("Email").html(contenu);
            // ==========================
            var contenu = document.getElementById('8.1').value;
            $("Compétance").html(contenu);
            // ==========================
            var contenu = document.getElementById('8.1.1').value;
            $("Compétancev2").html(contenu);
            // ==========================
            var contenu = document.getElementById('8.2').value;
            $("Compétance2").html(contenu);
            // ==========================
            var contenu = document.getElementById('8.2.1').value;
            $("Compétance2v2").html(contenu);
            // ==========================
            var contenu = document.getElementById('8.3').value;
            $("Compétance3").html(contenu);
            // ==========================
            var contenu = document.getElementById('8.3.1').value;
            $("Compétance3v2").html(contenu);
            // ==========================
            var contenu = document.getElementById('8.4').value;
            $("Compétance4").html(contenu);
            // ==========================
            var contenu = document.getElementById('8.4.1').value;
            $("Compétance4v2").html(contenu);
            // ==========================
            var contenu = document.getElementById('10').value;
            $("Objectif").html(contenu);
            // ==========================
            var contenu = document.getElementById('11.1').value;
            $("Fonction").html(contenu);
            // ==========================
            var contenu = document.getElementById('12.1').value;
            $("Entreprise").html(contenu);
            // ==========================
            var contenu = document.getElementById('13.1').value;
            $("VilleP").html(contenu);
            // ==========================
            var contenu = document.getElementById('14.1').value;
            $("Debut").html(contenu);
            // ==========================
            var contenu = document.getElementById('15.1').value;
            $("Fin").html(contenu);
            // ==========================
            var contenu = document.getElementById('16.1').value;
            $("DescriptionP").html(contenu);
            // ==========================
            var contenu = document.getElementById('11.2').value;
            $("Fonction2").html(contenu);
            // ==========================
            var contenu = document.getElementById('12.2').value;
            $("Entreprise2").html(contenu);
            // ==========================
            var contenu = document.getElementById('13.2').value;
            $("VilleP2").html(contenu);
            // ==========================
            var contenu = document.getElementById('14.2').value;
            $("Debut2").html(contenu);
            // ==========================
            var contenu = document.getElementById('15.2').value;
            $("Fin2").html(contenu);
            // ==========================
            var contenu = document.getElementById('16.2').value;
            $("DescriptionP2").html(contenu);
            // ==========================
            var contenu = document.getElementById('11.3').value;
            $("Fonction3").html(contenu);
            // ==========================
            var contenu = document.getElementById('12.3').value;
            $("Entreprise3").html(contenu);
            // ==========================
            var contenu = document.getElementById('13.3').value;
            $("VilleP3").html(contenu);
            // ==========================
            var contenu = document.getElementById('14.3').value;
            $("Debut3").html(contenu);
            // ==========================
            var contenu = document.getElementById('15.3').value;
            $("Fin3").html(contenu);
            // ==========================
            var contenu = document.getElementById('16.3').value;
            $("DescriptionP3").html(contenu);
            // ==========================
            var contenu = document.getElementById('17').value;
            $("Permis").html(contenu);
            // ==========================
            var contenu = document.getElementById('21.1').value;
            $("Langues").html(contenu);
            // ==========================
            var contenu = document.getElementById('21.2').value;
            $("Langues2").html(contenu);
            // ==========================
            var contenu = document.getElementById('21.3').value;
            $("Langues3").html(contenu);
            // ==========================
            var contenu = document.getElementById('22.1').value;
            $("NiveauxLangues").html(contenu);
            // ==========================
            var contenu = document.getElementById('22.2').value;
            $("NiveauxLangues2").html(contenu);
            // ==========================
            var contenu = document.getElementById('22.3').value;
            $("NiveauxLangues3").html(contenu);
            // ==========================
            var contenu = document.getElementById('23.1').value;
            $("Atout").html(contenu);
            // ==========================
            var contenu = document.getElementById('23.2').value;
            $("Atout2").html(contenu);
            // ==========================
            var contenu = document.getElementById('23.3').value;
            $("Atout3").html(contenu);
            // ==========================
            var contenu = document.getElementById('24.1').value;
            $("Informatique").html(contenu);
            // ==========================
            var contenu = document.getElementById('24.2').value;
            $("Informatique2").html(contenu);
            // ==========================
            var contenu = document.getElementById('24.3').value;
            $("Informatique3").html(contenu);
            // ==========================
            var contenu = document.getElementById('25.1').value;
            $("interet").html(contenu);
            // ==========================
            var contenu = document.getElementById('25.2').value;
            $("interet2").html(contenu);
            // ==========================
            var contenu = document.getElementById('25.3').value;
            $("interet3").html(contenu);
            // ==========================
            var contenu = document.getElementById('20').value;
            var contenu2 = document.getElementById('div1');
            $(contenu2).css('background-color', contenu);
            console.log(contenu2)
            // ==========================
        });
    });
    $(document).ready(function() {
        $('#18').on('change', function(e) {
            e.preventDefault();

            console.log('upload image');

            var file_data = $('#18').prop('files')[0];
            var form_data = new FormData();
            form_data.append('photo', file_data);
            $.ajax({
                url: '/upload', // point to server-side PHP script
                dataType: 'text', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(data) {
                    $('#photo_upload').attr('src', '/photos/test.jpg');
                }
            });
            return false;
        });
    });
    $('#test').hide();
</script>