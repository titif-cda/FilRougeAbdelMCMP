<?php
require_once './lib/function.php';
require_once './lib/MailEngine.php';
use Lib\MailEngine;
//test de la super global $_POST si elle n'est pas vide '!empty()'
if (!empty($_POST)) {


    if (isset($_POST['formulaire'])) {

        if ($_POST['formulaire'] == 'register') {

            $errors = array();

            if (empty($_POST['LOGIN']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['LOGIN'])){

                $errors['LOGIN'] = "Votre pseudo n'est pas valide";
            }else{
                //clean $_POST;
                foreach ($_POST as $key => $value){

                    $_POST[$key] = str_replace(array('<','>'),'?', $value);
                }

                //verifie si login n'existe pas
                $unilog = $bdd->prepare("SELECT * FROM ADHERENT WHERE LOGIN =?");
                $unilog->execute(array($_POST['LOGIN']));
                $user = $unilog -> fetch();
                if ($user){
                    $errors['LOGIN'] = 'Ce pseudo est déjà pris';
                }

            }


            //VERIF VALIDATION EMAIL
            if (empty($_POST['EMAIL']) || !filter_var($_POST['EMAIL'], FILTER_VALIDATE_EMAIL)) {
                $errors['EMAIL'] = "Votre email n'est pas valide";
            }else{
                //verifie si l'email n'existe pas
                $unimail = $bdd->prepare("SELECT * FROM ADHERENT WHERE EMAIL =?");
                $unimail->execute(array($_POST['EMAIL']));
                $user = $unimail -> fetch();
                if ($user){
                    $errors['EMAIL'] = 'Cet email est déjà pris';
                }

            }

            if (empty($_POST['PASSWORD']) || $_POST['PASSWORD'] != $_POST['PASSWORD_CONFIRM']) {
                $errors['PASSWORD'] = "Vous devez rentrer un mot de passe valide";
            }


            $droit_image = isset($_POST["DROITIMAGE"]) ? 1 : 0;
            $cylindree = isset($_POST["CYLINDREE"]) && !empty($cylindree) ? $_POST["CYLINDREE"] : '';
            $hashed_password = hash('sha256', $_POST["PASSWORD"]);

            if (empty($errors)){
                $query = ('insert into ADHERENT( LOGIN, PASSWORD, NOM, PRENOM, CDPOST, DNAISSANCE, ADRESSE1, ADRESSE2, VILLE, EMAIL, TELEPHONE, CERTIFICAT, DROITIMAGE, CYLINDREE, VALIDATION_CLEF) 
                                    values (:login ,:password,:nom, :prenom, :cdpost, :dnaissance, :adress1, :adress2,:ville, :email, :tel, :certif, :droit, :cylindree, :clef )');

                $queryExec = $bdd->prepare($query);
                $clefValidation = validationKey(60);

                $queryExec->execute(
                    array('login' => $_POST["LOGIN"],'password' => $hashed_password,
                        'nom' => $_POST["NOM"],'prenom' => $_POST["PRENOM"],'cdpost' => $_POST["CDPOST"],
                        'dnaissance' => $_POST["DNAISSANCE"],'adress1' => $_POST["ADRESSE1"],
                        'adress2' => $_POST["ADRESSE2"], 'ville' => $_POST["VILLE"],'email' => $_POST["EMAIL"],
                        'tel' => $_POST["TELEPHONE"], 'certif' => 1,'droit' => $droit_image, 'cylindree' => $_POST["CYLINDREE"],'clef' => $clefValidation));

                $user_id= $bdd->lastInsertId();
                $from = 'abdellatif.eljid@2isa.net';
                $to = $_POST['EMAIL'];
                $subject = 'Validation de mail';
                $message = "Afin de valider votre compte , merci de cliquer sur le lien suivant: http://cda28.s1.2isa.test/index.php?page=confirmation&k=$clefValidation&id=$user_id";

                try {
                    \Lib\MailEngine::send($subject, $from, $to, $message);
                    header('Location: page-connection');
                    $message_modal = 'Un email de confirmation vous a été envoyé pour valider votre compte.';
                }
                catch(Exception $e){
                    error_log($e ->getMessage());
                }
            }
            debug($errors);

        } else if ($_POST['formulaire'] == 'update_profil') {
            if (isset($_FILES['image']) && !empty($_FILES['image'])) {
                try {
                    list($photoName, $binary, $fileType) = upload_img($directory_image_adherent, "image",'blob');


                    $query = 'UPDATE ADHERENT SET AVATAR_BLOB = ?, AVATAR_TYPE = ? WHERE IDADHERENT = ?';

                    $response = $bdd->prepare($query);
                    $result = $response->execute(array($binary, $fileType, $_POST["IDADHERENT"]));
                    $message_modal = 'Images mise à jour.';}

                catch (Exception $e) {
                    $message_modal = $e->getMessage();
                }

                $droit_image = isset($_POST["DROITIMAGE"]) ? 1 : 0;
                $pass_string = '';
                if (isset($_POST["PASSWORD"]) && !empty($_POST["PASSWORD"])) {
                    $hashed_password = My_Crypt($_POST["PASSWORD"]);
                    //complétion de la requete update
                    $pass_string = 'PASSWORD = "' . $hashed_password . '",';

                    $query = 'UPDATE ADHERENT SET LOGIN= ? , PASSWORD = ? ,  NOM = ?,PRENOM = ?,DNAISSANCE=?, 
                    ADRESSE1 =?, ADRESSE2 =?, CDPOST=?,VILLE =? , EMAIL =?, TELEPHONE = ?,  DROITIMAGE =?, ADMIN=?, CONFIRMATION=?, CYLINDREE = ? where IDADHERENT= ?';

                    $queryExec = $bdd->prepare($query);

                    $result = $queryExec->execute(array($_POST["LOGIN"], $pass_string, $_POST["NOM"], $_POST["PRENOM"],$_POST["DNAISSANCE"],$_POST["ADRESSE1"], $_POST["ADRESSE2"],
                        $_POST["CDPOST"],$_POST["VILLE"],$_POST["EMAIL"],$_POST["TELEPHONE"],$droit_image ,$_POST["ADMIN"],$_POST["VALID"],$_POST["CYLINDREE"], $_POST["IDADHERENT"]));
                }else{

                    $query = 'UPDATE ADHERENT SET LOGIN= ?,  NOM = ?,PRENOM = ?,DNAISSANCE=?, 
                    ADRESSE1 =?, ADRESSE2 =?, CDPOST=?,VILLE =? , EMAIL =?, TELEPHONE = ?,  DROITIMAGE =?, ADMIN=?, CONFIRMATION=?, CYLINDREE = ? where IDADHERENT= ?';

                    $queryExec = $bdd->prepare($query);

                    $result = $queryExec->execute(array($_POST["LOGIN"],$_POST["NOM"], $_POST["PRENOM"],$_POST["DNAISSANCE"],$_POST["ADRESSE1"], $_POST["ADRESSE2"],
                        $_POST["CDPOST"],$_POST["VILLE"],$_POST["EMAIL"],$_POST["TELEPHONE"],$droit_image ,$_POST["ADMIN"],$_POST["VALID"],$_POST["CYLINDREE"], $_POST["IDADHERENT"]));
                }
                try {

                    $message_modal = 'Votre profil est mis à jour.'; }

                catch (Exception $e) {
                    $message_modal = $e->getMessage();
                }


            }

        } else if ($_POST['formulaire'] == 'update_news') {

            if ( $user_level == 2) {
                try {
                    list($photoName) = upload_img($directory_image_news);

                    //equivalen de
                    //$error = $array[0];
                    //$message_modal = $array[1];


                    //requete d'insertion dans la BD
                    $query = 'UPDATE NOUVELLE SET IMAGE = :photoName ,TITRE_NOUVELLE = :titre,INTRODUCTION = :intro ,DESCRIPTION = :description WHERE IDNOUVELLE = :idNouvelle;';
                    $queryExec = $bdd->prepare($query);

                    $queryExec->execute(
                        array(
                            'photoName' => $photoName, 'titre' => $_POST["titre"], 'intro' => $_POST["introduction"], 'description' => $_POST["editordata"],'idNouvelle' => $_POST["IdNouvelle"]
                        )); $message_modal='News mis à jour';
                }catch (Exception $e) {
                    $message_modal = $e->getMessage();
                }

            } else {
                $msg['modal'] = 'Vous n\'etes pas authorisé à appeller cette methode.';
            }


        } else if ($_POST['formulaire'] == 'connexion') {

            if (isset($_POST['LOGIN']) and isset($_POST['PASSWORD'])) {

                //je teste si j'ai des données dans les $_POST
                if (!empty($_POST['LOGIN']) and !empty($_POST['PASSWORD'])) {
                    sleep(3);
                    $hashed_password = My_crypt($_POST["PASSWORD"]);

                    $query = $bdd->prepare('SELECT IDADHERENT, NOM, PRENOM, ADMIN, CONFIRMATION FROM ADHERENT WHERE LOGIN = :login AND PASSWORD = :password');

                    $query->execute(array(
                        'login' => $_POST['LOGIN'],
                        'password' => $hashed_password,
                    ));

//                    var_dump($query);
                    //permet de déterminer le nombre d'enregistrement
                    if ($query->rowCount() == 1) {

                        //boucle les données récupérées
                        $donnees = $query->fetch();
                        if($donnees['CONFIRMATION'] == 0) {
                            //error
                            $message_modal = "Veuillez activer votre compte !";
                            return;
                        }
                        $nom = $donnees['NOM'];
                        $prenom = $donnees['PRENOM'];


                        $_SESSION['IDADHERENT'] = $donnees['IDADHERENT'];
                        $_SESSION['NOM'] = $nom;
                        $_SESSION['PRENOM'] = $prenom;


                        //ou 2 si admin (to be continued)

                        $user_level = 1;
                        if ($donnees['ADMIN'] == 1) {
                            $user_level = 2;
                        }
                        $_SESSION['user_level'] = $user_level;

                        $message_modal = "Bravo " . $prenom . " " . $nom . " vous êtes connecté!";
                        //Retour page par defaut
                        $page = $homepage;



                    } else {
                        $message_modal = "Identifiant ou mot de passe invalide!";
                    };


                }

            }

            //var_dump('vous essayer de vous connecter ?');

        }else if(isset($_POST['formulaire']) && $_POST['formulaire'] == 'ajout_inscription'){
            try{
                $query = ('insert into INSCRIPTION ( IDADHERENT, IDACTIVITE, NBPARTICIPANTS) 
                                        values (:idadherent ,:idactivite, :nbinvit )');

                $queryExec = $bdd->prepare($query);


                $queryExec->execute(
                    array('idadherent' => $_POST['idadherent'],'idactivite' => $_POST['idactivite'],'nbinvit' => $_POST["nbpers"]));
                $message_modal= 'Inscription enregistrée';
            }catch (Exception $e) {
                $message_modal = $e->getMessage();
            }
        }




        else if(isset($_POST['formulaire']) && $_POST['formulaire'] == 'ajout_activite'){
            if (isset($_FILES['image']) && !empty($_FILES['image'])) {
                try {
                    list($photoName) = upload_img($directory_image_activites);

                    $queryAct = ('insert into ACTIVITE( INTITULEACTIVITE, DDEBUT, DFIN,IDADHERENT, DESCRIPTION, TARIFADHERENT, TARIFINVITE, DLIMITEINSCRIPTION, IDTYPE, IMAGEACT) 
                                    values (:intitule, :ddebut ,:dfin,:idadherent,:description, :tarifadherent, :tarifinvite, :dlimiteinscription, :idtype, :imageact )');

                    $queryExec = $bdd->prepare($queryAct);


                    $queryExec->execute(array('intitule' => $_POST["INTITULEACTIVITE"],'ddebut' =>$_POST["DDEBUT"] ,
                        'dfin' => $_POST["DFIN"],'idadherent'=> $_SESSION['IDADHERENT'],'description' => $_POST["DESCRIPTION"],'tarifadherent' => $_POST["TARIFADHERENT"],
                        'tarifinvite' => $_POST["TARIFINVITE"],'dlimiteinscription' => $_POST["DLIMITEINSCRIPTION"],
                        'idtype' => $_POST["IDTYPE"], 'imageact' =>  $photoName));

                    $message_modal='ajout activité réussi';
                }catch (Exception $e) {
                    $message_modal = $e->getMessage();
                }
            }else{
                $message_modal = 'erreur';


            }
        }else if ($_POST['formulaire'] == 'update_activite') {
            if ( $user_level == 2) {
                if (isset($_FILES['image']) && !empty($_FILES['image'])) {
                    try {
                        list($photoName) = upload_img($directory_image_activites);
                        //requete d'insertion dans la BD
                        $query = 'UPDATE ACTIVITE SET INTITULEACTIVITE = :intitule, DDEBUT= :ddebut, DFIN= :dfin,IDADHERENT= :idadherent, DESCRIPTION= :description, TARIFADHERENT= :tarifinvite, TARIFINVITE= :tarifadherent, DLIMITEINSCRIPTION = :dlimiteinscription, IDTYPE = :idtype, IMAGEACT = :photoName

                          WHERE IDACTIVITE = :idActivite;';
                        $queryExec = $bdd->prepare($query);

                        $queryExec->execute(
                            array(
                                'intitule' => $_POST["INTITULEACTIVITE"],
                                'ddebut' => $_POST["DDEBUT"],
                                'dfin' => $_POST["DFIN"],
                                'idadherent' => $_POST["IDADHERENT"],
                                'description' => $_POST["DESCRIPTION"],
                                'tarifadherent' => $_POST["TARIFADHERENT"],
                                'tarifinvite' => $_POST["TARIFINVITE"],
                                'dlimiteinscription' => $_POST["DLIMITEINSCRIPTION"],
                                'idtype' => $_POST["IDTYPE"],
                                'photoName' => $photoName,
                                'idActivite' => $_GET['id']

                            )
                        );
                        $message_modal='mise à jour activité réussie';
                    }catch (Exception $e) {
                        $message_modal = $e->getMessage();
                    }
                } }else {
                $msg['modal'] = 'Vous n\'etes pas authorisé à appeller cette methode.';
            }


        }else if(isset($_POST['formulaire']) && $_POST['formulaire'] == 'ajout_photo'){
            if (isset($_FILES['NOMFICHIER']) && !empty($_FILES['NOMFICHIER'])) {
                try {

                    list($photoName) =upload_img($directory_image_gallerie, "NOMFICHIER");
                    $queryphot = ('insert into PHOTO (TITREPHOTO, IDACTIVITE,IDADHERENT,NOMFICHIER) 
                                    values (:titre, :idactivite,:idadherent,:nomphoto)');
                    $queryExec = $bdd->prepare($queryphot);
                    $queryExec->execute(array('titre' => $_POST["TITREPHOTO"],
                        'idactivite' => $_POST["IDACTIVITE"],'idadherent'=> $_SESSION['IDADHERENT'],'nomphoto' => $photoName));
                    $message_modal='reussi';
                } catch (Exception $e) {
                    $message_modal = $e->getMessage();
                }
            }else{
                $message_modal = 'erreur ajout gallerie';
            }

        }else if(isset($_POST['formulaire']) && $_POST['formulaire'] == 'ajout_fichier'){
            if (isset($_FILES['notreFichier']) && !empty($_FILES['notreFichier'])) {
                try {
                    list($message_modal,$notreFichier) = upload_fichier($directory_ressources,"file",["application","image"]);
                    $queryFiles = ('insert into RESSOURCES (NOMRESSOURCE, FICHIERRESSOURCE, IDADHERENT) 
                                    values (:titre,:nomfichier,:idadherent)');
                    $queryExec = $bdd->prepare( $queryFiles);
                    $queryExec->execute(array('titre' => $_POST["TITREFICHIER"],'nomfichier' => $notreFichier,'idadherent'=> $_SESSION['IDADHERENT']));
                    $message_modal='fichier téléchargé';
                } catch (Exception $e) {
                    $message_modal = $e->getMessage();
                }
            }else{
                $message_modal = 'erreur ajout fichier';
            }

        }
        else if ($_POST['formulaire'] == 'update_photo') {
            if ( $user_level == 2) {
                if (isset($_FILES['NOMFICHIER']) && !empty($_FILES['NOMFICHIER'])) {
                    try {
                        list($photoName) = upload_fichier($directory_image_gallerie, 'file', 'image' );
                        //requete d'insertion dans la BD
                        $query = 'UPDATE PHOTO SET :titre,, :dphoto ,:idactivite,:idadherent,:nomphoto
                              WHERE IDPHOTO = :idPhoto;';
                        $queryExec = $bdd->prepare($query);
                        $queryExec->execute(
                            array('titre' => $_POST["TITREPHOTO"],'dphoto' =>$_POST["DPHOTO"] ,
                                'idactivite' => $_POST["IDACTIVITE"],'idadherent'=> $_SESSION['IDADHERENT'],'nomphoto' => $photoName,'idPhoto'=>$_POST["IDPHOTO"] ));
                        $message_modal='mise à jour gallerie réussi';
                    } catch (Exception $e) {
                        $message_modal = $e->getMessage();
                    }
                }else{
                    $message_modal = 'erreur mise a jour gallerie';
                }
            } else {
                $msg['modal'] = 'Vous n\'etes pas authorisé à appeller cette methode.';
            }
        }
    }

}





if (isset($_POST['typact']) && $_POST['typact'] == 't_act') {


    $query2 = 'INSERT INTO TYPE_ACTIVITE(
          
            INTITULETYPE
            ) 
            VALUES (
          
            "' . $_POST["INTITULETYPE"] . '"
           
            )';

    echo "Query : " . $query2;

    $bdd->query($query2);

}

