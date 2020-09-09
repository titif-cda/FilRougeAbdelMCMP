<?php

function upload_img($directory, $property = "image", $methode = 'file'){

    $error = true;
    $photoName = '';
    $fileType = '';
    $binary = '';
    if(isset($_FILES[$property]) && !empty($_FILES[$property]) && !empty($_FILES[$property]["name"]) ) {

        //les différentes clef de $_FILES
        $fileName = $_FILES[$property]['name']; //01.02.JPG
        $fileType = $_FILES[$property]['type'];//type de fichier dans l'entete du fichier = manipulable
        $fileTmp = $_FILES[$property]['tmp_name'];//nom temporaire du fichier sur le serveur APACHE avant traitement
        $fileError = $_FILES[$property]['error'];
        $fileSize = $_FILES[$property]['size'];

        //mes variable de config
        $limitSize = 2097152;//votre limitte d'acception de la taille du fichier

        $validExtention = array('png', 'jpeg', 'jpg', 'gif');

        //Trouver l'extention du fichier
        $nameArray = explode(".", $fileName); //array("01","JGP") -> 2 élements
        $lastIndex = count($nameArray) - 1;//total des éléments (2) mais je veux trouver le dernier index
        //array[0] = "01"
        //array[1] = "JPG"
        $extention = strtolower($nameArray[$lastIndex]);//deux elements dans le tb, mais -1 pour l'index du dernier element car index commence a zero

        //est-ce que l'extention est dans le tableau de mes extentions
        if (in_array($extention, $validExtention)) {

            //nom de mon fichier
            $photoName = time() . "." . $extention;

            //la limite est elle valide ?
            if ($limitSize > $fileSize && $fileError != 1) {

                if($methode == 'blob'){

                    $binary = file_get_contents($fileTmp);
                    // et $fileType

                }else{
                    //fonction d'upload sur le serveur
                    move_uploaded_file($fileTmp, $directory . $photoName);

                }

            } else {
                throw new Exception("Fichier trop gros (" . ($limitSize / 1000000) . " Mo max)");
            }


        } else {
            throw new Exception("extention non valide");
        }

    }else{
        throw new Exception("Pas de fichier Upload");

    }

    return array($photoName, $binary, $fileType);

}


function My_crypt($password){
    return hash( 'sha256',$password);
}


function debug($variable){
    echo '<pre>' . print_r($variable,true) . '</pre>';
}

function validationKey($length){
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet,$length)),0,$length);
   // substr recupere juste la taille "lenght qui correspond à 60
    //str_shuffle  : melange la repetition
   // str_repeat : retpete 60 fois $alphabet
}