
<?php


// Create connection
$conn = mysql_connect("localhost","root","") or die("Couldn't connect to the server");

mysql_select_db("property",$conn) or die("Couldn't connect to the database");
// echo "Successfully connected to the server and successfully connected to the database blog";

error_reporting(0);

if($_POST['register']){
	
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$contactno = mysql_real_escape_string($_POST['contact']);
	$email= mysql_real_escape_string($_POST['email']);
	$accountno= mysql_real_escape_string($_POST['accountno']);
	$pin= mysql_real_escape_string($_POST['pin']);
	//if(strlen($username) == 0){
		//die("USERNAME IS REQUIRED. <a href='register.php'>Back</a>");
		//<script>
		//alert('Please enter username'); 
		//</script>
	
	
	//if(strlen($password) == 0){
		//die("PASSWORD IS REQUIRED. <a href='register.php'>Back</a>");
	//}
	
	$check = mysql_fetch_array(mysql_query("SELECT * FROM dealer_info WHERE username = '$username'"));

	if($check != 0){
		die("THAT USERNAME ALREADY EXISTS !!! TRY ANOTHER ONE. <a href='register.php'>Back</a>"); 
	}
	
	if(!ctype_alnum($username)){
		die("SPECIAL CHARACTERS ARE NOT ALLOWED IN USERNAME !!! <a href='register.php'>Back</a>");
	}
	
	if(strlen($username) > 20 ){
		die("USERNAME SHOULDN'T EXCEED 20 CHARACTERS. <a href='register.php'>Back</a>");
	}
	
	if(strlen($password) < 6){
		die("PASSWORD SHOULD BE MINIMUM OF 6 CHARACTERS LONG. <a href='register.php'>Back</a>");
	}
	if((strlen($contactno)<10 )|| (strlen($contactno)>10)){
		die("Contact no should contain 10 digits <a href='register.php'>Back</a>");
	}
	//if((strlen($accountno)<10 )|| (strlen($accountno)>10)){
		//die("Account no should contain 10 digits <a href='register.php'>Back</a>");
	//}
	if((strlen($pin)<4 )|| (strlen($pin)>4)){
		die("Security pin should contain 4 digits <a href='register.php'>Back</a>");
	}
	
	
		
	mysql_query("INSERT INTO dealer_info (username,password,contact_no,emailid,accountno,pin) VALUES ('$username' , '$password','$contactno','$email','$accountno','$pin')");
	//$qry="SELECT dealer_id FROM dealer_info WHERE username='$username'";
	//$dealer_id=mysql_query($qry);
	
	//mysql_query("INSERT INTO bank(dealer_id,account_no,pin) VALUES ('$dealer_id','$accountno','$pin')");
	//if($username == 'admin'){
		//mysql_query("UPDATE blogger_info SET blogger_permission = 'yes'");
	//}
		echo"
 <script type='text/javascript'>alert('You successfully created an account $username..Login to continue'); window.location='login.html';</script>";

	
	
}

echo "

<body style ='padding-left:50px' background='a.jpg'>

	<div style='width:40% ; background-color:white ; border:2px solid black ; padding: 20px'>
		<h2 style = ''><a href='trial.php' style='text-decoration:none;color:black;font-size:25px'>Home</a></h2>
		<h1 style = 'color:black'>REGISTER</h1>
		<form action='' method='post'>
		<table>
			<tr>
				<td>
					<b>Username:</b>
				</td>
				<td>
					<input type='text' name='username' required style='padding: 3px '>
				</td>
			</tr>
			
			<tr>
				<td>
					<b>Password:</b>
				</td>
				<td>
					<input type='password' name='password' required style='padding: 3px'>
				</td>
			</tr>
			<tr>
			<td>
			<b>Contact no.: </b>
			</td>
			<td>
			<input type='number' name='contact' required style ='padding:3px'>
			</td>
			</tr>
			
			<tr>
			<td>
			<b>Email id :</b>
			</td>
			<td>
			<input type='email' name='email' style ='padding:3px' required='@'>
			</td>
			</tr>
			<tr>
			<td>
			<b>Account no.: </b>
			</td>
			<td>
			<input type='number' name='accountno' required style ='padding:3px required'>
			</td>
			</tr>
			<tr>
			<td>
			<b>Security pin: </b>
			</td>
			<td>
			<input type='password' name='pin' required style ='padding:3px required'>
			</td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr>
				<td>
					<input type='submit' name='register' value='Sign up'>
				</td>
			</tr>
			
		</table>
	</div>
</body>
";

?>