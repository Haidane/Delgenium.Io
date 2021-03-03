<!DOCTYPE html>
<html>
<head>
    <?php include"head.php" ?>
    <link href="css/normalize.css" rel="stylesheet">
    <!-- ------------------link----------------->
    <link rel="stylesheet" type="text/css" href="assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="assets/css/search.css">
    <link rel="stylesheet" type="text/css" href="assets/css/search.results.css">
    <!-- ---------------------script--------------- -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php include('db.php');?>
    <?php include('search.func.php');?>
    <?php $recherche = resultatRecherche();
    $nb_resultats = nbResultats();?>
</head>
<header><?php include"header.php" ?></header>
<body>
<main class="marginTopSearch">
    <?php
    if($nb_resultats == 0) {
        ?>
        <h1> Aucun profil ne correspond à votre recherche </h1>
        <br>
        <form method="get" action="search.php">
        <button type="submit">Nouvelle Recherche</button>
        </form>
        <?php
    }
    else {
        if($nb_resultats == 1) {
            echo "<h1> $nb_resultats profil trouvé ..</h1>";
        }
        else {
             echo "<h1> $nb_resultats profils trouvés .. </h1>";
        }
    }
    ?>
    <div class=recherche>
    <?php

    for($i=0; $i<count($recherche); $i++) {
        
       
        
        $prenom=ucwords($recherche[$i][0]);
        $nom=ucwords($recherche[$i][1]);
        $id=ucwords($recherche[$i][4]);
        echo "<h2><a href='profile.php?id=$id'>$prenom $nom</a></h2>";

    }
    
    ?>
    <hr>
    </div>

</main>
<!--   <footer><?php include"footer.php" ?></footer>   -->
</body>

</html>