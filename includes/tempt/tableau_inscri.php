<section class="listInscription">

    <div class="container booking-form">
        <?php
        $query = $bdd->prepare('SELECT IDINSCRIPTION ,I.IDADHERENT,I.IDACTIVITE,DINSCRIPTION ,NBPARTICIPANTS ,A.NOM ,A.PRENOM ,AC.INTITULEACTIVITE ,AC.DDEBUT FROM INSCRIPTION I LEFT JOIN  ADHERENT A ON I.IDADHERENT = A.IDADHERENT 
 join ACTIVITE AC ON I.IDACTIVITE =AC.IDACTIVITE ORDER by DINSCRIPTION DESC LIMIT 15');
        $query->execute() ;?>

        <h2 class="text-center">Liste des 15 dernières inscriptions</h2>
        <table class="table table" >
            <thead>
            <tr class="text-center">
                <th>Identifiant</th>
                <th>Date</th>
                <th>ID adhérent</th>
                <th>Nom</th>
                <th>Prenom</th>

                <th>Identifiant activité</th>
                <th>NB inscrits</th>
                <th>Activité</th>
                <th>Date activité</th>

            </tr>
            </thead>



            <?php    while ($inscr = $query->fetch()) {?>
            <tbody>
            <tr>
                <td><?php echo $inscr['IDINSCRIPTION']?></td>
                <td><?php echo date("d-m-Y", strtotime($inscr['DINSCRIPTION']))?></td>
                <td><?php echo $inscr['IDADHERENT']?></td>
                <td><?php echo $inscr['NOM']?></td>
                <td><?php echo $inscr['PRENOM']?></td>
                <td><?php echo $inscr['IDACTIVITE']?></td>
                <td><?php echo $inscr['NBPARTICIPANTS']?></td>
                <td><?php echo $inscr['INTITULEACTIVITE']?></td>
                <td><?php echo date("d-m-Y", strtotime($inscr['DDEBUT']))?></td>


                <td><a href="page-inscription_activites-delete-<?php echo $inscr['IDINSCRIPTION']; ?>"
                       alt="Supprimer" title="Supprimer" class="primary-btn deleteInsc ">Supprimer</a>  <?php } ?>



                    <!-- <td><a href="javascript:void(0);"alt="Supprimer" data-id="<?php /*echo $inscr['IDINSCRIPTION']; */?>"
                   title="Supprimer"  class="btn btn_modif btn-primary deleteinscr ">Supprimer</a>      --><?php /*} */?>

            </tr>

            </tbody>
        </table>
    </div>
</section>