<?php
session_start();

if (!isset($_SESSION['erreurInscription']) ) {
	$_SESSION['erreurInscription']="";
}

if (isset($_SESSION['log']) ) {
	header('Location:/LaBalleJaune/index.php');
}

ob_start();
?>

<section>
    <h1>Inscrivez-vous</h1>
        <div class="">
            <form class="form-style-9" action="/LaBalleJaune/php/inscriptionSess.php" onsubmit="" method="post" id="form">
                <h3 style="text-align: center;">Informations</h3>
                    <hr class="hrinscription">
                        <ul>
                            <li>
                                <div style="margin-top: 30px;">
                                <p>
                                    <b>Genre :</b>
                                    <input type="radio" name="sexe" style="margin-left: 10px;" value="Homme" required="" />Homme
                                    <input type="radio" name="sexe" style="margin-left: 10px;" value="Femme" />Femme
                                </p>
                                </div>
                            </li>
                            <li>
                                <input type="text" id="login" name="login" class="field-style field-split" placeholder="Login" required="" />
                            </li>
                            <li>
                                <input type="password" id="pwd" name="pwd" class="field-style field-split" placeholder="Mot de passe" required="" />
                            </li>
                            <li>
                                <input type="text" id="nom" name="nom" class="field-style field-split" placeholder="Nom" required="" />
                            </li>
                            <li>
                                <input type="text" id="prenom" name="prenom" class="field-style field-split" placeholder="Prénom" required="" />
                            </li>
                            <li>
                                <input type="date" id="date" name="date" class="field-style field-split" placeholder="Date de naissance" required="" />
                            </li>
                            <li>
                                <input type="email" id="mail" name="mail" class="field-style field-split" placeholder="Email" required="">
                            </li>
                            <li>
                                <input style="margin-top: 30px;" type="submit" value="S'inscrire" />
                            </li>
                        </ul>
                    </form>
                </div>
            </section>

<?php 
$content=ob_get_clean(); 
require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/squelette.php");
?>