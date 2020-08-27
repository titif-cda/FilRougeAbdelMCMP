
<?php

//démarage des sessions
session_start();

//mon fichier config PDO, base de données
include('../config/config.php');

if(isset($_GET['user']) && !empty($_GET['user'])){

    $query = 'SELECT AVATAR_BLOB, AVATAR_TYPE FROM ADHERENT WHERE IDADHERENT = ?';

    //prepare execute c'est beaucoup mieux, voir injection SQL !
    $response = $bdd->prepare($query);
    $result = $response->execute(array($_GET['user']));
    $data = $response->fetch();

    header('Content-type:'.$data['AVATAR_TYPE']);
    echo $data['AVATAR_BLOB'];

}

?>