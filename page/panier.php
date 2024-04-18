<?php
session_start();

if (!isset($_SESSION['log']) ) {
	header('Location:/LaBalleJaune/page/compte.php');
}

require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/fctPanier.php");
require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/varSession.inc.php");
$login=$_SESSION['log'];


?>

<section>
    <h1>Votre panier</h1>
        <div class="contPanier">

        <?php 
        $panier=panier($login);
        $panierTab=explode(',',$panier);

        $nbArticles=0;
        $taille=count($panierTab);

		for ($i = 0; $i < $taille; $i++) {
			// Check if $panier[$i] is not null and has a length of at least 2
			if (isset($panier[$i]) && strlen($panier[$i]) >= 2) {
				$nbArticles = $nbArticles + 1;
			}
		}
		

		if($nbArticles==0) {
		echo "<br> Votre panier est vide <br><br>";
		}	
		else {
		
				$i=1;

				echo "<br>"	;
				while (isset($panierTab[$i])) { 
					$ref=substr($panierTab[$i], 0, 1); 
			

					if($ref=="r"){ 
						$article="raquette";
					}
					if($ref=="c"){ 
						$article="chaussure";
					}
					if($ref=="t"){ 
						$article="textile";
					}
					if($ref=="s"){ 
						$article="sac";
					}
					if($ref=="b"){ 
						$article="balle";
					}

					$donneesArticle=InfoProduit($panierTab[$i], $article); 
						if (empty($donneesArticle)==false) { 

							?>

								<div class="panier">
									<img class="imgPanier" src="/LaBalleJaune/img/<?=$donneesArticle['image']?>" alt=<?=$donneesArticle['nom']?>>
									<p><?=$donneesArticle['nom'];?></p>
									<p><?=$donneesArticle['prix'];?> &euro;</p>
					
									<form method='POST' action='/LaBalleJaune/php/supPanier.php'>
										<input type="hidden" name="indicePanier" value="<?=$i?>">
										<input class="" type="submit" name="supPanier" value="Supprimer"/>
									</form>
								</div>

							<?php
							$i++; 								
						}
						else {
							$i++;	
						}
				}
		}
		?>
		</div>
</section>

<?php 
$content=ob_get_clean();
require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/squelette.php");
?>

