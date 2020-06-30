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

    if (isset($_POST['formact']) && $_POST['formact'] == 'activiteF'){

var_dump($_POST);
        $query1 = 'INSERT INTO activite(
          
            IntituleActivite,
            DDebut,
            DFin,
            Description,
            TarifAdherent,
            TarifInvite,
            DLimite,
            IdAdherent,
            IdType

          
            ) 
            VALUES (
          
            "'.$_POST["IntituleActivite"].'",
            "'.$_POST["DDebut"].'",
            "'.$_POST["DFin"].'",
            "'.$_POST["Description"].'",
            "'.$_POST["TarifAdherent"].'",
            "'.$_POST["TarifInvite"].'",
            "'.$_POST["DLimite"].'",
            "'.$_POST["IdAdherent"].'",
            "'.$_POST["IdType"].'"
           
         
            
            )';
        echo "Query : ".$query1;

        $bdd->query($query1);


    };
    if (isset($_POST['typact']) && $_POST['typact'] == 't_act'){

        var_dump($_POST);
        $query2 = 'INSERT INTO type_activite(
          
            IntituleType
            ) 
            VALUES (
          
            "'.$_POST["IntituleType"].'"
           
            )';

        echo "Query : ".$query2;

        $bdd->query($query2);
    };
}
