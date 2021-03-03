<?php 
  require 'function.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>modifier ce contact</title>
  <?php include"head.php"?>
  <link rel="stylesheet" type="text/css" href="assets/css/modify.css">
</head>

<body>
  <header><?php include"header.php" ?></header>
  <?php 
    require_once "db.php";
    // ---récupération des l'info de l'utilisateur ------
    session_start();
    $id = $_SESSION['current_user']['id'];
    $req = 'SELECT * FROM network WHERE id = "'.$id.'"';
    $result = $pdo->query($req);
    $donnees = $result->fetchAll(PDO::FETCH_ASSOC)[0];
  ?>

  <div class="containerModify">
    <div class="containerFormModify">
    <form method="POST" action="" enctype="multipart/form-data">
      <h1 class="identityModify"><?php echo $donnees["nom"].' '.$donnees["prenom"] ?></h1>
      <div>
        <input type="text" name="nom" value="<?php echo $donnees["nom"] ?>" placeholder="nom">
      <input type="text" name="prenom" value="<?php echo $donnees["prenom"] ?>" placeholder="prenom">
      </div>
     <div>
       <input type="date" name="datenaissance" value="<?php echo $donnees["datenaissance"] ?>">
     </div>
      <div>
        <input type="text" name="adresse" value="<?php echo $donnees["adresse"] ?>" placeholder="adresse">
      </div>
      <div>
        <input type="text" name="codepostal" value="<?php echo $donnees["codepostal"] ?>" placeholder="codepostal">
      </div>
     <div>
        <input type="text" name="ville" value="<?php echo $donnees["ville"] ?>" placeholder="ville">
     </div>
      <div>
        <input type="text" name="regions" value="<?php echo $donnees["regions"] ?>" placeholder="regions">
      </div>
      <div>
        <input type="text" name="pays" value="<?php echo $donnees["pays"] ?>" placeholder="pays">
      </div>
      <div>
        <input type="text" name="tel1" value="<?php echo $donnees["tel1"] ?>" placeholder="tel">
      </div>
      <div>
        <input type="text" name="tel2" value="<?php echo $donnees["tel2"] ?>" placeholder="tel 2">
      </div>
      <div>
        <input type="text" name="tel3" value="<?php echo $donnees["tel3"] ?>" placeholder="tel 3">
      </div>
      <div>
        <input type="text" name="email1" value="<?php echo $donnees["email1"] ?>" placeholder="email">
      </div>
     <div>
        <input type="text" name="email2" value="<?php echo $donnees["email2"] ?>" placeholder="email 2">
     </div>
     <div>
        <input type="text" name="email3" value="<?php echo $donnees["email3"] ?>" placeholder="email 3">
     </div>
      <div>
        <input type="text" name="siteweb1" value="<?php echo $donnees["siteweb1"] ?>" placeholder="site web 1">
      </div>
      <div>
        <input type="text" name="siteweb2" value="<?php echo $donnees["siteweb2"] ?>" placeholder="site web 2">
      </div>
      <div>
        <input type="text" name="siteweb3" value="<?php echo $donnees["siteweb3"] ?>" placeholder="site web 3">
      </div>
      <div>
        <input type="text" name="linkedin" value="<?php echo $donnees["linkedin"] ?>"  placeholder="linkedin">
      </div>
      <div>
        <input type="text" name="youtube" value="<?php echo $donnees["youtube"] ?>" placeholder="youtube">
      </div>
      <div>
        <input type="text" name="twitter" value="<?php echo $donnees["twitter"] ?>" placeholder="twitter">
      </div>
      <div>
        <input type="text" name="facebook" value="<?php echo $donnees["facebook"] ?>" placeholder="facebook">
      </div>
      <div>
        <input type="text" name="structure1" value="<?php echo $donnees["structure1"] ?>" placeholder="structure 1">
      </div>
      <div>
        <input type="text" name="structure2" value="<?php echo $donnees["structure2"] ?>" placeholder="structure 2">
      </div>
      <div>
        <input type="text" name="structure3" value="<?php echo $donnees["structure3"] ?>" placeholder="structure 3">
      </div>
      <div>
        <input type="text" name="projet1" value="<?php echo $donnees["projet1"] ?>" placeholder="projet 1">
      </div>
     <div>
        <input type="text" name="projet2" value="<?php echo $donnees["projet2"] ?>" placeholder="projet 2">
     </div>
      <div>
        <input type="text" name="projet3" value="<?php echo $donnees["projet3"] ?>" placeholder="projet 3">
      </div>
      <div>
        <input type="text" name="besoinaide" value="<?php echo $donnees["besoinaide"] ?>" placeholder="besoinaide">
      </div>
      <div>
        <input type="text" name="besoinhumain" value="<?php echo $donnees["besoinhumain"] ?>" placeholder="besoinhumain">
      </div>
      <div>
        <input type="text" name="besoinfinancier" value="<?php echo $donnees["besoinfinancier"] ?>" placeholder="besoinfinancier">
      </div>
      <div>
        <input type="text" name="specialites" value="<?php echo $donnees["specialites"] ?>" placeholder="specialites">
      </div>
      <div>
        <input type="text" name="networker" value="<?php echo $donnees["networker"] ?>" placeholder="networker">
      </div>
      <div>
        <input type="text" name="noteaction" value="<?php echo $donnees["noteaction"] ?>" placeholder="noteaction">
      </div>
      <input type="file" name="avatar">
      <div class="flex">
        <label>mecenat</label>
      <input type="checkbox" name="mecenat" <?php if($donnees['mecenat'] ==1){echo 'checked';} ?>>
      <label>mentorat</label>
      <input type="checkbox" name="mentorat" <?php if($donnees['mentorat'] ==1){echo 'checked';} ?>>
      <label>consultant</label>
      <input type="checkbox" name="consultant" <?php if($donnees['consultant'] ==1){echo 'checked';} ?> class="checkbox" >
      </div>
      <div class="flex">
        <label>coaching</label>
      <input type="checkbox" name="coaching" <?php if($donnees['coaching'] ==1){echo 'checked';} ?> class="checkbox">
      <label>facilitateur</label>
      <input type="checkbox" name="facilitateur" <?php if($donnees['facilitateur'] ==1){echo 'checked';} ?> class="checkbox">
      <label>formateur</label>
      <input type="checkbox" name="formateur" <?php if($donnees['formateur'] ==1){echo 'checked';} ?> class="checkbox">
      </div>
      <div class="flex">
        <label>enseignant</label>
      <input type="checkbox" name="enseignant" <?php if($donnees['enseignant'] ==1){echo 'checked';} ?> class="checkbox">
      <label>energetique</label>
      <input type="checkbox" name="energetique" <?php if($donnees['energetique'] ==1){echo 'checked';} ?> class="checkbox">
      <label>datadock</label>
      <input type="checkbox" name="datadock" <?php if($donnees['datadock'] ==1){echo 'checked';} ?> class="checkbox">
      </div>
      
      <div class="flex">
        <label>evenementiel</label>
      <input type="checkbox" name="evenementiel" <?php if($donnees['evenementiel'] ==1){echo 'checked';} ?> class="checkbox">
      <label>ressourcement</label>
      <input type="checkbox" name="ressourcement" <?php if($donnees['ressourcement'] ==1){echo 'checked';} ?> class="checkbox">
      
      </div>
      <div>
        <input type="date" name="dateadhesion" value="<?php echo $donnees["dateadhesion"] ?>" class="checkbox">
      </div>
      <div class="flex">
      <label>certification</label>
      <input type="checkbox" name="coreteam" <?php if($donnees['certification'] ==1){echo 'checked';} ?> class="checkbox">

      <label>Fiche visible</label>
      <input type="checkbox" name="fichevisible" <?php if($donnees['fichevisible'] ==1){echo 'checked';} ?> class="checkbox">
      </div>
      <button type="submit" class="modifyBtn">Enregistrer les modifications</button>
    </form>
  </div>
  </div>
  <?php
if(empty($errors)){
   if(!empty($_POST)){
// ------------boolean--------------
 if(!empty($_POST['mecenat'])){
    $mecenat= 1;
}else{
    $mecenat = 0;
}

 if(!empty($_POST['mentorat'])){
    $mentorat= 1;
}else{
    $mentorat = 0;
}

 if(!empty($_POST['consultant'])){
    $consultant= 1;
}else{
    $consultant = 0;
}


 if(!empty($_POST['coaching'])){
    $coaching= 1;
}else{
    $coaching = 0;
}

 if(!empty($_POST['facilitateur'])){
    $facilitateur= 1;
}else{
    $facilitateur= 0;
}

 if(!empty($_POST['fichevisible'])){
    $formateur= 1;
}else{
    $formateur = 0;
}

 if(!empty($_POST['enseignant'])){
    $enseignant= 1;
}else{
    $enseignant = 0;
}

 if(!empty($_POST['energetique'])){
    $energetique= 1;
}else{
    $energetique = 0;
}

 if(!empty($_POST['datadock'])){
    $datadock= 1;
}else{
    $datadock = 0;
}

 if(!empty($_POST['evenementiel'])){
    $evenementiel= 1;
}else{
    $evenementiel = 0;
}

 if(!empty($_POST['ressourcement'])){
    $ressourcement= 1;
}else{
    $ressourcement = 0;
}


 if(!empty($_POST['coreteam'])){
    $coreteam= 1;
}else{
    $coreteam = 0;
}

 if(!empty($_POST['certification'])){
    $certification= 1;
}else{
    $certification = 0;
}

 if(!empty($_POST['fichevisible'])){
    $fichevisible= 1;
}else{
    $fichevisible = 0;
}
// ---------------enregistrement image bdd---------------
if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
 $tailleMax = 2097152;
 $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
 if($_FILES['avatar']['size'] <= $tailleMax) {
    $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
    if(in_array($extensionUpload, $extensionsValides)) {
       $chemin = "assets/photo/".$id.".".$extensionUpload;
       $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
       if($resultat) {
          $connect = new PDO('mysql:dbname=carnet;host=localhost','root','');
          $updateavatar = $connect->prepare('UPDATE network SET photo = :avatar WHERE id = :id');
          $updateavatar->execute(array(
             'avatar' => $id.".".$extensionUpload,
             'id' => $id
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
// -------------modification données bdd----------------
  require_once 'db.php';
  $req = $pdo->prepare("UPDATE network SET nom = ?, prenom = ?, datenaissance = ?, adresse = ?, codepostal = ?, ville = ?, regions = ?, pays = ?, tel1 = ?, tel2 = ?, tel3 = ?, email1 = ?, email2 = ?, email3 = ?, siteweb1 = ?, siteweb2 = ?, siteweb3 = ?, linkedin = ?, youtube = ?, twitter = ?, facebook = ?, structure1 = ?, structure2 = ?, structure3 = ?, projet1 = ?, projet2 = ?,  projet3 = ?,  besoinaide = ?, besoinhumain = ?, besoinfinancier = ?, specialites = ?, mecenat = ?, mentorat = ?, consultant = ?, coaching = ?, facilitateur = ?, formateur = ?, enseignant = ?, energetique = ?, datadock = ?, evenementiel = ?, ressourcement = ?, networker= ?, coreteam = ?, dateadhesion= ?, certification = ?, noteaction = ?, fichevisible = ? WHERE id='".$id."'");

  $req->execute([$_POST['nom'], $_POST['prenom'], $_POST['datenaissance'], $_POST['adresse'], $_POST['codepostal'], $_POST['ville'], $_POST['regions'], $_POST['pays'], $_POST['tel1'], $_POST['tel2'], $_POST['tel3'], $_POST['email1'], $_POST['email2'], $_POST['email3'], $_POST['siteweb1'], $_POST['siteweb2'], $_POST['siteweb3'], $_POST['linkedin'], $_POST['youtube'], $_POST['twitter'], $_POST['facebook'], $_POST['structure1'],  $_POST['structure2'],  $_POST['structure3'], $_POST['projet1'], $_POST['projet2'], $_POST['projet3'], $_POST['besoinaide'], $_POST['besoinhumain'], $_POST['besoinfinancier'], $_POST['specialites'], $mecenat, $mentorat, $consultant, $coaching, $facilitateur, $formateur, $enseignant, $energetique, $datadock, $evenementiel, $ressourcement, $_POST['networker'], $coreteam, $_POST['dateadhesion'], $certification, $_POST['noteaction'], $fichevisible]);

 echo '<META http-equiv="refresh" content="0; URL=contacts.php">';
  exit();
}
}
?>
<footer><?php include"footer.php" ?></footer>
</body>
</html>