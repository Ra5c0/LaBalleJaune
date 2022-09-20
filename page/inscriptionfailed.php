<?php

session_start();

ob_start();

//connexion à la base de données:
$BDD = array();
$BDD['host'] = "localhost";
$BDD['user'] = "root";
$BDD['pass'] = "";
$BDD['db'] = "laballejaune";
$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
if(isset($_POST['connexion'])) { // si le bouton "Connexion" est appuyé

    $Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
    $MotDePasse = htmlentities($_POST['mdp'], ENT_QUOTES, "ISO-8859-1");
    //on vérifie que la connexion s'effectue correctement:
    if(!$mysqli){
        echo "Erreur de connexion à la base de données.";
    } else {
        // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
        $Requete = mysqli_query($mysqli,"SELECT * FROM membres WHERE pseudo = '".$Pseudo."' AND mdp = '".md5($MotDePasse)."'");//si vous avez enregistré le mot de passe en md5() il vous suffira de faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
        // si il y a un résultat, mysqli_num_rows() nous donnera alors 1
        // si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
        if(mysqli_num_rows($Requete) == 0) {
          ?>

          <script type="text/javascript">
                  
              document.location.replace('connexionfailed.php'); //On rafraichit la page pour que l'utilisateur voit la suppresion du produit

          </script>

          <?php
        } else {
            // on ouvre la session avec $_SESSION:
            $_SESSION['pseudo'] = $Pseudo; 
            ?>
            <script type="text/javascript">
                
              document.location.replace('/LaBalleJaune/index.php'); //On rafraichit la page pour que l'utilisateur voit la suppresion du produit

            </script>
            <?php
        }
    }
        
    
}
?>

<!-- 
Les balises <form> sert à dire que c'est un formulaire
on lui demande de faire fonctionner la page connexion.php une fois le bouton "Connexion" cliqué
on lui dit également que c'est un formulaire de type "POST"
Les balises <input> sont les champs de formulaire
type="text" sera du texte
type="password" sera des petits points noir (texte caché)
type="submit" sera un bouton pour valider le formulaire
name="nom de l'input" sert à le reconnaitre une fois le bouton submit cliqué, pour le code PHP
 -->

<section>
  <div class="contConnexion">
    <h3>Nouveaux clients</h3>
    <p>En créant un compte sur notre boutique, vous pourrez passer vos commandes plus rapidement, enregistrer plusieurs adresses de livraison, consulter et suivre vos commandes, et plein d'autres choses encore.</p>
    <form name="Formulaire" onsubmit="" method="POST" action="inscription.php">
      <ul>
        <li>
          <label><b>PSEUDO</b></label>
          <input type="text" autocomplete="off" name="pseudo" placeholder="Pseudo" required="">
        </li>
      </ul>
      <ul>
        <li>
          <label><b>EMAIL</b></label>
          <input type="email" autocomplete="off" name="email" placeholder="E-mail" required="">
        </li>
      </ul>
      <ul>
        <li>
          <label><b>MOT DE PASSE</b></label>
          <input type="password" name="mdp" placeholder="Mot de passe" required="">
        </li>
      </ul>
      <ul>
        <li>
          <label><b>VERIFICATION</b></label>
          <input type="password" name="mdp2" placeholder="Confimer le mot de passe" required="">
        </li>
      </ul>
      <input type="submit" value="S'inscrire">
    </form>
  </div>
  <p style="margin-right: 72%">

    Erreur lors de l'inscription: <br>
      
      Le Pseudo a été renseigné avec accents ou avec caractères spéciaux.<br>
      Le pseudo est trop long, il dépasse 25 caractères.<br>
      Ce pseudo est déjà utilisé.<br>
      Les mots de passe ne correspondent pas.<br>
    
  </p>
</section>

<?php 
$content=ob_get_clean(); 
require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/squelette.php");
?>