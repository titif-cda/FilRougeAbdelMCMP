<?php
/**
 *
 * @param $file Fichier à sauvegarder
 * @param $directory Emplacement de destination
 * @return string Retourne le nom du fichier final
 * @throws Exception
 */
function saveFile($file, $directory){
    //Code pour upload fichier

    //les différentes clef de $_FILES
    $fileName = $file['name']; //01.02.JPG
    if(empty($fileName)){
        throw new Exception("Aucune source d'image envoyée");
    }
    $fileType = $file['type'];//type de fichier dans l'entete du fichier = manipulable
    $fileTmp = $file['tmp_name'];//nom temporaire du fichier sur le serveur APACHE avant traitement
    $fileError = $file['error'];
    $fileSize = $file['size'];

    //mes variable de config
    $limitSize = 2097152;//votre limitte d'acception de la taille du fichier
    //$directory = "./img/upload/news/";
    $validExtention = array('png', 'jpeg', 'jpg', 'gif');

    //Trouver l'extention du fichier
    $nameArray = explode(".", $fileName); //array("01","JGP") -> 2 élements
    $lastIndex = count($nameArray) - 1;//total des éléments (2) mais je veux trouver le dernier index
    //array[0] = "01"
    //array[1] = "JPG"
    $extention = strtolower($nameArray[$lastIndex]);//deux elements dans le tb, mais -1 pour l'index du dernier element car index commence a zero

     if (!in_array($extention, $validExtention)) {
         throw new Exception("Extension non valide ('png', 'jpeg', 'jpg', 'gif')");
     }

     //nom de mon fichier

     $fileNameFinal = time() . "." . $extention;

     //la limite est elle valide ?
     if ($limitSize <= $fileSize) {
         throw  new Exception("Le fichier envoyé est trop volumineu limite de ". ($limitSize / 1000000) ."Mo");
     }

    //fonction d'upload sur le serveur
    $result  = move_uploaded_file($fileTmp, $directory . $fileNameFinal);
    if(!$result) {
        throw new Exception("Une erreur de déplacement du fichier est survenue");
    }
    else {
        return $fileNameFinal;
    }
}

function removeFile($path){
    //Code pour upload fichier

    //1) Bon
}

?>