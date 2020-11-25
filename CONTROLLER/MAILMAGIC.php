<?php
$maili = new PRESH();

if(isset($_POST['sendmail'])){
	// user wish to send the mail, lets help him
extract($_POST);
///echo 'we are in';
/*
	   $target_dir = "uploads/";
       $target_file = $target_dir . $_FILES["fileToUpload"]["name"];
       move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)
       echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		$image =  mysql_real_escape_string(stripslashes($url.'sliders/'.basename( $_FILES["fileToUpload"]["name"])));
	*/
	

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in our php.ini, but this is how i do it incase I dont mind editing my php.ini
date_default_timezone_set('Etc/UTC');
require 'MAIL_TOOLS/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;

require_once('../config/smtp.php');
//	$message= "Hello, your password reset link is ready, click on reset my password to reset it<br>".'<a href="http://preshmail.com/password?u='.$u.'&p='.$p1.'&r='.$r.'&presh=178965533">RESET MY PASSWORD</a>';

// filter the data from the form to avoid hacking by injection
$to_email = stripslashes($to_email);
$cc_email = stripslashes($cc_email);
$subject = stripslashes($subject);
$message = stripslashes($message);

//Set who the message is to be sent from
$mail->setFrom(email_alias, firstname.' '.lastname);
//Set an alternative reply-to address
$mail->addReplyTo(email_alias, firstname.' '.lastname);
//Set who the message is to be sent to
$mail->addAddress($to_email, ' ');
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually

$mail->msgHTML($message);
$mail->AltBody = $message;

if(!empty($_FILES['fileToUpload']['name'])){
	// he is uploading a file, so we collect it and add it to folder
	$target_dir = "images/uploads/";
       $target_file = $target_dir . $_FILES["fileToUpload"]["name"];
	// upload the file
	$file_url = stripslashes($target_file.basename( $_FILES["fileToUpload"]["name"]));
	
	// move it to folder
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	
	//Attach a file to the mail
$mail->addAttachment($file_url);

}
//Attach a file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
	// smtp fail so we can still use php mail to try it here again
	$maili->Error(smtpfail);
   // echo ' '.$mail->ErrorInfo;
} else {
    $maili->Success(messageSent);
}

	
	
	/*
	creating mail account
	https://github.com/CpanelInc/xmlapi-php/tree/master/Examples
	
	
	
	*/
	
}
?>