<main><!-- Contact Section Begin -->
    <div class="booking-classes">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2><?php echo $title_register; ?></h2>
                    <div class="booking-form">
                        <form action="./index.php?page=<?php echo $page ?><?php echo isset($id) ? '&id='.$id : ''; ?>" method="post" class="register-form">
                            <input type="hidden" name="formulaire" value="<?php echo $action; ?>"/>
                            <input type="hidden" name="IDADHERENT" value="<?php echo isset($id) ? $id : ''; ?>"/>


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm">
                                        <input type="text" name="LOGIN" value="<?php echo isset($identifiant) ? $identifiant : 'test identifiant' ?>" placeholder="" >
                                    </div>
                                    <div class="col-sm">
                                        <input type="password" id= "PASSWORD" name="PASSWORD" placeholder="Votre Mot de passe" value="abdel mdp">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <input type="text" id= "name" name="PRENOM"  value="<?php echo isset($prenom) ? $prenom : 'test prenom' ?>" placeholder="" />
                                    </div>
                                    <div class="col-sm">
                                        <input type="text" id= "name" name="NOM" value="<?php echo isset($nom) ? $nom : 'test nom' ?>" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <input type="date" id= "birth" name="DNAISSANCE" placeholder="Votre date de naissance" value="">
                                    </div>
                                    <div class="col-sm">
                                        <input type="text" id= "adress" name="ADRESSE1" placeholder="Votre adresse" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <input type="text" id= "adress" name="ADRESSE2" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <input type="text" id= "zip" name="CDPOST" placeholder="Votre code postal" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <input type="text" id= "city" name="VILLE" placeholder="Votre ville" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <input type="email" id= "email" name="EMAIL" placeholder="Votre email" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <input type="text" id= "mobile" name="TELEPHONE"  placeholder="Votre Téléphone" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <label for="name" >Certificat Médical (-6mois)</label>
                                        <input type="file" id= "certificat" name="CERTIFICAT"  placeholder="Téléchargez votre certificat médical">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <label for="name"> Vous acceptez que votre image soit utilisée sur le site internet.</label>
                                        <input type="checkbox" id= "droit" name="DROITIMAGE" placeholder="Vous acceptez que votre image soit utilisée sur le site internet">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="name" >Votre cylindrée</label>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="name" >125 cm3</label>
                                            <input type="radio"  name="CYLINDREE"value="125 cm3"  <?php echo isset($cylindree) && $cylindree == "125 cm3" ? 'checked' : '';  ?>/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="name" >250 cm3</label>
                                            <input type="radio"  name="CYLINDREE" value="250 cm3" <?php echo isset($cylindree) && $cylindree == "250 cm3" ? 'checked' : '';  ?>/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="name" >> 250 cm3</label>
                                            <input type="radio"  name="CYLINDREE"value="> 250 cm3"  <?php echo isset($cylindree) && $cylindree == " > 250" ? 'checked' : '';  ?>/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm">
                                        <button type="submit" class="submit-btn" ><?php echo $btn_register; ?></button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
    </div>

</main>


