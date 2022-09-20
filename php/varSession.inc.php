<?php
$data = json_decode(file_get_contents("../php/listeArticle.json"), true);
$_SESSION['categorie']=$data['categorie'];
?>