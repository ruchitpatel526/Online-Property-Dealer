<?php
	session_start();
/*	// Create connection
	$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

	mysql_select_db("blog1",$conn) or die("Couldn't connect to the database");
	// echo "Successfully connected to the server and successfully connected to the database blog";

	error_reporting(0);
   
	$username = $_SESSION['blogger_username'];
	$id = $_SESSION['blogger_id'];
	mysql_query("UPDATE blogger_info SET blogger_is_active = 'no' WHERE blogger_username = '$username'");
	mysql_query("UPDATE blog_info SET blog_is_active = 'no' WHERE blogger_id = '$id'");
	 */
    if(session_destroy())
	{
//session_unset($_SESSION['blogger_username']);
    	echo"
 <script type='text/javascript'>alert('Successfully logged out'); window.location='trial.php';</script>";
	}
?>