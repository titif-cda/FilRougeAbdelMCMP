
<main>
    <?php
    include('./includes/tempt/entete.php');

    ?>
    <section class="blog-section spad">
        <div class="container-fluid">
            <div id="single_news" class="row">
                <?php
                if ($user_level == 1){

                    $reponse = $bdd->prepare('SELECT * FROM NOUVELLE WHERE DIFFUSION_LEVEL = ? order by DPUBLICATION desc');

                    $reponse->execute(array(
                        0
                    ));


                }else{
                    $reponse = $bdd->query('SELECT * FROM NOUVELLE order by DPUBLICATION desc ');
                    //boucle les donneees recuperees

                }
                while($row = $reponse -> fetch()){
                    $row['DPUBLICATION'] = date("d-m-Y", strtotime($row['DPUBLICATION']));;

                    include('./includes/tempt/single_news.php');
                }
                ?>

            </div>
        </div>
        <?php

        if($user_level == 2 && $wysiwyg == true){
            include('./includes/tempt/wysiwyg.php');
        }

        ?>
 <div>

 </div>
    </section>
</main>

