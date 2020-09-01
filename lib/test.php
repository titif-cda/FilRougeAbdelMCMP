<?php


/* updateCriptage des mots de passe mysql
 * include('../config/config.php');
include('./function.php');



$reponse = $bdd->query('SELECT * FROM ADHERENT');


while ($donnees = $reponse->fetch()) {
    $query = 'update ADHERENT set PASSWORD = ? WHERE IDADHERENT = ?';
    $response = $bdd->prepare($query);
    $result = $response->execute(array(My_crypt($donnees["PASSWORD"]), $donnees["IDADHERENT"]));
    }

*/



