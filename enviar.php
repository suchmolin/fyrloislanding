<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = htmlspecialchars($_POST['Origen']);
    $nombre = htmlspecialchars($_POST['Nombre']);
    $estado = htmlspecialchars($_POST['Estado']);
    $ciudad = htmlspecialchars($_POST['Ciudad']);
    

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'juanzuniga.ads@gmail.com';
    $mail->Password = 'tucontraseña';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Destinatarios
    $mail->setFrom('jczhotbull@gmail.com', 'Nombre');
    $mail->addAddress('jczhotbull@gmail.com', 'Nombre Destinatario');

    // Contenido
    $mail->isHTML(true);
    $mail->Subject = 'Asunto del correo';
    $mail->Body    = 'Este es el cuerpo del correo <b>en HTML!</b>';

    $mail->send();
    echo 'El mensaje ha sido enviado';
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
}



}
