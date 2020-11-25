<?php

//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//$mail->Debugoutput = 'text';
//Set the hostname of the mail server
$mail->Host = "mail.ekumahost.net";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "domains@ekumahost.net";
//Password to use for SMTP authentication
$mail->Password = 'FHsg@#$gddesfd';


// mail sending details
// from email
define('smtp_email_alias','domains@ekumahost.net');
define('smtp_fname','Nigerian C');
define('smtp_lname','Service');
