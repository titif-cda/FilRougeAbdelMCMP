<section><!-- Contact Section Begin -->
    <div class="booking-classes">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Ajout activité</h2>
                    <div class="booking-form">

                        <form action="./index.php?page=addphoto" method="post" class="register-form">
                            <input type="hidden" name="formulaire" value="ajout_photo"/>

                            <div class="row">

                                <div class="col-sm">
                                    <label> Titre de l'activité</label>
                                    <input type="text" name="TITREPHOTO" placeholder="Intitulé de l'activité" value="">
                                    <label> Date de début de l'activité</label>
                                    <input type="date" id= "DPHOTO" name="DPHOTO" placeholder="Date de début d'activité" value="">
                                    <label> Identifiant de l'adhérent</label>
                                    <input type="number" id= "id" name="IDADHERENT" placeholder="Date limite" value="">
                                    <label> Identifiant de l'activité</label>
                                    <input type="number" id= "id" name="IDACTIVITE" placeholder="Id type" value="">
                                    <div class="col-sm-6">
                                        <div class="col-sm">
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




