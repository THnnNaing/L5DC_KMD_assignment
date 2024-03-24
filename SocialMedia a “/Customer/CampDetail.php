<?php 

session_start();
include('../dbconnect.php');


if (isset($_GET['CID'])) 
{
	$CampID=$_GET['CID'];

	$query="SELECT * FROM campaignstb c, campaigntypestb ct, socialmediaappstb m 
	WHERE c.CampaignTypeID=ct.CampaignTypeID
	AND c.SocialMediaID=m.SocialMediaID
	AND c.CampaignID='$CampID'";

	$result=mysqli_query($db,$query);
	$data=mysqli_fetch_array($result);

	$CID=$data['CampaignID'];
	$Cname=$data['CampaignTitle'];
	$CTID=$data['CampaignTypeID'];
	$appid=$data['SocialMediaID'];
	$cimg1=$data['CampaignImage1'];
	$cimg2=$data['CampaignImage2'];
	$cimg3=$data['CampaignImage3'];
	$vision=$data['Vision'];
	$aim=$data['Aim'];
	$des=$data['CampaignDescription'];
	$Sdate=$data['StartDate'];
	$Edate=$data['EndDate'];
	$fees=$data['Fees'];
	$map=$data['Map'];
	$status=$data['CampaignStatus'];
	$ctname=$data['CampaignTypeName'];
	$mname=$data['SocialMediaName'];
	$mlink=$data['SocialMediaLink'];
	$mrate=$data['SocialMediaRating'];
	$mlogo=$data['SocialMediaImage'];

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
<form action="CampDetail.php" method="GET">
	
	<fieldset class="field_set">
	
		<div class="field_set_img">
			<legend>Campaign Details For <?php echo $Cname; ?></legend>
			<img src="<?php echo $cimg1; ?>" >

			<h2>Details Images</h2>
			<img src="<?php echo $cimg2; ?>">
			<img src="<?php echo $cimg3; ?>">
		</div>

		<div class="media-info-card">
			<div class="img-media-info">
				<h2>Social Media Info</h2>
				<img src="<?php echo $mlogo; ?>"><br>
				<p>MediaAddress: <?php echo $mlink; ?></p>
				<p>Rating:<i class='fa-solid fa-star'><?php echo $mrate; ?></i> </p>
			</div>

			<div class="media-desc-info">
				<h2>Campaign Description</h2><br>
				<p>CampaignName: <?php echo $Cname; ?></p>
				<p>CampaignFees: <?php echo $fees; ?></p>
				<p>Aim: <?php echo $aim; ?></p>
				<p>Vision: <?php echo $vision; ?></p>
				<a href="member.php?CampID=<?php echo $CID;  ?>">ApplyNow</a>
			</div>	
		</div>




		<h2>Campaign Location Map</h2>

		<iframe src="<?php echo $map; ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">	
		</iframe>

	</fieldset>
</form>
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