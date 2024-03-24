<?php 
session_start();
include('../dbconnect.php');

if (isset($_POST['btnlogin'])) 
{
	$email=$_POST['txtadminemail'];
	$pass=$_POST['txtadminpassword'];

	echo $logincode="SELECT * FROM adminstb WHERE AdminEmail='$email' AND AdminPassword='$pass'";

	$query=mysqli_query($db,$logincode);

	$count=mysqli_num_rows($query);

	if ($count>0) 
	{
		$array=mysqli_fetch_array($query);
		$AID=$array['AdminID'];
		$AN=$array['AdminName'];

		$_SESSION['AID']=$AID;
		$_SESSION['AN']=$AN;

		echo "<script>window.alert('Success Login')</script>";
		echo "<script>window.location='AdminDashboard.php'</script>";
	}
	else{
		echo "<script>window.alert('Fail Login')</script>";
		echo "<script>window.location='Adminlogin.php'</script>";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>
<body>

<div class="container">
	<form class="registration-form" action="adminlogin.php" method="POST">	
	<h2>Admin Login</h2>
		<label>Admin Email</label>
		<input type="email" name="txtadminemail" placeholder="Email"required>	
	
		<label>Admin Password</label>
		<input type="password" name="txtadminpassword" placeholder="Password" required>	<br>
	
		<input class="submit" type="submit" name="btnlogin" value="login">
	</form>
</div>

</body>
</html>