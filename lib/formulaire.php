<?php
//test de la super global $_POST si elle n'est pas vide '!empty()'
if(!empty($_POST)){

    if (isset($_POST['formulaire']) && $_POST['formulaire'] == 'register'){

        var_dump($_POST);

        $droit_image = $_POST["droit_image"] == 'on' ? 1 : 0;



        $query = 'INSERT INTO adherent(
            Login,
            Password,
            Nom,
            Prenom,
            DNaiss,
            Adresse1,
            CdPost,
            Ville,
            Email,
            Tel,
            Certificat,
            Droit_image,
            Cylindree
            ) VALUES (
            "'.$_POST["Login"].'",
            "'.$_POST["Password"].'",
            "'.$_POST["Nom"].'",
            "'.$_POST["Prenom"].'",
            "'.$_POST["DNaiss"].'",
            "'.$_POST["Adresse1"].'",
            "'.$_POST["CdPost"].'",
            "'.$_POST["Ville"].'",
            "'.$_POST["Email"].'",
            "'.$_POST["Tel"].'",
            1,
            '.$droit_image.',
            "'.$_POST["Cylindree"].'"
            )';

        echo "Query : ".$query;

        $bdd->query($query);

    }

};
