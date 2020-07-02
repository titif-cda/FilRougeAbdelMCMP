
<?php

include('./config/config.php');

//Mes libtrairies php
//Gestion
include('./lib/formulaire.php');




// Requete
$reponse = $bdd->query('SELECT * FROM PAGE');


//push tableau array() PHP
$ar_pages_var = array();

//Boucle les données récupérées
while($donnees = $reponse -> fetch()){
    $ar_pages_var[$donnees['KEY_FILE']] = $donnees;
}

/*$ar_pages_var = array(
    'accueil' => array(
        'title' => 'Moto Club Millau Passion | Accueil',
        'description' => 'Moto Club Millau Passion | Association de loisir autours de la moto',
        'keywords' => 'Moto, Club, Millau, Passion, accueil, Association, loisir',
        'h1' => 'Accueil',
        'menu' => 'Accueil',
    ),
    'activites' => array(
        'title' => 'Moto Club Millau Passion | Accueil',
        'description' => 'Moto Club Millau Passion | Association de loisir autours de la moto',
        'keywords' => 'Moto, Club, Millau, Passion, accueil, Association, loisir',
        'h1' => 'Activites',
        'menu' => 'Activites',
    ),
    'blog' => array(
        'title' => 'Moto Club Millau Passion | Accueil',
        'description' => 'Moto Club Millau Passion | Association de loisir autours de la moto',
        'keywords' => 'Moto, Club, Millau, Passion, accueil, Association, loisir',
        'h1' => 'Blog',
        'menu' => 'Blog',
    ),
    'contact' => array(
        'title' => 'Moto Club Millau Passion | Accueil',
        'description' => 'Moto Club Millau Passion | Association de loisir autours de la moto',
        'keywords' => 'Moto, Club, Millau, Passion, accueil, Association, loisir',
        'h1' => 'Contact',
        'menu' => 'Contact',
    ),
    'element' => array(
        'title' => 'Moto Club Millau Passion | Accueil',
        'description' => 'Moto Club Millau Passion | Association de loisir autours de la moto',
        'keywords' => 'Moto, Club, Millau, Passion, accueil, Association, loisir',
        'h1' => 'Eléments',
        'menu' => 'Eléments',
    ),
    'presentation' => array(
        'title' => 'Moto Club Millau Passion | Accueil',
        'description' => 'Moto Club Millau Passion | Association de loisir autours de la moto',
        'keywords' => 'Moto, Club, Millau, Passion, accueil, Association, loisir',
        'h1' => 'Présentation',
        'menu' => 'Présentation',
    ),
    'elements' => array(
        'title' => 'Moto Club Millau Passion | Accueil',
        'description' => 'Moto Club Millau Passion | Association de loisir autours de la moto',
        'keywords' => 'Moto, Club, Millau, Passion, accueil, Association, loisir'
    ),
);
*/


if(isset($_GET['PAGE']) AND !empty($_GET['PAGE']) ){

    $page = $_GET['PAGE'];

}else{

    $page = 'ACCUEIL';
}
$description = $ar_pages_var[$page]['METADESCRIPTION'];
$title = $ar_pages_var[$page]['METATITLE'];
$keywords = $ar_pages_var[$page]['KEYWORDS'];

include('./includes/layout/header.php');

include('./includes/pages/'.$page.'.php');

include('./includes/layout/footer.php');

?>

