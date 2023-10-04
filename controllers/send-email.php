<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

function Contact_mail($name,$email,$subject,$message)
{ 

    $mail = new PHPMailer(true);

if(!empty($name) && !empty($email) && !empty($subject) && !empty($message))
{

    $mail->SMTPDebug = 0 ;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'institutec16@gmail.com';                     
    $mail->Password   = 'addgfgthoywxcast';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

    
    $mail->setFrom('institutec16@gmail.com', 'Institutec');
    $mail->addAddress('institutec16@gmail.com');     

    $mail->isHTML(true);
    $mail->CharSet='UTF-8';                      
    $mail->Subject = $message;
    $mail->Body = 
    '<p>
    El usuario: '.$name.'
    <br>
    <br>
    Con el mail: '.$email.'
    <br>
    <br>'.$subject.'
    </p>';

    $mail->send();
    return true;
} 
}

if(Contact_mail($name,$email,$subject,$message)==true)
{
    header("Location: ../views/contact.php");
    exit;
}


?>