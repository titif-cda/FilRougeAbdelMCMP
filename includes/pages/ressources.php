<main>
    <?php include('./includes/tempt/entete.php');?>
    <section>
        <div class=" filesupload">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-12 text-center">
                        <h3>Les ressources disponibles</h3>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row " id="center_ressource">


                    <?php
                    /*       $reponse = $bdd->prepare('SELECT R.DATEAJOUT,R.NOMRESSOURCE,R.FICHIERRESSOURCE,R.IDADHERENT, A.IDADHERENT, A.NOM, A.PRENOM FROM RESSOURCES R JOIN ADHERENT A ON A.IDADHERENT = R.IDADHERENT LIMIT 10 WHERE A.IDADHERENT = :idadherent ');
                           $query->execute(array('idadherent' => $_GET['id']));
                           while ($donnees = $reponse-> fetch()) :*/

                    $reponse = $bdd->query('SELECT * FROM RESSOURCES R join ADHERENT A ON A.IDADHERENT = R.IDADHERENT LIMIT 10 ');

                    while ($donnees = $reponse->fetch()) : ?>
                        <div class="col-3 text-center onefile ">

                            <img  src="<?php echo $directory_ressources. '/pdf.jpg' ;?>" alt="Image placeholder" class="img-fluid text-center" width="50%" height="50%">
                            <h2> <?php echo ucfirst($donnees['NOMRESSOURCE']) ?></h2>
                            <p>Publié par <?php echo ucfirst($donnees['NOM']). ' '. ucfirst($donnees['PRENOM']).'</BR> le '. date("d-m-Y", strtotime($donnees['DATEAJOUT'])) ?></p>
                            <div class="row iconFiles justify-content-center">
                                <div class="col-6 openFiles">
                                    <a href="<?php echo $directory_ressources .$donnees['FICHIERRESSOURCE']  ?> "target="_blank">
                                        <img src="./img/upload/open.png" alt=""  ></a>
                                    <span>Ouvrir</span>
                                </div>
                                <div class="col-6 downloadFiles ">
                                    <a href="<?php echo $directory_ressources .$donnees['FICHIERRESSOURCE']  ?>" download="<?php $donnees['FICHIERRESSOURCE'] ?>" >
                                        <img src="./img/upload/download.png" alt=""  ></a>
                                    <span>Télécharger</span>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>
            </div>
        </div>
    </section>
</main>