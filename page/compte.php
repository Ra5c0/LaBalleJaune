<?php
session_start();

if (!isset($_SESSION['erreurConnexion']) ) {
	$_SESSION['erreurConnexion']="";
}

if (isset($_SESSION['log']) ) {
	header('Location:../LaBalleJaune/index.php');
}

ob_start();
?>

            <section>
                <h1>Identifiez-vous ou créez un compte</h1>
                <div class="contConnexion">
                    <h3>Nouveaux clients</h3>
                    <p>En créant un compte sur notre boutique, vous pourrez passer vos commandes plus rapidement, enregistrer plusieurs adresses de livraison, consulter et suivre vos commandes, et plein d'autres choses encore.</p>
                    <a title="Créer un compte" href="inscription.php">Créer un compte</a>
                    <br><br>
                    <hr>
                    <h3>Clients enregistrés</h3>
                    <p>Si vous avez déjà un compte, veuillez vous identifier.</p>
                    <?=$_SESSION['erreurConnexion'];
                    $_SESSION['erreurConnexion']="";
                    ?> 
                    <form name="Formulaire" onsubmit="" method="POST" action="/LaBalleJaune/php/connexionSess.php">
                    <ul>
                        <li>
                            <label><b>LOGIN</b></label>
                            <input type="text" name="login" class="" id="login" placeholder="Entrez votre login" required><br />
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <label><b>MOT DE PASSE</b></label>
                            <input type="password" name="pwd" id="pwd" class="" placeholder="8 caractères minimum" required>
                        </li>
                    </ul>
                    <input type="submit" value="Connexion"/><br />
                    </form>
                </div>
            </section>

<?php 
$content=ob_get_clean(); 
require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/squelette.php");
?>
            