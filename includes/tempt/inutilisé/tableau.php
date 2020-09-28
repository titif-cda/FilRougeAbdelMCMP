<div class="container">
    <?php
            $query = $bdd->prepare('SELECT IDINSCRIPTION ,I.IDADHERENT,I.IDACTIVITE,DINSCRIPTION ,NBPARTICIPANTS ,A.NOM ,A.PRENOM ,AC.INTITULEACTIVITE ,AC.DDEBUT FROM INSCRIPTION I LEFT JOIN  ADHERENT A ON I.IDADHERENT = A.IDADHERENT 
 join ACTIVITE AC ON I.IDACTIVITE =AC.IDACTIVITE ORDER by DINSCRIPTION DESC LIMIT 15');
            $query->execute() ;?>

    <h2>Liste des 15 dernières inscriptions</h2>
    <table class="table table" >
        <thead>
        <tr>
            <th>ID INSCRIPTION</th>
            <th>DINSCRIPTION</th>
            <th>IDADHERENT</th>
            <th>NOM</th>
            <th>PRENOM</th>

            <th>IDACTIVITE</th>
            <th>NBPARTICIPANTS</th>
            <th>INTITULEACTIVITE</th>
            <th>DDEBUT</th>

        </tr>
        </thead>


            //boucle les données récupérées
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
