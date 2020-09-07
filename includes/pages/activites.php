
<?php

include('./includes/tempt/entete.php');

include('./includes/tempt/services.php');?>

<section class="gallery-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="gallery-controls">
                    <ul>
                        <li class="filter-button active" data-filter="all">Toutes les activités</li>
                        <li class="filter-button"  data-filter="1">Sorties</li>
                        <li class="filter-button"  data-filter="2">Repas</li>
                        <li class="filter-button"  data-filter="3">Reunions</li>
                    </ul>
                </div>
            </div>
                        <?php
                        //la requete
                        $reponse = $bdd->query('SELECT * FROM ACTIVITE order by DDEBUT desc ');
                        //boucle les donneees recuperees
                        while($row = $reponse -> fetch()){
                            $row['DDEBUT'] = date("d-m-Y", strtotime($row['DDEBUT']));;

                            include('./includes/tempt/single_activite.php');

                        }
                        ?>
                    </div>

        </div>
    </div>
</section>