<?php

//Connexion à la bdd

  try{

      $db = new PDO('mysql:host=127.0.0.1;dbname=laballejaune', 'root','');
      $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); // les noms de champs seront en caractères minuscules
      $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); // les erreurs lanceront des exceptions
          
  }

    catch(Exception $e){

    die('Une erreur est survenue lors de la connexion à la base de données');

  }
?>