<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$arg = $_GET;
// $arg = array('to' => 'daniel.sportes@free.fr', 'sub' => 'sujet 1', 'txt' => 'texte 1' );

try {
    date_default_timezone_set('Europe/Paris');
    $date = date('Y-m-d H:i:s', time());

    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;            //Enable verbose debug output
    $mail->isSMTP();                                     //Send using SMTP
    $mail->Host       = 'smtp.laposte.net';              //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                            //Enable SMTP authentication
    $mail->Username   = 'daniel.sportes';                //SMTP username
    $mail->Password   = 'mon mot de passe';              //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;     //Enable implicit TLS encryption
    $mail->Port       = 465;                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('daniel.sportes@laposte.net');
    $mail->addAddress($arg['to']); 

    //Content
    $mail->isHTML(false);                                  //Set email format to HTML
    $mail->Subject = $arg['sub'];
    $mail->Body    = $arg['txt'];

    if(!$mail->send()) {
      $err = "KO: ".$mail->ErrorInfo;
    } else
      $err = "OK: ".$date;
    echo $err;
} catch (Exception $e) {
    echo "KO: ",  $e->getMessage();
}

?>