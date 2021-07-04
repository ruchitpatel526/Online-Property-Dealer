<?php

// Create connection
$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

mysql_select_db("property",$conn) or die("Couldn't connect to the database");
// echo "Successfully connected to the server and successfully connected to the database blog";

error_reporting(0);

echo "
	 <body background='a.jpg'>
	<div style = 'width:90% ; background-color:grey ; border:2px solid black ; padding: 20px'>
	<h2 style = ''><a href='dealer.php' style='text-decoration:none;color:black;font-size:25px'>Home</a></h2>
    </div>
	
	";
	
if($_GET["name"]){
	
	$username=$_GET["name"];
	
	$sql="select * from property_info where name='$username'";
	
	$records = mysql_query($sql);

    $a = 1;

     while($row = mysql_fetch_assoc($records)){

	     $a++;
		 if($a == '2'){
		echo"
		<div style='padding-top:10px ; padding-left:600px'>
		<div style='background-color:black ; height:8% ; width:200px'>
			<h3 style='color:white ; text-align:center ; padding-top:10px'>Property</h3>
		</div>
		</div>

		";
	}

	echo "
	<div style='padding-top:10px ; padding-left:400px'>
	<div style = 'width:60% ; background-color:grey ; border:1px solid black ; padding: 20px'>
	<h1 style = 'color:black ; font-size:20px ; padding:7px'> Name:  ".$row['name']."</h1>
	<h1 style = 'color:black ; font-size:20px ; padding:7px'> BHK:  ".$row['area']."</h1>
	
		<h1 style = 'color:black ; font-size:20px ; padding:7px'> Location:  ".$row['location']."</h1>
		<h1 style = 'color:black ; font-size:20px ; padding:7px'>Cost:  ".$row['price']."Rs</h1>
		<h1 style = 'color:black ; font-size:20px ; padding:7px'> Type:  ".$row['type']."</h1>
		<h1 style = 'color:black ; font-size:20px ; padding:7px'> Amenites:  ".$row['amenities']."</h1>
		<img src='$image' style='width:304px;height:228px;' float='center'  >;
	</div>
	</div>
	
	";
}

if($a == '1'){

	echo "
		<div style = 'padding-left:30px'>
		<div style='background-color:grey; height:8% ; width:400px'>
			<h3 style='color:black ; text-align:center ; padding-top:10px'>INFORMATION OF Property UNAVAILABLE</h3>
		</div>
		</div>
		";

}

	
	
	
}