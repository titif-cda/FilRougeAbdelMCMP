<?php



//la requete de la table page
$reponse = $bdd->query('SELECT * FROM PAGE');


//Initialisation de la variable tableau array() PHP
$ar_pages_var = array();

//Boucle les données récupérées
while($donnees = $reponse -> fetch()){
    $ar_pages_var[$donnees['KEY_TITLE']] = $donnees;
}




//Superglobal $_GET -> récupération de l'information de l'URL ?page=presentation
//test si la clef de l'url existe, si oui prend la valeur de l'information URL
if(isset($_GET['PAGE']) && !empty($_GET['PAGE']) ){

    //on verifie que la clef esiste bien dans mon tableau $ar_pages_var (fichier valide)
    if(array_key_exists($_GET['PAGE'], $ar_pages_var)){

        $page = $_GET['PAGE'];


        //test sur les action de page
        if(isset($_GET['action']) && !empty($_GET['action'])){

            //est-ce que l'action c'est delete ?
            if($_GET['action'] == 'delete'){

                //est-ce qu'on a une valeur d'id ?
                if(isset($_GET['id']) && !empty($_GET['id'])){

                    //lancement de la requete
                    $bdd->query('DELETE FROM ADHERENT WHERE IDADHERENT = '.$_GET['id']);


                    //information modal html
                    $message_modal = 'Utilisateur '.$_GET['id'].' supprimé.';

                }
            }
        }
    }
}




//Contenu de variable en fonction de la page
$description = $ar_pages_var[$page]['METADESCRIPTION'];
$title = $ar_pages_var[$page]['METATITLE'];
$keywords = $ar_pages_var[$page]['KEYWORDS'];


