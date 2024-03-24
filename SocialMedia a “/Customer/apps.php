<?php 

session_start();
include('../dbconnect.php');

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

 
 	<form class="app" action="apps.php" method="POST">
 		<div class="app-container">
 			<input type="text" name="txtsearchdata" placeholder="Search">
 		<input type="submit" name="btnsearch" value="btnsearch">
 		
 		<?php 
 			if (isset($_POST['btnsearch'])) {
 				$technique=$_POST['txtsearchdata'];
 				$query="SELECT * FROM techniquestb WHERE TechniqueStatus='Latest' AND TechniqueName LIKE '%$technique%'";

 				$result=mysqli_query($db, $query);
				$count=mysqli_num_rows($result);

 				if ($count>0) {
 					echo "<table>";
 					for ($i=0; $i < $count; $i+=5) { 
 						$query1="SELECT * FROM techniquestb WHERE TechniqueStatus='Latest' 
 									AND TechniqueName LIKE '%$technique%' LIMIT $i,5";
 						$result1=mysqli_query($db, $query1);
 						$count1=mysqli_num_rows($result1);
 						echo "<tr>";
 						for ($j=0; $j < $count1; $j++) { 
 							$data=mysqli_fetch_array($result1);
 							$name=$data['TechniqueName'];
 							$img1=$data['TechniqueImage1'];
 							$img2=$data['TechniqueImage2'];
 							$des=$data['TechniqueDescription'];
 						?>
 						<td>
 							<img src="<?php echo $img1; ?>">
 							<img src="<?php echo $img2; ?>">
 							<b>TechniqueName:<?php echo $name; ?></b>
 							<b>TipForTechnique:<?php echo $des; ?></b>
 						</td>

 						<?php  
 						}
 							echo "</tr>";
 					}
 						echo "</table>";
 				}
 				else{
 					echo "<h1>Data Not Found</h1>";
 				}
 			}
 		 ?>

 		</div>
 		
 	</form>
<footer class="app__footer">
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