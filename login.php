<?php 
session_start();
// ------connexion a la base de données--------
$pdo = new PDO('mysql:dbname=carnet;host=localhost','root','');
if (!empty($_POST['email1'])) {
    if(true) {
    $query = "SELECT * FROM network WHERE email1= ?";
    $prep_query = $pdo->prepare($query);
    $prep_query->execute([$_POST['email1']]);
    $user = $prep_query->fetch();
    if($user) {
        if(password_verify($_POST['pwd'], $user['pwd'])){
            $_SESSION['current_user'] = $user;
            header('Location: contacts.php');
            die();
        } else {
            header('Location: login.php');
            die();
        }
    }
}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion</title>
    <?php include"head.php"?>
    <link rel="stylesheet" type="text/css" href="assets/css/sign.css">
</head>
<body>
    <header><?php include"header.php"?></header>
        <div class="bg-connect"></div>
        <div class="contentContainer">

            <div class="containerSignin center top bottom">
	           <div class="top bottom logoDiv">
		            <a href="index.php"><img class="welcome" src="assets/img/delgenium.PNG"></a>
	            </div>
                <h3 class="signInTitle top">Se connecter</h3>
            	<form method="POST" action="" class="top bottom">
            		<input type="Email" name="email1" placeholder="  Email" class="signin bottom top">
            		<input type="password" name="pwd" placeholder="  Mot de passe" class="signin bottom">

            		<div class="bottom center">
            			<button type="submit" class="signinBtn">Accéder à mon carnet</button>
            		</div>
            	</form>
	        <a href="#">mot de passe oublié</a>
            </div>
        </div>

<footer><?php include"footer.php"?></footer>
</body>
</html>