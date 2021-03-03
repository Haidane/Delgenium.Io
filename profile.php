<?php 
  require 'function.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head><?php include"head.php" ?>
  <link rel="stylesheet" type="text/css" href="assets/css/profile.css">
  <title>profile</title>
</head>
<body>
 <header><?php include"header.php" ?></header>
  <main class="marginMain bg-connect">
  <?php 
  // ------------récuperation des infos de l'utilisateur------
    require "db.php";
    $id = $_GET['id'];
    $req = 'SELECT * FROM network WHERE id = "'.$id.'"';
    $result = $pdo->prepare($req);
    $resultIsOk = $result->execute();
    while($donnees = $result->fetch(PDO::FETCH_ASSOC)){
  ?>
  <div class="profileCardContainer">
    <div>
      <!-- ------------affichage image contact----------- -->
      <?php if(strcmp($donnees['photo'],"") !== 0){
      ?>
      <div class="imageContactCard">
        <img src="assets/photo/<?php echo $donnees['photo'] ?>">
      </div>
      <?php
      }else{
      ?>
      <!-- -----------image par défaut-------------- -->
      <div class="imageContactCard">
        <img src="assets/img/profile.png">
      </div>
      <?php
      }
      ?>
      <div class="cardBodyText">
        <h2><?php echo $donnees["nom"].' '.$donnees["prenom"] ?></h2>
        <p><?php echo $donnees["ville"].' '.$donnees["regions"] ?></p>
        <p><?php echo $donnees["pays"] ?></p>
        <p>
          <a href="tel:<?php echo $donnees["tel1"] ?>">
            <i class="fas fa-phone-alt"></i>
            <?php echo $donnees["tel1"] ?>
          </a>
        </p>
        <p>
          <a href="mailto:<?php echo $donnees["tel1"] ?>">
            <i class="fas fa-envelope"></i>
            <?php echo $donnees["email1"] ?>
          </a>
        </p>
        <p><?php echo $donnees["siteweb1"]?></p>
        <p><?php echo $donnees["linkedin"]?></p>
        <p><?php echo $donnees["youtube"]?></p>
        <p><?php echo $donnees["twitter"]?></p>
        <p><?php echo $donnees["facebook"]?></p>
        <p><?php echo $donnees["structure1"]?></p>
        <p><?php echo $donnees["structure2"]?></p>
        <p><?php echo $donnees["structure3"]?></p>
        <p><?php echo $donnees["specialites"]?></p>
      </div>
      <?php
        if (!empty($_SESSION)){
        if($_SESSION['current_user']['coreteam'] == 1) {
      ?>
      <div class="center">
        <button class="modifyBtnLink">
          <a href="modify.php?id=<?php echo $donnees['id'];?>">modifier le profil</a>
        </button>
      </div>
    </div>
  <?php
  }
  }
  }
?>
</main>
<footer><?php include"footer.php" ?></footer>
</body>
</html>