<?php 
session_start();
include('../dbconnect.php');

if (!isset($_SESSION['CID'])) {
	echo "<script>window.alert('Login First')</script>";
		echo "<script>window.location='customerlogin.php'</script>";
}

if (isset($_POST['btncontact'])) {
	$date=$_POST['contactusDate'];
	$subject=$_POST['txtsubject'];
	$msg=$_POST['txtmessage'];
	$cid=$_POST['txtCID'];

	echo $insert="INSERT INTO contactustb(ContactDate,Subject,ContactMessage,CustomerID,Status)
				VALUES ('$date','$subject','$msg','$cid','Sent')";
	$query=mysqli_query($db,$insert);

	if ($query) {
		echo "<script>window.alert('Contact Reached Successfully')</script>";
			echo "<script>window.location='contactus.php'</script>";
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
 	<section class="contactus-section">
 		<form class="contactus-form" action="contactus.php" method="POST">
 		<div class="container">
 			<h2>Contact Us</h2>
 		<label>Contact Date</label>
 		<input type="date" name="contactusDate" value="<?php echo date('Y-m-d') ?>"><br>

 		<label>Contact Subject</label>
 		<input type="text" name="txtsubject" placeholder="Enter Title of your meesage" ><br>

 		<label>Contact Message:</label><br>
 		<textarea name="txtmessage"></textarea><br>

 		<input type="checkbox" name="chkprivacy" required>
 		<a href="policy.php">Do You accpet Social media campaing Privacy</a>

 		<input type="hidden" name="txtCID" value="<?php echo$_SESSION['CID']; ?>"><br>

 		<input type="submit" name="btncontact" value="contact">
 		</div>

 	<fieldset>
	<legend>Contacts</legend>
 
	<table border="1px" cellpadding="10px">
 
		<tr>
		<th>ContactusID</th>
		<th>ContactDate</th>
		<th>Subject</th>
		<th>ContactMessage</th>
		<th>CustomerID</th>
		<th>Status</th>
		</tr>
 
		<?php
 
		$socialmediaappselect="SELECT * FROM contactustb";
		$result=mysqli_query($db,$socialmediaappselect);
		$count=mysqli_num_rows($result);
 
		for ($i=0; $i <$count; $i++) 
		{ 
			$array=mysqli_fetch_array($result);
			$CUID=$array['ContactusID'];
			$CD=$array['ContactDate'];
			$Sub=$array['Subject'];
			$CM=$array['ContactMessage'];
			$CID=$array['CustomerID'];
			$Sat=$array['Status'];
 
			echo "<tr>";
 
			echo "<td>$CUID</td>";
			echo "<td>$CD</td>";
			echo "<td>$Sub</td>";
			echo "<td>$CID</td>";
			echo "<td>$Sat</td>";

			echo "<td><i class='fa-regular fa-star'></i>$CM</td>";

 
			echo "<td>
			<a href='socialmediaUpdate.php?SMID=$CUID'>Edit</a>|
			<a href='socialmediaDelete.php?SMID=$CUID'>Delete</a>
 
			</td>";

			echo "</tr>";		
		}
		 ?> 
	</table>
 	</form>

 	
 	</section>
	<section>
		<h2>Terms And Policies</h2>
		<div>
			<h3>Terms of Service</h3>
			<p>By accessing or using [SMC] ("the Site"), you agree to comply with and be bound by these Terms of Service.</p>
			<p>You must be at least 18 years old to use the Site. By using the Site, you affirm that you are over 18 years of age.</p>
			<p>Users agree not to upload, share, or transmit any content that violates the law, infringes on intellectual property rights, or is otherwise inappropriate.</p>
			<h3>Person</h3>
			<p>If you create an account on the Site, you are responsible for maintaining the confidentiality of your account credentials and agree to accept responsibility for all activities that occur under your account.</p>
			<p>All content and materials on the Site, unless otherwise stated, are the property of Social Media Campaign and are protected by copyright, trademark, and other intellectual property laws.</p>
			<h3>Laws and restrictions</h3>
			<p>All content and materials on the Site, unless otherwise stated, are the property of Social Media Campaign and are protected by copyright, trademark, and other intellectual property laws.</p>
			<p>Users are granted a limited, non-exclusive, and revocable license to access and use the Site for personal, non-commercial purposes.</p>
			<p>These terms are governed by the laws of Policies from website.Any disputes arising from or in connection with these terms shall be resolved through arbitration in accordance with the rules of the [Arbitration Organization].</p>
			<p>We reserve the right to modify these terms and policies at any time. Changes will be effective immediately upon posting on the Site.This template is a starting point, and you should customize it to fit the specific features and requirements of your website. Always seek legal advice to ensure compliance with local laws and regulations.</p>
			<h3>Other Policies</h3>
			<p>All content and materials on the Site, unless otherwise stated, are the property of Social Media Campaign and are protected by copyright, trademark, and other intellectual property laws.</p>
			<p>Users are granted a limited, non-exclusive, and revocable license to access and use the Site for personal, non-commercial purposes.</p>
			<p>The Site may contain links to third-party websites. We are not responsible for the content or privacy practices of these third-party sites</p>
			<p>The Site may use cookies and similar technologies to enhance user experience. By using the Site, you consent to the use of cookies in accordance with our Cookie Policy.</p>
		</div>
	</section>
 
</fieldset>
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