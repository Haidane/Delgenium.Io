<?php 
  require 'function.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include"head.php"?>
  <title>inscription</title>
  <link rel="stylesheet" type="text/css" href="assets/css/sign.css">
</head>
<body>
  <header><?php include"header.php"?></header>
  <div class="bg-connect"></div>
  <div class="contentContainer" style="margin-top: 55px;">
    <div class="containerSignin center top bottom">
      <div class="top bottom logoDiv">
        <a href="index.php"><img class="welcome" src="assets/img/delgenium.PNG"></a>
      </div>
      <h3 class="signInTitle top">S'inscrire</h3>
      <form method="POST" action="" class="top bottom">
        <input type="text" name="nom" placeholder="  Nom" class="signin bottom top">
        <input type="text" name="prenom" placeholder=" Prenom" class="signin bottom">
        <input type="email" name="email1" placeholder=" Email" class="signin bottom">
        <input type="password" name="pwd" placeholder="  Mot de passe" class="signin bottom">
        <input type="password" name="passwordConfirm" placeholder="  Confirmer votre mot de passe" class="signin bottom">
        <div class="checkboxFiche">
          <label>fiche visible</label>
          <input type="checkbox" name="fichevisible">
        </div>
        <div class="bottom center">
          <button type="submit" class="signUpBtn">S'inscrire</button>
        </div>
      </form>
    </div>
  </div>

<?php
if(empty($errors)){
   if(!empty($_POST)){

 if(!empty($_POST['fichevisible'])){
    $fichevisible= 1;
}else{
    $fichevisible = 0;
}
require_once 'db.php';
    // On enregistre les informations dans la base de données 
    $req = $pdo->prepare("INSERT INTO network SET nom = ?, pwd = ?, email1 = ?, fichevisible = ?");
    // On ne sauvegardera pas le mot de passe en clair dans la base mais plutôt un hash
    $password = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
    // On génère le token qui servira à la validation du compte 
    $req->execute([$_POST['nom'], $password, $_POST['email1'],$fichevisible]);
    header('Location: login.php');
    exit();
}
}
?>
<footer>
    <?php include"footer.php"?>
</footer>
</body>
</html>