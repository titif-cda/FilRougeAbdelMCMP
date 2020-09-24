<?php

//démarage des sessions
session_start();

//mon fichier config PDO, base de données
include('../config/config.php');

if($user_level == 2){

    if(!empty($_POST)) {

        if (isset($_POST['action']) && $_POST['action'] == "ADD_NEWS") {

            if(isset($_POST['data']) && !empty($_POST['data'])){
                $data = json_decode($_POST['data']);

                $query = 'INSERT INTO NOUVELLE(TITRE_NOUVELLE,DIFFUSION_LEVEL,INTRODUCTION,/*DPUBLICATION,*/DESCRIPTION) 
                    VALUES (:titre,:publicDiffusion,:intro, :description )';
                $queryExec = $bdd->prepare($query);
                $queryExec->execute(['titre' => $data->{"titre"},'publicDiffusion' => $data->{"status"},'intro' => $data->{"introduction"}, 'description' => $data->{"editordata"}]);

                //Récupère l'id crée automatiquement
                $newId =  $bdd->lastInsertId();
                $query = "SELECT IDNOUVELLE, TITRE_NOUVELLE, DESCRIPTION, DPUBLICATION from NOUVELLE WHERE IDNOUVELLE = $newId;";

                //Ajout d'une nouvelle.
                $result = $bdd->query($query);
                $newNews = $result->fetch();
                $newNews['DPUBLICATION'] = date("d-m-Y", strtotime($newNews['DPUBLICATION']));;

                $retour = array(
                    "error" => false,
                    "data" => array(
                        "modalMessage" => "Ajout d'une nouvelle.",
                        "news" => $newNews,
                    )
                );
                echo json_encode($retour);
            }
        }
        else  if (isset($_POST['action']) && $_POST['action'] == 'deleteMember'){

                    //lancement de la requete

                    $query = 'DELETE FROM ADHERENT WHERE IDADHERENT = ?';
                    $queryExec = $bdd->prepare($query);
                    try {
                        $result = $queryExec->execute([$_POST['idMembre']]);
                        if($result) {
                            $retour = array(
                                "error" => false,
                                "data" => array(
                                    "modalMessage" => 'Utilisateur '.$_POST['idMembre'].' supprimé.'
                                )
                            );
                        }
                        else {
                            $retour = array(
                                "error" => true,
                                "data" => array(
                                    "modalMessage" => 'Une erreur est survenue.'
                                )
                            );
                        }
                        echo json_encode($retour);
                    }
                    catch (Exception $e){
                        $retour = array(
                            "error" => true,
                            "data" => array(
                                "modalMessage" => 'Impossible de supprimé ce membre.'
                            )
                        );
                        echo json_encode($retour);
                    }

                }
        else  if (isset($_POST['action']) && $_POST['action'] == 'inscriptionAct-form'){

            //lancement de la requete
            $query = ('insert into INSCRIPTION ( IDADHERENT, IDACTIVITE, NBINVITES) 
                                    values (:idadherent ,:idactivite, :nbinvit )');

            $queryExec = $bdd->prepare($query);


            $queryExec->execute(
                array('IDADHERENT' => $_SESSION['IDADHERENT'],'IDACTIVITE' => $_POST['IDACTIVITE'],
                    'NBINVITES' => $_POST["nbpers"]));




        }


    }

}else{
$msg['modal'] = 'Vous n\'etes pas authorisé à appeller cette methode.';
    //echo 'Vous n\'etes pas authorisé à appeller cette methode.';

}