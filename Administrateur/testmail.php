<?php
require '../phpmailer5.2.27-master/vendor/phpmailer/phpmailer/class.phpmailer.php';
require '../phpmailer5.2.27-master/vendor/phpmailer/phpmailer/class.smtp.php';
require '../phpmailer5.2.27-master/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
$sendmailPath = '../sendmail';
// Créer une nouvelle instance de PHPMailer
$mail = new PHPMailer();

$mail->isSendmail();
$mail->Sendmail = $sendmailPath;

    // Destinataire
    $mail->SetFrom('ahmed.zoghlami@benetton.com', 'Zoghlami Ahmed');
    $mail->AddAddress('zoghlami.ahmedseddik@gmail.com', 'Seddik');

    // Contenu du message
    $mail->IsHTML(true);
    $mail->Subject = 'Test PHPMailer 5.2.27';
    $mail->Body = 'Ceci est un test de PHPMailer v5.2.27';


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

?>
