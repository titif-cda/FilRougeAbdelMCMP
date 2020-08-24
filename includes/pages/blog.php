<main>
    <?php
    include('./includes/tempt/hero-section.php');

    ?>
    <section class="blog-section spad">
        <div class="container-fluid">
            <div class="row">
                <?php
                //la requete
                $reponse = $bdd->query('SELECT * FROM NOUVELLE');
                //boucle les donneees recuperees
                while($donnees = $reponse -> fetch()){

                    include('./includes/tempt/news_breadcrumb.php');

                }
                ?>
                <div class="col-lg-12 text-center">
                    <div class="blog-btn">'
                        <a href="#" class="primary-btn">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('./includes/tempt/blog_detail.php');
    ?>


    <?php

    if($user_level == 2 && $wysiwyg == true){
        include('./includes/tempt/wysiwyg.php');
    }


    ?>

</main>

