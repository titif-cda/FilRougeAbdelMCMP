<section class="gallery-section spad">
    <div class="container ">
        <div class="row">
            <div class="col-lg-9 m-auto text-center">
                <div class="section-title titreSection">
                    <h2>Toutes nos informations</h2>
                </div>
            </div>
        </div>
    </div>
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
        </div>
        <div class="row gallery-filter">
            <?php
            //la requete
            $query = 'SELECT P.TITREPHOTO,P.DPHOTO,P.NOMFICHIER, P.IDACTIVITE, A.IDACTIVITE, A.IDTYPE  
            FROM PHOTO P JOIN ACTIVITE A WHERE P.IDACTIVITE = A.IDACTIVITE  ' ;
            $reponse = $bdd->query($query);
            while($row = $reponse -> fetch()){

                include('./includes/tempt/single_photo.php');
            }
            ?>
        </div>
    </div>
</section>