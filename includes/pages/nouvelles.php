<main>

    <?php
    include('./includes/tempt/entete.php');

    ?>

    <div class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 m-auto text-center">
                    <div class="section-title">
                        <h2>Toutes nos informations</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div id="single_news" class="row">
                <?php
                $reponse = $bdd->prepare('SELECT * FROM NOUVELLE WHERE DIFFUSION_LEVEL <= :Ulevel order by DPUBLICATION desc');

                $reponse->execute(array(
                    'Ulevel' => $user_level
                ));
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

    </div>
</main>

