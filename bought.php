<?php
session_start();
session_unset();
// Create connection
$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

mysql_select_db("property",$conn) or die("Couldn't connect to the database");
// echo "Successfully connected to the server and successfully connected to the database blog";
error_reporting(0);

		if($_GET["name"]){
	
	$property_name=$_GET["name"];
	$username=$_GET["username"];
	//echo $property_name;

//$dealer_idold=mysql_query("SELECT dealer_id FROM property_info WHERE name='$property_name'");
$dealer_id=mysql_fetch_array(mysql_query("SELECT dealer_id FROM dealer_info WHERE username='$username' "));
$dealer_idnew=$dealer_id['dealer_id'];


$sql=mysql_query("UPDATE property_info SET dealer_id='$dealer_idnew' WHERE name='$property_name'");
//echo $sql;


		}
echo"
 <body background='a.jpg'>
	<div style = 'width:90% ; background-color:grey ; border:2px solid black ; padding: 20px'>
	<h2 style = ''><a href='trial.php' style='text-decoration:none;color:black;font-size:25px'>Home</a></h2>
    </div>
	
	
	<h1>Congratulations...Your Transaction is successful</h1>
	";
?>	