<?php

	//On établit la connexion
    $bdd = new PDO('mysql:host=localhost;dbname=laballejaune', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    echo 'Connexion reussie';
    ?>
    <br>
    <br>
    <br>
    <?php

    //On récupère les données de la bdd

    //Categories
    ?>
    <br>
    Les differentes categories de produits: 
    <br>
    <?php
    $reponse = $bdd->query('SELECT * FROM categories');
    while ($donnees = $reponse->fetch()){
    	echo $donnees['name'];
    	?>
    	<br>
    	<?php
	}

	//Membres
	?>
	<br>
    Liste des membres: 
    <?php
    $reponse = $bdd->query('SELECT * FROM membres');
    while ($donnees = $reponse->fetch()){
    	?>
    	<br>
    	Pseudo: 
    	<?php
    	echo $donnees['pseudo'];
    	?>
    	<br>
    	Adresse mail: 
    	<?php
    	echo $donnees['email'];
    	?>
    	<br>
    	<?php
	}

	//Produits
	?>
	<br>
    Liste des produits: 
    <?php
    $reponse = $bdd->query('SELECT * FROM produits');
    while ($donnees = $reponse->fetch()){
    	?>
    	<br>
    	Reference: 
    	<?php
    	echo $donnees['ref'];
    	?>
    	<br>
    	Nom: 
    	<?php
    	echo $donnees['nom'];
    	?>
    	<br>
    	Prix: 
    	<?php
    	echo $donnees['prix'];
    	?>
    	<br>
    	Stock: 
    	<?php
    	echo $donnees['stock'];
    	?>
    	<br>
    	<?php
	}

	$reponse->closeCursor(); // Termine le traitement de la requête

    //On se déconnecte
    $bdd = null;
?>
