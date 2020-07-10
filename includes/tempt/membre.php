
        <!-- end team member -->



                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img  src="./img/team/member-1.jpg" alt="team member" class="img-responsive" width="300px" height="300px">
                        </div>
                        <div class="content">
                            <!-- tp Le lien H5 à modifier, uniquement dispo en user_level = 2 'admin', proposer un lien alternative ?  -->

                            <H3><a href="./index.php?page=profil&id=<?php echo $donnees['IDADHERENT']; ?>"><?php echo $donnees['PRENOM'].' '.$donnees['NOM']; ?></a></H3>

                            <span><?php echo $donnees['CYLINDREE']; ?></span>
                            < class="social">
                                <li><a href="#" class="fa fa-facebook"></a></li>
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-linkedin"></a></li>
                                <?php if ($user_level == 2){?>
                                <li><a href="./index.php?page=membres&action=delete&id=<?php echo $donnees['IDADHERENT']; ?>"alt="Supprimer" title="Supprimer">Supprimer<i class="fa fa-remove"></i></a></li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

