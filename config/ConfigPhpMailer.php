<?php
namespace Config;
require_once "./Vendor/PHPMailer-master/src/PHPMailer.php";
require_once "./Vendor/PHPMailer-master/src/SMTP.php";
require_once "./Vendor/PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Configuration{

    const smtpConfig = array(
        'SMTPDebug' => SMTP::DEBUG_SERVER,
    //'SMTPDebug' => SMTP::DEBUG_OFF,
        'isSMTP' => true,
        'Host' => 'smtp.gmail.com.',
        // 'Host' => 'smtp-relay.sendinblue.com',
        'SMTPAuth' => true,
        'Username' => 'eljid.a@gmail.com',
        'Password' => 'gouzouino',
        // 'Username' => 'davy.blavette@2isa.com',
        // 'Password' => 'kn2WvLmM7bNU0BE6',
        'SMTPSecure' => PHPMailer::ENCRYPTION_SMTPS,
        'Port' => 465,
        'From' => array('Address' => 'no-reply@mon-site.fr', 'Name' => 'Test PHPMailer'),
        'Administrator' => array('Address' => 'eljid.a@gmail.com', 'Name' => 'Abdellatif EL JID'),
    );
}
