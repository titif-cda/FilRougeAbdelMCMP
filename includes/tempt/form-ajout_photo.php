<section><!-- Contact Section Begin -->
    <div class="booking-classes">
        <div class="container">
            <div class="booking-form">
                <form action="./index.php?page=addphoto" method="post" class="register-form" enctype="multipart/form-data">
                    <input type="hidden" name="formulaire" value="ajout_photo"/>
                    //récupere l'id Adherent de la personne qui publie la photo
                    <input type="hidden" id= "id" name="IDADHERENT"  value="<?php echo $_SESSION['IDADHERENT'] ?>">
                    <div class="row">
                        <div class="col-sm">
                            <h5> Titre de la photo</h5>
                            <input type="text" name="TITREPHOTO" placeholder="Intitulé de l'activité" value="">
                            <h5> Activité</h5><br>
                            //Liste déroulante me permettant de rajouter une photo uniquement pour les activités qui ont dèjà eu lieu
                            <select class="liste_deroulante" name="IDACTIVITE" id ="INTITULEACTIVITE" >
                                <?php
                                $activites = $bdd->query('SELECT IDACTIVITE ,INTITULEACTIVITE FROM ACTIVITE  
                                WHERE DLIMITEINSCRIPTION < NOW() order by DDEBUT asc');
                                while ($data = $activites-> fetch())
                                {echo'<option value="'.$data['IDACTIVITE'].'">'.$data['INTITULEACTIVITE'].'</option>';}
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm"><br>
                                <h5 for="name"> Telechargez une photo.</h5>
                                <input type="file" name="NOMFICHIER">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm">
                                <input type="submit" value="Ajouter" class="submit-btn">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>




