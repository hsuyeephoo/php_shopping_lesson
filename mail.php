<?php

include "phpmailer/PHPMailerAutoload.php";
$rMail=$_POST['email'];
$subj=$_POST['subject'];

$mail = new PHPMailer;

//Enable SMTP debugging.
$mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "newtechmawlamyine@gmail.com";
$mail->Password = "tpxbtfopwssjlczw";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 587;

$mail->From = "newtechmawlamyine@gmail.com";
$mail->FromName = "NewTech Co.ltd..";

$mail->addAddress("$rMail", "$rMail");

$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>.$subj.</i>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    echo "Message has been sent successfully";
}