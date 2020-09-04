<section><!-- Contact Section Begin -->
    <div class="booking-classes">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Ajout activité</h2>
                    <div class="booking-form">

                        <form action="./index.php?page=addactivite" method="post" class="register-form">
                            <input type="hidden" name="formact" value="activiteF"/>

                            <div class="row">

                                <div class="col-sm">
                                    <label> Titre de l'activité</label>
                                    <input type="text" name="INTITULEACTIVITE" placeholder="Intitulé de l'activité" value="">
                                    <label> Date de début de l'activité</label>
                                    <input type="date" id= "dbegin" name="DDEBUT" placeholder="Date de début d'activité" value="">
                                    <label> Date de fin l'activité</label>
                                    <input type="date" id= "dend" name="DFIN" placeholder="Date de fin d'activité" value="">
                                    <label> Description de l'activité</label>
                                    <input type="text" id= "name" name="DESCRIPTION"  placeholder="Description de l'activité "value="">
                                    <label> Tarif adherent</label>
                                    <input type="number" id= "number" name="TARIFADHERENT" placeholder ="Tarif Adherent " value="">
                                    <label> Tarif non adhérent</label>
                                    <input type="number" id= "number" name="TARIFINVITE" placeholder ="Tarif Invité " value="">
                                    <label> Date limite d'inscription</label>
                                    <input type="date" id= "dlimit" name="DLIMITEINSCRIPTION" placeholder="Date limite" value="">
                                    <label> Identifiant de l'adhérent</label>
                                    <input type="number" id= "id" name="IDADHERENT" placeholder="Date limite" value="">
                                    <label> Type d'activité</label>
                                    <input type="number" id= "id" name="IDTYPE" placeholder="Id type" value="">
                                    <div class="col-sm-6">
                                        <div class="col-sm">
                                            <label for="name"> Telechargez une photo.</label>
                                            <input type="file" name="image">
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




