<?php 
session_start();
include('../dbconnect.php');

if (!isset($_SESSION['AID'])) {
	echo "<script>window.alert('Please login first')</script>";
		echo "<script>window.location='adminlogin.php'</script>";
}

$AdminName=$_SESSION['AN'];

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

<!-- listing htoke yan shi ti -->



<div class="registration-form dash">
	<h1>Social Media Campaign Management Forms</h1><br>
		<nav class="slide-nav">
		
				<a href="AdminDashboard.php" class="logo">
				<img src="../Images/logo.png">
				<span class="nav-item">Campaign Info</span>
				</a>
		
			<li><a href="campaigntype.php">
				<i class="fas fa-solid fa-bullhorn"></i>
				<span class="nav-item">Add CampaignType</span>
				</a>
			</li>
			<li><a href="SocialMediaApp.php">
				<i class="fas fa-solid fa-globe"></i>
				<span class="nav-item">Add MediaApp</span>
				</a>
			</li>
			<li><a href="technique.php">
				<i class="fas fa-solid fa-lightbulb"></i>
				<span class="nav-item">Add Technique</span>
				</a>
			</li>
			<li><a href="campaign.php">
				<i class="fas fa-solid fa-ribbon"></i>
				<span class="nav-item">Add Campaign</span>
				</a>
			</li>
			<li><a href="listing.php">
				<i class="fas fa-solid fa-list"></i>
				<span class="nav-item">Social Media Campaign List</span>
				</a>
			</li>
			<li><a href="logout.php">
				<i class="fas fa-solid fa-right-from-bracket"></i>
				<span class="nav-item">Log Out</span>
				</a>
			</li>
			
		</nav>

		<div class="content">
			<div class="detail">
				<h1>Hello Admin &nbsp;<?php echo $AdminName;?> </h1>
				<h1>Admin Profile</h1>
				<label>Admin Name</label>
				<input type="text" name="" value="<?php echo "$AdminName"; ?>" readonly>
			</div>
		</div>

		<div class="picture">
			<img src="../Images/dash.jpg">
			<img src="../Images/dash2.jpg">
		</div>
			
</div>
	
</body>
</html>
