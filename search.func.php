<?php require'db.php';?>
​
    <?php
    //COMPTEUR DU NOMBRE DE RESULTATS

    $pdo = new PDO('mysql:dbname=carnet;host=localhost','root','');

    //RECUPERE MAX ID ET CREE UN TABLEAU DE ZEROS DE LONGEUR MAXID 
    $requete = "SELECT MAX(id) FROM network";
    //prepare la requete
    $pdoMaxId = $pdo->prepare($requete);
    //execute la requete
    $executeIsOk = $pdoMaxId->execute();
    if($executeIsOk) {
    	$max_id=intval($pdoMaxId->fetch()[0]);
    	
    }
    $zeros=array_fill(0,$max_id,0);


    //SI LE NOM EST SET, AJOUTE COMPTE LE NOMBRE D'APPELS DE CHAQUE ID
    if(isset($_POST['recherche']) && strcmp($_POST['recherche'],"") !== 0) {

    	$recherche=preg_split("/[\s,]+/", $_POST["recherche"]);

    	for($i=0; $i<count($recherche); $i++) {
    		if(strcmp($recherche[$i],"")!==0) {
    			$requete = "SELECT id FROM network WHERE nom like ";
        		$requete.="'".$recherche[$i]."' OR prenom like '".$recherche[$i]."'";
                $requete.=" OR email1 like '".$recherche[$i]."'";
                $requete.=" OR structure1 like '".$recherche[$i]."'";
        		//prepare la requete
		        $pdoStat1 = $pdo->prepare($requete);
		        //execute la requete
		        $executeIsOk = $pdoStat1->execute();
        		if($executeIsOk) {
        			while($id_recupere=$pdoStat1->fetch()){
 
            			$zeros[intval($id_recupere[0]-1)]+=1;
        			}
        		}
    		}
    	}
    }
 

    if(isset($_POST["specialite"])){

    	for($i = 0 ; $i< count($_POST["specialite"]); $i++) {

        	$spe=$_POST["specialite"][$i];

        	$requete = "SELECT id FROM network WHERE ".$spe." = "."1";


            $pdoStat3 = $pdo->prepare($requete);

            //prepare la requete
            $executeIsOk = $pdoStat3->execute();

            //execute la requete
            if($executeIsOk) {
    			while($id_recupere=$pdoStat3->fetch()){
        			$zeros[intval($id_recupere[0]-1)]+=1;
    			}
        }
    }

    }

    function nbResultats(){
    	global $zeros;
    	$nb_resultats=0;
    	for($i=0; $i<count($zeros); $i++) {
    		if($zeros[$i]!=0) {
    			$nb_resultats++;
    		}
    	}
    	return $nb_resultats;
    }

    function topRecherche() {
		global $zeros;
    	$copy=$zeros;
    	$topTab=array();
    	$count=count($zeros);
    	while(count( $copy ) != count( array_keys( $copy, 0))) {
    		$max=0;
    		for($i=0; $i<count($zeros); $i++) {
    			if($copy[$i]>$max) {
    				$max=$copy[$i];
    			}
    		}
    		array_push($topTab,array_keys($copy,$max)[0]+1);
    		$copy[array_keys($copy,$max)[0]]=0;
    		$count--;
    		//array_fill($topTab, )
    	}
    	return $topTab;
    }

    function resultatRecherche() {
		global $zeros;
    	$resultat = array();
    	$topTab=topRecherche();
    	global $pdo;
    	
    	for($i=0; $i<count($topTab); $i++) {
    		$requete = "SELECT prenom,nom,structure1,email1,id FROM network WHERE id = ".$topTab[$i];
	    	$pdoStat = $pdo->prepare($requete);
	        $executeIsOk = $pdoStat->execute();

	        if($executeIsOk) {
				array_push($resultat, $pdoStat->fetchAll()[0]);
	        }
    	}

    	return $resultat;
    }



    ?>