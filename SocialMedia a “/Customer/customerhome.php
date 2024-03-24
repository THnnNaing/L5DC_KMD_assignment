<?php 
session_start();
include('../dbconnect.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="customerstyle.css">

</head>
<body>
	
	<!-- ========= HEADER ========== -->
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
	<section class="home">	
		<div class="content">
			<h2>Welcome to Our Page</h2>
			<div class="home-content">
				<fieldset class="para">
					<legend>Teenagers' brain and Social Media</legend>
					<ul>How Teen Brain Work</ul>
					<p>The brain of teens are developing so it will need to care lot both mentally and physically.</p>
					<ul>Social Media Usage</ul>
					<p>Social Medias have too many side effect but the teenagers should use it for their own good.</p>
					<ul>How to Stay Safe</ul>
					<p>Since everyone is using medias, teens should know some information and knowledge to avoid their side effects.</p>
					<ul>What are included in Our Website</ul>
					<p>Tips about staying safe while using Social Media.</p>
					<p>Campaign about staying safe online for teenagers and their parents.</p>
					<p>Things that parents can do to help their children safe using media.</p>
				</fieldset>
				<p class="content-text">
				Welcome to our online hub, where we prioritize the well-being of today's teenagers in the ever-evolving landscape of social media. As adolescents navigate the digital realm, we recognize the paramount importance of fostering a safe online environment. Here, you'll find essential safety tips tailored for teenagers, empowering them to make informed choices and navigate social media responsibly. Join us in our commitment to raising awareness through impactful campaigns, dedicated to ensuring that every teenager can enjoy the benefits of social media while staying vigilant and secure. Together, let's build a digital community where safety, education, and empowerment take center stage. <a href="contactus.php">Our Policies</a>
				</p>
				<div class="content-img">
					<img src="../Images/apps.jpg">
				</div>	
			</div>
		</div>
		
	</section>

	<section class="card-section">
		<h2>Famous Social Media</h2>
		<div class="card-p">
			<p class="content">
				Social media has transformed the way we connect, share, and communicate in today's interconnected world. Platforms like Facebook, Instagram, Twitter, and Snapchat provide a dynamic space for individuals to express themselves, stay updated on current events, and build virtual communities. From fostering global conversations to bridging gaps between cultures, social media continues to shape our social landscape. However, it's essential to approach these platforms with mindfulness, understanding the impact they can have on our well-being. At the intersection of connectivity and responsibility, navigating social media with awareness ensures a positive digital experience for all.
			</p>
		</div>
		<div class="card-div">
			<div class="card">
						<div class="imgBx Facebook">
		            	<img src="../Images/Facebook.png" alt="">
		        		</div>
		        	<div class="content">
		            	<div class="detail">
		                	<span>One of the top most pouplar social media app</span>
		                
		                	<div class="data">
		                    	<h3>3B<br><span>User</span></h3>
		                    	<h3>Very High<br><span>Popularity</span></h3>
		                    	<h3>Very High<br><span>Security</span></h3>
		                	</div>
		            	</div>

		        	</div>
		      </div>
				
			<div class="card">
					<div class="imgBx twitter">
		            	<img src="../Images/twitter.jpg" alt="">
		        	</div>
		        	<div class="content">
		            	<div class="detail">
		                	<span>One of the top most pouplar social media app</span>
		                
		                	<div class="data">
		                    	<h3>380M<br><span>User</span></h3>
		                    	<h3>Very High<br><span>Popularity</span></h3>
		                    	<h3>Very High<br><span>Security</span></h3>
		                	</div>
		                	
		            	</div>
		        	</div>
			</div>
				
			<div class="card">
					<div class="imgBx instagram">
		            	<img src="../Images/instagram.png" alt="">
		        	</div>
		        	<div class="content">
		            	<div class="detail">
		                	<span>One of the top most pouplar social media app</span>
		                
		                	<div class="data">
		                    	<h3>2.5B<br><span>User</span></h3>
		                    	<h3>120k<br><span>Popularity</span></h3>
		                    	<h3>285<br><span>Security</span></h3>
		                	</div>
		                	
		            	</div>
		        	</div>
			</div>
		</div>
		
	</section>

	<section class="short-text">
		<h2>How to Stay Safe Online</h2>
		<div class="home-content">
				<p class="content-text">
					In today's interconnected world, prioritizing online safety is vital. Protect yourself with strong, unique passwords and enable two-factor authentication. Avoid oversharing on social media, update software regularly, and be cautious of phishing attempts. Educate yourself about online scams, stay vigilant against unsolicited messages, and consider using a VPN for enhanced privacy. These practices reduce the risk of online threats, ensuring a safer digital experience.
				</p>
				<div class="content-img">
					<img src="../Images/3dsecurtiy2.jpg">
				</div>
		</div>
		<div class="home-content ">
				<div class="content-img">
					<img src="../Images/campaign.jpg">
				</div>
				<p class="content-text right">
				Promoting a safety tips campaign is crucial for building a secure and informed community. Emphasize key measures, such as creating strong passwords and using two-factor authentication for online accounts. Stress the importance of cautious information sharing on social media and advocate for regular software updates to prevent vulnerabilities. The campaign also aims to raise awareness about common online scams, empowering individuals to recognize and avoid threats. Overall, it's a collective effort to foster a resilient digital environment and promote online vigilance and responsible behavior.
				</p>
		</div>
		<div class="home-content">
				<p class="content-text">
				Cybersecurity is the practice of safeguarding digital systems, networks, and data from potential threats and unauthorized access. It involves implementing measures such as robust password management, encryption, and firewalls to protect against cyberattacks. By prioritizing cybersecurity, individuals and organizations can mitigate the risk of data breaches, identity theft, and other malicious activities. Staying informed about the latest security threats and adopting proactive measures helps create a resilient defense against the evolving landscape of cyber threats.
				</p>
				<div class="content-img">
					<img src="../Images/cybersecurity.jpg">
				</div>
		</div>
	</section>

	<!-- Registered Customer Htoke pya yan -->
	<h2 class="home-card-h2">Campaign Information</h2> 
	<section class="catalog home-cata">
		
 		<div>
 			<?php 

 			$query="SELECT * FROM customertb";
 			$ret=mysqli_query($db,$query);
 			$count=mysqli_num_rows($ret);

 				for ($i=0; $i < $count ; $i+=4) { //row
 			
 					$query1= "SELECT * FROM customertb
 				 	ORDER By CustomerID LIMIT $i,4";
 				 	$ret1=mysqli_query($db,$query1);
 				 	$count1=mysqli_num_rows($ret1);

 					echo "<div class='column'>";

 					for ($j=0; $j <$count1 ; $j++) //column
 					{

 						$data=mysqli_fetch_array($ret1);
 						$FN=$data['CustomerFirstName'];
 						$LN=$data['CustomerLastName'];
 						$age=$data['Age'];
 						$RM=$data['RegisterMonth'];
 						$CI=$data['CustomerImage'];
 						echo "</div>";
 					?>

 						<div class="home-customer">
 							<div class="home-img">
 								<img src="<?php echo $CI ?>"><br>
 								<label>Customer Image</label>
 							</div>
 											
 							<div class="home-desc">	
 								Campaign FirstName: <b><?php echo $FN; ?></b><br>
 								Campaign LastName: <b><?php echo $LN; ?></b><br>
 								Age: <b> <?php echo $age; ?></b><br>
 								RegisterMonth: <b> <?php echo $RM; ?></b><br>
 							</div>
 						</div>


 						<?php
 					}
 				// echo "</div>";
 				}

 		 	?>
 		</div>
 	</section>


	<footer>
		<div id="google_translate_element"> 
		</div>
        <p>&copy; 2023 Your Website. All rights reserved. | Designed by Thi Han Naing</p>
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-square-x-twitter"></i>
        <i class="fa-brands fa-linkedin"></i>
        <i class="fa-brands fa-instagram"></i>
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



    <!-- ======== MAIN JS ========== -->
    <script src="main.js"></script>

</body>
</html>