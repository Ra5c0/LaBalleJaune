<?php
session_start();

if (isset($_SESSION['log']) ) {
	header('Location:/LaBalleJaune/index.php');
}
else {
  
	if ( (isset($_POST['nom'])) && (isset($_POST['prenom'])) && (isset($_POST['sexe'])) && (isset($_POST['date'])) && (isset($_POST['mail'])) && (isset($_POST['login'])) && (isset($_POST['pwd'])) )
	{

	
       

		if ((!empty($_POST['login'])) && (!empty($_POST['pwd'])) && (!empty($_POST['mail'])) && (!empty($_POST['nom'])) && (!empty($_POST['prenom'])) && (!empty($_POST['date'])) && (!empty($_POST['sexe'])) ) {
			$login= trim($_POST['login']);
			$tmpPwd= trim($_POST['pwd']);
			$email= trim($_POST['mail']);
			$nom= trim($_POST['nom']);
			$prenom= trim($_POST['prenom']);
			$date= trim($_POST['date']);
			$sexe= trim($_POST['sexe']);


			if (addInscription($nom, $prenom, $sexe, $date, $email, $login, $tmpPwd))	{

                unset($_SESSION['erreurInscription']);

                $_SESSION['profil']['nom']=$nom;
                $_SESSION['profil']['prenom']=$prenom;
                $_SESSION['profil']['sexe']=$sexe;
                $_SESSION['profil']['naissance']=$date;
                $_SESSION['profil']['email']=$email;
                $_SESSION['profil']['login']=$login;

				header("Location:/LaBalleJaune/index.php");
			}
			else
			{
                header("Location:/LaBalleJaune/page/inscription.php");
			}

		} 	
		else 
		{		
            $_SESSION['erreurInscription']="Au moins un champ est vide";
			header("Location:/LaBalleJaune/page/inscription.php");
		}	

	}
	else 
	{
        $_SESSION['erreurInscription']="Formulaire non valide";
		header("Location:/LaBalleJaune/page/inscription.php");
	}

}




function loginLibre($login) { 
   
    $atrouve=0;

    $xml = simplexml_load_file('utilisateurs.xml');
    $list = $xml->utilisateur;
        
    for ($i = 0; $i < count($list); $i++) {
    
        $tmpLogin=$list[$i]->login;

        if ($login==$tmpLogin) {
           $atrouve=1;
           $_SESSION['erreurInscription']="Login déjà pris";
           return false;
        }
    }
	
	if ($atrouve==0) {
		return true ;
	}
}

function addInscription($nom, $prenom, $sexe, $date, $email, $login, $pwd) {

	if (loginLibre($login)==true) {
		                
        $xmldoc = new DomDocument();    
        $xmldoc->formatOutput = true;
        $xmldoc->preserveWhiteSpace = false;

        $panier=""; 

        if($xml = file_get_contents('../php/utilisateurs.xml'))
        $xmldoc->loadXML($xml);
        $nodelist = $xmldoc->getElementsByTagName('utilisateurs');

        if($nodelist->length === 0) {
        $nodelist = $doc->createElement("utilisateurs"); 
        $xmldoc->appendChild($nodelist);
        $nodelist = $xmldoc->getElementsByTagName('utilisateurs');
        }

        $utilisateurs=$xmldoc->getElementsByTagName('utilisateur');
        $id=$utilisateurs->length;

        foreach($nodelist as $key => $node) {
        
        $element = $xmldoc->createElement("utilisateur");
        $utilisateur = $node->appendChild($element);
        $idAttribute = $xmldoc->createAttribute("id");
        $idAttribute->value = $id;
        $element->appendChild($idAttribute);   
        
        $element = $xmldoc->createElement("nom");
        $Text = $utilisateur->appendChild($element); 
        $element = $xmldoc->createTextNode($nom);
        $Text->appendChild($element);        
        
        $element = $xmldoc->createElement("prenom");
        $Text = $utilisateur->appendChild($element);
        $element = $xmldoc->createTextNode($prenom);
        $Text->appendChild($element);
        
        $element = $xmldoc->createElement("sexe");
        $Text = $utilisateur->appendChild($element);
        $element = $xmldoc->createTextNode($sexe);
        $Text->appendChild($element);

        $element = $xmldoc->createElement("naissance");
        $Text = $utilisateur->appendChild($element);
        $element = $xmldoc->createTextNode($date);
        $Text->appendChild($element);

        $element = $xmldoc->createElement("email");
        $Text = $utilisateur->appendChild($element);
        $element = $xmldoc->createTextNode($email);
        $Text->appendChild($element);

        $element = $xmldoc->createElement("login");
        $Text = $utilisateur->appendChild($element);
        $element = $xmldoc->createTextNode($login);
        $Text->appendChild($element);

        $element = $xmldoc->createElement("pwd");
        $Text = $utilisateur->appendChild($element);
        $element = $xmldoc->createTextNode($pwd);
        $Text->appendChild($element);

        $element = $xmldoc->createElement("panier");
        $Text = $utilisateur->appendChild($element);
        $element = $xmldoc->createTextNode("");
        $Text->appendChild($element);

        }

        $xmldoc->save('../php/utilisateurs.xml');

        $_SESSION['log']=$login;
        return true;
	}
	else
	{
        $_SESSION['erreurInscription']="Erreur, login non disponible";
		return false;
	}

}

?>
