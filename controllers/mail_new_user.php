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
    $mail->addAddress($_POST["mail"], 'usuario');
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = '¡Tu cuenta de usuario ha sido activada!';
    $mail->Body = '
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f5f5f5;
                color: #333;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 5px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }
            h1 {
                background-color: #0078d4; /* Fondo azul */
                color: #fff; /* Letras blancas */
                font-size: 24px;
                padding: 10px; /* Espaciado alrededor del texto */
            }
            ul {
                list-style: none;
                padding: 0;
            }
            li {
                margin: 10px 0;
            }
            li strong {
                font-weight: bold;
            }
            p {
                margin: 10px 0;
                font-size: 16px;
                color: #000; /* Letras negras */
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>¡Bienvenido a tu cuenta activada!</h1>
            <p>A continuación, encontrarás los detalles de tu cuenta:</p>
            <ul>
                <li><strong>Usuario (DNI):</strong> ' . $_POST['dni'] . '</li>
                <li><strong>Contraseña:</strong> ' . $generatedPassword . '</li>
            </ul>
            <p>Recuerda no compartir este mensaje con nadie y ten en cuenta que cuando ingreses por primera vez, se te pedirá que cambies tu contraseña.</p>
        </div>
    </body>
    </html>
';

    
    
        
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
