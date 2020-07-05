<?php
//test de la super global $_POST si elle n'est pas vide '!empty()'
if(!empty($_POST)) {


    if (isset($_POST['formulaire'])) {

        if ($_POST['formulaire'] == 'register') {

            // var_dump($_POST);

            $droit_image = $_POST["DROITIMAGE"] == 'on' ? 1 : 0;
            $cylindree = isset($_POST["CYLINDREE"]) && !empty($cylindree) ? $_POST["CYLINDREE"] : '';


            $query = 'INSERT INTO	ADHERENT(
            LOGIN,
            PASSWORD,
            NOM,
            PRENOM,
            DNAISSANCE,
            ADRESSE1,
            CDPOST,
            VILLE,
            EMAIL,
            TELEPHONE,
            CERTIFICAT,
            DROITIMAGE,
            CYLINDREE
            
            ) VALUES (
            "' . $_POST["LOGIN"] . '",
            "' . $_POST["PASSWORD"] . '",
            "' . $_POST["NOM"] . '",
            "' . $_POST["PRENOM"] . '",
            "' . $_POST["DNAISSANCE"] . '",
            "' . $_POST["ADRESSE1"] . '",
            "' . $_POST["CDPOST"] . '",
            "' . $_POST["VILLE"] . '",
            "' . $_POST["EMAIL"] . '",
            "' . $_POST["TELEPHONE"] . '",
            1,
            ' . $droit_image . ',
            "' . $_POST["CYLINDREE"] . '"
            )';

            // echo "Query : ".$query;

            $bdd->query($query);
            //information modal html
            $message_modal = 'Inscription prise en compte, nous vous recontacterons.';

        } else if ($_POST['formulaire'] == 'update_profil') {

            $query = 'UPDATE ADHERENT SET 
              LOGIN = "' . $_POST["LOGIN"] . '",
              PRENOM = "' . $_POST["PRENOM"] . '",
              CYLINDREE = "' . $_POST["CYLINDREE"] . '"
              WHERE IDADHERENT = ' . $_POST["IDADHERENT"];


            $bdd->query($query);
            //information modal html
            $message_modal = 'Votre profil est mis à jour.' ;

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

