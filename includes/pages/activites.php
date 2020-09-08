
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
<<<<<<< HEAD
            <section class="blog-section spad">
                <div  class="container-fluid">
                    <div id="single_news" class="row">

                    <?php
                    //la requete
                    $query = 'SELECT * FROM ACTIVITE order by DDEBUT asc' ;
                    $reponse = $bdd->query($query);


=======
        </div>
    </div>
    <div class="blog-section spad">
        <div class="container-fluid">
                <div id="single_act" class="row">

                        <?php
                        //la requete
                        $reponse = $bdd->query('SELECT * FROM ACTIVITE order by DDEBUT desc ');
>>>>>>> 1c4311c775cabe9ba721bda1c5d4b5b89e6385eb
                        //boucle les donneees recuperees
                        while($row = $reponse -> fetch()){
                            $row['DDEBUT'] = date("d-m-Y", strtotime($row['DDEBUT']));;

                            include('./includes/tempt/single_activite.php');

                        }
                        ?>
<<<<<<< HEAD
                    </div>
                    </div>
        </div>
            </section>

=======
                </div>
>>>>>>> 1c4311c775cabe9ba721bda1c5d4b5b89e6385eb
        </div>
    </div>


</section>