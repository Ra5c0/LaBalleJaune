<?php
session_start();

if ( !isset($_SESSION['log'])){ 
    header('Location:/LaBalleJaune/page/compte.php');
}
if ( !isset($_POST['supPanier'])){ 
    header('Location:/LaBalleJaune/page/panier.php');
}
if ( !isset($_POST['indicePanier'])){ 
    header('Location:/LaBalleJaune/page/panier.php');
}

$login=$_SESSION['log'];

require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/fctPanier.php");


if (isset($_POST['indicePanier']) ) 
{
		$indiceElementPanier=$_POST['indicePanier'];
		supPanier($indiceElementPanier, $login);
		header('Location:/LaBalleJaune/page/panier.php');
}

?>