<?php

// Create connection
$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

mysql_select_db("property",$conn) or die("Couldn't connect to the database");
// echo "Successfully connected to the server and successfully connected to the database blog";

error_reporting(0);

echo "

<div style='padding-left:30px'>
	<div style = 'padding-left:30px ;padding-top:10px; background-color:black; width:95.1% ; height:1.5%'>
		<table>
			<tr>
				<td style='text-align:right ; width:1200px'>
					<a href='login.html' style='text-decoration:none ; color:white ; font-size:20px'>LOGIN</a>
				</td>
			</tr>
			<tr>
				<td style='text-align:right ; width:1200px'>
					<a href='register.php' style='text-decoration:none ; color:white ; font-size:20px'>REGISTER</a>
				</td>
			</tr>
		</table>
	</div>
	<div style = 'background-color:black ; width:97.45% ; height:8%'>
	<table style='padding-top:15px; padding-bottom:10px'>
		<tr>
			<td style='text-align:center ; width:150px'>
				<a href='trial.php' style='text-decoration:none ; color:white ; font-size:20px'>Home</a>
			</td>
			<td style='text-align:center ; width:150px'>
				<a href='contact.php' style='text-decoration:none ; color:white ; font-size:20px'>Contact Us</a>
			</td>
		</tr>
	</table>
</div>
</div>
</body>
";

$sql = "SELECT * FROM dealer_info WHERE username <> 'admin'";

$records = mysql_query($sql);


$a = 1;

while($row = mysql_fetch_assoc($records)){

	$a++;
	if($a == '2'){
		
		
		echo"
		<div style='padding-top:10px ; padding-left:30px'>
		<div style='background-color:black ; height:8% ; width:200px'>
			<h3 style='color:white ; text-align:center ; padding-top:10px'>DEALERS</h3>
		</div>
		</div>

		";
	}
	
	$username=$row['username'];
	$id=$row['dealer_id'];
	
	$home=mysql_query("SELECT COUNT(*) as count FROM property_info WHERE dealer_id=$id && type='Independent House'");
		$counth=mysql_fetch_assoc($home);
	$homec=$counth['count'];
	
$fhome=mysql_query("SELECT COUNT(*) as fcount FROM property_info WHERE dealer_id=$id && type='Farm House'");
		$fcounth=mysql_fetch_assoc($fhome);
	$fhomec=$fcounth['fcount'];
	
	$chome=mysql_query("SELECT COUNT(*) as ccount FROM property_info WHERE dealer_id=$id && type='Commercial'");
		$ccounth=mysql_fetch_assoc($chome);
	$chomec=$ccounth['ccount'];
		$rhome=mysql_query("SELECT COUNT(*) as rcount FROM property_info WHERE dealer_id=$id && type='Residential Apartment'");
		$rcounth=mysql_fetch_assoc($rhome);
	$rhomec=$rcounth['rcount'];

	echo "
	 
	<div style='padding-top:10px ; padding-left:30px'>
	<div style = 'width:60% ; background-color:white ; border:1px solid black ; padding-left: 20px'>
		
		<table style='padding-top:15px; padding-bottom:10px'>
		
		<tr>
			<td style='text-align:left ; width:200px'>
				<h1 style = 'color:black ; font-size:20px'>NAME:</h1>
			</td>
			<td style='text-align:left ; width:150px ; padding-left:10px'>
				<h1 style = 'color:black ; font-size:20px'><a href='dealer_info.php?username=$username'>".$row['username']."</a></h1>
			</td>
		</tr>
		";
		if($homec!=0){
			echo"
		<tr>
			<td style='text-align:left; width:200px'>
				<h1 style = 'color:black ; font-size:20px'><a href='type1.php?username=$username'>$homec Independent Home</a></h1>
			</td>
			
		</tr>
		";
		}
		if($fhomec!=0){
			echo"
		<tr>
			<td style='text-align:left ; width:150px'>
				<h1 style = 'color:black ; font-size:20px'><a href='type2.php?username=$username'> $fhomec Farm House</a></h1>
			</td>
			
		</tr>
		";
		}
		if($chomec!=0)
		{
			
		echo"
		<tr>
			<td style='text-align:left ; width:150px'>
				<h1 style = 'color:black ; font-size:20px'><a href='type3.php?username=$username'> $chomec Commercial</a></h1>
			</td>
			
		</tr>
		";
		}
		if($rhomec!=0)
		{
			
		echo"
		<tr>
			<td style='text-align:left ; width:150px'>
				<h1 style = 'color:black ; font-size:20px'><a href='type4.php?username=$username'> $rhomec Residential Apartment</a></h1>
			</td>
			
		</tr>
		";
		}

		
		echo"
	</table>
		
	</div>
	</div>
	";
	
	
		
		
}

if($a == '1'){

	echo "
		<div style = 'padding-left:30px'>
		<div style='background-color:white ; height:8% ; width:400px'>
			<h3 style='color:black ; text-align:center ; padding-top:10px'>NO DEALERS REGISTERED</h3>
		</div>
		</div>
		";

}

?>