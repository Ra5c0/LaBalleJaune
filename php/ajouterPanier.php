<?php
session_start();

if ( !isset($_SESSION['log'])){ 
    header('Location:/LaBalleJaune/page/compte.php');
}

if ( !isset($_POST['REF']) ){ 
    $_SESSION['erreurAchat']="Erreur d'article";
    header('Location:/LaBalleJaune/article.php?cat=raquette'); 
}

if ( !isset($_POST['quantite']) ){ 
    $_SESSION['erreurAchat']="Erreur de quantité"; 
    header('Location:/LaBalleJaune/page/article.php?cat=raquette'); 
}

require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/fctPanier.php");

if ( (isset($_SESSION['log'])) && (isset($_POST['ajouterPanier']))  )  
{
    $REF_article=$_POST['REF'];
	$login=trim($_SESSION['log']);
    $qte=$_POST['quantite'];

	ajoutPanier($REF_article, $login, $qte);
    unset($_SESSION['erreurAchat']);
    
	header("Location:/LaBalleJaune/page/panier.php");
}

?>