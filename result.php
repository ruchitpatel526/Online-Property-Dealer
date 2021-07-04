<?php

// Create connection
$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

mysql_select_db("property",$conn) or die("Couldn't connect to the database");
// echo "Successfully connected to the server and successfully connected to the database blog";

error_reporting(0);

if($_POST['search']){
	$search = $_POST['searchcategory'];
$check=mysql_fetch_array(mysql_query("SELECT * FROM keywordlist WHERE keyword='$search'"));
if($check==0)
{
//die("Keyword doesnt match.  <a href ='trial.php'>Back</a>");
echo"
 <script type='text/javascript'>alert('Keyword does not exist'); window.location='trial.php';</script>";

}	
if($search=='2BHK'||$search=='3BHK' ||$search=='4BHK')
{
	$sql="SELECT * FROM property_info where area='$search'";
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
	
	echo "
	<div style='padding-top:10px ; padding-left:30px'>
	<div style = 'width:30% ; background-color:grey ; border:1px solid black ; padding-left: 20px'>
		
		<table style='padding-top:15px; padding-bottom:10px'>
		<tr>
			<td style='text-align:right ; width:150px'>
				<h1 style = 'color:black ; font-size:20px'>Property name:</h1>
			</td>
			<td style='text-align:left ; width:150px ; padding-left:10px'>
				<h1 style = 'color:black ; font-size:20px'> <a href='register.php'><a href='description.php'>".$row['name']."</a></h1>
			</td>
		</tr>
		<tr>
			<td style='text-align:right ; width:150px'>
				<h1 style = 'color:black ; font-size:20px'>Location:</h1>
			</td>
			<td style='text-align:left ; width:150px ; padding-left:10px'>
				<h1 style = 'color:black ; font-size:20px'>".$row['location']."</h1>
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

}
}
if($search=='Residential Apartment'||$search=='Independent House' ||$search=='Farm House'||$search=='Commercial')
{
	$sql="SELECT * FROM property_info where type='$search'";
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
	
	echo "
	<div style='padding-top:10px ; padding-left:30px'>
	<div style = 'width:30% ; background-color:grey ; border:1px solid black ; padding-left: 20px'>
		
		<table style='padding-top:15px; padding-bottom:10px'>
		<tr>
			<td style='text-align:right ; width:150px'>
				<h1 style = 'color:black ; font-size:20px'>Property Name:</h1>
			</td>
			<td style='text-align:left ; width:150px ; padding-left:10px'>
				<h1 style = 'color:black ; font-size:20px'><a href='description.php'>".$row['name']."</a></h1>
			</td>
		</tr>
		<tr>
			<td style='text-align:left; width:150px'>
				<h1 style = 'color:black ; font-size:20px'>Location:</h1>
			</td>
			<td style='text-align:left ; width:150px ; padding-left:10px'>
				<h1 style = 'color:black ; font-size:20px'>".$row['location']."</h1>
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
}

if($search=='below 5 lac'||$search=='below 10 lac')
{
	
	
		$price=500000;
	
	
	$sql="SELECT * FROM property_info WHERE price<='$price'";
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
	
	echo "
	<div style='padding-top:10px ; padding-left:30px'>
	<div style = 'width:30% ; background-color:grey ; border:1px solid black ; padding-left: 20px'>
		
		<table style='padding-top:15px; padding-bottom:10px'>
		<tr>
			<td style='text-align:right ; width:150px'>
				<h1 style = 'color:black ; font-size:20px'>Property name:</h1>
			</td>
			<td style='text-align:left ; width:150px ; padding-left:10px'>
				<h1 style = 'color:black ; font-size:20px'><a href='description.php'>".$row['name']."</a></h1>
			</td>
		</tr>
		<tr>
			<td style='text-align:right ; width:150px'>
				<h1 style = 'color:black ; font-size:20px'>Location:</h1>
			</td>
			<td style='text-align:left ; width:150px ; padding-left:10px'>
				<h1 style = 'color:black ; font-size:20px'>".$row['location']."</h1>
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


}
	

