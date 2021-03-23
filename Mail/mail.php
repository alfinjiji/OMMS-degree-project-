<?php
require_once('E:\xampp\htdocs\OMMS\Mail\class.phpmailer.php');
include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
$body     = "Bro ithanu mail ayakanda place";  

                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "alfinjiji41@gmail.com";  // GMAIL username
$mail->Password   = "aj15aug1997";            // GMAIL password

$mail->SetFrom('noreply_aasrayacpza@gmail.com',"Team Aasraya");

$mail->AddReplyTo("noreply_aasrayacpza@gmail.com");

$mail->Subject    = "Register Successfull";

//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->MsgHTML($body);
$address = "alfinjiji41@gmail.com";
$mail->AddAddress($address,"Admin");
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} 
else{
	echo "Sent";
}
?>