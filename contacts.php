<?php 
  require 'function.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<?php include"head.php" ?>
  <link rel="stylesheet" type="text/css" href="assets/css/contacts.css">
  <link rel="stylesheet" type="text/css" href="assets/css/search.css">
  <script src="assets/js/search.js"></script>
  <script>
      $(document).ready(function () {
          $("#selection").CreateMultiCheckBox({ width: '230px', defaultText : 'Spécialité', height:'250px' });
      });
  </script>
  <title>Contacts</title>
</head>
<body>
  <header><?php include"header.php" ?>
<main class="contactsMain">
    <div class="searchBarContainer fixed-top"><?php include"search.php" ?></div>
  <div class="cardContainer">
<?php
require "db.php";
$req = 'SELECT * FROM network WHERE fichevisible = 1 ORDER BY nom';
$result = $pdo->query($req);
$count=0; 
if(isset($_GET['max'])) {
  $max = $_GET['max'];
}
else{
  $max = 10;
}
if(!empty($_POST['envoyer'])) {

    $max+=10;
    // ou echo afficher();
}
while(($donnees = $result->fetch(PDO::FETCH_ASSOC)) && ($count<$max)){
?>
   <a href="profile.php?id=<?php echo $donnees['id'];?>">
     <div class="card">
       <?php if(strcmp($donnees['photo'],"") !== 0) {
        ?>
        <img src="assets/photo/<?php echo $donnees['photo'] ?>" class="card-img-top" alt="photo de profil">
      <?php
      }else {
        ?>
        <img src="assets/img/profile.png" class="card-img-top" alt="photo de profil">
      <?php
      }
      ?>
      <div class="card-body">
    <h5 class="card-title"><?php echo $donnees["nom"].' '.$donnees["prenom"] ?></h5>
    <p class="card-text"><?php echo $donnees["ville"].' '.$donnees["regions"] ?></p>
    <p class="card-text"><?php echo $donnees["pays"] ?></p>
    <p class="card-text"><?php echo $donnees["linkedin"] ?></p>
    <p class="card-text"><?php echo $donnees["specialites"] ?></p>
      <?php
        if (!empty($_SESSION)){
        if($_SESSION['current_user']['coreteam'] == 1) {
          ?>
          <div class="delete">
            <a href="delete.php?id=<?php echo $donnees['id'];?>" onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');">
              <i class="far fa-trash-alt fa-2x"></i>
          </a>
          </div>
        <?php
        }else{
      ?>
      <a href="profile.php?id=<?php echo $donnees['id'];?>" class="btn btn-danger">Voir le profil</a>
      <?php
        }
      }
            ?>
      </div>
    </div>
       </a>
       <?php 
     }
        ?>
    </div>
<?php
  $count++;
if(!empty($donnees)) {
?>
  <form action="?max=<?php echo $max."#ancre";?>" method="post">
    <input type="submit" id="envoyer" name="envoyer" value="Afficher la suite ..">
  <?php  
}
?>
<script type="text/javascript">
 fonction ta_fonction()
{
rep = confirm('Etes vous sûr de valider?');
if(rep)
{ // SI LA PERSONNE A APPUYER SUR OUI
 return true;
}
else
{ // SI LA PERSONNE N'A PAS APPUYER SUR OUI
return false;
}
} 
</script>
<a name="ancre"></a> 
</main> 
<footer><?php include"footer.php" ?></footer>
</body>
</html>