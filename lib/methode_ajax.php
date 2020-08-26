<?php

//démarage des sessions
session_start();

//mon fichier config PDO, base de données
include('../config/config.php');

if($user_level == 2){

    if(!empty($_POST)) {

        if (isset($_POST['action']) && $_POST['action'] == "ADD_NEWS") {

            if(isset($_POST['data']) && !empty($_POST['data'])){
                $data = json_decode($_POST['data']);

                $query =
                    'INSERT INTO NOUVELLE(
                         TITRE_NOUVELLE,
                         /*DPUBLICATION,*/
                         DESCRIPTION
                    ) 
                    VALUES (
                        "'.$data->{"titre"}.'",
                     
                        "'.$bdd->quote($data->{"editordata"}).'"       
                    )';

                $bdd->query($query);

                //Récupère l'id crée automatiquement
                $newId =  $bdd->lastInsertId();
                $query = "SELECT IDNOUVELLE, TITRE_NOUVELLE, DESCRIPTION, DPUBLICATION from NOUVELLE WHERE IDNOUVELLE = $newId;";

                //Ajout d'une nouvelle.
                $result = $bdd->query($query);
                $newNews = $result->fetch();
                $newNews['DPUBLICATION'] = date("d-m-Y", strtotime($newNews['DPUBLICATION']));;


                $retour = array(
                    "error" => false,
                    "data" => array(
                        "modalMessage" => "Ajout d'une nouvelle.",
                        "news" => $newNews,
                    )
                );
                echo json_encode($retour);

                //include ('../includes/tempt/news_breadcrumb.php');

               // echo 'Ajout d\'une nouvelle.';

            }

        }

    }

}else{
$msg['modal'] = 'Vous n\'etes pas authorisé à appeller cette methode.';
    //echo 'Vous n\'etes pas authorisé à appeller cette methode.';

}