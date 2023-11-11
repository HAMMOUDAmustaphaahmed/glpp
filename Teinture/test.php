<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Assurez-vous d'inclure le chemin correct vers le fichier autoload.php de PHPMailer

$mail = new PHPMailer(true);

try {
    // Paramètres SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'cqmpbenetton@gmail.com';
    $mail->Password = 'cqmp123456';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Destinataire
    $mail->setFrom('cqmpbenetton@gmail.com', 'Expéditeur');
    $mail->addAddress('zoghlami.ahmedseddik@gmail.com');

    // Sujet et contenu
    $mail->Subject = 'Sujet de l\'e-mail';
    $mail->Body = 'Contenu de l\'e-mail.';

    // Envoi de l'e-mail
    $mail->send();
    echo 'E-mail envoyé avec succès.';
} catch (Exception $e) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ', $mail->ErrorInfo;
}
?>