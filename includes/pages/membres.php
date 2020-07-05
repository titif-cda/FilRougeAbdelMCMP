<main>
    <?php include('./includes/tempt/hero-section.php'); ?>

    <section id="member"  class="about-team spad">
        <div class="container">

            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="section-title">
                        <h1><?php echo $ar_pages_var[$page]['h1'] ?></h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                            viverra maecenas accumsan lacus vel facilisis. </p>
                    </div>
                </div>
            </div>
        </div>



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
                    /*include('./includes/tempt/membre.php');
                    include('./includes/tempt/membre.php');
                    include('./includes/tempt/membre.php');
                    include('./includes/tempt/membre.php');*/
                    ?>
                </div>
                </div>
            </div>

    </section>
</main>