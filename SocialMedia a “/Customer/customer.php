<?php 

session_start();
include('../dbconnect.php');

if (isset($_POST['btnregister'])) {
	$txtfirstname=$_POST['txtfirstname'];
	$txtlastname=$_POST['txtlastname'];
	$txtusername=$_POST['txtusername'];
	$txtemail=$_POST['txtemail'];
	$txtage=$_POST['txtage'];
	$txtphonenumber=$_POST['txtphonenumber'];
	$txtpassword=$_POST['txtpassword'];
	$txtcustomeraddress=$_POST['txtcustomeraddress'];
	$txtregistermonth=$_POST['txtregistermonth'];
	

	$img=$_FILES['filecustomer']['name'];
	$folder="../Addimg/";
	$cusimg=$folder.uniqid()."_".$img;
	$copy=copy($_FILES['filecustomer']['tmp_name'], $cusimg); 
	//copy
	if (!$copy) {
		echo "<p>Photo cannot be uploaded!</p>";
	}

	$number=preg_match('@[0-9]@', $txtpassword);
	$uppercharacter=preg_match('@[A-Z]@', $txtpassword);
	$lowercharacter=preg_match('@[a=z]@', $txtpassword);
	$special=preg_match('@[^\w]@', $txtpassword);

	$checkemail="SELECT * From customertb WHERE Email='$txtemail'";
	$result=mysqli_query($db,$checkemail);
	$count=mysqli_num_rows($result);

	if ($count>0) {
		echo "<script>window.alert('Your Email Is Already Existed!')</script>";
		echo "<script>window.location='customer.php'</script>";
	}

	else if (strlen($txtpassword)<8 || !$number || !$uppercharacter || !$lowercharacter || !$special ) {
		echo "<script>window.alert('Password must be 8 character in length and must contain one number and uppercharacter and lowercharacter and special character')</script>";
		echo "<script>window.location='customerlogin.php'</script>";
	}
	else{
		$insert="INSERT INTO customertb(CustomerFirstName,CustomerLastName,UserName,Email,Age,PhoneNumber,Password,Address,RegisterMonth,CustomerImage)
					VALUES('$txtfirstname','$txtlastname','$txtusername','$txtemail','$txtage','$txtphonenumber','$txtpassword','$txtcustomeraddress','$txtregistermonth','$filecustomer')";

		$inserted=mysqli_query($db, $insert);

		if ($inserted) {
			echo "<script>window.alert('Register Success!')</script>";
			echo "<script>window.location='customer.php'</script>";
		}
	}


}


 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="customerstyle.css">
	<title></title>
</head>
<body>

<div class="customer">
	
	<div class="container ">
	<form action="customer.php" class="registration-form" method="POST" enctype="multipart/form-data">
	
	<h2>Customer Form Register</h2>

	<label>CustomerFirstName:</label>
	<input type="text" name="txtfirstname" placeholder="Enter CusName" required/>

	<label>CustomerLastName:</label>
	<input type="text" name="txtlastname" placeholder="Enter CusName" required/>

	<label>UserName:</label>
	<input type="text" name="txtusername" placeholder="Enter Username" required/>

	<label>Email:</label>
	<input type="text" name="txtemail" placeholder="Enter Email" required/>

	<label>Age:</label>
	<input type="text" name="txtage" placeholder="Enter Your Age" required/>

	<label>PhoneNumber:</label>
	<input type="text" name="txtphonenumber" placeholder="Enter Phonenumber" required/>

	<label>Password:</label>
	<input type="text" name="txtpassword" placeholder="Create a password!" required/>

	<label>Address:</label>
	<textarea name="txtcustomeraddress"></textarea>

	<label>RegisterMonth:</label>
	<input type="text" name="txtregistermonth" placeholder="Enter the month u register"  required/>

	<label>CustomerImage:</label>
	<input type="file" name="filecustomer" placeholder="Enter CusName" required/>


	<!-- recaptcha loke nee -->
	<div class="g-recaptcha" data-sitekey="6LcGADspAAAAAF6aKLQu6eDyoQxy7wg7RW1LjzYp"></div>
 
	<script src="https://www.google.com/recaptcha/api.js" async defer>
	</script>
	<!-- recaptcha loke nee -->

	<label><input type="checkbox" id="customercheckbox" required>
	<a href="#">I Agree to The Terms & Condition</a><br>
	<a href="customerlogin.php">Already Registered? Please Login</a>
	</label>
	<input class="submit" id="customersubmit" type="submit" name="btnregister" value="Save">



	</form>
</div>
</div>



</body>
</html>