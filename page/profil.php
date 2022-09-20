<?php
session_start();

if ( (!isset($_SESSION['log'])) ) { 
	header('Location:/LaBalleJaune/page/compte.php');
}

ob_start(); 
?>

<section>
	<h1>Mon profil</h1>
	<div class="contProfil">
		<h3>Informations personnelles</h3>
		<hr class="hrinscription">
		<p><b>Login :</b> <?=$_SESSION['log'];?></p>
		<p><b>Email :</b> <?=$_SESSION['profil']['email'];?></p>
		<p><b>Nom :</b> <?=$_SESSION['profil']['nom'];?></p>
		<p><b>Prenom :</b> <?=$_SESSION['profil']['prenom'];?></p>
		<p><b>Sexe :</b> <?=$_SESSION['profil']['sexe'];?></p>
		<p><b>Date de naissance :</b> <?=$_SESSION['profil']['naissance'];?></p><br>
		<br>
		<a href="/LaBalleJaune/php/deconnexion.php">Se d&eacute;connecter</a>
	</div>
</section>

<?php 
$content=ob_get_clean();
require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/squelette.php");
?>
