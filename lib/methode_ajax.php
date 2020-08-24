<?php

//démarage des sessions
session_start();

//mon fichier config PDO, base de données
include('../config/config.php');

if($user_level == 2){

    if(!empty($_POST)) {

        if (isset($_POST['informations']) && $_POST['informations'] == 1) {

            if(isset($_POST['description']) && !empty($_POST['description'])){

                $query =
                    'INSERT INTO NOUVELLE(
                         TITRE,
                         DESCRIPTION
                    ) 
                    VALUES (
                        "'.$_POST["titre"].'",
                        "'.$_POST["description"].'"            
                    )';

                $bdd->query($query);

                echo 'Ajout d\'une nouvelle.';

            }

        }

    }

}else{

    echo 'Vous n\'etes pas authorisé à appeller cette methode.';

}