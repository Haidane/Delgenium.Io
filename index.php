<?php 
  require 'function.php';
  require 'db.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Accueil</title>
  <?php include"head.php"?>
  <script>
  $(document).ready(function () {
  $("#selection").CreateMultiCheckBox({ width: '230px', defaultText : 'Spécialité', height:'250px' });
      });
</script>
  <link rel="stylesheet" type="text/css" href="assets/css/search.css">
  <script src="assets/js/search.js"></script>
</head>

<body>
<header><?php include"header.php"?></header>

<!-- -----------search bar multicheckbox---------- -->

<main>
  <div class="index_search_bar fixed-top"> <?php include"search.php" ?></div>
  <div class="bannière">
    <div class="banImg">
      <img src="assets/img/banImg.jpg">
    </div>
    <div class="banText">
      <h2>Mon carnet d'adresse</h2>
      <p>Votre partenaire en affaire</p>
    </div>
      <!-- ------------searchBar------------- -->
  </div>
  <div class="cardBox">
    <div class="boxWriting">
      <h2>Mon réseau</h2>
      <p>Creez et gérez votre réseau simplement</p>
      <button class="cardBtn"><a href="addnew.php">Ajouter un contact</a></button>
    </div>
    <div class="flexW">
      <div class="cards ">
        <div class="cardI card-2"><img src="assets/img/gerer.jpg"></div>
        <div class="cardI card-2"><img src="assets/img/work.jpg"></div>
      </div>
      <div class="cards ">
          <div class="cardI card-2"><img src="assets/img/collaborer.jpg"></div>
          <div class="cardI card-2"><img src="assets/img/team.jpg"></div>
      </div>
    </div>
  </div>
  <div class="parallax"></div>
  <div class="doubleCardContainer">
    <div class="doubleCard1">
      <h2>Delgenium</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      </p>
      <button class="cardBtn2"><a href="contacts.php">Gerer mes contacts</a></button>
    </div>
    <div class="doubleCard2">
      <img src="assets/img/team.jpg">
    </div>
  </div>
  </main>
<footer><?php include"footer.php"?></footer>
</body>
</html>