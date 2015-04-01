<?php
require_once 'connect.php';
require_once 'Send_mail.php';

//if(!empty($_SESSION['email'])){
//	header("Location:home_page.php");
//} 
if(isset($_POST['live'])){
$name=$_POST['name'];
$org_name=$_POST['org_name'];
$organization_name=$_POST['organization_name'];
$category=$_POST['category'];
$fromdate=$_POST['fromdate'];
$time=$_POST['starttime'];
$todate=$_POST['todate'];
$venue=$_POST['venue'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
$description=$_POST['description'];
//$logo=$_POST['logo'];
$vol_req=$_POST['vol_req'];
$suborg_req=$_POST['suborg_req'];

$query = "INSERT INTO `sen_08`.`contest` (`name`, `fromdate`, `todate`, `description`, `organizer_name`, `organization_name`, `time`,`logo`,`venue`,`city`,`state`,`pincode`,`vol_req`,`suborg_req`,`is_live`) VALUES ('".mysql_real_escape_string($name)."','".$fromdate."','".$todate."','".$description."','".$org_name."','".$organization_name."','".$time."','','".$venue."','".$city."','".$state."','".$pincode."','".$vol_req."','".$suborg_req."','1')";
$query_run = mysql_query($query) or die(mysql_error());
/*if($query_run = mysql_query($query)){
echo "success ";
}*/
if ($query_run){
	echo "query run";
	$query_user ="SELECT emailid FROM user " ;
	$query_result = mysql_query($query_user);
	$count = mysql_num_rows($query_result);
	echo "number of row is  ".$count."";	
	for ($i =0 ; $i<$count ;$i++  ){
		
		echo $query_result[i];
	}
}

else {
	echo "query not run";
	
}

}

else if(isset($_POST['saved'])){
$name=$_POST['name'];
$org_name=$_POST['org_name'];
$organization_name=$_POST['organization_name'];
$category=$_POST['category'];
$fromdate=$_POST['fromdate'];
$time=$_POST['starttime'];
$todate=$_POST['todate'];
$venue=$_POST['venue'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
$description=$_POST['description'];
//$logo=$_POST['logo'];
$vol_req=$_POST['vol_req'];
$suborg_req=$_POST['suborg_req'];

$query = "INSERT INTO `sen_08`.`contest` (`name`, `fromdate`, `todate`, `description`, `organizer_name`, `organization_name`, `time`,`logo`,`venue`,`city`,`state`,`pincode`,`vol_req`,`suborg_req`,`is_live`) VALUES ('".mysql_real_escape_string($name)."','".$fromdate."','".$todate."','".$description."','".$org_name."','".$organization_name."','".$time."','','".$venue."','".$city."','".$state."','".$pincode."','".$vol_req."','".$suborg_req."','0')";
$query_run = mysql_query($query) or die(mysql_error());
echo "saved";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Create a contest</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script src="js/jquery-1.6.js" ></script>
<script src="js/cufon-yui.js"></script>
<script src="js/cufon-replace.js"></script>
<script src="js/NewsGoth_BT_400.font.js"></script>
<script src="js/NewsGoth_BT_700.font.js"></script>
<script src="js/atooltip.jquery.js"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="all">
<![endif]-->
</head>
<body id="page6">
<div class="bg1">
  <div class="main">
    <!--header -->
    <header>
      <nav>
        <ul id="menu">
          <li><a href="index.html">Create contest</a></li>
          <li><a href="signup.html">Sign up</a></li>
          <li><a href="login.html">Log in</a></li>
               </ul>
      </nav>
      <h1><a href="index.html" id="logo"></a></h1>
    </header>
    <!--header end-->
    <div class="box">
      <!--content -->
      <article id="content">
        <div class="wrapper">
          <h2>Create a contest</h2>
          <form id="ContactForm" method="POST" action="create_contest.php">
            <div>
              <div class="wrapper"> <span>Contest Name:</span>
                <input type="text" class="input" name="name" required>
              </div>
              <div>
              <div class="wrapper"> <span>Organizer Name:</span>
                <input type="text" class="input" name="org_name" required>
              </div>
              <div>
              <div class="wrapper"> <span>Organization Name:</span>
                <input type="text" class="input" name="organization_name">
              </div>
              <div class="wrapper"> <span>Category:</span>
               <select name="category" required>
			<option value="<none>">none</option>
            <option value="Sports">Sports</option>
			<option value="Food n drinks">FoodnDrinks</option>
			<option value="Music">Music</option>
			<option value="Arts">Arts</option>
			<option value="Literary">Literary</option>
			<option value="Classes">Classes</option>
			<option value="Other">Other</option>		
		</select>
            </div>
              </div>
              
              <div class="wrapper"> <span>Starts at:</span>
                <input type="date" class="input" name="fromdate" required>
              </div>
               <div class="wrapper"> <span>Start Time:</span>
<input type="time" class="input" name="starttime">
              </div>
              <div class="wrapper"> <span>Ends at:</span>
                <input type="date" class="input" name="todate" required >
              </div>
      <div class="wrapper"> <span>End Time:</span>
<input type="time" class="input" >
              </div>       
             <div class="wrapper"> <span>Venue:</span>
                <input type="text" class="input" name="venue" required>
              </div>
                             <div class="wrapper"> <span>City:</span>
<input type="text" class="input" name="city" required >
              </div>
              <div class="wrapper"> <span>State:</span>
<input type="text" class="input" name="state" required>
              </div>
              <div class="wrapper"> <span>Pincode:</span>
<input type="number" class="input" name="pincode" required>
              </div>
              <div class="textarea_box"> <span>Event Description:</span>
                <textarea id="textarea" cols="30" rows="5" name="description" required></textarea>
              </div>
              <div class="wrapper"> <span>Logo:</span>
<input type="file" class="input" name="logo" >
              </div>
              
		<div class="wrapper"> <span>Req. Volunteer:</span>
<input type="text" class="input" name="vol_req" >
              </div>
              <div class="wrapper"> <span>Req. SubOrgnizer:</span>
<input type="text" class="input" name="suborg_req">
              </div>
        <br>
                  </div>
               <input type="submit" class="button" name="live" value="Make the contest live" vertical align="middle" >
        
        
        <input type="submit" class="button" value="Save the contest(make it live later)" vertical align="middle" name="saved">
        <br>
          </form>
  <br>
         
           
</div>
 
