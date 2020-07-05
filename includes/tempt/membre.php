<div class=" col-lg-4 col-md-6">
    <div class="team-member-pic">
        <img class="responsive" src="./img/default_user.jpg" alt="">
    </div>

    <div class="team-member-desc">

        <H3><a href="./index.php?PAGE=PROFIL&id=<?php echo $donnees['IDADHERENT']; ?>"><?php echo $donnees['PRENOM'].' '.$donnees['NOM']; ?></a></H3>

        <span><?php echo $donnees['CYLINDREE']; ?></span>

    </div>
    <div class="team-member-certification">

        <h5>Certifications</h5>
        <ul>

            <li>CF Gymnastics</li>
            <li>CF Movement & Mobility</li>

            <li><a href="./index.php?PAGE=MEMBRES&action=delete&id=<?php echo $donnees['IDADHERENT']; ?>"><i class="fa fa-remove"></i>SUPPRIMER</a></li>
        </ul>
        <div>
        </div>
        </div>
</div>
