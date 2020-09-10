
<main>
    <?php
    include('./includes/tempt/entete.php');

    ?>
    <section class="blog-section spad">
        <div class="container-fluid">
            <div id="single_news" class="row">
                <?php
                if ($user_level == 0){$reponse = $bdd->query('SELECT * FROM NOUVELLE where DIFFUSION_LEVEL = 0 order by DPUBLICATION desc ');
                    //boucle les donneees recuperees
                    while($row = $reponse -> fetch()){
                        $row['DPUBLICATION'] = date("d-m-Y", strtotime($row['DPUBLICATION']));;

                        include('./includes/tempt/single_news.php');
                    }

                }else{
                    $reponse = $bdd->query('SELECT * FROM NOUVELLE order by DPUBLICATION desc ');
                    //boucle les donneees recuperees
                    while($row = $reponse -> fetch()){
                        $row['DPUBLICATION'] = date("d-m-Y", strtotime($row['DPUBLICATION']));;

                        include('./includes/tempt/single_news.php');
                    }
                }
                ?>

            </div>
        </div>
        <?php

        if($user_level == 2 && $wysiwyg == true){
            include('./includes/tempt/wysiwyg.php');
        }

        ?>
    </section>
</main>

