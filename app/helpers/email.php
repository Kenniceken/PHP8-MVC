<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendCode($vKey, $email)
{
    // load composer's autoload
    require dirname(ROOT).'/vendor/autoload.php';
    $mail = new PHPMailer(true);
    try {
        // Server Settings
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host;
        $mail->SMTPAuth = true;
        $mail->Username = 'aspnetidentitykk@gmail.com';
        $mail->Password = 'amaozalla123';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('aspnetidentitykk@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Confirmation Email';
        $mail->Body = 'Please Confirm Your Email :' . $vKey . ' ' . 'Here <a href="http://clipclassic.io/confirm/'.$vkey.'"></a>';
        $mail->AltBody = 'Thank You';

        $mail->send();
        $_SESSION['msg'] = 'Confirmation Email has been sent to your email';
        $_SESSION['email'] = $email;
        header('location:confirm.php');
    }
    catch (Exception $e)
    {
        echo 'Message could not be sent. Something went wrong: ', $mail->ErrorInfo;
    }
}