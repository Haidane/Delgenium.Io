<?php
  session_start();
  if(empty($_SESSION)) {
?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white">
  <a class="navbar-brand logoNav" href="index.php"><img src="assets/img/delgenium.PNG"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link mr-5" href="contacts.php"><i class="far fa-address-book"></i>  Contacts</a>
      <a class="nav-item nav-link mr-5" href="signup.php"><i class="fas fa-user"></i>  S'inscrire</a>
      <a class="nav-item nav-link mr-5" href="login.php" tabindex="-1"><i class="fas fa-sign-in-alt"></i>  Se connecter</a>
    </div>
  </div>
</nav>      
  <?php
  }
  else {
  ?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white">
  <a class="navbar-brand logoNav" href="index.php"><img src="assets/img/delgenium.PNG"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <?php
      if($_SESSION['current_user']['coreteam'] == 1) {
          ?>
      <a href="addnew.php" class="nav-item nav-link mr-4"><i class="fas fa-user-plus"></i>   Nouveau</a>
      <?php
    }

    ?>
      <a class="nav-item nav-link mr-5" href="contacts.php"><i class="far fa-address-book"></i>  Contacts</a>
      <a class="nav-item nav-link mr-5" href="logout.php"><i class="fas fa-sign-in-alt"></i>  Se déconnecter</a>
      <a href="#" class="nav-item nav-link mr-5"><i class="fas fa-user-circle"></i><?php echo ucwords($_SESSION['current_user']['prenom'])." ".ucwords($_SESSION['current_user']['nom']); ?></a>
    </div>
  </div>
</nav>
    <?php
    }

    ?>