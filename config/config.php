<?php

//Serveur sgbd OVH

$bdd = new PDO(
    'mysql:host=cda28.2isa.org;dbname=cda28_bd1;charset=utf8',
        'cda28',
        '7974cda28'

    );

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//initialisation des variables
//valeurs par defaut
$homepage='accueil';
$page = $homepage;
$message_modal ='';
$user_level = 0;

$wysiwyg = false;
$directory_image_news = "./img/upload/news/";
$directory_image_adherent = "./img/upload/adherent/";
$repblob="./lib/blob.php?user=";

/* level = 0 = non-connecté */
/* level = 1 = connecté */
/* level = 2 = connecté admin */

if(isset($_SESSION['user_level'])){
    $user_level = $_SESSION['user_level'];
}




/*Serveur local

$bdd= new PDO(
    'mysql:host=localhost;dbname=cda28_db1;charset=utf',
    'root',
    ''

);
*/