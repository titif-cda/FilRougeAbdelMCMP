
<?php



?>

<section>
    <div id="ajoutInscription" class="booking-classes ">
        <div class="container">
            <div class="row forminscr">
                <div class="col-lg-12">
                    <div class="booking-form ">
                        <h2 class="text-center">Inscriptions aux activités</h2>
                        <form action="" method="post" >
                            <input type="hidden" name="formulaire" value="ajout_inscription"/>
                           <!-- <input type="hidden" name="idadherent" value="<?php /*echo $_SESSION['IDADHERENT'] */?>">-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm">
                                        <br><h5>Activité :</h5><br>
                                        <select class="liste_deroulante" name="idactivite" id ="INTITULEACTIVITE" >
                                            <?php
                                            $activites = $bdd->query('SELECT IDACTIVITE ,INTITULEACTIVITE FROM ACTIVITE  WHERE DLIMITEINSCRIPTION > NOW() order by DDEBUT asc');
                                            while ($data = $activites-> fetch())

                                            {echo'<option value="'.$data['IDACTIVITE'].'">'.$data['INTITULEACTIVITE'].'</option>';}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm">
                                        <br><h5>Nom et Prénom </h5><br>
                                        <select class="liste_deroulante" name="idadherent" id="IDADHERENT"  >
                                            <?php
                                            $listeAdherent = $bdd->query('SELECT IDADHERENT, NOM ,PRENOM FROM ADHERENT  ');
                                            while ($resultat = $listeAdherent-> fetch())

                                            {echo'<option value="'.$resultat['IDADHERENT'].'">'.$resultat['NOM'].' '.$resultat['PRENOM'].'</option>';}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm">
                                        <br><h5>Nombre de participants : </h5>
                                        <p>(Limité à 10 personnes)</p>
                                        <?php echo $data['IDACTIVITE']?>
                                        <br><input type="number" id= "id" name="nbpers" placeholder="Nombre de participants" value="" min="1" max="10">

                                    </div>

                                </div>


                            <div class="col-sm-12">
                                <div class="col-sm">
                                    <input type="submit" value="Ajouter" class="submit-btn ajoutInscr">
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
