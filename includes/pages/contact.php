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
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 m-auto text-center">
                    <div class="section-title titreSection">
                        <h2>Contactez nous</h2>
                    </div>
                </div>
            </div>

        <div class="classes-time-section spad set-bg" data-setbg="./img/design/viaduc.jpg">  <?php
            include('./includes/tempt/contact-section.php');


            ?>
<div class="card  carte">
    <div class="row">
        <div class="col-8 text-center booking-form">
            <div id="openmap" class="map">

            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</main>