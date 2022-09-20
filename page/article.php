<?php
session_start();

if (!isset($_SESSION['erreurAchat']) ) {
	$_SESSION['erreurAchat']="";
}

require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/varSession.inc.php");

if (!isset($_GET['cat']) ) {
	header('Location:../LaBalleJaune/index.php');
}
else
{
    if ($_GET['cat']=="raquette") {
        $titrePage="Raquettes";
        $categorie=$_GET['cat'];
        $article="raquette";
        $ref="r";
        $nbArticle=count($_SESSION['categorie']['raquette']);
    }
    else if ($_GET['cat']=="chaussure") {
        $titrePage="Chaussures";
        $categorie=$_GET['cat'];
        $article="chaussure";
        $ref="c";
        $nbArticle=count($_SESSION['categorie']['chaussure']);
    }
    else if ($_GET['cat']=="textile") {
        $titrePage="Textiles";
        $categorie=$_GET['cat'];
        $article="textile";
        $ref="t";
        $nbArticle=count($_SESSION['categorie']['textile']);
    }
    else if ($_GET['cat']=="sac") {
        $titrePage="Sacs";
        $categorie=$_GET['cat'];
        $article="sac";
        $ref="s";
        $nbArticle=count($_SESSION['categorie']['sac']);
    }
    else if ($_GET['cat']=="balle") {
        $titrePage="Balles";
        $categorie=$_GET['cat'];
        $article="balle";
        $ref="b";
        $nbArticle=count($_SESSION['categorie']['balle']);
    }
    
    if( ($_GET['cat']!="raquette") && ($_GET['cat']!="chaussure") && ($_GET['cat']!="textile") && ($_GET['cat']!="sac") && ($_GET['cat']!="balle") ){
        header('Location:../LaBalleJaune/index.php');
    }
}

ob_start();
?>

<section>
    <h1><?=$titrePage?></h1>
                <div id="stock">
                    <button onclick="Show()">Afficher le stock</button>
                </div>
                <div id="source" class="contsec">

                    <?php
                    for ($i=1; $i <=$nbArticle; $i++) {
                        $imgArticle=$_SESSION['categorie'][$article][$ref.$i]['image'];
                        $nomArticle=$_SESSION['categorie'][$article][$ref.$i]['nom'];
                        $prixArticle=$_SESSION['categorie'][$article][$ref.$i]['prix'];
                        $stockArticle=$_SESSION['categorie'][$article][$ref.$i]['stock'];
                        $refArticle=$_SESSION['categorie'][$article][$ref.$i];
                    ?>


                    <div class="card">
                        <img src="../img/<?=$imgArticle?>" alt=<?=$nomArticle?> width="100" onmouseover="this.width=150;" onmouseout="this.width=100">
                        <div class="contcard">
                            <h4><b><?=$nomArticle?></b></h4>
                            <p id="prix"><?=$prixArticle?> &euro;</p>
                            <p id="ref">ref : <?=$ref.$i?></p>
                        </div>
                        <hr />
                        <div class="contajout">
                            
                            <?php 
                            if ($stockArticle==0) { ?>
                            <p style="display:none;" class="affichagestock">
                                Stock = <?=$stockArticle?>                               
                            </p>
                            <strong><br>INDISPONIBLE<br><br></strong>
                            <?php
                            }
                            else { 
                            ?>
                            
                                <p style="display:none;" class="affichagestock">
                                Stock = <?=$stockArticle?>                               
                                </p>

                                <?php if (isset($_SESSION['log'])) {
                                ?>
                                <div class="compteur">
                                <form class="form-quantite" name="Form" method="POST" onsubmit="return ajouter(<?=$i-1?>)" action='/LaBalleJaune/php/ajouterPanier.php'>
                                    <button type="button" onclick="substract(<?=$i-1?>);" class="moins"> - </button>
                                    <input type="number" name="quantite" max="<?=$stockArticle?>" value="0" min="0" class="form-control" readonly />
                                    <button type="button" onclick="add(<?=$i-1?>);" class="plus"> + </button>
                                    <input type="hidden" name="REF" value="<?=$ref.$i?>">
                                </div>
                                    <input type="submit" name="ajouterPanier" value="Ajouter au panier"/>
                                </form>
                                
                                <?php
                                }
                            } 
                            ?>

                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
</section>

<?php 
$content=ob_get_clean();

if (!isset($_GET['cat']) ) {
	header('Location:../LaBalleJaune/index.php'); 
}
else {
    if ($_GET['cat']=="raquette") {
        $titrePage="Raquettes";
        require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/squelette.php");
    }
    else if ($_GET['cat']=="chaussure") {
        $titrePage="Chaussures";
        require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/squelette.php");
    }
    else if ($_GET['cat']=="textile") {
        $titrePage="Textiles";
        require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/squelette.php");
    }
    else if ($_GET['cat']=="sac") {
        $titrePage="Sacs";
        require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/squelette.php");
    }
    else if ($_GET['cat']=="balle") {
        $titrePage="Balles";
        require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/squelette.php");
    }
    
    if( ($_GET['cat']!="raquette") && ($_GET['cat']!="chaussure") && ($_GET['cat']!="textile") && ($_GET['cat']!="sac") && ($_GET['cat']!="balle") ){
        header('Location:../LaBalleJaune/index.php');
    }
}
?>