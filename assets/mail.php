<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/PHPMailer.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if(isset($_POST["nosutit"])){

try {
    //Server settings
    $mail->CharSet = "UTF-8";
    $mail->SMTPDebug = 0;                    // 1 - lai redzētu errorus, 0 - lai tos paslēptu
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tehnar200@gmail.com';                     //SMTP username
    $mail->Password   = 'vjsy bzev sfij xwjn';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('tehnar200@gmail.com', 'Apskati Latviju');
    $mail->addAddress('tehnar200@gmail.com', 'Apskati Latviju');     //Add a recipient

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Tamila - Zina Apskati Latviju';
    $mail->Body    = 'Ziņas sūtītāja vards, uzvārds: <b>'.$_POST['vards'].'</b> <br>
    Ziņas sūtītāja e-pasts: <b>'.$_POST['epasts'].'</b> <br>
    Ziņas sūtītāja tālrunis: <b>'.$_POST['talrunis'].'</b> <br>
    Ziņojums: <b>'.$_POST['zinojums'].'</b>';

    $mail->send();
    echo "<div id='pazinojums'>
    <p>Ziņa nosūtīta! Sazināsimies ar Jums vēlāk!
    </p>
    </div>";
    header("Refresh: 3; url=./kontakti.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>