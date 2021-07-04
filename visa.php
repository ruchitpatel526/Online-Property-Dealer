
<?php
session_start();
session_unset();
// Create connection
$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

mysql_select_db("property",$conn) or die("Couldn't connect to the database");
// echo "Successfully connected to the server and successfully connected to the database blog";

error_reporting(0);
if($_POST['login']){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$accountno = $_POST['accountno'];
	$pin = $_POST['pin'];




$check = mysql_fetch_array(mysql_query("SELECT * FROM dealer_info WHERE username = '$username'"));
if($check == 0 ||$check['password']!=$password ||$check['accountno']!=$accountno ||$check['pin']!=$pin){
		//die("NO SUCH ACCOUNT EXISTS. CLICK <a href='register.php'>Here</a> TO REGISTER NOW.");
		echo"
 <script type='text/javascript'>alert('Wrong login details!!Try again'); window.location='trial.php';</script>";
session_unset();
	}
	
	//if($check['password'] != $password){
		//die("INCORRECT LOGIN DETAILS!!! TRY AGAIN <a href='login.html'>Here</a>.");
	//}
	//if($check['accountno'] != $accountno){
		//die("INCORRECT PASSWORD !!! LOGIN AGAIN <a href='login.html'>Here</a>.");
	//}
	$id=$check['dealer_id'];
	$own =mysql_fetch_array(mysql_query("SELECT * FROM property_info WHERE dealer_id = '$id'"));
	if($own !=0)
	{
		echo"
 <script type='text/javascript'>alert('You already own this property'); window.location='trial.php';</script>";
session_unset();
	}
		
		if($_GET["name"]){
	
	$property_name=$_GET["name"];
	
	echo"
 <script type='text/javascript'>alert('You are going to buy $property_name'); window.location='bought.php?name=$property_name&username=$username';</script>";
		}

		
	$_SESSION['username'] = $username;
	$_SESSION['dealer_id']=$check['dealer_id'];
    $_SESSION['password']=$password;
	
}

echo"
<head>
<title>PAYMENT GATEWAY</title>
 
</head>


<body background='a.jpg'>
<div style = 'width:40% ; background-color:white ; border:2px solid black ; padding: 10px'>
	<h2 style = ''><a href='trial.php' style='text-decoration:none;color:black;font-size:25px'>Home</a></h2>
	<h1 style = 'color:black'>CONFIRM YOUR DETAILS</h1>
		<form action='' method='post'>
		<table>
			<tr>
				<td>
					<b>Username:</b>
				</td>
				<td>
					<input type='text' name='username' style='padding: 3px'>
				</td>
			</tr>
			
			<tr>
				<td>
					<b>Password:</b>
				</td>
				<td>
					<input type='password' name='password' style='padding: 3px'>
				</td>
			</tr>
			<tr>
				<td>
					<b>Account no:</b>
				</td>
				<td>
					<input type='number' name='accountno' style='padding: 3px'>
				</td>
			</tr>
			<tr>
				<td>
					<b>Pin:</b>
				</td>
				<td>
					<input type='password' name='pin' style='padding: 3px'>
				</td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr>
				<td>
					<input type='submit' name='login' value='Confirm'>
				</td>
			</tr>
			
		</table>
</div>

</body>

";

?>