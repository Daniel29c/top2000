<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../static/settings.php";
//Load Composer's autoloader
//require '../../static/vendor/autoload.php';
require "../vendor/autoload.php";

class EmailManager
{
    public static function send($id, $html)
    {
        //$customer = UserManager::getUserById($id);
        $tickets = ticketManager::getTicketById(htmlspecialchars($id));
        $settings = config::settings();
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $settings['Host'];                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $settings['Username'];                   //SMTP username
            $mail->Password   = $settings['Password'];                            //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = $settings['Port'];                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('student@ictcampus.nl', 'Top2000');
            $mail->addAddress($tickets->email);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Je kaartje voor het Top2000 cafe';
            $mail->Body    = $html;
            $mail->AltBody = 'Kan geen mail sturen';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
