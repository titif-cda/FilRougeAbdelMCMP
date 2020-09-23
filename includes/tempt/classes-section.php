
<div class="classes-section spad">
    <h3 class="text-center ">Membres en attente de validation de compte</h3>
    <div class="container">
        <div class="row">
            <?php
            //la requete
            $query = 'SELECT * FROM ADHERENT where CONFIRMATION = :confirm;';
            $reponse = $bdd->prepare($query);

            $reponse->execute(
                array('confirm' => 0));


            //boucle les donneees recuperees
            while($donnees = $reponse -> fetch()){
            ?>
            <div class="col-2">
                <a href="page-profil_adherent-<?php echo  $donnees["IDADHERENT"] ?> "   >
                <div class="single-classes-item">
                    <h4><?php echo $donnees["NOM"]. ' ' .$donnees["PRENOM"] ?></h4>
                        <p><?php echo $donnees["EMAIL"] ?></p>
                </div></a>
            </div>
 <?php
                    }?>
        </div>
    </div>
</div>
