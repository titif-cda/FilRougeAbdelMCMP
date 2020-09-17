<a href="page-profil_adherent-<?php echo $donnees['IDADHERENT']; ?>-<?php echo $donnees['NOM']; ?>-<?php echo $donnees['PRENOM']; ?>">
    <div class="col-md-4" id="member-<?=  $donnees['IDADHERENT']; ?> ">
        <div id="ficheMembre" class="team-member">
            <figure>
                <?php

                if(!empty($donnees['AVATAR_TYPE'])) { ?>
                                 <img class="align-content-center" loading="lazy" src="./lib/blob.php?user=<?php echo $donnees['IDADHERENT']; ?>" alt="">

                <?php }else  {
                    echo '<img loading="lazy" src="./img/upload/adherent/upload_adherent_default.jpg" alt="">';

                }?>



            <h4 class="nameMember">

            </h4>
                <div class="row">
                    <div class="col-sm-12">
                        <h4 ><?php echo $donnees['PRENOM'] . ' ' . $donnees['NOM']; ?></h4>
                    </div>
</a>
                <div class="col-sm-12">
                    <p > <span >Email :</span> <?php echo $donnees['EMAIL'] ?></p>
                </div>
                <div class="col-sm-12">
                    <p > <span >Téléphone :</span> <?php echo $donnees['TELEPHONE']?></p>
                </div>
                <div class="col-sm-12">
                    <p > <span >Date adhésion : <?php echo  date("d-m-Y", strtotime($donnees['DADHESION'] )) ?></span></p>
                </div>
                    <div class="col-sm-12">
                        <p > <span >Type de moto :</span> <?php echo $donnees['CYLINDREE']?></p>
                    </div>

                    <?php   if ($donnees['ADMIN'] == 1) { ?>
                    <div class="col-sm-12">
                        <p>Administrateur</p>
                    </div>
                    <?php } ?>

                    <div class="col-sm-12">
                        <?php if ($user_level == 2) { ?>
                                             <a href="./index.php?page=membres&action=delete&id=<?php echo $donnees['IDADHERENT']; ?>"
                                                   alt="Supprimer" title="Supprimer" class="primary-btn deleatadh_get ">Supprimer</a>
                            <a href="javascript::void(0);"
                               alt="Supprimer" data-id="<?php echo $donnees['IDADHERENT']; ?>"  title="Supprimer"  class="btn primary-btn deleteadh">Supprimer</a>

                        <?php } ?>


                    </div>


                </div>

            </figure>
        </div><!-- /.team-member-->
    </div>
