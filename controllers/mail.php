<?php
require_once '../model/query.php';
$database = new model_Sql();
$credential=$database->getFirstValidCredential(); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

try {
    $mail = new PHPMailer;
    $mail->isSMTP();//base de dato
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $credential['email'];
    $mail->Password   = $credential['token'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom($credential['email'], 'institutec');
    $mail->addAddress($_POST["email"], 'usuario');
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = '"¡Bienvenido a INSTITUTEC!"';
    $mail->Body = '<p>¡Nos complace informarte que tu preinscripción en INSTITUTEC ha sido exitosa!</p>' .
         '<p>Para que tu inscripcion sea completada deberas acercarte a la institucion y presentar los siguientes documentos:   </p>' .
        
        '<p>Original y copia:</p>'.
        '<p>1. Fotocopia del DNI (Documento Nacional de Identidad)</p>' .
        '<p>2. Partida de nacimiento.</p>'. 
        '<p>3. Analítico de la escuela secundaria. </p>' .

        '<p>Original solo:</p>'.
        '<p>4. Libreta sanitaria actualizada. La cual podrás pedirla llevando tu libreta de vacunas a alguna salita médica</p>' .
        
        '<p>¡Esperamos verte pronto en nuestra escuela!</p>' .
        '<p>No dudes en ponerte en contacto con nosotros si tienes alguna pregunta o necesitas ayuda.</p>' .
        '<p>Atentamente, INSTITUTEC!</p>';
    if (!$mail->send()) {
        echo 'Error al enviar el mensaje: ' . $mail->ErrorInfo;
    } else {
        /*echo 'Los datos se registraron Correctamente revise la casilla de correo porfavor!';*/
        header("Location: ../views/pre_register.php?mail_correcto=correcto");
    }
} catch (Exception $e) {
    echo 'Error inesperado al enviar el mensaje: ' . $e->getMessage();
}

?>
