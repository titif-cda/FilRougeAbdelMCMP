<?php

//test de la super global $_POST si elle n'est pas vide '!empty()'
if(!empty($_POST)) {


    if (isset($_POST['formulaire'])) {

        if ($_POST['formulaire'] == 'register') {

            // var_dump($_POST);

            $droit_image = $_POST["DROITIMAGE"] == 'on' ? 1 : 0;
            $cylindree = isset($_POST["CYLINDREE"]) && !empty($cylindree) ? $_POST["CYLINDREE"] : '';

            if (empty($_POST["NOM"]) || empty($_POST["PRENOM"])) {

                $message_modal = 'Vous devez saisir un nom et un prénom.';

            } else {
                // if ($donnees['LOGIN'] = $_POST['LOGIN'] ){
                // $message_modal = 'Login existe déjà, veuillez recommencer';

                $unilog = $bdd->prepare("SELECT * FROM ADHERENT WHERE LOGIN =?");
                $unilog->execute(array($_POST['LOGIN']));
                $logexist = $unilog->rowCount();
                if ($logexist != 0) {
                    $message_modal = 'Login existe déjà, veuillez recommencer';
                } else {
                    list($error, $message_modal, $photoName) = upload_img($directory_image_adherent);
                    if (!$error) {

                        $query = ('insert into ADHERENT( LOGIN, PASSWORD, NOM, PRENOM, CDPOST, DNAISSANCE, ADRESSE1, ADRESSE2, VILLE, EMAIL, TELEPHONE, CERTIFICAT, DROITIMAGE, CYLINDREE, AVATAR) 
                                    values (:login ,:password,:nom,:prenom,:cdpost,:dnaissance, :adress1, :adress2,:ville, :email, :tel, :certif, :droit, :cylindree, :avatar)');

                        $queryExec = $bdd->prepare($query);

                        $queryExec->execute(
                            array(
                                'login' => $_POST["LOGIN"],
                                'password' => $_POST["PASSWORD"],
                                'nom' => $_POST["NOM"],
                                'prenom' => $_POST["PRENOM"],
                                'cdpost' => $_POST["CDPOST"],
                                'dnaissance' => $_POST["DNAISSANCE"],
                                'adress1' => $_POST["ADRESSE1"],
                                'adress2' => $_POST["ADRESSE2"],
                                'ville' => $_POST["VILLE"],
                                'email' => $_POST["EMAIL"],
                                'tel' => $_POST["TELEPHONE"],
                                'certif' => 1,
                                'droit' => $droit_image,
                                'cylindree' => $_POST["CYLINDREE"],
                                'avatar' => $photoName
                            )

                        );
                    }

                }
            }

        }else if ($_POST['formulaire'] == 'update_profil') {

            list($error, $message_modal, $photoName, $binary, $fileType) = upload_img($directory_image_adherent, 'blob');

            if(!$error){
            $query = 'UPDATE ADHERENT SET AVATAR_BLOB = ?, AVATAR_TYPE = ? WHERE IDADHERENT = ?';

            $response = $bdd->prepare($query);
            $result = $response->execute(array($binary, $fileType, $_POST["IDADHERENT"]));

            $message_modal = 'Votre profil est mis à jour.'; }

//            if (isset($_FILES['image']) ) {
//                try {
//            $photoName = saveFile($_FILES['image'], $directory_image_adherent);
//
//            $query = 'UPDATE ADHERENT SET
//
//                          AVATAR = :photoName ,
//                          LOGIN = :login,
//                          NOM = :nom,
//                          PRENOM = :prenom,
//                          CYLINDREE = :cylindree
//
//                          WHERE IDADHERENT = :idAdherent;';
//            $queryExec = $bdd->prepare($query);
//
//            $queryExec->execute(
//                array(
//                    'photoName' => $photoName,
//                    'login' => $_POST["LOGIN"],
//                    'nom' => $_POST["NOM"],
//                    'prenom' => $_POST["PRENOM"],
//                    'cylindree' => $_POST["CYLINDREE"],
//                    'idAdherent' => $_POST["IDADHERENT"]
//                )
//            );
//            //information modal html
//            $message_modal = 'Votre profil est mis à jour.' ;
//                } catch (Exception $e) {
//                    $message_modal = $e->getMessage();
//                }}
//            else{
//                $msg['modal'] = 'Vous n\'etes pas authorisé à appeller cette methode.';
//
//                }
        }

            else if ($user_level == 2) {

            if ($_POST['formulaire'] == 'update_news') {

                list($error, $message_modal, $photoName) = upload_img($directory_image_news);

                //equivalen de
                //$error = $array[0];
                //$message_modal = $array[1];

                if(!$error){
                    //requete d'insertion dans la BD
                    $query = 'UPDATE NOUVELLE SET

                          IMAGE = :photoName ,
                          TITRE_NOUVELLE = :titre,
                          DESCRIPTION = :description

                          WHERE IDNOUVELLE = :idNouvelle;';
                        $queryExec = $bdd->prepare($query);

                        $queryExec->execute(
                            array(
                                'photoName' => $photoName,
                                'titre' => $_POST["titre"],
                                'description' => $_POST["editordata"],
                                'idNouvelle' => $_POST["IdNouvelle"]
                            )
                        );
                }

//                if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
//                    try {
//                        $photoName = saveFile($_FILES['image'], $directory_image_news);
////                    //requete d'insertion dans la BD
//
//                        $query = 'UPDATE NOUVELLE SET
//
//                          IMAGE = :photoName ,
//                          TITRE_NOUVELLE = :titre,
//                          DESCRIPTION = :description
//
//                          WHERE IDNOUVELLE = :idNouvelle;';
//                        $queryExec = $bdd->prepare($query);
//
//                        $queryExec->execute(
//                            array(
//                                'photoName' => $photoName,
//                                'titre' => $_POST["titre"],
//                                'description' => $_POST["editordata"],
//                                'idNouvelle' => $_POST["IdNouvelle"]
//                            )
//                        );
//                        $message_modal = "Mise à jour de votre nouvelle effectuée";
//
//                    } catch (Exception $e) {
//                        $message_modal = $e->getMessage();
//                    }
//
//                } else {
//                    try {
//
//                        $query = 'UPDATE NOUVELLE SET
//                          TITRE_NOUVELLE = :titre,
//                          DESCRIPTION = :description
//                          WHERE IDNOUVELLE = :idNouvelle;';
//                        $queryExec = $bdd->prepare($query);
//
//                        $queryExec->execute(array(
//                            'titre' => $_POST["titre"],
//                            'description' => $_POST["editordata"],
//                            'idNouvelle' => $_POST["IdNouvelle"]
//                        ));
//
//                        $message_modal = "Mise à jour de votre nouvelle effectuée";
//                    } catch (Exception $e) {
//                        $message_modal = $e->getMessage();
//                    }
//                }
            }
            else{
                $msg['modal'] = 'Vous n\'etes pas authorisé à appeller cette methode.';
        }
        }
        else if($_POST['formulaire'] == 'connexion'){

            if(isset($_POST['LOGIN']) AND isset($_POST['PASSWORD'])) {

                //je teste si j'ai des données dans les $_POST
                if (!empty($_POST['LOGIN']) and !empty($_POST['PASSWORD'])) {

                    $query = $bdd->prepare('SELECT IDADHERENT, NOM, PRENOM, ADMIN FROM ADHERENT WHERE LOGIN = :login AND PASSWORD = :password');

                    $query->execute(array(
                        'login' => $_POST['LOGIN'],
                        'password'=> $_POST['PASSWORD'],
                    ));

                    //permet de déterminer le nombre d'enregistrement
                    if ($query->rowCount() == 1) {

                        //boucle les données récupérées
                        while ($donnees = $query->fetch()) {

                            $nom = $donnees['NOM'];
                            $prenom = $donnees['PRENOM'];


                            $_SESSION['IDADHERENT'] =  $donnees['IDADHERENT'];
                            $_SESSION['NOM'] = $nom;
                            $_SESSION['PRENOM'] = $prenom;

                            //ou 2 si admin (to be continued)

                            $user_level = 1;
                            if ($donnees['ADMIN'] == 1){
                                $user_level = 2;
                            }
                            $_SESSION['user_level'] = $user_level;

                            $message_modal = "Bravo ".$prenom." ".$nom." vous êtes connecté!";
                            //Retour page par defaut
                            $page =$homepage;

                        }

                    } else {
                        $message_modal = "Identifiant ou mot de passe invalide!";
                    };

                    //var_dump('mot de passe OK et login OK');

                }

            }

            //var_dump('vous essayer de vous connecter ?');

        }



    }


}

if (isset($_POST['formact']) && $_POST['formact'] == 'activiteF'){

    var_dump($_POST);
    $query1 = 'INSERT INTO ACTIVITE(

            INTITULEACTIVITE,
            DDEBUT,
            DFIN,
            DESCRIPTION,
            TARIFADHERENT,
            TARIFINVITE,
            DLIMITEINSCRIPTION,
            IDADHERENT,
            IDTYPE
          
            ) 
            VALUES (
          
            "'.$_POST["INTITULEACTIVITE"].'",
            "'.$_POST["DDEBUT"].'",
            "'.$_POST["DFIN"].'",
            "'.$_POST["DESCRIPTION"].'",
            "'.$_POST["TARIFADHERENT"].'",
            "'.$_POST["TARIFINVITE"].'",
            "'.$_POST["DLIMITEINSCRIPTION"].'",
            "'.$_POST["IDADHERENT"].'",
            "'.$_POST["IDTYPE"].'"
           
         
            
            )';
    echo "Query : ".$query1;

    $bdd->query($query1);


};


if (isset($_POST['typact']) && $_POST['typact'] == 't_act'){

    var_dump($_POST);
    $query2 = 'INSERT INTO TYPE_ACTIVITE(
          
            INTITULETYPE
            ) 
            VALUES (
          
            "'.$_POST["INTITULETYPE"].'"
           
            )';

    echo "Query : ".$query2;

    $bdd->query($query2);

}

