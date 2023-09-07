<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

try {
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'institutec16@gmail.com';
    $mail->Password   = 'addgfgthoywxcast';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('institutec16@gmail.com', 'institutec');
    $mail->addAddress($_POST["email"], 'usuario');
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = '"¡Preinscripción Exitosa! ¡Bienvenido a institutec!"';
    $mail->Body = '<p>¡Nos complace informarte que tu preinscripción en institutec ha sido exitosa!</p>' .
        '<p>Te damos la más cordial bienvenida a nuestra institución educativa.</p>' .
        '<p>Esperamos que esta sea una experiencia enriquecedora y que te sientas parte de nuestra comunidad</p>' .
        '<p>desde el primer día. Para completar tu proceso de inscripción, te invitamos a acercarte a</p>' .
        '<p>la escuela lo antes posible para finalizar los detalles administrativos.</p>' .
        '<p>Nuestro equipo estará encantado de ayudarte en cualquier consulta que tengas y</p>' .
        '<p>de brindarte toda la información necesaria para tu inicio exitoso en institutec.</p>' .
        '<p>No dudes en ponerte en contacto con nosotros si tienes alguna pregunta o necesitas</p>' .
        '<p>asistencia adicional. Estamos aquí para ayudarte en cada paso del camino.</p>' .
        '<p>1. Fotocopia del DNI (Documento Nacional de Identidad).</p>' .
        '<p>2. Partida de nacimiento.</p>' .
        '<p>3. Analítico de la escuela primaria.</p>' .
        '<p>4. Analítico de la escuela secundaria.</p>' .
        '<p>5. Libreta sanitaria actualizada.</p>' .
        '<p>¡Esperamos verte pronto en nuestra escuela!</p>' .
        '<p>Atentamente, institutec</p>';

    if (!$mail->send()) {
        echo 'Error al enviar el mensaje: ' . $mail->ErrorInfo;
    } else {
        echo 'Revise la casilla de correo';
    }
} catch (Exception $e) {
    echo 'Error inesperado al enviar el mensaje: ' . $e->getMessage();
}
?>
