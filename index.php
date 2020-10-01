<?php
//Démarrage dede session
session_start();
if(isset($_SESSION['id'])){
    //Si le $_COOKIE ticket est identique à $_SESSION ticket, alors on regènere le ticket valable 20 min
    if (isset($_COOKIE['ticket']) AND $_COOKIE['ticket'] == $_SESSION['ticket'])
    {
        $ticket = session_id().microtime().rand(0,9999999999);
        $ticket = hash('sha512', $ticket);
        $_SESSION['ticket'] = $ticket;
        setcookie('ticket', $ticket, time() + (60 * 5)); // Expire au bout de 5 min
    }
    else
    {
        // On détruit la session
        //$_SESSION = array();
        session_destroy();
        unset($_COOKIE['ticket']);
        header('location:index.php');
    }
}

include('./config/config.php');
//Mes fonctions
/*include('./lib/utils.php');*/
include('./lib/function.php');
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

