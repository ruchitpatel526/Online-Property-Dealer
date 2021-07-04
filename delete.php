<?php

	session_start();
	// Create connection
	$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

	mysql_select_db("blog1",$conn) or die("Couldn't connect to the database");
	// echo "Successfully connected to the server and successfully connected to the database blog";

	error_reporting(0);
	
	$blogger_id = $_SESSION['blogger_id'];
	
	if($_POST['delete']){
		
		$id = $_POST['id'];
		$check = mysql_fetch_array(mysql_query("SELECT * FROM blog_master WHERE blog_id = '$id'"));
		$get = mysql_fetch_array(mysql_query("SELECT * FROM blogger_info WHERE blogger_id = '$blogger_id'"));
		
		if($check == 0){
			die("NO BLOG EXISTS WITH SUCH ID. ENTER A VALID ID. <a href='delete.php'>Back</a>
			<br>CLICK <a href='blogger.php'>Here</a> TO VIEEW YOUR WALL.");
		}
		
		if($get['blogger_username'] != 'admin'){
			
			if($check['blogger_id'] != $blogger_id){
				die("THAT BLOG DOESN'T BELONGS TO YOU. <a href='delete.php'>Back</a>.
				<br>CLICK <a href='blogger.php'>Here</a> TO VIEW YOUR WALL.");
			}
			mysql_query("DELETE FROM blog_master WHERE blog_id = '$id'");
		
			header('location:blogger.php');
		}
		else if($get['blogger_username'] == 'admin'){
			
			mysql_query("DELETE FROM blog_master WHERE blog_id = '$id'");
		
			header('location:admin.php');
		}
		
	}
	
	echo "
	 
	
	<div style = 'width:90% ; background-color:grey ; border:2px solid black ; padding: 20px'>
	<h2 style = ''><a href='blogger.php' style='text-decoration:none;color:black;font-size:25px'>Home</a></h2>
	<form action='' method='post'>
	<h1 style = 'color:black ; font-size:20px'>BLOG ID:  
	<input type='text' name='id' style='padding:3px'></h1>
	<input type='submit' name='delete' value='Delete'>
	
	</div>
	
	";

?>