<div class="col-md-4 col-sm-6">
    <div class="our-team">
        <div class="pic">
            <img src="./img/team/member-1.jpg" alt="team member" class="img-responsive" width="300px" height="300px">
            <!-- <?php
            /*                            $img = !empty($image) ? $image :'upload_adherent_detail_default.jpg';
                                        */ ?>
                            <img src="./lib/blob.php?user=<?php /*echo $id; */ ?>" alt="">-->
        </div>
        <div class="content">
            <!-- tp Le lien H5 à modifier, uniquement dispo en user_level = 2 'admin', proposer un lien alternative ?  -->

            <H3>
                <a href="./index.php?page=profil_adherent&id=<?php echo $donnees['IDADHERENT']; ?>"><?php echo $donnees['PRENOM'] . ' ' . $donnees['NOM']; ?></a>
            </H3>


            <li><?php echo $donnees['CYLINDREE']; ?></li>
            <li><?php echo $donnees['EMAIL']; ?></li>
            <li><?php echo $donnees['TELEPHONE']; ?></li>
            <li><?php echo $donnees['DADHESION']; ?></li>
            </ul>

            <?php if ($user_level == 2) { ?>
                <a href="./index.php?page=membres&action=delete&id=<?php echo $donnees['IDADHERENT']; ?>"
                   alt="Supprimer" title="Supprimer" class="primary-btn white">Supprimer</a>

            <?php } ?>

        </div>
    </div>
</div>

