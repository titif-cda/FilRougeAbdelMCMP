<?php

//démarage des sessions
session_start();

//mon fichier config PDO, base de données
include('../config/config.php');
include ('../lib/function.php');
if($user_level == 2){

    if(!empty($_POST)) {


        if (isset($_POST['action']) && $_POST['action'] == "ADD_NEWS") {
                if (isset($_FILES['NOMFICHIER']) && !empty($_FILES['NOMFICHIER'])) {
                    $data = $_POST;
                    list($photoName) = upload_img($directory_image_news, "NOMFICHIER");
                    $query = 'INSERT INTO NOUVELLE(TITRE_NOUVELLE,DIFFUSION_LEVEL,INTRODUCTION,/*DPUBLICATION,*/DESCRIPTION, IMAGE) 
                    VALUES (:titre,:publicDiffusion,:intro, :description, :img )';
                    $queryExec = $bdd->prepare($query);
                    $queryExec->execute(['titre' => $data["titre"], 'publicDiffusion' => $data["status"], 'intro' => $data["introduction"],
                        'description' => $data["editordata"], 'img' => $photoName]);
                    //Récupère l'id crée automatiquement
                    $newId = $bdd->lastInsertId();
                    $query = "SELECT IDNOUVELLE, TITRE_NOUVELLE, DESCRIPTION, DPUBLICATION, IMAGE from NOUVELLE WHERE IDNOUVELLE = $newId;";
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
        else  if (isset($_POST['action']) && $_POST['action'] == 'deleteNews'){

            //lancement de la requete

            $query = 'DELETE FROM NOUVELLE WHERE IDNOUVELLE = ?';
            $queryExec = $bdd->prepare($query);
            try {
                $result = $queryExec->execute([$_POST['idNews']]);
                if($result) {
                    $retour = array(
                        "error" => false,
                        "data" => array(
                            "modalMessage" => 'La nouvelle '.$_POST['idNews'].' a été supprimée.'
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
                        "modalMessage" => 'Impossible de supprimé cette nouvelle.'
                    )
                );
                echo json_encode($retour);
            }

        }
        else  if (isset($_POST['action']) && $_POST['action'] == 'deleteInscription'){

            //lancement de la requete

            $query = 'DELETE FROM INSCRIPTION WHERE IDINSCRIPTION = ?';
            $queryExec = $bdd->prepare($query);
            try {
                $result = $queryExec->execute([$_POST['idInscription']]);
                if($result) {
                    $retour = array(
                        "error" => false,
                        "data" => array(
                            "modalMessage" => 'Inscription est '.$_POST['idInscription'].' supprimée.'
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
                        "modalMessage" => 'Impossible de supprimé cette inscription.'
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