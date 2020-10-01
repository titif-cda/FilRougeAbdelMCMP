<section id="member"  class="about-team spad">


    <?php if($user_level == 2){
        include('./includes/tempt/classes-section.php');} ?>

    <div class="container">
        <div id="fiche">
            <div class="row ">

                <?php
                //la requete
                $reponse = $bdd->query('SELECT * FROM ADHERENT');
                //boucle les donneees recuperees
                while($donnees = $reponse -> fetch()){

                    include('./includes/tempt/membre.php');

                }

                ?>
            </div>
        </div>
    </div>

</section>
