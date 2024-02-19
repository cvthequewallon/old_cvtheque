<?php require_once __DIR__.'/../../scripts/Connection.php'; ?>
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="home"><p class="txtblanc">CV Wallon</p></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home"><p class="txtblanc">Accueil</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profil"><p class="txtblanc">Profil</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="InfoStage"><p class="txtblanc">Information des stages</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gestioneleve"><p class="txtblanc">Gestion Eleves</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gestionprofesseur"><p class="txtblanc">Gestion Professeur</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gestionclasse"><p class="txtblanc">Gestion Classe</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="GestionEntreprise"><p class="txtblanc">Validation Entreprise</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="CV?afficher"><p class="txtblanc">Vision Cv</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gestionmodele"><p class="txtblanc">Gestion modèle</p></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="deconnection"><p class="txtblanc">Deconnexion</p></a>
      </li>
    </ul>
    <?php $controlleurnavBar = new controlleurnavBar(); ?>
    <?php $id = $_SESSION['id']; ?>
      <?php if($_SESSION['darkmod'] == 0): ?>
        <div class="custom-control custom-switch">
          <form method="POST">
            <input type="submit" value="Theme Sombre" name="gonoire" class="btn btn-outline-primary" id="btndark">
          </form>
            <?php if (isset($_POST['gonoire']) AND $_POST['gonoire']=='Theme Sombre'): ?>
              <?php $iddark = 1; $controlleurnavBar->UpdatedarkmodByUser($iddark, $id); ?>
              <?php Darkmod(); ?>
            <?php endif; ?>
        </div>
      <?php elseif($_SESSION['darkmod'] == 1): ?>
        <div class="custom-control custom-switch">
          <form method="POST">
            <input type="submit" value="Theme Sombre" name="goblanc" class="btn btn-outline-primary" id="btndark">
          </form>
            <?php if (isset($_POST['goblanc']) AND $_POST['goblanc']=='Theme Sombre'): ?>
              <?php $iddark = 0; $controlleurnavBar->UpdatedarkmodByUser($iddark, $id); ?>
              <?php Darkmod(); ?>
            <?php endif; ?>
        </div>
      <?php endif; ?>
  </div>
</nav>