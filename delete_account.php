<?php

session_start();
// Create connection
$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

mysql_select_db("property",$conn) or die("Couldn't connect to the database");
// echo "Successfully connected to the server and successfully connected to the database blog";

error_reporting(0);

$id=$_SESSION['dealer_id'];
$username = $_SESSION['username'];

mysql_query("DELETE FROM dealer_info WHERE username = '$username'");
mysql_query("DELETE FROM property_info WHERE dealer_id = '$id'");

	echo"
 <script type='text/javascript'>alert('Account deleted successfully'); window.location='trial.php';</script>";

?>