<?php 
session_start();
include('../dbconnect.php');

if (!isset($_SESSION['AID'])) {
	echo "<script>window.alert('Please login first')</script>";
		echo "<script>window.location='adminlogin.php'</script>";
}

if (isset($_POST['btnadd'])) {
	$Techname=$_POST['txttechniquename'];
	$TechDescription=$_POST['txttechniquedescription'];
	$Techsocialmediaapp=$_POST['cbosocialmediaapp'];


	// image upload
	$img1=$_FILES['fileimg1']['name'];
	$folder="Addimg/";
	$techniqueimg1=$folder.uniqid()."_".$img1;
	$copy=copy($_FILES['fileimg1']['tmp_name'], $techniqueimg1); //copy
	if (!$copy) {
		echo "<p>Cannot Upload</p>";
	}

	// image2 upload
	$img2=$_FILES['fileimg2']['name'];
	$folder="Addimg/";
	$techniqueimg2=$folder.uniqid()."_".$img2;
	$copy=copy($_FILES['fileimg2']['tmp_name'], $techniqueimg2); //copy
	if (!$copy) {
		echo "<p>Cannot Upload</p>";
	}

	$checktechnique="SELECT * FROM techniquestb WHERE TechniqueName='$Techname'";
	$query=mysqli_query($db,$checktechnique);
	$count=mysqli_num_rows($query);

	if ($count>0) {
			echo "<script>window.alert('Technique Name Already Exist')</script>";
			echo "<script>window.location='technique.php'</script>";
	}
	else{
		$insert="INSERT INTO techniquestb(TechniqueName,TechniqueStatus,TechniqueDescription,SocialMediaID,TechniqueImage1,TechniqueImage2)
				VALUES('$Techname','Latest','$TechDescription','$Techsocialmediaapp','$techniqueimg1','$techniqueimg2')";

		$inserted=mysqli_query($db,$insert);

		if ($inserted) {
			echo "<script>window.alert('Technique Is Saved Successfully')</script>";
			echo "<script>window.location='technique.php'</script>";
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
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>
<body>
<div class="registration-form dash">
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
			<li><a href="#">
				<i class="fas fa-solid fa-right-from-bracket"></i>
				<span class="nav-item">Log Out</span>
				</a>
			</li>
			
		</nav>
	</div>
<div class="container ">
	<div class="registration-form campaign">
		<form action="technique.php" method="POST" enctype="multipart/form-data"> 
		<h2 class="techniqueheader">Add Technique Data</h2>
		<label>Technique Name</label>
		<input type="text" name="txttechniquename" placeholder="Enter Technique Name" required/><br>

		<label>Technique Description</label>
		<textarea name="txttechniquedescription"></textarea>

		<label>Technique Image 1</label>
		<input type="file" name="fileimg1" required/>

		<label>Technique Image 2</label>
		<input type="file" name="fileimg2" required/>

		<label>Choose Social Media App</label><br>
 		<select name="cbosocialmediaapp">
 			<?php 
 				$select="SELECT * FROM socialmediaappstb";
 				$query=mysqli_query($db, $select);
 				$count=mysqli_num_rows($query);

 				for ($i=0; $i <$count ; $i++) { 
 					$fetch=mysqli_fetch_array($query);
 					$SMID=$fetch['SocialMediaID'];
 					$SMN=$fetch['SocialMediaName'];

 					echo "<option value='$SMID'>$SMN</option>";
 				}
 			 ?>
 		</select>

 		<input type="submit" name="btnadd" value="Add"/>
																										
	</form>
	</div>
</div>

</body>
</html>