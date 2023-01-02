<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$nome = $_POST['nameInput'];
$email = $_POST['emailInput'];
$telefone = $_POST['numberInput'];
$texto = $_POST['floatingTextarea'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'email-ssl.com.br';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contato@emporionacional.org';                     //SMTP username
    $mail->Password   = 'Mailtewlw10@';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->CharSet = 'UTF-8';
    //Recipients
    $mail->setFrom('contato@emporionacional.org', 'Empório Nacional');
    $mail->addAddress('contato@emporionacional.org');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contato do site';

    $Body = "<!doctype html>
                <html>
                    <body>
                        <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
                            <tr>
                                <td>
                                <tr>
                                    <td width='500'>Nome:$nome</td>
                                </tr>
                                <tr>
                                    <td width='320'>E-mail:<b>$email</b></td>
                                </tr>
                                <tr>
                                    <td width='320'>Telefone:<b>$telefone</b></td>
                                </tr>
                                <tr>
                                    <td width='320'>Telefone:<b>$texto</b></td>
                                </tr>
                                </td>
                            </tr>
                            <tr>
                                <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
                            </tr>
                        </table>
                    </body>
                </html>";
 
    $mail->Body   = $Body;
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        header('Location: https://emporionacional.org');
     } 