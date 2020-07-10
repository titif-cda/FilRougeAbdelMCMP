
<?php

//démarage des sessions
session_start();

//mon fichier config PDO, base de données
include('../config/config.php');

if($user_level == 2){

    if(!empty($_POST)) {

        if (isset($_POST['informations']) && $_POST['informations'] == 1) {

            if(isset($_POST['TEXTE']) && !empty($_POST['TEXTE'])){

                $query = 'INSERT INTO NOUVELLE( TEXTE
                ) 
                VALUES (
                "'.$_POST["TEXTE"].'"            
            )';

                $bdd->query($query);

                echo 'Ajout d\'une nouvelle.';

            }

        }

    }

}else{

    echo 'Vous n\'etes pas authorisé à appeller cette methode.';

}