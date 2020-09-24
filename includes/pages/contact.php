<main>
    <div class="carte">
        <?php
        require_once './lib/MailEngine.php';
        use Lib\MailEngine;

        if($_SERVER["REQUEST_METHOD"] =="POST"){
            if (isset($_POST['action']) AND $_POST['action'] == 'sendmail'){
                $expediteur = $_POST['email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
                $emmeteur = 'cda3elji@gmail.com';
                try {
                    \Lib\MailEngine::send($subject,$expediteur,$emmeteur,$message);
                    \Lib\MailEngine::sendConfirmation($subject,$expediteur);

                }
                catch(Exception $e){
                    error_log($e ->getMessage());
                }
            }
        }
        include('./includes/tempt/entete.php');
        ?> <div class="classes-time-section spad set-bg" data-setbg="./img/viaduc3.jpg">  <?php
            include('./includes/tempt/contact-section.php');


            ?>

            <div id="openmap" class="map">

            </div>
        </div>
    </div>
</main>