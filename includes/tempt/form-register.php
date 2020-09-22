<section><!-- Contact Section Begin -->
    <div class="booking-form maj_profil">
        <?php if ($user_level > 0){?>
            <div class="member_connect container ">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        if (!empty($errors)):?>
                            <div class="alert alert-danger">
                                <p>Vous n'avez pas rempli le formulaire corrrectement </p>
                                <?php
                                foreach ($errors as $error): ?>
                                    <ul>
                                        <li><?= $error; ?></li>
                                    </ul>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>


                        <div class="card card_maj">
                            <div class="row">
                                <div class="col-sm-12 text-center photoprofil img-fluid ">

                                    <?php

                                    if(!empty($type)) { ?>
                                        <img loading="lazy" src="/lib/blob.php?user=<?php echo $idadherent; ?>" alt="">

                                    <?php }else  {
                                        echo '<img loading="lazy" src="/img/upload/adherent/upload_adherent_detail_default.jpg" alt="">';

                                    }

                                    ?>


                                </div>

                                <div class="col-sm-6">
                                    <p > <span >Nom :</span> <?php echo $nom ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p > <span >Prénom :</span> <?php echo $prenom ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p > <span >Email : </span> <?php echo $email  ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p > <span >Téléphone : </span> <?php echo $tel  ?></p>
                                </div>
                                <div class="col-sm-12">
                                    <p > <span >Date de naissance :</span> <?php echo $dnaissance ?></p>
                                </div>

                                <div class="col-sm-12">
                                    <p > <span >Adresse :</span> <?php echo $adress1 ?></p>
                                </div>
                                <div class="col-sm-12">
                                    <p > <span></span> <?php echo $adress2  ?></p>
                                </div>

                                <div class="col-sm-6">
                                    <p > <span >Code Postal :</span> <?php echo $cdpost  ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p > <span>Ville : </span> <?php echo $ville  ?></p>
                                </div>


                                <div class="col-sm-6">
                                    <p > <span class="font-weight-bolder">Cylindrée : </span> <?php echo $cylindree  ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p > <span >N° adhérent : </span> <?php echo $idadherent  ?></p>
                                </div>
                                <div class="col-12 maj_btn" >
                                    <button class="btn btn-primary ">Mettre à jour votre profil</button>
                                </div>

                            </div>
                        </div>

                        <div id="majProfil" class="container maj_profil" style="display: none">
                            <h2 class="text-center"><?php echo $title_register; ?></h2>
                            <div class="booking-form profilform">
                                <form action="page-<?php echo $page.'-'.$id.'-'.$nom.'-'.$prenom ?>" method="post" class="register-form" enctype="multipart/form-data">
                                    <input type="hidden" name="formulaire" value="<?php echo $action; ?>"/>
                                    <input type="hidden" name="IDADHERENT" value="<?php echo isset($id) ? $id : ''; ?>"/>


                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="col-sm">
                                                <label > Votre Identifiant</label>
                                                <input type="text" name="LOGIN" value="<?php echo isset($identifiant) ? $identifiant : 'test identifiant' ?>" placeholder="" >
                                            </div>
                                            <div class="col-sm">
                                                <label > Votre mot de passe</label>
                                                <input type="password" id= "PASSWORD" name="PASSWORD" placeholder="Votre Mot de passe" value="admin">
                                            </div>
                                            <div class="col-sm">
                                                <label > Confirmez votre mot de passe</label>
                                                <input type="password_confirm" id= "PASSWORD" name="PASSWORD_CONFIRM" placeholder="Votre Mot de passe" value="admin">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="col-sm">
                                                <label > Votre Prenom </label>
                                                <input type="text" id= "name" name="PRENOM"  value="<?php echo isset($prenom) ? $prenom : 'test prenom' ?>" placeholder="" />
                                            </div>
                                            <div class="col-sm">
                                                <label > Votre Nom </label>
                                                <input type="text" id= "name" name="NOM" value="<?php echo isset($nom) ? $nom : 'test nom' ?>" />

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm">
                                                <label > Votre date de naissance</label>
                                                <input type="date" id= "birth" name="DNAISSANCE" placeholder="" value="<?php echo isset($dnaissance) ? $dnaissance : "1982-04-14" ?>">
                                            </div>
                                            <div class="col-sm">
                                                <label > Votre adresse </label>
                                                <input type="text" id= "adress" name="ADRESSE1" placeholder="" value="<?php echo isset($adress1) ? $adress1 : 'rue des coquelicots' ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm">
                                                <label > Votre adresse 2 </label>
                                                <input type="text" id= "adress" name="ADRESSE2" value="<?php echo isset($adress2) ? $adress2 : '' ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm">
                                                <label > Votre code postal </label>
                                                <input type="text" id= "zip" name="CDPOST" placeholder="" value="<?php echo isset($cdpost) ? $cdpost : '12100' ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm">
                                                <label > Votre ville </label>
                                                <input type="text" id= "city" name="VILLE" placeholder="" value="<?php echo isset($ville) ? $ville : 'Millau' ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm">
                                                <label > Votre email </label>
                                                <input type="email" id= "email" name="EMAIL" placeholder="" value="<?php echo isset($email) ? $email : 'votre@adresse.mail' ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm">
                                                <label > Votre téléphone </label>
                                                <input type="text" id= "mobile" name="TELEPHONE"  placeholder="e" value="<?php echo isset($tel) ? $tel : '0606060606' ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm">
                                                <label for="name" >Certificat Médical (-6mois)</label>
                                                <input type="file" id= "certificat" name="CERTIFICAT"  placeholder="Téléchargez votre certificat médical" value=0>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm">
                                                <label for="name"> Vous acceptez que votre image soit utilisée sur le site internet.</label>
                                                <input type="checkbox" id= "droit" name="DROITIMAGE" placeholder="Vous acceptez que votre image soit utilisée sur le site internet" <?= ($droitImage == 0) ? '' : 'checked' ?>>
                                            </div>
                                        </div>
                                        <?php if($user_level > 0){ ?>
                                        <div class="col-sm-6">
                                            <div class="col-sm">
                                                <label for="name"> Telechargez une photo.</label>
                                                <input type="file" name="image">
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php if($user_level == 2){ ?>
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="ADMIN" id="administrateur"  <?php if (isset($_POST["ADMIN"])) { if ($_POST["ADMIN"] == "administrateur") { echo "checked"; } } ?>value=1 >
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Administrateur
                                                </label>
                                            </div>
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="ADMIN" id="membre" checked <?php if (isset($_POST["ADMIN"])) { if ($_POST["ADMIN"] == "membre") { echo "checked"; } } ?>value=0 >
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Membre
                                                </label>
                                             </div>
                                            <?php } ?>
                                            </div>
                                        <div class="col-sm-6">
                                            <label for="name" >Votre cylindrée</label>
                                            <div class="row">
                                                <div class="form-check">
                                                    <label for="name" >125 cm3</label>
                                                    <input type="radio"  name="CYLINDREE"value="125 cm3"  <?php echo isset($cylindree) && $cylindree == "125 cm3" ? 'checked' : '';  ?>/>
                                                </div>
                                                <div class="form-check">
                                                    <label for="name" >250 cm3</label>
                                                    <input type="radio"  name="CYLINDREE" value="250 cm3" <?php echo isset($cylindree) && $cylindree == "250 cm3" ? 'checked' : '';  ?>/>
                                                </div>
                                                <div class="form-check">
                                                    <label for="name" >> 250 cm3</label>
                                                    <input type="radio"  name="CYLINDREE"value="> 250 cm3"  <?php echo isset($cylindree) && $cylindree == " > 250" ? 'checked' : '';  ?>/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm">
                                                <button type="submit" class="submit-btn primary-btn" ><?php echo $btn_register; ?></button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        <?php }else{?>
        <div class=" container ">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if (!empty($errors)):?>
                        <div class="alert alert-danger">
                            <p>Vous n'avez pas rempli le formulaire corrrectement </p>
                            <?php
                            foreach ($errors as $error): ?>
                                <ul>
                                    <li><?= $error; ?></li>
                                </ul>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>


                    <div class="card card_maj">
                        <div class="row">


                            <div class="container" >
                                <h2 class="text-center"><?php echo $title_register; ?></h2>
                                <div class="booking-form ">
                                    <form action="./index.php?page=<?php echo $page ?><?php echo isset($id) ? '&id='.$id : ''; ?>&prenom=<?php echo str_replace(" ", "", $donnees['PRENOM']); ?>" method="post" class="register-form" enctype="multipart/form-data">
                                        <input type="hidden" name="formulaire" value="<?php echo $action; ?>"/>
                                        <input type="hidden" name="IDADHERENT" value="<?php echo isset($id) ? $id : ''; ?>"/>


                                        <div class="row">

                                            <div class="col-sm-12">
                                                <div class="col-sm">
                                                    <label > Votre Identifiant</label>
                                                    <input type="text" name="LOGIN" value="<?php echo isset($identifiant) ? $identifiant : 'test identifiant' ?>" placeholder="" >
                                                </div>
                                                <div class="col-sm">
                                                    <label > Votre mot de passe</label>
                                                    <input type="password" id= "PASSWORD" name="PASSWORD" placeholder="Votre Mot de passe" value="admin">
                                                </div>
                                                <div class="col-sm">
                                                    <label > Confirmez votre mot de passe</label>
                                                    <input type="password_confirm" id= "PASSWORD" name="PASSWORD_CONFIRM" placeholder="Votre Mot de passe" value="admin">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="col-sm">
                                                    <label > Votre Prenom </label>
                                                    <input type="text" id= "name" name="PRENOM"  value="<?php echo isset($prenom) ? $prenom : 'test prenom' ?>" placeholder="" />
                                                </div>
                                                <div class="col-sm">
                                                    <label > Votre Nom </label>
                                                    <input type="text" id= "name" name="NOM" value="<?php echo isset($nom) ? $nom : 'test nom' ?>" />

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-sm">
                                                    <label > Votre date de naissance</label>
                                                    <input type="date" id= "birth" name="DNAISSANCE" placeholder="" value="<?php echo isset($dnaissance) ? $dnaissance : "1982-04-14" ?>">
                                                </div>
                                                <div class="col-sm">
                                                    <label > Votre adresse </label>
                                                    <input type="text" id= "adress" name="ADRESSE1" placeholder="" value="<?php echo isset($adress1) ? $adress1 : 'rue des coquelicots' ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-sm">
                                                    <label > Votre adresse 2 </label>
                                                    <input type="text" id= "adress" name="ADRESSE2" value="<?php echo isset($adress2) ? $adress2 : '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-sm">
                                                    <label > Votre code postal </label>
                                                    <input type="text" id= "zip" name="CDPOST" placeholder="" value="<?php echo isset($cdpost) ? $cdpost : '12100' ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-sm">
                                                    <label > Votre ville </label>
                                                    <input type="text" id= "city" name="VILLE" placeholder="" value="<?php echo isset($ville) ? $ville : 'Millau' ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-sm">
                                                    <label > Votre email </label>
                                                    <input type="email" id= "email" name="EMAIL" placeholder="" value="<?php echo isset($email) ? $email : 'votre@adresse.mail' ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-sm">
                                                    <label > Votre téléphone </label>
                                                    <input type="text" id= "mobile" name="TELEPHONE"  placeholder="e" value="<?php echo isset($tel) ? $tel : '0606060606' ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-sm">
                                                    <label for="name" >Certificat Médical (-6mois)</label>
                                                    <input type="file" id= "certificat" name="CERTIFICAT"  placeholder="Téléchargez votre certificat médical" value=0>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-sm">
                                                    <label for="name"> Vous acceptez que votre image soit utilisée sur le site internet.</label>
                                                    <input type="checkbox" id= "droit" name="DROITIMAGE" placeholder="Vous acceptez que votre image soit utilisée sur le site internet">
                                                </div>
                                            </div>
                                            <?php if($user_level > 0){ ?>
                                            <div class="col-sm-6">
                                                <div class="col-sm">
                                                    <label for="name"> Telechargez une photo.</label>
                                                    <input type="file" name="image">
                                                </div>
                                                <?php } ?>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="name" >Votre cylindrée</label>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="name" >125 cm3</label>
                                                        <input type="radio"  name="CYLINDREE"value="125 cm3"  <?php echo isset($cylindree) && $cylindree == "125 cm3" ? 'checked' : '';  ?>/>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="name" >250 cm3</label>
                                                        <input type="radio"  name="CYLINDREE" value="250 cm3" <?php echo isset($cylindree) && $cylindree == "250 cm3" ? 'checked' : '';  ?>/>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="name" >> 250 cm3</label>
                                                        <input type="radio"  name="CYLINDREE"value="> 250 cm3"  <?php echo isset($cylindree) && $cylindree == " > 250" ? 'checked' : '';  ?>/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm">
                                                    <button type="submit" class="submit-btn primary-btn" ><?php echo $btn_register; ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>


