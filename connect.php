<?php
@session_start();
//echo "hello from connect";
$connection = mysql_connect('localhost','root','');
if(!$connection) {
	die("Database connected to failed".mysql_error());
}
$select_db = mysql_select_db('sen_08');
if(!$select_db ){
	die("Databse selection failed".mysql_error());
}

?>