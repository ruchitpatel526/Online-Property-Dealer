<?php

session_start();
// Create connection
$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

mysql_select_db("blog1",$conn) or die("Couldn't connect to the database");
// echo "Successfully connected to the server and successfully connected to the database blog";

error_reporting(0);

$id = $_SESSION['blogger_id'];
$username = $_SESSION['blogger_username'];

echo "
 

<div style = 'padding-left:30px'>
<div style = 'background-color:black ; width:100% ; height:2%'>
	<table>
		<<tr>
			<td style = 'font-size:25px ; color:white ; text-align:left ; padding-top:7px ; padding-left:1000px'>Logged in as 
			<a href='admin.php' style='text-decoration:none ; color:white ; font-size:25px'>ADMIN</a>. </td>
		</tr>
	</table>
</div>

<div style = 'background-color:grey ; width:100% ; height:8%'>
	<table style='padding-left:35px; padding-right:35px; padding-top:15px; padding-bottom:10px'>
		<tr>
			<td style='text-align:left ; width:170px'>
				<a href='admin_delete.php' style='text-decoration:none ; color:white ; font-size:20px'>Delete Blog</a>
			</td>
			<td style='text-align:left ; width:220px'>
				<a href='permission.php' style='text-decoration:none ; color:white ; font-size:20px'>Edit Permissions</a>
			</td>
			<td style='text-align:left ; width:150px'>
				<a href='logout.php' style='text-decoration:none ; color:white ; font-size:20px'>Logout</a>
			</td>
			
		</tr>
	</table>
</div>
</div>

";

$sql = "SELECT * FROM blogger_info WHERE blogger_id <> '$id'";

$records = mysql_query($sql);

$a = 1;

while($row = mysql_fetch_assoc($records)){

	$a++;
	if($a == '2'){
		echo"
		<div style='padding-top:10px ; padding-left:30px'>
		<div style='background-color:grey ; height:8% ; width:200px'>
			<h3 style='color:white ; text-align:center ; padding-top:10px'>BLOGGERS</h3>
		</div>
		</div>

		";
	}
	
	echo "
	<div style='padding-top:10px ; padding-left:30px'>
	<div style = 'width:30% ; background-color:white ; border:1px solid black ; padding-left: 20px'>
		
		<table style='padding-top:15px; padding-bottom:10px'>
		<tr>
			<td style='text-align:right ; width:150px'>
				<h1 style = 'color:black ; font-size:20px'>ID:</h1>
			</td>
			<td style='text-align:left ; width:150px ; padding-left:10px'>
				<h1 style = 'color:black ; font-size:20px'>".$row['blogger_id']."</h1>
			</td>
		</tr>
		<tr>
			<td style='text-align:right ; width:150px'>
				<h1 style = 'color:black ; font-size:20px'>USERNAME:</h1>
			</td>
			<td style='text-align:left ; width:150px ; padding-left:10px'>
				<h1 style = 'color:black ; font-size:20px'>".$row['blogger_username']."</h1>
			</td>
		</tr>
		<tr>
			<td style='text-align:right ; width:150px'>
				<h1 style = 'color:black ; font-size:20px'>PERMISSION:</h1>
			</td>
			<td style='text-align:left ; width:150px ; padding-left:10px'>
				<h1 style = 'color:black ; font-size:20px'>".$row['blogger_permission']."</h1>
			</td>
		</tr>
	</table>
		
	</div>
	</div>
	
	";

	
}

if($a == '1'){

	echo "
		<div style = 'padding-left:30px'>
		<div style='background-color:white ; height:8% ; width:400px'>
			<h3 style='color:black ; text-align:center ; padding-top:10px'>NO BLOGGERS REGISTERED</h3>
		</div>
		</div>
		";

}

?>





