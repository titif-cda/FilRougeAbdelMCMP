
<main>

    <?php

    if(isset($_GET['id']) && !empty($_GET['id'])){

        //la requete de la table page
        $reponse = $bdd->query('SELECT * FROM ADHERENT WHERE IDADHERENT = '.$_GET['id']);


        //boucle les données récupérées
        while ($donnees = $reponse->fetch()) {

            $identifiant = $donnees['LOGIN'];
            $nom = $donnees['NOM'];
            $prenom = $donnees['PRENOM'];
            $login = $donnees['LOGIN'];
            $cylindree = $donnees['CYLINDREE'];
            //to be continued

        }

        $ar_pages_var[$page]['h1'] = $prenom.' '.$nom;
        $id = $_GET['id'];

    }



    $title_register = 'Mise à jour de votre profil';
    $btn_register = 'Mettre à jour';
    $action = 'update_profil';

    include('./includes/tempt/hero-section.php');
    include('./includes/tempt/form-register.php');

    ?>

</main>
