
<?php

include('./config/config.php');

//Mes libtrairies php
//Gestion  des formulaire type $_POST
include('./lib/methode_post.php');


//Gestion des données URL type $_GET
//Affichage des pages
include('./lib/methode_get.php');



//les includes de contenu header
include('./includes/layout/header.php');

//include du fichier de page reprenant la $page
include('./includes/pages/'.$page.'.php');

//les includes de contenu footer
include('./includes/layout/footer.php');

?>

