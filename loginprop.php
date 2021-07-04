<?php

session_start();
session_unset();
// Create connection
$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

mysql_select_db("property",$conn) or die("Couldn't connect to the database");
// echo "Successfully connected to the server and successfully connected to the database blog";

error_reporting(0);

if($_POST['login']){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$check = mysql_fetch_array(mysql_query("SELECT * FROM dealer_info WHERE username = '$username'"));
	if($check == 0){
		die("NO SUCH ACCOUNT EXISTS. CLICK <a href='register.php'>Here</a> TO REGISTER NOW.");
	}
	
	if($check['password'] != $password){
		die("INCORRECT PASSWORD !!! LOGIN AGAIN <a href='login.html'>Here</a>.");
	}
	
	$_SESSION['username'] = $username;
	$_SESSION['dealer_id']=$check['dealer_id'];
    $_SESSION['password']=$password;
	
	if($username == 'admin'){
		header('location:admin.php');
	}
	else{
		header('location:dealer.php');
	}
}

?>