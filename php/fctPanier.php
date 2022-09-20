<?php
function ajoutPanier($REF_article, $login, $qte) {

	$panier=panier($login);
    $panierTab=explode(',',$panier);
    
    for ($i=1; $i <=$qte ; $i++) { 
        $taille=count($panierTab);
        $panierTab[$taille]=$REF_article;
    }

    $panier=implode(',', $panierTab) ;
	majPanier($panier, $login);
}

function panier($login) {
    $atrouve=0;

    $xml = simplexml_load_file ('../php/utilisateurs.xml'); 
    $list = $xml->utilisateur;
    
            
    for ($i = 0; $i < count($list); $i++) {       
        $tmpLogin=$list[$i]->login;

        if($login==$tmpLogin){ 
            
            $panier=$list[$i]->panier;
            $atrouve=1;
            return $panier; 
        } 
	}
	
	if ($atrouve==0){
        $_SESSION['erreurAchat']="Erreur d'utilisateur";
        header('Location:/LaBalleJaune/page/article.php?cat=raquette'); 
	}
}


function majPanier($newPanier, $login) {
    $atrouve=0;

    $xml = simplexml_load_file('../php/utilisateurs.xml'); 
    $list = $xml->utilisateur;
            
    for ($i = 0; $i < count($list); $i++) {        
        $tmpLogin=$list[$i]->login;

        if($login==$tmpLogin){ 

            $list[$i]->panier=$newPanier;

            $xml->asXML('../php/utilisateurs.xml');
            $atrouve=1;
            return;
        }
	}
	
	if ($atrouve==0){
        $_SESSION['erreurAchat']="Erreur de panier";
        header('Location:/LaBalleJaune/page/article.php?cat=raquette'); 
	}
}

 

function infoProduit($REF_article, $article){ 
    $atrouve=0;
    $nbArticle=count($_SESSION['categorie'][$article]);
    $ref=substr($REF_article, 0, 5); 

    $tmpREF_article=array_keys($_SESSION['categorie'][$article]);

    for ($i=1; $i <= $nbArticle; $i++) { 
        
        if ($tmpREF_article[$i-1]==$REF_article) { 
           $nom=$_SESSION['categorie'][$article][$ref]['nom'];
           $img=$_SESSION['categorie'][$article][$ref]['image'];
           $prix=$_SESSION['categorie'][$article][$ref]['prix'];
           $stock=$_SESSION['categorie'][$article][$ref]['stock'];

           $donneesArticle=array (
            "nom"  => $nom,
            "image" => $img,
            "prix" => $prix,
            "stock" => $stock
            );

           
            $atrouve=1;
            return $donneesArticle;
            
        }
    }

    if ($atrouve==0){
        $vide=array();
        return $vide; 
	}
} 

function supPanier($indiceElementPanier, $login) {
	$panier=panier($login);
    $panierTab=explode(',',$panier);
	unset($panierTab[$indiceElementPanier]);

	$newPanier=implode(',', $panierTab);
	majPanier($newPanier, $login);
}

?>