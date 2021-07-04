<?php

// Create connection
$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

mysql_select_db("property",$conn) or die("Couldn't connect to the database");
// echo "Successfully connected to the server and successfully connected to the database blog";

error_reporting(0);
if($_GET["username"]){
	
	$username=$_GET["username"];
	$id=mysql_fetch_array(mysql_query("SELECT dealer_id FROM dealer_info WHERE username='$username'"));
$dealer_id=$id['dealer_id'];

$sql = "SELECT * FROM property_info WHERE dealer_id='$dealer_id' && type='Residential Apartment'";

$records = mysql_query($sql);

$a = 1;

while($row = mysql_fetch_assoc($records)){

	$a++;
	if($a == '2'){
		echo"
		<div style='padding-top:10px ; padding-left:30px'>
		<div style='background-color:black ; height:8% ; width:200px'>
			<h3 style='color:white ; text-align:center ; padding-top:10px'>Residential Apartments</h3>
		</div>
		</div>

		";
	}
$image=$row['property_image'];
$property_name=$row['name'];
	echo "
	<div style='padding-left:10px ; padding-top:30px'>
	<div style = 'width:40% ; background-color:white ; border:1px solid black ; padding: 20px'>
		<h1 style = 'color:black ; font-size:20px ; padding:7px '>Property name:<a href='description1.php?name=$property_name'>".$row['name']."</a>   </h1>
		
		<h1 style = 'color:black ; font-size:20px ; padding:7px '>Location:  ".$row['location']."</h1>
	 <img src='$image' style='width:304px;height:228px;' float='center'  >;	
	</div>
	</div>";

	
	
	
}

if($a == '1'){

	echo "
		<div style = 'padding-left:30px'>
		<div style='background-color:grey; height:8% ; width:400px'>
			<h3 style='color:black ; text-align:center ; padding-top:10px'>NO Property TO DISPLAY</h3>
		</div>
		</div>
		";

}
}
?>
