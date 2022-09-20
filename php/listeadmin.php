<?php
session_start();



ob_start();

//On se connecte
$servername = "localhost";
$username = "root";
$password = "";
$db="laballejaune";
$conn = mysqli_connect($servername, $username, $password,$db);

//On affiche le stock de la bdd
$sql = "SELECT * FROM produits ";
$result = $conn->query($sql);
$row = mysqli_fetch_row( $result ); ?>

<section style="background: grey;">
	LISTE DES STOCKS: <br><br><br>

	ID: 1 <br>
	Ref: r1 <br>
	Nom: Wilson Blade <br>
	Prix: 160 <br>
    Stock: 7 <br> <br>

    <?php

	while ( $row = mysqli_fetch_row( $result ) ) {

		?> 

		ID: <?php echo $row[0]; ?> <br>
		Ref: <?php echo $row[1]; ?> <br>
		Nom: <?php echo $row[2]; ?> <br>
		Prix: <?php echo $row[3]; ?> <br>
	    Stock: <?php echo $row[4]; ?> <br> <br>

		<?php
	}


	?> 
</section>


<?php 
$content=ob_get_clean();
require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/squelette.php");
?>