
    <div class="col-md-4">
        <div class="team-member">
            <figure>
                <?php
                if(!empty($donnees['AVATAR_TYPE'])) { ?>
                                 <img loading="lazy" src="/lib/blob.php?user=<?php echo $donnees['IDADHERENT']; ?>" alt="">

                <?php }else  {
                    echo '<img loading="lazy" src="/img/upload/adherent/upload_adherent_default.jpg" alt="">';

                }?>



            <h4 class="nameMember">
                <a href="./index.php?page=profil_adherent&id=<?php echo $donnees['IDADHERENT']; ?>"><?php echo $donnees['PRENOM'] . ' ' . $donnees['NOM']; ?></a>
            </h4>
            <ul>
                <li><a href=""><i class="fa fa-facebook fa-2x"></i></a></li>
                <li><a href=""><i class="fa fa-twitter fa-2x"></i></a></li>
                <li><a href=""><i class="fa fa-linkedin fa-2x"></i></a></li>
                <br>
            </ul>
                <ul class=" recup">
                <li><?php echo $donnees['CYLINDREE']; ?></
                ></li>
                <li><?php echo $donnees['EMAIL']; ?></li>
                <li><?php echo $donnees['TELEPHONE']; ?></li>
                <li><?php echo $donnees['DADHESION']; ?></li>
                <?php if ($user_level == 2) { ?>
                    <a href="./index.php?page=membres&action=delete&id=<?php echo $donnees['IDADHERENT']; ?>"
                       alt="Supprimer" title="Supprimer" class="primary-btn ">Supprimer</a>

                <?php } ?>
            </ul>
            <p>Creative Director</p>
            </figure>
        </div><!-- /.team-member-->
    </div>