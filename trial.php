<?php

// Create connection
$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

mysql_select_db("property",$conn) or die("Couldn't connect to the database");
// echo "Successfully connected to the server and successfully connected to the database blog";

error_reporting(0);

echo "

<body>

<h1 align='center'>PROPERTY A2Z</h1>

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




<div style='padding-left:30px'>
<div class='dropdown' style='background-color:black;width:97.4%;height:8%'>
  <button class='dropbtn' style='height:75%'>ALL INDIA</button>
  <div class='dropdown-content'>
  
  
    <a href='mumbai.php' value='Mumbai'>Mumbai</a>
    <a href='hybd.php' value='Hyderabad'>Hyderabad</a>
    <a href='surat.php' value='Surat'>Surat</a>
	<a href='chennai.php' value='Chennai'>Chennai</a>
	<a href='delhi.php' value='Delhi'>Delhi</a>
		
	
  </div>
</div>

	<div style = 'padding-left:30px ;padding-top:10px;background-image:url(homepic.jpg);  width:95.1% ; height:50%'>
		<table>
			<tr>
				<td style='text-align:right; width:1200px'>  
					<a href='login.html' style='text-decoration:none ; color:white ; font-size:20px'>LOGIN</a>
				</td>
				
			</tr>
			<tr>
				<td style='text-align:right ; width:1200px'>
					<a href='register.php' style='text-decoration:none ; color:white ; font-size:20px'>REGISTER</a>
				</td>
			</tr>
		</table>
		<div>
		<table>
		<tr>
		<td style='text-align:center;width:1200px'>
		<form action='result.php' searching='true' method='POST'>
<input type='text' name='searchcategory' value=''/>
<input type='submit' value='Search' name='search'/>
</form>
		</td>
		</tr>
		</table>
		</div>
		
		
	</div>
	
	
	<div style = 'background-color:black ; width:97.45% ; height:8%'>
	<table style='padding-top:15px; padding-bottom:10px'>
		<tr>
			<td style='text-align:center ; width:150px'>
				<a href='dealers_page.php' style='text-decoration:none ; color:white ; font-size:20px'>Dealers </a>
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
$sql = "SELECT * FROM property_info";

$records = mysql_query($sql);

$a = 1;

while($row = mysql_fetch_assoc($records)){

	$a++;
	if($a == '2'){
		echo"
		<div style='padding-top:10px ; padding-left:30px'>
		<div style='background-color:black ; height:8% ; width:200px'>
			<h3 style='color:white ; text-align:center ; padding-top:10px'>Property</h3>
		</div>
		</div>

		";
	}
$property_name=$row['name'];
$image=$row['image'];
	echo "
	<div style='padding-top:10px ; padding-left:30px'>
	<div style = 'width:40% ; background-color:white ; border:1px solid black ; padding: 20px'>
	
     	<h1 style = 'color:black ; font-size:20px ; padding:3px'>PROPERTY NAME:<a href='description1.php?name=$property_name'>".$row['name']."</a></h1>
		<h1 style = 'color:black ; font-size:20px ; padding:3px'>PRICE:  ".$row['price']."Rs</h1>
		
	</div>
	</div>
	
	";
}

if($a == '1'){

	echo "
		<div style = 'padding-left:30px'>
		<div style='background-color:grey ; height:8% ; width:400px'>
			<h3 style='color:black ; text-align:center ; padding-top:10px'>NO PROPERTY TO DISPLAY</h3>
		</div>
		</div>
		";

}

?>








