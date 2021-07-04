<?php

session_start();

//include 'auth.php';
// Create connection
$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

mysql_select_db("property",$conn) or die("Couldn't connect to the database");
// echo "Successfully connected to the server and successfully connected to the database blog";

error_reporting(0);

$id = $_SESSION['dealer_id'];
$username = $_SESSION['username'];

echo "
<style>
div.dropbtn {
    background-color: #000000;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

div.dropdown {
    position: relative;
    display: inline-block;
}

div.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

div.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

div.dropdown-content a:hover {background-color: red}

div.dropdown:hover .dropdown-content {
    display: block;
}

div.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>



 
<div style = 'padding-left:30px'>

<div style = 'background-color:black ; width:100% ; height:1.5%'>
	<table>
		<tr>
			<td style = 'font-size:25px ; color:white ; text-align:left; padding-top:50px ; padding-left:950px'>Logged in as 
			<a href='dealer.php' style='text-decoration:none ; color:white ; font-size:25px'>".$username."</a>.</td>
		</tr>
	</table>
</div>
<div style = 'background-color:black ; width:100% ; height:20%'>
<div style='padding-left:30px'>
<div class='dropdown' style='background-color:black;width:97.4%;height:30%'>
  <button class='dropbtn' style='height:100%'>Options</button>
  <div class='dropdown-content'>
<a href='buy.php' value='BUY'>BUY</a>
    <a href='sell.php' value='Sell'>Sell</a>
    	
	
  </div>
</div>

	<table style='padding-left:35px; padding-right:35px; padding-top:25px; padding-bottom:10px'>
	
		<tr>
			<td style='text-align:center ; width:150px'>
				<a href='change.php' style='text-decoration:none ; color:white ; font-size:20px'>Change Password</a>
			</td>
			<td style='text-align:center ; width:150px'>
				<a href='delete_account.php' style='text-decoration:none ; color:white ; font-size:20px'>Delete Account</a>
			</td>
			
			<td style='text-align:center ; width:150px'>
				<a href='logout.php' style='text-decoration:none ; color:white ; font-size:20px'>Logout</a>
			</td>
		</tr>
	</table>
</div>
</div>

";


//$idd=mysql_query("SELECT dealer_id FROM dealer_info WHERE username='$username'");
$sql = "SELECT * FROM property_info WHERE dealer_id='$id' ";

$records = mysql_query($sql);

$a = 1;

while($row = mysql_fetch_assoc($records)){

	$a++;
	if($a == '2'){
		echo"
		<div style='padding-top:10px ; padding-left:30px'>
		<div style='background-color:black ; height:8% ; width:200px'>
			<h3 style='color:white ; text-align:center ; padding-top:10px'>ALL Properties</h3>
		</div>
		</div>

		";
	}
$image=$row['property_image'];
$property_name=$row['name'];
	echo "
	<div style='padding-left:10px ; padding-top:30px'>
	<div style = 'width:40% ; background-color:grey ; border:1px solid black ; padding: 20px'>
		<h1 style = 'color:black ; font-size:20px ; padding:7px '>Property name:<a href='description.php?name=$property_name'>".$row['name']."</a>   </h1>
		
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

?>

















