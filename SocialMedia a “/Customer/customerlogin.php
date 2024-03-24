<?php 
session_start();
include('../dbconnect.php');

if (isset($_POST['btnlogin'])) 
{
	$email=$_POST['txtadminemail'];
	$pass=$_POST['txtadminpassword'];

	$logincode="SELECT * FROM customertb WHERE Email='$email' AND Password='$pass'";

	$query=mysqli_query($db,$logincode);

	$count=mysqli_num_rows($query);

	if ($count>0) 
	{
		$array=mysqli_fetch_array($query);
		$CID=$array['CustomerID'];
		$CUN=$array['UserName'];
		$Cemail=$array['Email'];
		$Cphno=$array['PhoneNumber'];
		$Cregister=$array['RegisterMonth'];

		$_SESSION['CID']=$CID;
		$_SESSION['CUN']=$CUN;
		$_SESSION['Cemail']=$Cemail;
		$_SESSION['Cphno']=$Cphno;
		$_SESSION['Cregister']=$Cregister;


		setcookie("user","$CUN",time()+10,"/");

		echo "<script>window.alert('Success Login')</script>";
		echo "<script>window.location='customerhome.php'</script>";
	}
	// counter error message attempt 
	else{
		
		if (isset($_SESSION['LoginError'])) {
		
			$counterror=$_SESSION['LoginError'];

			if ($counterror==1) {
				echo "<script>window.alert('Customer Login Failed! Attempt Two')</script>";
				$_SESSION['LoginError']=2;
			}
			else if ($counterror==2){
				echo "<script>window.alert('Customer Login Failed! Attempt Three')</script>";
				echo "<script>window.location='Timer.php'</script>";
			}
		}

		else{
			echo "<script>window.alert('Customer Login Failed! Attempt One')</script>";
			$_SESSION['LoginError']=1;
		}

	}
	
}



 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="customerstyle.css">
	             
</head>
<body>

<div class="customer">
	<div class="container">
	<form class="registration-form" action="customerlogin.php" method="POST">	
	<h2>Customer Login</h2>
		<label>Customer Email</label>
		<input type="email" name="txtadminemail" placeholder="Email"required>	
	
		<label>Customer Password</label>
		<input type="password" name="txtadminpassword" placeholder="Password" required>	<br>
	
		<!-- recaptcha loke nee -->
		<div class="g-recaptcha" data-sitekey="6LcGADspAAAAAF6aKLQu6eDyoQxy7wg7RW1LjzYp"></div>
 
		<script src="https://www.google.com/recaptcha/api.js" async defer>
		</script>
		<!-- recaptcha loke nee -->

		<input class="submit" type="submit" name="btnlogin" value="login">
	</form>
</div>
</div>

</body>
</html>