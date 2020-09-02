<?php
require_once './function.php';
require_once './lib/MailEngine.php';
use Lib\MailEngine;


if (!empty($_POST)){
    $errors = array();

    if (empty($_POST['LOGIN']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['LOGIN'])){

        $errors['LOGIN'] = "Votre pseudo n'est pas valide";
    }else{
        //verifie si login n'existe pas
        $unilog = $bdd->prepare("SELECT * FROM ADHERENT WHERE LOGIN =?");
        $unilog->execute(array($_POST['LOGIN']));
        $user = $unilog -> fetch();
        if ($user){
            $errors['LOGIN'] = 'Ce pseudo est déjà pris';
        }

    }







    //VERIF VALIDATION EMAIL
    if (empty($_POST['EMAIL']) || filter_var($_POST['EMAIL'], FILTER_VALIDATE_EMAIL)) {
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


    $droit_image = $_POST["DROITIMAGE"] == 'on' ? 1 : 0;
    $cylindree = isset($_POST["CYLINDREE"]) && !empty($cylindree) ? $_POST["CYLINDREE"] : '';
    $hashed_password = hash('sha256', $_POST["PASSWORD"]);

    if (empty($errors)){
    $query = ('insert into ADHERENT( LOGIN, PASSWORD, NOM, PRENOM, CDPOST, DNAISSANCE, ADRESSE1, ADRESSE2, VILLE, EMAIL, TELEPHONE, CERTIFICAT, DROITIMAGE, CYLINDREE,CONFIRMATION) 
                                    values (:login ,:password,:email, :confirmation)');

    $queryExec = $bdd->prepare($query);
$clefValidation = validationKey(60);

    $queryExec->execute(
        array(
            'login' => $_POST["LOGIN"],
            'password' => $hashed_password,
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
            'confirmation' => $clefValidation
        )

    );
        $expediteur = $_POST['EMAIL'];
        $subject = 'Validation de mail';
        $message = 'Afin de valider votre compte , merci de cliquer sur le lien suivant';

        try {
            \Lib\MailEngine::send($subject,$expediteur,$message);
         header('location: ');

        }
        catch(Exception $e){
            error_log($e ->getMessage());
        }
    }
    debug($errors);

}