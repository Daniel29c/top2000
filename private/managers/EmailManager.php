<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require '../static/PHPMailer/Exception.php';
//require 'PHPMailer/Exception.php';
require '../static/PHPMailer/PHPMailer.php';
require '../static/PHPMailer/SMTP.php';
//include '../static/config.php';
//require '../autoloader.php';



class EmailManager {
    public static function sendEmail($id ,$HTML){
        $ticket = CafeManager::c
        $customer = CustomerManager::getCustomerById($id);
        //var_dump($id);
        $config = config::settings();
        $mail = new PHPMailer(true);
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $config["Host"];                    //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $config["Username"];                    //SMTP username
            $mail->Password   = $config["Password"];                              //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('student@ictcampus.nl', 'Mailer');
            $mail->addAddress($customer->email);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Jouw games";
            $mail->Body    = $HTML;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
        }

    }

?>