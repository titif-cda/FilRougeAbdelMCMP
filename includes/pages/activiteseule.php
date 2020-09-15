
<?php include('./includes/tempt/entete.php'); ?>

<section class="about-us-section spad">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-text ">
                    <div class="section-title">
                        <h2><?php echo $titleActivite ?></h2>
                    </div>
                    <span class="blog-time"> <?php echo $datedebut; ?></span><br>


                </div>
            </div>
            <div class="col-lg-12  text-center">
                <div class="about-img">
                    <?php
                    $imageAct = !empty($imageAct) ? $imageAct: 'upload_activité_default.jpg';
                    ?>

                    <img src="<?php echo $directory_image_activites.$imageAct?>" alt="">
                </div>
            </div>
            <div class="col-lg-12">

                <p><?php echo $descriptionA; ?></p>
            </div>
        </div>
    </div>
    <?php
    if ($user_level == 2) {?>
    <div class="modifAct">
        <div class="container ">
            <div class="row">

                <div class="col-lg-12">
                    <button class="btn btn_modif btn-primary">Modifiez l'activité?</button>
                </div>
            </div>
        </div>
        <div id="act" class="booking-classes" style="display: none">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 t">
                        <div class="booking-form">
                            <form action="./index.php?page=activiteseule&id=<?php echo $id; ?>&titre=<?php echo str_replace(" ", "", $donnees['INTITULEACTIVITE'])?>" method="post" class="register-form" enctype="multipart/form-data">
                                <input type="hidden" name="formulaire" value="update_activite">

                                <input type="hidden" id= "id" name="IDADHERENT"  value="<?php echo $_SESSION['IDADHERENT'] ?>">
                                <div class="row">
                                    <div class="col-sm">
                                        <h2 class="text-center">Modifier l'activité</h2>

                                        <label> Titre de l'activité</label>
                                        <input type="text" name="INTITULEACTIVITE" placeholder="Intitulé de l'activité" value="<?php echo isset($titleActivite) ? $titleActivite : '' ?>">
                                        <label> Date de début de l'activité</label>
                                        <input type="date" id= "dbegin" name="DDEBUT" placeholder="Date de début d'activité" value="<?php echo isset($datedebut) ? $datedebut : '' ?>">
                                        <label> Date de fin l'activité</label>
                                        <input type="date" id= "dend" name="DFIN" placeholder="Date de fin d'activité" value=""<?php echo isset($dateFin) ? $dateFin : '' ?>">
                                        <label> Description de l'activité</label>
                                        <input type="text" id= "name" name="DESCRIPTION"  placeholder="Description de l'activité " value=""<?php echo isset($descriptionA) ? $descriptionA : '' ?>">
                                        <label> Tarif adherent</label>
                                        <input type="number" id= "number" name="TARIFADHERENT" placeholder ="Tarif Adherent " value=""<?php echo isset($tarifAdherent) ? $tarifAdherent : '' ?>">
                                        <label> Tarif non adhérent</label>
                                        <input type="number" id= "number" name="TARIFINVITE" placeholder ="Tarif Invité " value=""<?php echo isset($tarifInvite) ? $tarifInvite : '' ?>">
                                        <label> Date limite d'inscription</label>
                                        <input type="date" id= "dlimit" name="DLIMITEINSCRIPTION" placeholder="Date limite" value=""<?php echo isset($datelimiteInscr) ? $datelimiteInscr : '' ?>">


                                        <label> Type d'activité</label><br>
                                        <select name="IDTYPE" id=""><?php
                                            $activitesType = $bdd->query('SELECT IDTYPE ,INTITULETYPE FROM TYPE_ACTIVITE  ');
                                            while ($data = $activitesType-> fetch())

                                            {echo'<option value="'.$data['IDTYPE'].'">'.$data['INTITULETYPE'].'</option>';}
                                            ?>
                                        </select>

                                        <div class="col-sm-6">
                                            <div class="col-sm">
                                                <label for="name" > Telechargez une photo.</label>
                                                <input type="file" name="image" value="$img" >
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm">
                                            <input type="submit" value="Modifier activité" class="submit-btn">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm">
                                                <?php if ($user_level == 2) { ?>
                                                    <button><a href="./index.php?page=activites&action=delete&id=<?php echo $_GET['id']; ?>"><span class="btn primary-btn">Supprimer</span></a></button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } ?>
</section>

<?php
//$date = date("d-m-Y");
//
//if ($user_level >0 && $date >= $datelimiteInscr )   {
//    ?>
<!--    <div id="ajoutInscription" class="booking-classes">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-lg-12">-->
<!--                    <div class="booking-form">-->
<!--                        <h2 class="text-center">S'inscrire</h2>-->
<!--                        <form action="" method="post" >-->
<!--                            <input type="hidden" name="formulaire" value="ajout_inscription"/>-->
<!--                            <input type="hidden" name="idadherent" value="--><?php //echo $_SESSION['IDADHERENT']?><!--">-->
<!--                            <input type="hidden" name="idactivite" value="--><?php //echo $_GET['id'] ?><!--">-->
<!--                            <div class="row">-->
<!--                                <br><input type="number" id= "id" name="nbpers" placeholder="Nombre de participants" value="" min="1" max="10">-->
<!--                            </div>-->
<!--                            <div class="col-sm-12">-->
<!--                                <div class="col-sm">-->
<!--                                    <input type="submit" value="Valider" class="submit-btn ajoutInscr">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<?php}/**/?>
