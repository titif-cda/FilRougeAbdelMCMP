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
                $unilog -> execute(array($_POST['LOGIN']));
                $logexist = $unilog->rowCount();
                if ($logexist != 0 ){
                    $message_modal = 'Login existe déjà, veuillez recommencer';
                }else {

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

                }
            }
        }else if ($_POST['formulaire'] == 'update_profil') {

            $query = 'UPDATE ADHERENT SET 
              LOGIN = "' . $_POST["LOGIN"] . '",
              PRENOM = "' . $_POST["PRENOM"] . '",
              CYLINDREE = "' . $_POST["CYLINDREE"] . '"
              WHERE IDADHERENT = ' . $_POST["IDADHERENT"];


            $bdd->query($query);
            //information modal html
            $message_modal = 'Votre profil est mis à jour.' ;

        }else if($_POST['formulaire'] == 'connexion'){

            if(isset($_POST['LOGIN']) AND isset($_POST['PASSWORD'])) {

                //je teste si j'ai des données dans les $_POST
                if (!empty($_POST['LOGIN']) and !empty($_POST['PASSWORD'])) {

                    $query = 'SELECT IDADHERENT, NOM, PRENOM, ADMIN FROM ADHERENT WHERE LOGIN = "'. $_POST['LOGIN'] . '" AND PASSWORD = "' . $_POST['PASSWORD'] . '"';
                    //lancement de la requete
                    $reponse = $bdd->query($query);

                    //permet de déterminer le nombre d'enregistrement
                    if ($reponse->rowCount() == 1) {

                        //boucle les données récupérées
                        while ($donnees = $reponse->fetch()) {

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

