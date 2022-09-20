<?php
session_start();



ob_start();
?>

<section>
	<?php 
	if (!isset($_SESSION['log'])) { 
	?>
	<img class="imgAcc" src="img/logo2.png">
	<h1 class="ComAcc"><b>Bienvenue sur LaBalleJaune !</b></h1>
	<?php
	}
	else{
	?>
	<img class="imgAcc" src="img/logo2.png">
	<h1 class="ComAcc"><b>Bienvenue <?=$_SESSION['log']?> !</b></h1>
	<?php
	}
	?> 
</section>

<?php 
$content=ob_get_clean();
require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/squelette.php");
?>