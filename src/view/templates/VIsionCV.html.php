<?php $controlleur = new ControlleurVisionCV(); ?>
<?php $idCV = filter_input(INPUT_POST, 'idCV'); ?>
<?php $InformationsCV = $controlleur->RecupInfosCV($idCV); ?>
<?php $HTMLModele = $controlleur->AfficherModele($InformationsCV[0]['IdModele']); ?>
<?php $HTML = '<div class="col-6" style="margin: 0 auto;">
            <div class="row" id="corpcv">
                <div id="corpcvblanc">
                <divtest style="width:100%; height:100%; display:block;">
                    ' . $HTMLModele['balise'] . '
                    </divtest>
                    </div>
            </div>
        </div> ';
?>
<input type="hidden" name="nom" id="1" value="<?= $InformationsCV[0]['NomC']; ?>">
<input type="hidden" name="prenom" id="2" value="<?= $InformationsCV[0]['PrenomC']; ?>">
<input type="hidden" name="telephone" id="3" value="<?= $InformationsCV[0]['TelephoneC']; ?>">
<input type="hidden" name="ville" id="4" value="<?= $InformationsCV[0]['VilleC']; ?>">
<input type="hidden" name="CP" id="5" value="<?= $InformationsCV[0]['CPC']; ?>">
<input type="hidden" name="adresse" id="6" value="<?= $InformationsCV[0]['AdresseC']; ?>">
<input type="hidden" name="email" id="7" value="<?= $InformationsCV[0]['EmailC']; ?>">
<?php if(isset($InformationsCV[0]['LibelleComV1']) && isset($InformationsCV[0]['NiveauComV1'])): ?>
    <input type="hidden" name="competence1" id="8.1" value="<?= $InformationsCV[0]['LibelleComV1']; ?>">
    <input type="hidden" name="competenceN1" id="8.1.1" value="<?= $InformationsCV[0]['NiveauComV1']; ?>">
<?php else : ?>
    <input type="hidden" name="competence1" id="8.1" value="">
    <input type="hidden" name="competenceN1" id="8.1.1" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['LibelleComV2']) && isset($InformationsCV[0]['NiveauComV2'])): ?>
    <input type="hidden" name="competence2" id="8.2" value="<?= $InformationsCV[0]['LibelleComV2']; ?>">
    <input type="hidden" name="competenceN2" id="8.2.1" value="<?= $InformationsCV[0]['NiveauComV2']; ?>">
<?php else : ?>
    <input type="hidden" name="competence2" id="8.2" value="">
    <input type="hidden" name="competenceN2" id="8.2.1" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['LibelleComV3']) && isset($InformationsCV[0]['NiveauComV3'])): ?>
    <input type="hidden" name="competence3" id="8.3" value="<?= $InformationsCV[0]['LibelleComV3']; ?>">
    <input type="hidden" name="competenceN3" id="8.3.1" value="<?= $InformationsCV[0]['NiveauComV3']; ?>">
<?php else : ?>
    <input type="hidden" name="competence3" id="8.3" value="">
    <input type="hidden" name="competenceN3" id="8.3.1" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['LibelleComV4']) && isset($InformationsCV[0]['NiveauComV4'])): ?>
    <input type="hidden" name="competence4" id="8.4" value="<?= $InformationsCV[0]['LibelleComV4']; ?>">
    <input type="hidden" name="competenceN4" id="8.4.1" value="<?= $InformationsCV[0]['NiveauComV4']; ?>">
<?php else : ?>
    <input type="hidden" name="competence4" id="8.4" value="">
    <input type="hidden" name="competenceN4" id="8.4.1" value="">
<?php endif; ?>
<input type="hidden" name="objectif" id="10" value="<?= $InformationsCV[0]['LibelleO']; ?>">
<?php if(isset($InformationsCV[0]['FonctionCV1']) && isset($InformationsCV[0]['EntrepriseCV1']) && isset($InformationsCV[0]['VilleCV1']) && isset($InformationsCV[0]['DateDebutCV1']) && isset($InformationsCV[0]['DateFinCV1']) && isset($InformationsCV[0]['DescriptionCV1'])) : ?>
    <input type="hidden" name="fonction1" id="11.1" value="<?= $InformationsCV[0]['FonctionCV1']; ?>">
    <input type="hidden" name="entreprise1" id="12.1" value="<?= $InformationsCV[0]['EntrepriseCV1']; ?>">
    <input type="hidden" name="ville1" id="13.1" value="<?= $InformationsCV[0]['VilleCV1']; ?>">
    <input type="hidden" name="DateDebut1" id="14.1" value="<?= $InformationsCV[0]['DateDebutCV1']; ?>">
    <input type="hidden" name="DateFin1" id="15.1" value="<?= $InformationsCV[0]['DateFinCV1']; ?>">
    <input type="hidden" name="Description1" id="16.1" value="<?= $InformationsCV[0]['DescriptionCV1']; ?>">
<?php else: ?>
    <input type="hidden" name="fonction1" id="11.1" value="">
    <input type="hidden" name="entreprise1" id="12.1" value="">
    <input type="hidden" name="ville1" id="13.1" value="">
    <input type="hidden" name="DateDebut1" id="14.1" value="">
    <input type="hidden" name="DateFin1" id="15.1" value="">
    <input type="hidden" name="Description1" id="16.1" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['FonctionCV2']) && isset($InformationsCV[0]['EntrepriseCV2']) && isset($InformationsCV[0]['VilleCV2']) && isset($InformationsCV[0]['DateDebutCV2']) && isset($InformationsCV[0]['DateFinCV2']) && isset($InformationsCV[0]['DescriptionCV2'])) : ?>
    <input type="hidden" name="fonction2" id="11.2" value="<?= $InformationsCV[0]['FonctionCV2']; ?>">
    <input type="hidden" name="entreprise2" id="12.2" value="<?= $InformationsCV[0]['EntrepriseCV2']; ?>">
    <input type="hidden" name="ville2" id="13.2" value="<?= $InformationsCV[0]['VilleCV2']; ?>">
    <input type="hidden" name="DateDebut2" id="14.2" value="<?= $InformationsCV[0]['DateDebutCV2']; ?>">
    <input type="hidden" name="DateFin2" id="15.2" value="<?= $InformationsCV[0]['DateFinCV2']; ?>">
    <input type="hidden" name="Description2" id="16.2" value="<?= $InformationsCV[0]['DescriptionCV2']; ?>">
<?php else: ?>
    <input type="hidden" name="fonction2" id="11.2" value="">
    <input type="hidden" name="entreprise2" id="12.2" value="">
    <input type="hidden" name="ville2" id="13.2" value="">
    <input type="hidden" name="DateDebut2" id="14.2" value="">
    <input type="hidden" name="DateFin2" id="15.2" value="">
    <input type="hidden" name="Description2" id="16.2" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['FonctionCV3']) && isset($InformationsCV[0]['EntrepriseCV3']) && isset($InformationsCV[0]['VilleCV3']) && isset($InformationsCV[0]['DateDebutCV3']) && isset($InformationsCV[0]['DateFinCV3']) && isset($InformationsCV[0]['DescriptionCV3'])) : ?>
    <input type="hidden" name="fonction3" id="11.3" value="<?= $InformationsCV[0]['FonctionCV3']; ?>">
    <input type="hidden" name="entreprise3" id="12.3" value="<?= $InformationsCV[0]['EntrepriseCV3']; ?>">
    <input type="hidden" name="ville3" id="13.3" value="<?= $InformationsCV[0]['VilleCV3']; ?>">
    <input type="hidden" name="DateDebut3" id="14.3" value="<?= $InformationsCV[0]['DateDebutCV3']; ?>">
    <input type="hidden" name="DateFin3" id="15.3" value="<?= $InformationsCV[0]['DateFinCV3']; ?>">
    <input type="hidden" name="Description3" id="16.3" value="<?= $InformationsCV[0]['DescriptionCV3']; ?>">
<?php else: ?>
    <input type="hidden" name="fonction3" id="11.3" value="">
    <input type="hidden" name="entreprise3" id="12.3" value="">
    <input type="hidden" name="ville3" id="13.3" value="">
    <input type="hidden" name="DateDebut3" id="14.3" value="">
    <input type="hidden" name="DateFin3" id="15.3" value="">
    <input type="hidden" name="Description3" id="16.3" value="">
<?php endif; ?>
<input type="hidden" name="permis" id="17" value="<?= $InformationsCV[0]['PermisC']; ?>">
<?php if(isset($InformationsCV[0]['LibelleLangueV1']) && isset($InformationsCV[0]['NiveauLangueV1'])): ?>
    <input type="hidden" name="Langue1" id="21.1" value="<?= $InformationsCV[0]['LibelleLangueV1']; ?>">
    <input type="hidden" name="LangueN1" id="22.1" value="<?= $InformationsCV[0]['NiveauLangueV1']; ?>">
<?php else: ?>
    <input type="hidden" name="Langue1" id="21.1" value="">
    <input type="hidden" name="LangueN1" id="22.1" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['LibelleLangueV2']) && isset($InformationsCV[0]['NiveauLangueV2'])): ?>
    <input type="hidden" name="Langue2" id="21.2" value="<?= $InformationsCV[0]['LibelleLangueV2']; ?>">
    <input type="hidden" name="LangueN2" id="22.2" value="<?= $InformationsCV[0]['NiveauLangueV2']; ?>">
<?php else: ?>
    <input type="hidden" name="Langue2" id="21.2" value="">
    <input type="hidden" name="LangueN2" id="22.2" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['LibelleLangueV3']) && isset($InformationsCV[0]['NiveauLangueV3'])): ?>
    <input type="hidden" name="Langue3" id="21.3" value="<?= $InformationsCV[0]['LibelleLangueV3']; ?>">
    <input type="hidden" name="LangueN3" id="22.3" value="<?= $InformationsCV[0]['NiveauLangueV3']; ?>">
<?php else: ?>
    <input type="hidden" name="Langue3" id="21.3" value="">
    <input type="hidden" name="LangueN3" id="22.3" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['LibelleAV1'])): ?>
    <input type="hidden" name="Atout1" id="23.1" value="<?= $InformationsCV[0]['LibelleAV1']; ?>">
<?php else: ?>
    <input type="hidden" name="Atout1" id="23.1" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['LibelleAV2'])): ?>
    <input type="hidden" name="Atout2" id="23.2" value="<?= $InformationsCV[0]['LibelleAV2']; ?>">
<?php else: ?>
    <input type="hidden" name="Atout2" id="23.2" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['LibelleAV3'])): ?>
    <input type="hidden" name="Atout3" id="23.3" value="<?= $InformationsCV[0]['LibelleAV3']; ?>">
<?php else: ?>
    <input type="hidden" name="Atout3" id="23.3" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['LibelleIV1'])): ?>
    <input type="hidden" name="Informatique1" id="24.1" value="<?= $InformationsCV[0]['LibelleIV1']; ?>">
<?php else: ?>
    <input type="hidden" name="Informatique1" id="24.1" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['LibelleIV2'])): ?>
    <input type="hidden" name="Informatique2" id="24.2" value="<?= $InformationsCV[0]['LibelleIV2']; ?>">
<?php else: ?>
    <input type="hidden" name="Informatique2" id="24.2" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['LibelleIV3'])): ?>
    <input type="hidden" name="Informatique3" id="24.3" value="<?= $InformationsCV[0]['LibelleIV3']; ?>">
<?php else: ?>
    <input type="hidden" name="Informatique3" id="24.3" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['LibelleCIV1'])): ?>
    <input type="hidden" name="centre1" id="25.1" value="<?= $InformationsCV[0]['LibelleCIV1']; ?>">
<?php else: ?>
    <input type="hidden" name="centre1" id="25.1" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['LibelleCIV2'])): ?>
    <input type="hidden" name="centre2" id="25.2" value="<?= $InformationsCV[0]['LibelleCIV2']; ?>">
<?php else: ?>
    <input type="hidden" name="centre2" id="25.2" value="">
<?php endif; ?>
<?php if(isset($InformationsCV[0]['LibelleCIV3'])): ?>
    <input type="hidden" name="centre3" id="25.3" value="<?= $InformationsCV[0]['LibelleCIV3']; ?>">
<?php else: ?>
    <input type="hidden" name="centre3" id="25.3" value="">
<?php endif; ?>
<script>
    $(document).ready(function() {
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
            $("languev1").html(contenu);
            // ==========================
            var contenu = document.getElementById('22.1').value;
            $("acquis2v1").html(contenu);
            // ==========================
            var contenu = document.getElementById('21.2').value;
            $("languev2").html(contenu);
            // ==========================
            var contenu = document.getElementById('22.2').value;
            $("acquis2v2").html(contenu);
            // ==========================
            var contenu = document.getElementById('21.3').value;
            $("languev3").html(contenu);
            // ==========================
            var contenu = document.getElementById('22.3').value;
            $("acquis2v3").html(contenu);
            // ==========================
            var contenu = document.getElementById('23.1').value;
            $("atoutv1").html(contenu);
            // ==========================
            var contenu = document.getElementById('23.2').value;
            $("atoutv2").html(contenu);
            // ==========================
            var contenu = document.getElementById('23.3').value;
            $("atoutv3").html(contenu);
            // ==========================
            var contenu = document.getElementById('24.1').value;
            $("Informatiquev1").html(contenu);
            // ==========================
            var contenu = document.getElementById('24.2').value;
            $("Informatiquev2").html(contenu);
            // ==========================
            var contenu = document.getElementById('24.3').value;
            $("Informatiquev3").html(contenu);
            // ==========================
            var contenu = document.getElementById('25.1').value;
            $("centrev1").html(contenu);
            // ==========================
            var contenu = document.getElementById('25.2').value;
            $("centrev2").html(contenu);
            // ==========================
            var contenu = document.getElementById('25.3').value;
            $("centrev3").html(contenu);
            // ==========================
            var contenu = document.getElementById('20').value;
            var contenu2 = document.getElementById('div1');
            $(contenu2).css('background-color', contenu);
            console.log(contenu2)
            // ==========================
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

<?= $HTML ?>