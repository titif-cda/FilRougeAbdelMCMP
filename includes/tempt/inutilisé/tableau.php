<div class="container">
    <h2>Liste des inscriptions</h2>
    <table class="table table-dark">
        <thead>
        <tr>
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
//SOUCIS AVEC REQUETE
            <?php
            $query = $bdd->prepare('SELECT I.IDADHERENT,I.IDACTIVITE,I.DINSCRIPTION ,I.NBPARTICIPANTS ,A.NOM ,A.PRENOM , AC.INTITULEACTIVITE, AC.DDEBUT FROM INSCRIPTION I JOIN ADHERENT A ON I.IDADHERENT = A.IDADHERENT JOIN ACTIVITE AC ON A.IDADHERENT = AC.IDADHERENT GROUP BY I.IDACTIVITE');
            $query->execute() ;
            //boucle les données récupérées
            while ($inscr = $query->fetch()) {?>
        <tbody>
        <tr>
            <td><?php echo date("d-m-Y", strtotime($inscr['DINSCRIPTION']))?></td>
            <td><?php echo $inscr['IDADHERENT']?></td>
            <td><?php echo $inscr['NOM']?></td>
            <td><?php echo $inscr['PRENOM']?></td>
            <td><?php echo $inscr['IDACTIVITE']?></td>
            <td><?php echo $inscr['NBPARTICIPANTS']?></td>
            <td><?php echo $inscr['INTITULEACTIVITE']?></td>
            <td><?php echo date("d-m-Y", strtotime($inscr['DDEBUT']))?></td>
            <td><button type="button" class="btn btn-warning">Supprimer</button></td>
            <?php }?>
        </tr>

        </tbody>
    </table>
</div>
