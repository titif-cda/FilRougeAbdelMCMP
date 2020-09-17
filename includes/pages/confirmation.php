<main>
    <?php

    $user_id = $_GET['id'];
    $token = $_GET['k'];


    $query = $bdd->prepare('SELECT VALIDATION_CLEF FROM ADHERENT WHERE IDADHERENT = ?'  );

    $query->execute([$user_id]);

    $user = $query ->fetch();

    if ($user && $user['VALIDATION_CLEF'] == $token){

        $requette = $bdd->prepare('UPDATE ADHERENT SET CONFIRMATION = 1 WHERE IDADHERENT = ?') ->execute([$user_id]);
        $_SESSION['auth'] = $user;
        header('Location: galerie.php');

    }else{
        die ('pas ok');
    }
    ?>
</main>