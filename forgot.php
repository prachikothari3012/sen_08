<?php session_start();
include "connect.php"; //connects to the database
include 'Send_mail.php'; // send mail function

function generateRandomString($length = 5) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

if (isset($_POST['email'])) {
	$email = $_POST['email'];
		$query="SELECT * FROM user WHERE emailid='".$email."'";
		$result   = mysql_query($query);
		$count=mysql_num_rows($result);
	//echo "count".$count."";
	// If the count is equal to one, we will send message other wise display an error message.
	if($count==1)
	{
		$rows=mysql_fetch_array($result);
		
		$pass = generateRandomString(5);  // generate random number string of length 5
	//	echo "hash password is".$pass." " ;
		$pass_h = md5($pass);
		$activation =md5($rows['emailid'].time());
	//	echo "hash password is".$pass_h." " ;
		$sqlupdate = "UPDATE user SET password='".$pass_h."' WHERE emailid='".$email."'";; //update the pass word qury
		mysql_query($sqlupdate);
		
		//Details for sending E-mai
		$to = $rows['emailid'];   // recovery email
		$subject = "Password Recovery";  // subject
		
		$body='Hi, We are sending the password . Please change your password after login. 
			   email = '.$to.'
			   password ='.$pass.'		
				';
		
		Send_Mail($to, $subject, $body);
		send_confirnmation($to);
		
		//all the use email id
		if (1){
			echo "query of all user run";
			$query_user ="SELECT emailid FROM user " ;
			$query_result = mysql_query($query_user);
			$rows=mysql_fetch_array( $query_result );
			$count = mysql_num_rows($query_result);
			echo "number of row is  ".$count."";
			for ($i =0 ; $i<$count ;$i++  ){
				echo mssql_result($query_result, $i, $emailid);
				echo " email ".$query_result[$i]['emailid']."";
			}
		}
		
	
		} 
		else 
		{
		if ($_POST ['email'] != "") {
		echo " Not found your email in our database";
		}
		
		}
	//If the message is sent successfully, display sucess message otherwise display an error message.
	
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home: Webpage</title>
</head>
<body>
<form action="" method="post">
		<label> Enter your User ID : </label>
		<input id="email" type="text" name="email" />
		<input id="button" type="submit" name="button" value="Submit" />
	</form>
</body>
</html>