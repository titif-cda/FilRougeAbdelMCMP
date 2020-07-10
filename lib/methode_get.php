<?php

//gere la deconnexion
if(isset($_GET['deconnexion']) && $_GET['deconnexion'] == 1){

    //on détruit la session
    session_destroy();
    //on redirige la page apres destroy
    header("location:index?page=accueil");

}

//la requete de la table page
$reponse = $bdd->query('SELECT * FROM PAGE order by ORDRE_AFFICHAGE ');


//Initialisation de la variable tableau array() PHP
$ar_pages_var = array();

//Boucle les données récupérées
while($donnees = $reponse -> fetch()){
    $ar_pages_var[$donnees['KEY_TITLE']] = $donnees;
}




//Superglobal $_GET -> récupération de l'information de l'URL ?page=presentation
//test si la clef de l'url existe, si oui prend la valeur de l'information URL
if(isset($_GET['page']) && !empty($_GET['page']) ){

    //on verifie que la clef esiste bien dans mon tableau $ar_pages_var (fichier valide)
    if(array_key_exists($_GET['page'], $ar_pages_var)){

        $page_level = $ar_pages_var[$_GET['page']]['MODE_LEVEL'];

        //parametre de page
        //verification du niveau de securité de l'affichage de page

        //test level de pages
        // var_dump($mode_level.' > '.$page_level);

        //est-ce que la page level (droit d'affichage de la page) est ok ?
        //sinon $page reste accueil
        if($user_level >=  $page_level){
            $page = $_GET['page'];
        }
        if ($page == 'profil'){

            if(isset($_GET['id']) && !empty($_GET['id'])){

                if ($_SESSION['IDADHERENT']==$_GET['id'] || $user_level==2){


                    //la requete de la table page
                    $reponse = $bdd->query('SELECT * FROM ADHERENT WHERE IDADHERENT = '.$_GET['id']);


                    //boucle les données récupérées
                    while ($donnees = $reponse->fetch()) {

                        $identifiant = $donnees['LOGIN'];
                        $nom = $donnees['NOM'];
                        $prenom = $donnees['PRENOM'];
                        $login = $donnees['LOGIN'];
                        $cylindree = $donnees['CYLINDREE'];
                        //to be continued

                    }
                    //je transforme le H1 prévu coté BD
                    $ar_pages_var[$page]['h1'] = $prenom.' '.$nom;
                    $id = $_GET['id'];


                    $title_register = 'Mise à jour de votre profil';
                    $btn_register = 'Mettre à jour';
                    $action = 'update_profil';

                }else{
                    $page = $homepage;
                }
            }


        }else if($page == 'informations'){

            if(isset($_GET['action']) && !empty($_GET['action'])){

                if($_GET['action'] == 'add'){

                    $wysiwyg = true;

                }
            }
        }


        //test sur les action de page
        if(isset($_GET['action']) && !empty($_GET['action'])){

            //est-ce que l'action c'est delete SUR LA PAGE membres?
            if($_GET['action'] == 'delete' ){

                //est-ce qu'on a une valeur d'id ?
                if(isset($_GET['id']) && !empty($_GET['id'])) {

                    if ($page == 'membres'){
                        if ($user_level==2){


                            //lancement de la requete
                            $bdd->query('DELETE FROM ADHERENT WHERE IDADHERENT = ' . $_GET['id']);


                            //information modal html
                            $message_modal = 'Utilisateur ' . $_GET['id'] . ' supprimé.';
                        }else
                            $message_modal = 'Vous n\'êtes pas autorisé a supprimmer';

                    }else if('$page'=='activites'){
                    }
                }
            }
        }
    }
}




//Contenu de variable en fonction de la page
$description = $ar_pages_var[$page]['METADESCRIPTION'];
$title = $ar_pages_var[$page]['METATITLE'];
$keywords = $ar_pages_var[$page]['KEYWORDS'];


