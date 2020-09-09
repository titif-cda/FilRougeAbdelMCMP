<section>
    <div class="booking-classes">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="booking-form">

                        <h2 class="text-center">S'inscrire</h2>

                        <form action="" method="post" class="inscriptionAct-form">
                            <input type="hidden" name="formulaire" value="ajout_photo"/>

                            <div class="row">
                                <div class="col-sm-12">
                                </div>
                                <div class="col-sm-12">
                                    <h5 class="text-left">Votre Nom:</h5>
                                    <h4 class="text-left"> <?php echo $_SESSION['NOM'] ?></h4>
                                    <h5 class="text-left">Votre Prénom: </h5>
                                    <h4 class="text-left"> <?php echo $_SESSION['PRENOM'] ?></h4>
                                    <h5 class="text-left">Votre Identifiant: </h5>
                                    <h4 class="text-left"><?php echo $_SESSION['IDADHERENT'] ?></h4>
                                    <h5 class="text-left">Choisissez l'activité</h5><br>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm">
                                        <select name="INTITULEACTIVITE" id ="INTITULEACTIVITE" >
                                            <!--                                            {-->
                                            <!--                                            font-size: 24px;-->
                                            <!--                                            margin: 0;-->
                                            <!--                                            color: #111111;-->
                                            <!--                                            font-weight: 500;-->
                                            <!--                                            font-family: "Oswald", sans-serif;-->
                                            <!--                                            }-->
                                            <?php

                                            $activites = $bdd->query('SELECT IDACTIVITE ,INTITULEACTIVITE FROM ACTIVITE  WHERE DLIMITEINSCRIPTION > NOW() order by DDEBUT asc');
                                            while ($data = $activites-> fetch())

                                            {echo'<option value="'.$data['INTITULEACTIVITE'].'">'.$data['INTITULEACTIVITE'].'</option>';}
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">

                                    <?php echo $data['IDACTIVITE']?>
                                    <br><input type="number" id= "id" name="IDACTIVITE" placeholder="Nombre de participants" value="" min="1" max="10>

                                </div>

                                <!--                                --><?php
                                //                                    $nomAct =$data['INTITULEACTIVITE'];
                                //                                    $idact = $bdd->query('SELECT IDACTIVITE  FROM ACTIVITE  WHERE INTITULEACTIVITE = $nomAct');
                                //                                    $datact = $idact-> fetch();
                                //
                                //                                echo $datact;
                                //                                ?>
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
