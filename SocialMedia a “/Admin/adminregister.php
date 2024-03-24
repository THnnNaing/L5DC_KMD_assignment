<?php 
session_start();
include('../dbconnect.php');

if (isset ($_POST['btnregister'])) 
{
	echo $_POST['txtadminname'];
	$AName=$_POST['txtadminname'];
	$ADoB=$_POST['txtadminDOB'];
	$AEmail=$_POST['txtadminemail'];
	$APass=$_POST['txtadminpassword'];
	$Aphone=$_POST['txtadminPhoneNumber'];
	$AAddress=$_POST['txtadminaddress'];

	$number=preg_match('@[0-9]@', $APass);
	$uppercharacter=preg_match('@[A-Z]@', $APass);
	$lowercharacter=preg_match('@[a-z]@', $APass);
	$special=preg_match('@[^\w]@', $APass);

	$checkemail="SELECT * From adminstb WHERE AdminEmail='$AEmail'";
	$result=mysqli_query($db,$checkemail);
	$count=mysqli_num_rows($result);

	if ($count>0) {
		echo "<script>window.alert('Admin Email Already Exist!')</script>";
		echo "<script>window.location='adminregister.php'</script>";
	}

	else if (strlen($APass)<8 || !$number || !$uppercharacter || !$lowercharacter || !$special ) {
		echo "<script>window.alert('Password must be 8 character in length and must contain one number and uppercharacter and lowercharacter and special character')</script>";
		echo "<script>window.location='adminregister.php'</script>";
	}

	else{
		$insert="INSERT into adminstb(AdminName,AdminDateOfBirth,AdminEmail,AdminPassword,AdminPhoneNumber,AdminAddress)
					VALUES('$AName','$ADoB','$AEmail','$APass','$Aphone','$AAddress')";
			echo "<script>window.location='adminlogin.php'</script>";

		$inserted=mysqli_query($db, $insert);

		if ($inserted) {
			echo "<script>window.alert('Register Success!')</script>";
			echo "<script>window.location='adminlogin.php'</script>";
		}
	}

}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>AdminRegisteration</title>
 	<link rel="stylesheet" type="text/css" href="adminstyle.css">
 </head>
 <body>
 	<div class="container">
 		<form class="registration-form" method="POST" action="adminregister.php">
 		<h2>Admin Registeration</h2>
 		
 			<label>Admin Name</label>
 			<input type="text" name="txtadminname" placeholder="Enter Your Full Name" required>
 		
 			<label>Admin Date of Birth</label>
 			<input type="text" name="txtadminDOB" placeholder="Enter Your Date of Birth" required>
 		
 			<label>Admin Email</label>
 			<input type="text" name="txtadminemail" placeholder="Enter Your Email Address" required>
 		
 			<label>Password</label>
 			<input type="password" name="txtadminpassword" placeholder="Enter Password" required>
 		
 			<label>Admin PhoneNumber</label>
 			<input type="text" name="txtadminPhoneNumber" placeholder="Enter Your Phonenumber" required>
 		
 			<label>Admin Address</label>
 			<textarea name="txtadminaddress"></textarea>
 		
			<label><input type="checkbox" id="staffcheckbox" required>
			<a href="#">I Agree to The Terms & Condition</a><br>
			<a href="adminlogin.php">Are You Old Staff? Please Login</a>
			</label>
			<input class="submit" id="adminsubmit" type="submit" name="btnregister" value="Save">
		
 	</form>


 	</div>
 	
 </body>
 </html>