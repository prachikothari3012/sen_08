<?php
include 'Mail.php';
include 'connect.php';
//echo "hello from send_mail";

function Send_Mail($to,$subject,$body)
{	
	$from ="starcontest";
	
	$headers = array(
			'From' => $from,
			'To' => $to,
			'Subject' => $subject
	);
	
	$smtp = Mail::factory('smtp', array(
			'host' => 'ssl://smtp.gmail.com',
			'port' => '465',
			'auth' => true,
			'username' => 'starcontests8@gmail.com',
			'password' => 'senteam8'
	));
	
	$mail = $smtp->send($to, $headers, $body);
	
	if (PEAR::isError($mail)) {
		echo('<p>' . $mail->getMessage() . '</p>');
	} else {
		echo('<p>Message successfully sent!</p>');
	}		
}

function send_confirnmation($to ){
	$base_url='http://localhost/sen8/activation.php?passkey=';
	$activation =md5($to.time());
	$subject ="Email Verification" ;
	$body ='Hi,  We need to make sure your Email is valid. Please verify your email and get started using your Website account.
			'.$base_url.$activation.'">';

	Send_Mail($to, $subject, $body);
	echo "hello form the confirmation";
}

function send_notification(){
	
	
	
}


?>