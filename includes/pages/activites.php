
<?php

include('./includes/tempt/entete.php');

include('./includes/tempt/services.php');?>

<section class="gallery-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="gallery-controls">
                    <ul>
                        <li class="filter-button active" data-filter="all">All GALLERY</li>
                        <li class="filter-button"  data-filter="crossfit">Crossfit</li>
                        <li class="filter-button"  data-filter="workout">Workout</li>
                        <li class="filter-button"  data-filter="gym">GYM</li>
                    </ul>
                </div>
            </div>
                        <?php
                        //la requete
                        $reponse = $bdd->query('SELECT * FROM ACTIVITE order by DFIN desc ');
                        //boucle les donneees recuperees
                        while($row = $reponse -> fetch()){
                            $row['DFIN'] = date("d-m-Y", strtotime($row['DFIN']));;

                            include('./includes/tempt/single_activite.php');

                        }
                        ?>
                    </div>

        </div>
    </div>
</section>