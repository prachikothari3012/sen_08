<?php
include 'connect.php';
//echo "here is the activation code";
$passkey=$_GET['passkey'];
$query="SELECT * FROM user WHERE emailid='".$passkey."'";
$result   = mysql_query($query);
$count=mysql_num_rows($result);

if($count == 1){
	
	$rows=mysql_fetch_array($result);
	$status =$result['status'] ;
	
	if ( $status == 0 ){
		$status = 1;
		$sqlupdate = "UPDATE user SET password='".$status."' WHERE activation='".$passkey."'";; // update the status
		mysql_query($sqlupdate);
		echo "your account has been fully activated";
	}
	else{
		echo "your email is already verifired";
		
	}
	
	
	
}
else {
	echo "there is no activation code";
}



?>