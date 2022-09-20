<?php
session_start();

if (isset($_SESSION['log']) ) {
	header('Location:/LaBalleJaune/index.php');
}
else {

    if ( (isset($_POST['login'])) && (isset($_POST['pwd'])) )
	{	

		if ( (!empty($_POST['login'])) && (!empty($_POST['pwd'])) )
		{
			$login= trim($_POST['login']);
            $pwd=trim($_POST['pwd']);

			if (compareLog($login,$pwd))	{       
				$_SESSION['log']=$login;
				unset($_SESSION['erreurConnexion']);
                header("Location:/LaBalleJaune/index.php");
			}
			else {
				header("Location:/LaBalleJaune/page/compte.php");
			}

		} 	
		else {		
            $_SESSION['erreurConnexion']="Au moins un champ est vide";
			header("Location:/LaBalleJaune/page/compte.php");
		}	

	}
	else 
	{
        $_SESSION['erreurConnexion']="Formulaire non valide";
		header("Location:/LaBalleJaune/page/compte.php");
	}

}


function compareLog($login,$pwd) {
	$atrouve=0;

    $xml = simplexml_load_file('../php/utilisateurs.xml'); 
    $list = $xml->utilisateur;
            
    for ($i = 0; $i < count($list); $i++) {
            
        $tmpLogin=$list[$i]->login;
        $tmpPwd=$list[$i]->pwd;

        if ( $login==$tmpLogin && $pwd==$tmpPwd){
            $atrouve=1;
		
			$_SESSION['profil']['nom']=(string)$list[$i]->nom;
			$_SESSION['profil']['prenom']=(string)$list[$i]->prenom;
			$_SESSION['profil']['sexe']=(string)$list[$i]->sexe;
			$_SESSION['profil']['naissance']=(string)$list[$i]->naissance;
			$_SESSION['profil']['email']=(string)$list[$i]->email;
			$_SESSION['profil']['login']=(string)$list[$i]->login;

            return true;
        }      
	}
	
	if ($atrouve==0){
        $_SESSION['erreurConnexion']="Mauvais login ou mot de passe";
        return false;
	}
}
?>