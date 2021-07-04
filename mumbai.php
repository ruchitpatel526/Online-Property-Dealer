<?php

// Create connection
$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

mysql_select_db("property",$conn) or die("Couldn't connect to the database");
//echo "Successfully connected to the server and successfully connected to the database blog";

error_reporting(0);
echo"
<div style='width:90% ;height:5%; padding: 20px'>
		<h2 style = ''><a href='trial.php' style='text-decoration:none;color:black;font-size:25px'>Home</a></h2>
		</div>
	";
$sql="SELECT * FROM property_info where location='Mumbai'";
	$records=mysql_query($sql);
	$a=1;
	while($row = mysql_fetch_assoc($records)){

	$a++;
	if($a == '2'){
		echo"
		<div style='padding-top:10px ; padding-left:30px'>
		<div style='background-color:black ; height:8% ; width:200px'>
			<h3 style='color:white ; text-align:center ; padding-top:10px'>SEARCH RESULT</h3>
		</div>
		</div>

		";
	}
	$property_name=$row['name'];
	echo "
	<div style='padding-top:10px ; padding-left:30px'>
	<div style = 'width:30% ; background-color:white ; border:1px solid black ; padding-left: 20px'>
		
		<table style='padding-top:15px; padding-bottom:10px'>
		<tr>
			<td style='text-align:right ; width:150px'>
				<h1 style = 'color:black ; font-size:20px'>Property Name:</h1>
			</td>
			<td style='text-align:left ; width:200px ; padding-left:10px'>
				<h1 style = 'color:black ; font-size:20px'> <a href='description1.php?name=$property_name'>".$row['name']."</a></h1>
			</td>
		</tr>
		<tr>
			<td style='text-align:right ; width:150px'>
				<h1 style = 'color:black ; font-size:20px'>Price:</h1>
			</td>
			<td style='text-align:left ; width:150px ; padding-left:10px'>
				<h1 style = 'color:black ; font-size:20px'>".$row['price']."</h1>
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
		<div style='background-color:grey ; height:8% ; width:400px'>
			<h3 style='color:black ; text-align:center ; padding-top:10px'>NO SUCH PROPERTY</h3>
		</div>
		</div>
		";

}

?>