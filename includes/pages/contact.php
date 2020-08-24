
<?php
require_once './lib/MailEngine.php';
use Lib\MailEngine;

if($_SERVER["REQUEST_METHOD"] =="POST"){
    if (isset($_POST['action']) AND $_POST['action'] == 'sendmail'){
        $expediteur = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        try {
            \Lib\MailEngine::send($subject,$expediteur,$message);
            \Lib\MailEngine::sendConfirmation($subject,$expediteur);

        }
        catch(Exception $e){
            error_log($e ->getMessage());
        }
    }
}
include('./includes/tempt/hero-section.php');
include('./includes/tempt/contact-section.php');

include('./includes/tempt/carte.php');

?>




<!-- Hero Section Begin -->

<!-- Hero Section End -->
<!-- Contact Section Begin -->

<!-- Contact Section End -->

