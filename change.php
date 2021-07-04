<?php

session_start();
// Create connection
$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

mysql_select_db("property",$conn) or die("Couldn't connect to the database");
// echo "Successfully connected to the server and successfully connected to the database blog";

error_reporting(0);

$id = $_SESSION['dealer_id'];
$username = $_SESSION['username'];
$get = mysql_fetch_array(mysql_query("SELECT * FROM dealer_info WHERE username = '$username'"));
$old_password = $get['password'];

if($_POST['edit']){
	$password=mysql_real_escape_string($_POST['pswd1']);
	
	$new_passowrd = $_POST['pswd2'];
	if($password==$old_password&& strlen($new_passowrd)>=6)
	{
	mysql_query("UPDATE dealer_info SET password = '$new_passowrd' WHERE username = '$username'");
	echo"
 <script type='text/javascript'>alert('Password changed successfully'); window.location='dealer.php';</script>";
	}
	else
	{
		echo"
 <script type='text/javascript'>alert('Password does not match or new password is short'); window.location='change.php';</script>";

	}
	
}

echo "
	 
	<div style = 'width:90% ; background-color:grey ; border:2px solid black ; padding: 20px'>
	<h2 style = ''><a href='dealer.php' style='text-decoration:none;color:black;font-size:25px'>Home</a></h2>
	<form action='' method='post'>
	<h1 style = 'color:black ; font-size:20px'>Old Password:  
	<input type='password' name='pswd1' style='padding:3px'></h1>
	<h1 style = 'color:black ; font-size:20px'>New Password:  
	<input type='password' name='pswd2' style='padding:3px'></h1>
	<input type='submit' name='edit' value='Edit'>
	
	</div>
	
	";

?>