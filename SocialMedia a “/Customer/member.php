<?php 

session_start();
include('../dbconnect.php');

if (!isset($_SESSION['CID'])) {
	echo "<script>window.alert('Login First')</script>";
		echo "<script>window.location='customerlogin.php'</script>";
}

if (isset($_REQUEST['CampID'])) {
	$campid=$_REQUEST['CampID'];
	$select="SELECT * FROM campaignstb WHERE 
	CampaignID='$campid'";

	$query=mysqli_query($db,$select);
	$data=mysqli_fetch_array($query);	

	$CampID=$data['CampaignID'];
	$Cname=$data['CampaignTitle'];
	$Sdate=$data['StartDate'];
	$Edate=$data['EndDate'];
	$status=$data['CampaignStatus'];
	$fees=$data['Fees'];
	$aim=$data['Aim'];
}

if (isset($_POST['btnapply'])) {
	$date=$_POST['mdate'];
	$des=$_POST['txtdes'];
	$email=$_POST['txtemail'];
	$payment=$_POST['rdopayment'];
	$CID=$_POST['txtCID'];
	$CampID=$_POST['txtCampID'];

	$checkemail="SELECT * From memberstb WHERE Email='$email'";
	$result=mysqli_query($db,$checkemail);
	$count=mysqli_num_rows($result);

	if ($count>0) {
		echo "<script>window.alert('Your Email Is Already Existed!')</script>";
		echo "<script>window.location='CampDetail.php'</script>";
	}
	else{
		$insert="INSERT INTO memberstb(MemberDate,Description,Email,PaymentType,CustomerID,CampaignID,MemberStatus)
					VALUES ('$date','$des','$email','$payment','$CID','$CampID','Active')";
		$inserted=mysqli_query($db, $insert);

		if ($inserted) {
			echo "<script>window.alert('Register Success!')</script>";
			echo "<script>window.location='info.php'</script>";
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
 	<script type="text/javascript">
		function showPaymentTable()
		{
			document.getElementById('PaymentTable').style.visibility="visible";
		}
		function hidePaymentTable()
		{
			document.getElementById('PaymentTable').style.visibility="hidden";
		}
</script>
 </head>
 <body>
 	<header class="header" id="header">

		<a href="customerhome.php" class="logo">
			<img src="../Images/logo.png">
		</a>
			<div class="nav-bar">	
				<ul>
					<li class="nav-item">
                        <a href="customerhome.php" class="nav-link ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="info.php" class="nav-link ">CampaignInfo</a>
                    </li>
                    <li class="nav-item">
                    	<a href="#" class="nav-link ">Information</a>
                        <div class="sub-menu-1">
                        	<ul>
                        		<li><a href="parents.php">Parents & Children</a></li>
                        		<li><a href="apps.php">Techniques</a></li>
                        		<li><a href="staysafe.php">Stay Safe Guidance</a></li>
                        		<li><a href="livestream.php">LiveStreaming Guidance</a></li>
                        		<li><a href="famousmedia.php">Famous Social Medias</a></li>
                        	</ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="contactus.php" class="nav-link ">Contact Us</a>
                    </li>
				</ul>
				<div class="search">
    				<input type="text" class="search__input" placeholder="Type your text">
    				<button class="search__button1">
        			<svg class="search__icon" aria-hidden="true" viewBox="0 0 24 24">
            				<g>
                			<path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 			3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
           			 </g>
        			</svg>
    				</button>
				</div>
		</div>
		
	</header>
 	<div class="customer member">
 		<div class="container">
 		<form action="member.php" class="registration-form" method="POST">
 		<h2>Member Form</h2>
 		
 		<label>MemberDate</label>
 		<input type="date" name="mdate" value="<?php echo date('Y-m-d'); ?>">

 		<label>Description</label>
 		<textarea name="txtdes"></textarea>

 		<label>Email</label>
 		<input type="text" name="txtemail" placeholder="Enter Confirm Email" required/>

 		<label>Paymenttype</label>

			<div class="paymenttype">
				MPU<input type="radio" name="rdopayment" onClick="showPaymentTable()">
				KBZ<input type="radio" name="rdopayment" onClick="showPaymentTable()">
				WAVE<input type="radio" name="rdopayment" onClick="hidePaymentTable()">
			</div>
 
		<table id="PaymentTable">
			<tr>
				<td><input type="text" name="" placeholder="Mg Mg"></td>
			</tr>
		</table>

		<fieldset class="memberfieldset">
			<legend>Customer Current Info</legend>

			<label>Uername</label>
			<input type="text" name="" value="<?php echo$_SESSION['CUN'] ?>"> 

			<label>Email</label>
			<input type="text" name="" value="<?php echo$_SESSION['Cemail'] ?>"> 

			<label>Phone Number</label>
			<input type="text" name="" value="<?php echo$_SESSION['Cphno'] ?>"> 

			<label>Registered Month</label>
			<input type="text" name="" value="<?php echo$_SESSION['Cregister'] ?>"> 

		</fieldset>

		<fieldset class="memberfieldset">
			<legend>Choosen Campaign Info</legend>
			<label>Campaign name</label>
			<input type="text" name="" value="<?php echo $Cname ?>"> 

			<label>Campaign End Date</label>
			<input type="text" name="" value="<?php echo $Sdate ?>"> 

			<label>Campaign End Date</label>
			<input type="text" name="" value="<?php echo $Edate ?>"> 

			<label>Campaign Status</label>
			<input type="text" name="" value="<?php echo $status ?>"> 

			<label>Campaign Fees</label>
			<input type="text" name="" value="<?php echo $fees?>"> 

			<label>Campaign Aim</label>
			<input type="text" name="" value="<?php echo $aim ?>"> 

		</fieldset>

		<input type="hidden" name="txtCID" value="<?php echo $_SESSION['CID']; ?>">
		<input type="hidden" name="txtCampID" value="<?php echo $CampID ?>">
		<input type="submit" name="btnapply" value="Apply">

 	</form>
 	</div>

 	</div>

 	<footer>
		<div id="google_translate_element"> 
		</div>
        <p>&copy; 2023 Your Website. All rights reserved. | Designed by Your Name</p>
    </footer>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElement">
		</script>
 
		<script>
 
			function googleTranslateElement()
			{
				new google.translate.TranslateElement({pageLanguage: 'en'}, 
					'google_translate_element');
 	
			}
	</script>

 	

 </body>
 </html>