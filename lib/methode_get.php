<?php

//gere la deconnexion
if(isset($_GET['deconnexion']) && $_GET['deconnexion'] == 1){

    //on détruit la session
    session_destroy();
    //on redirige la page apres destroy
    header("location:page-accueil");

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
    if(array_key_exists($_GET['page'], $ar_pages_var)) {

        $page_level = $ar_pages_var[$_GET['page']]['MODE_LEVEL'];

        //parametre de page
        //verification du niveau de securité de l'affichage de page

        //test level de pages
        // var_dump($mode_level.' > '.$page_level);

        //est-ce que la page level (droit d'affichage de la page) est ok ?
        //sinon $page reste accueil
        if ($user_level >= $page_level) {
            $page = $_GET['page'];
        }

        //gestion des pages
        if ($page == 'profil_adherent') {

            if (isset($_GET['id']) && !empty($_GET['id'])) {

                //je verifie soit admin soit l'utilisateur qui accede à son profil
                if ($_SESSION['IDADHERENT'] == $_GET['id'] || $user_level == 2) {


                    //la requete de la table page

                    $query = $bdd->prepare('SELECT * FROM ADHERENT WHERE IDADHERENT =  :idadherent ');

                    $query->execute(array(
                        'idadherent' => $_GET['id']
                    ));


                    //boucle les données récupérées
                    while ($donnees = $query->fetch()) {
                        //boucle les données récupérées
                        $identifiant = $donnees['LOGIN'];
                        $nom = $donnees['NOM'];
                        $prenom = $donnees['PRENOM'];
                        $login = $donnees['LOGIN'];
                        $cylindree = $donnees['CYLINDREE'];
                        $dnaissance = $donnees['DNAISSANCE'];
                        $adress1 = $donnees['ADRESSE1'];
                        $adress2 = $donnees['ADRESSE2'];
                        $cdpost = $donnees['CDPOST'];
                        $ville = $donnees['VILLE'];
                        $email = $donnees['EMAIL'];
                        $tel = $donnees['TELEPHONE'];
                        $adhesion = $donnees['DADHESION'];
                        $organisateur = $donnees['ORGANISATEUR'];
                        $certif = $donnees['ORGANISATEUR'];
                        $image = $donnees['AVATAR'];
                        $type = $donnees['AVATAR_TYPE'];
                        $idadherent = $donnees['IDADHERENT'];
                        //to be continued
                    }


                    //je transforme le H1 prévu coté BD
                    $ar_pages_var[$page]['h1'] = $prenom . ' ' . $nom;
                    $id = $_GET['id'];


                    $title_register = 'Mise à jour de votre profil';
                    $btn_register = 'Mettre à jour';
                    $action = 'update_profil';

                } else {
                    $page = $homepage;
                }
            }


        } else if ($page == 'nouvelles') {

            if (isset($_GET['action']) && !empty($_GET['action'])) {

                if ($_GET['action'] == 'add') {

                    $wysiwyg = true;

                }
            }
        } else if ($page == 'news') {
            if (isset($_GET['id']) && !empty($_GET['id'])) {

                //la requete de la table page
//                $reponse = $bdd->query('SELECT * FROM NOUVELLE WHERE IDNOUVELLE = ' . $_GET['id']);

                $query = 'SELECT * FROM NOUVELLE WHERE IDNOUVELLE = ?';
                $queryExec = $bdd->prepare($query);
                $result = $queryExec->execute(array($_GET['id']));



//                boucle les données récupérées
                while ($donnees = $queryExec->fetch()) {

                    $titleNouvelle = $donnees['TITRE_NOUVELLE'];
                    $introduction = $donnees['INTRODUCTION'];
                    $descriptionNouvelle = $donnees['DESCRIPTION'];
                    $datepublication = date("d-m-Y", strtotime($donnees['DPUBLICATION']));
                    $level_diffusion = $donnees['DIFFUSION_LEVEL'];
                    $img = $donnees['IMAGE'];
                    //to be continued

                }


                //je transforme le H1 prévu coté BD
                $ar_pages_var[$page]['h1'] =  $titleNouvelle;
                $id = $_GET['id'];


                $title_register = 'Mise à jour de votre profil';
                $btn_register = 'Mettre à jour';
                $action = 'update_profil';

            } else {
                $page = $homepage;
            }
        }
        else if ($page == 'activiteseule') {
            if (isset($_GET['id']) && !empty($_GET['id'])) {

                //la requete de la table page
                $query = $bdd->prepare('SELECT * FROM ACTIVITE WHERE IDACTIVITE =  :idactivite ');

                $query->execute(array(
                    'idactivite' => $_GET['id']
                ));


                //boucle les données récupérées
                while ($donnees = $query->fetch()) {

                    $titleActivite = $donnees['INTITULEACTIVITE'];
                    $datedebut = date("d-m-Y", strtotime($donnees['DDEBUT']));
                    $dateFin = $donnees['DFIN'];
                    $descriptionA = $donnees['DESCRIPTION'];
                    $tarifAdherent = $donnees['TARIFADHERENT'];
                    $tarifInvite = $donnees['TARIFINVITE'];
                    $datelimiteInscr = date("d-m-Y", strtotime($donnees['DLIMITEINSCRIPTION']));
                    $imageAct = $donnees['IMAGEACT'];
                    $idadherent=$donnees['IDADHERENT'];
                    $idType=$donnees['IDTYPE'];
                    //to be continued

                }


                //je transforme le H1 prévu coté BD
                $ar_pages_var[$page]['h1'] = $titleActivite;
                $id = $_GET['id'];


                $title_register = 'Mise à jour de votre profil';
                $btn_register = 'Mettre à jour';
                $action = 'update_profil';

            } else {
                $page = $homepage;
            }
        }


        //test sur les action de page
        if (isset($_GET['action']) && !empty($_GET['action'])) {

            //est-ce que l'action c'est delete SUR LA PAGE membres?
            if ($_GET['action'] == 'delete') {

                //est-ce qu'on a une valeur d'id ?
                if (isset($_GET['id']) && !empty($_GET['id'])) {

                    if ($page == 'membres') {
                        if ($user_level == 2) {
                            if(isset($_GET['token']) && !empty($_GET['token'])){

                                if($_GET['token'] == $_SESSION['token']){


                                    //lancement de la requete

                                    $query = 'DELETE FROM ADHERENT WHERE IDADHERENT = ?';
                                    $queryExec = $bdd->prepare($query);
                                    $result = $queryExec->execute(array($_GET['id']));

                                    //information modal html
                                    $message_modal = 'Utilisateur '.$_GET['id'].' supprimé.';


                                }

                            }else{
                                $token = time();
                                $_SESSION['token'] = $token;
                                $message_modal = 'Confirmer suppression ? <a href="index.php?page=membres&action=delete&id='.$_GET['id'].'&token='.$token.'">VALIDER SUPPRESSION</a>';

                            }


                        } else
                            $message_modal = 'Vous n\'êtes pas autorisé a supprimmer';

                    } else if ('$page' == 'activites') {
                        if ($user_level == 2) {
                            if(isset($_GET['token']) && !empty($_GET['token'])){

                                if($_GET['token'] == $_SESSION['token']){


                                    //lancement de la requete

                                    $query = 'DELETE FROM ACTIVITE WHERE IDACTIVITE = ?';
                                    $queryExec = $bdd->prepare($query);
                                    $result = $queryExec->execute(array($_GET['id']));

                                    //information modal html
                                    $message_modal = 'L\'activité '.$_GET['id'].' supprimé.';


                                }

                            }else{
                                $token = time();
                                $_SESSION['token'] = $token;
                                $message_modal = 'Confirmer suppression ? <a href="index.php?page=activites&action=delete&id='.$_GET['id'].'&token='.$token.'">VALIDER SUPPRESSION</a>';

                            }


                        } else
                            $message_modal = 'Vous n\'êtes pas autorisé a supprimmer';
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


