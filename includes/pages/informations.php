
<main>
   <?php
   include('./includes/tempt/hero-section.php');

   ?>
   <section class="blog-section spad">
    <div class="container-fluid">
        <div id="news_breadcrumb" class="row">
            <?php
            //la requete
            $reponse = $bdd->query('SELECT * FROM NOUVELLE');
            //boucle les donneees recuperees
            while($row = $reponse -> fetch()){
                $row['DPUBLICATION'] = date("d-m-Y", strtotime($row['DPUBLICATION']));;

                include('./includes/tempt/news_breadcrumb.php');

            }
            ?>

    </div>
    </div>
    </section>


    <?php

if($user_level == 2 && $wysiwyg == true){
    include('./includes/tempt/wysiwyg.php');
}


?>

</main>

