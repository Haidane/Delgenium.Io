<?php
  require 'function.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include"head.php" ?>
  <link rel="stylesheet" type="text/css" href="assets/css/addnew.css">
  <!-- ---------------------script--------------- -->
  <title>Ajouter un nouveau contzct</title>
</head>
<body>
  <header><?php include"header.php" ?></header>
  <main class="mt-5">
    <div class="bg-connect"></div>
    <div class="containerForm">
      <form method="POST" action="" class="formulaire" enctype="multipart/form-data">
            <div class="containerFormImg"><img src="assets/img/delgenium.png"></div>
            <h2>Creer un nouveau contact</h2>
        <input type="text" name="nom" placeholder="nom">
        <input type="text" name="prenom" placeholder="prenom">
        <input type="text" name="adresse" placeholder="adresse">
        <input type="text" name="codepostal" placeholder="codepostal">
        <input type="text" name="ville" placeholder="ville">
        <input type="text" name="tel1" placeholder="tel1">
        <input type="text" name="tel2" placeholder="tel2">
        <input type="text" name="email1" placeholder="email1">
        <input type="text" name="linkedin" placeholder="linkedin">
        <input type="text" name="structure1" placeholder="structure1">
        <input type="text" name="specialites" placeholder="specialites">
        <input type="text" name="noteaction" placeholder="noteaction">
        <input type="file" name="avatar">
        <label>Fiche visible</label>
        <input type="checkbox" name="fichevisible">
        <button type="submit" class="addBtn">Ajouter au répertoire</button>
      </form>
    </div>
  <?php
  if (!empty($_POST)) {
  if(empty($errors)){
      if(!empty($_POST['fichevisible'])){
      $fichevisible= 1;
  }else{
      $fichevisible = 0;
  }
  require_once 'db.php';
      // On enregistre les informations dans la base de données
      $req = $pdo->prepare("INSERT INTO network SET nom = ?, prenom = ?, adresse = ?, codepostal = ?, ville = ?, tel1 = ?, tel2 = ?, email1 = ?, linkedin = ?, structure1 = ?, specialites = ?, noteaction= ?, fichevisible = ?");
      $req->execute([$_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['codepostal'], $_POST['ville'], $_POST['tel1'], $_POST['tel2'], $_POST['email1'], $_POST['linkedin'], $_POST['structure1'], $_POST['specialites'], $_POST['noteaction'], $fichevisible]);
    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
     $tailleMax = 2097152;
     $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
     if($_FILES['avatar']['size'] <= $tailleMax) {
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        if(in_array($extensionUpload, $extensionsValides)) {
           $connect = new PDO('mysql:dbname=carnet;host=localhost','root','');
           $idpdo = $connect->prepare('SELECT MAX(id) FROM network');
           $idpdo->execute();
           $id=$idpdo->fetchAll();
           $chemin = "assets/photo/".$id[0][0].".".$extensionUpload;
           $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
           if($resultat) {
              $connect = new PDO('mysql:dbname=carnet;host=localhost','root','');
              $updateavatar = $connect->prepare('UPDATE network SET photo = :avatar WHERE id = :id');
              $updateavatar->execute(array(
                 'avatar' => $id[0][0].".".$extensionUpload,
                 'id' => $id[0][0]
                 ));
           } else {
              $msg = "Erreur durant l'importation de votre photo de profil";
           }
        } else {
           $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
        }
     } else {
        $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
     }
  }
  echo '<META http-equiv="refresh" content="0; URL=contacts.php">';
          exit();
  }
  }
  ?>
  <div class="bg-connect"></div>
  </main>
<footer><?php include"footer.php" ?></footer>
</body>
</html>