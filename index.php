<?php


$ar_pages_var = array(
    'accueil' => array(
        'title' => 'Moto Club Millau Passion | Accueil',
        'description' => 'Moto Club Millau Passion | Association de loisir autours de la moto',
        'keywords' => 'Moto, Club, Millau, Passion, accueil, Association, loisir'
    ),
    'activites' => array(
        'title' => 'Moto Club Millau Passion | Accueil',
        'description' => 'Moto Club Millau Passion | Association de loisir autours de la moto',
        'keywords' => 'Moto, Club, Millau, Passion, accueil, Association, loisir'
    ),
    'blog' => array(
        'title' => 'Moto Club Millau Passion | Accueil',
        'description' => 'Moto Club Millau Passion | Association de loisir autours de la moto',
        'keywords' => 'Moto, Club, Millau, Passion, accueil, Association, loisir'
    ),
    'contact' => array(
        'title' => 'Moto Club Millau Passion | Accueil',
        'description' => 'Moto Club Millau Passion | Association de loisir autours de la moto',
        'keywords' => 'Moto, Club, Millau, Passion, accueil, Association, loisir'
    ),
    'element' => array(
        'title' => 'Moto Club Millau Passion | Accueil',
        'description' => 'Moto Club Millau Passion | Association de loisir autours de la moto',
        'keywords' => 'Moto, Club, Millau, Passion, accueil, Association, loisir'
    ),
    'presentation' => array(
        'title' => 'Moto Club Millau Passion | Accueil',
        'description' => 'Moto Club Millau Passion | Association de loisir autours de la moto',
        'keywords' => 'Moto, Club, Millau, Passion, accueil, Association, loisir'
    ),
    'elements' => array(
        'title' => 'Moto Club Millau Passion | Accueil',
        'description' => 'Moto Club Millau Passion | Association de loisir autours de la moto',
        'keywords' => 'Moto, Club, Millau, Passion, accueil, Association, loisir'
    ),
);


if(isset($_GET['page']) AND !empty($_GET['page']) ){


    $page = $_GET['page'];

}else{

    $page = 'accueil';
}


$description = $ar_pages_var[$page]['description'];
$title = $ar_pages_var[$page]['title'];
$keywords = $ar_pages_var[$page]['keywords'];

include('./includes/layout/header.php');

include('./includes/pages/'.$page.'.php');

include('./includes/layout/footer.php');

?>

