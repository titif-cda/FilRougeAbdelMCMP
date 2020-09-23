<section><!-- Contact Section Begin -->
    <div class="booking-classes">

        <div class="container">


            <div class="booking-form">

                <form action="./index.php?page=addressources" method="post" class="register-form" enctype="multipart/form-data">
                    <input type="hidden" name="formulaire" value="ajout_fichier"/>
                    <input type="hidden" id= "id" name="IDADHERENT"  value="<?php echo $_SESSION['IDADHERENT'] ?>">
                    <div class="row">

                        <div class="col-sm">
                            <h5> Titre du fichier</h5>
                            <input type="text" name="TITREFICHIER" placeholder="Titre du fichier" value="">

                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm"><br>
                                <h5 for="name"> Telechargez un fichier.</h5>
                                <input type="file" name="notreFichier">
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




