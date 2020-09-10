<section><!-- Contact Section Begin -->
    <div class="booking-classes">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Ajout photo</h2>
                    <div class="booking-form">

                        <form action="./index.php?page=addphoto" method="post" class="register-form" enctype="multipart/form-data">
                            <input type="hidden" name="formulaire" value="ajout_photo"/>
                            <input type="hidden" id= "id" name="IDADHERENT"  value="<?php echo $_SESSION['IDADHERENT'] ?>">
                            <div class="row">

                                <div class="col-sm">
                                    <label> Titre de la photo</label>
                                    <input type="text" name="TITREPHOTO" placeholder="Intitulé de l'activité" value="">
<!--                                    <label> Date de début de l'activité</label>-->
<!--                                    <input type="date" id= "DPHOTO" name="DPHOTO" placeholder="Date de début d'activité" value="">-->


                                    <label> Activité</label><br>
                                    <select class="liste_deroulante" name="IDACTIVITE" id ="INTITULEACTIVITE" >
                                    --><?php
//
                                    $activites = $bdd->query('SELECT IDACTIVITE ,INTITULEACTIVITE FROM ACTIVITE  WHERE DLIMITEINSCRIPTION < NOW() order by DDEBUT asc');
                                    while ($data = $activites-> fetch())

                                    {echo'<option value="'.$data['IDACTIVITE'].'">'.$data['INTITULEACTIVITE'].'</option>';}


                                  ?>
                                    </select>

                                    <div class="col-sm-6">
                                        <div class="col-sm"><br>
                                            <label for="name"> Telechargez une photo.</label>
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
        </div>
    </div>


</section>




