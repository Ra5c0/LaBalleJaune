<?php
session_start();

ob_start();
?>

<section>
	<div class="contCondition">
		<h2 style="text-align: center;">Mentions légales</h2>
			<h4>Auteur :</h4>
			<p>Société LaBalleJaune (Gigon Oscar & El Asri Yassine étudiant en ING1 GI1 à CY Tech) <br><br>
			Avenue du Parc, 95000 Cergy</p>
			<h4>Mail :</h4>
			- <a style="text-decoration: underline;">gigonoscar@eisti.eu</a><p></p>- <a style="text-decoration: underline;">elasriyass@eisti.eu</a>
			<h4>Avertissement</h4>
			<p>Toute reproduction, représentation, traduction, adaptation, ou citation qu'elle soit intégrale ou partielle, quelqu'en soit le procédé, est strictement interdite sans autorisation de la société LaBalleJaune, sauf cas prévus par l'article L.112-5 du code de la propriété intellectuelle. Les marques citées sont la propriété de leurs détenteurs respectifs. Photos non contractuelles.</p>
	</div>
</section>

<?php 
$content=ob_get_clean(); 
require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/squelette.php");
?>