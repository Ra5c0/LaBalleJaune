<!DOCTYPE html>
<html lang="fr">
<head>
    <title>L.B.J</title>
    <meta charset="utf-8">
    <meta name="author" content="Oscar Gigon/Yassine EL ASRI">
    <script type="text/javascript" src="/LaBalleJaune/js/script1.js"></script>
    <link rel="stylesheet" type="text/css" href="/LaBalleJaune/css/style.css">
    <link rel="icon" type="image/png" href="/LaBalleJaune/img/logo2.png" />
</head>

<body>
	<header>
		<img class="logo" src="/LaBalleJaune/img/logo1.png">
		<div class="headerdroite">
			<div class="headerdroite-haut">
				<p><img src="/LaBalleJaune/img/tel1.png" /> 00 00 00 00 00</p>
				<p><img src="/LaBalleJaune/img/mail2.png" /> rgpd@lbj.fr</p>
			</div>
			<div class="headerdroite-bas">
				<?php 
				if (isset($_SESSION['log']))
				{ ?>
					<a href="/LaBalleJaune/page/profil.php" class="buttonCompte"><img src="/LaBalleJaune/img/compte1.png" /></a>
					<a href="/LaBalleJaune/page/panier.php" class="buttonCompte"><img src="/LaBalleJaune/img/panier1.png" /></a>
				<?php
				}
				else{
				?>
					<a href="/LaBalleJaune/page/compte.php" class="buttonCompte"><img src="/LaBalleJaune/img/compte1.png" /></a>
				<?php
				}
				?> 
			</div>
		</div>
		
		<h1>LaBalleJaune</h1>

		<nav>
			<ul id="menu">
				<li><a href="/LaBalleJaune/index.php">Accueil</a></li>
				<li><a href="/LaBalleJaune/page/article.php?cat=raquette">Raquettes</a></li>
				<li><a href="/LaBalleJaune/page/article.php?cat=chaussure">Chaussures</a></li>
				<li><a href="/LaBalleJaune/page/article.php?cat=textile">Textiles</a></li>
				<li><a href="/LaBalleJaune/page/article.php?cat=sac">Sacs</a></li>
				<li><a href="/LaBalleJaune/page/article.php?cat=balle">Balles</a></li>
				<li><a href="/LaBalleJaune/page/contact.php">Contact</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<?php echo $content;?>

		<aside>
			<h2>L.B.J</h2>
			<a href="/LaBalleJaune/index.php" class="btnAside">Accueil</a><br>
			<?php 
			if (isset($_SESSION['log'])){ 
			?>
				<a href="/LaBalleJaune/page/profil.php" class="btnAside">Mon Compte</a><br>
				<a href="/LaBalleJaune/page/panier.php" class="btnAside">Mon Panier</a><br>
			<?php
			}
			else{
			?>
				<a href="/LaBalleJaune/page/compte.php" class="btnAside">Mon Compte</a><br>
			<?php
			}
			?> 
			<br>
			<h2>Produits</h2>
			<a href="/LaBalleJaune/page/article.php?cat=raquette" class="btnAside">Raquettes</a><br>
			<a href="/LaBalleJaune/page/article.php?cat=chaussure" class="btnAside">Chaussures</a><br>
			<a href="/LaBalleJaune/page/article.php?cat=textile" class="btnAside">Textiles</a><br>
			<a href="/LaBalleJaune/page/article.php?cat=sac" class="btnAside">Sacs</a><br>
			<a href="/LaBalleJaune/page/article.php?cat=balle" class="btnAside">Balles</a><br><br>
			<a href="/LaBalleJaune/page/contact.php" class="btnAside">Contact</a><br>
			<br>
		</aside>		
	</main>

	<footer>
		<div class="contFooter">
			<a href="/LaBalleJaune/page/mention.php">Mentions l&eacute;gales</a> - <a href="/LaBalleJaune/page/condition.php">Conditions g&eacute;n&eacute;rales</a>
			<hr />
			<p style="opacity: 0.6;">&copy; 2021 - LaBalleJaune.fr</p>
    </div>
	</footer>
</body>
</html>