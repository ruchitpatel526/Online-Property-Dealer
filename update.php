<?php

session_start();
	// Create connection
	$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

	mysql_select_db("blog1",$conn) or die("Couldn't connect to the database");
	// echo "Successfully connected to the server and successfully connected to the database blog";

	error_reporting(0);
	
	$blogger_id = $_SESSION['blogger_id'];
	
	if($_POST['update']){
		
		$id = $_POST['id'];
		$desc = $_POST['desc'];
		$check = mysql_fetch_array(mysql_query("SELECT * FROM blog_info WHERE blog_id = '$id'"));
		
		if($check == 0){
			die("NO SUCH BLOG EXISTS. ENTER A VALID ID. <a href='update.php'>Back</a>
			<br>CLICK <a href='blogger.php'>Here</a> TO VIEW YOUR WALL.");
		}
		if($check['blogger_id'] != $blogger_id){
			die("THAT BLOG DOESN'T BELONGS TO YOU. <a href='update.php'>Back</a>
			<br>CLICK <a href='blogger.php'>Here</a> TO VIEW YOUR WALL.");
		}
		mysql_query("UPDATE blog_info SET blog_desc = '$desc' WHERE blog_id = '$id'");
		
		header('location:blogger.php');
	}
	
	echo "
	 
	
	<div style = 'width:90% ; background-color:white ; border:2px solid black ; padding: 20px'>
	<h2 style = ''><a href='blogger.php' style='text-decoration:none;color:black;font-size:25px'>Home</a></h2>
	<form action='' method='post'>
	<table>
			<tr>
				<td>
					<b>Blog Id:</b>
				</td>
				<td>
					<input type='text' name='id' style='padding: 3px'>
				</td>
			</tr>
			
			<tr>
				<td>
					<b>Blog Description:</b>
				</td>
				<td>
					<textarea name='desc' cols='80' rows='4'></textarea>
				</td>
			</tr>
			
			<tr>
				<td>
					<input type='submit' name='update' value='Update'>
				</td>
			</tr>
			
		</table>
	
	</div>
	
	";

?>