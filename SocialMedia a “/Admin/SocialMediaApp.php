<?php 
session_start();
include('../dbconnect.php');

if (!isset($_SESSION['AID'])) {
	echo "<script>window.alert('Please login first')</script>";
		echo "<script>window.location='adminlogin.php'</script>";
}

if (isset($_POST['btnsave'])) {
	$name=$_POST['txtname'];
	$des=$_POST['txtdes'];
	$link=$_POST['txtlink'];
	$rating=$_POST['txtrating'];
	$review=$_POST['txtreview'];
	

	//media image upload//
	$img1=$_FILES['fileimg']['name'];
	$folder="Addimg/";
	$mediafile=$folder.uniqid()."_".$img1;
	$copy=copy($_FILES['fileimg']['tmp_name'], $mediafile); 
	//copy
	if (!$copy) {
		echo "<p>Cannot Upload</p>";
	}

	$checkmedia="SELECT * FROM socialmediaappstb WHERE SocialMediaName='$name'";
	$query=mysqli_query($db,$checkmedia);
	$count=mysqli_num_rows($query);

	if ($count>0) {
		echo "<script>window.alert('Social Media App Is Already Existed')</script>";
		echo "<script>window.location='SocialMediaApp.php'</script>";
	}

	else{
		$insert="INSERT INTO socialmediaappstb (SocialMediaName,SocialMediaDescription,SocialMediaLink,SocialMediaRating,SocialMediaReview,SocialMediaImage)
					VALUES ('$name','$des','$link','$rating','$review','$mediafile')";
		$query=mysqli_query($db, $insert);

			if ($query) {
				echo "<script>window.alert('Upload Successful')</script>";
				echo "<script>window.location='SocialMediaApp.php'</script>";
			}
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Social Media App</title>
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
	<div class="container-socialmediaapp">
		<div class="registration-form socialmediaapp">
			<form action="SocialMediaApp.php" method="POST" enctype="multipart/form-data">
		<h2>Social Media App Uploading</h2>
		
		<label>Social Media App Name</label>
		<input type="text" name="txtname" placeholder="Enter Social Media App" required><br>

		<label>Social Media Description</label>
		<input type="text" name="txtdes" placeholder="Enter Social Media App Description" required><br>

		<label>Social Media Link</label>
		<input type="text" name="txtlink" placeholder="Enter Social Media App Link" required><br>

		<label>Social Media Rating</label>
		<input type="number" name="txtrating" placeholder="Enter Social Media App Rating" required><br>

		<label>Social Media Review</label>
		<input type="text" name="txtreview" placeholder="Enter Social Media App Review" required><br>

		<label>Social Media Image</label>
		<input type="file" name="fileimg" placeholder="Enter Social Media App Image" required><br>

		<div class="rating">
			<input type="radio" name="ratings" value="5" id="star5">
			<label for="star5"></label>

			<input type="radio" name="ratings" value="4" id="star4">
			<label for="star4"></label>

			<input type="radio" name="ratings" value="3" id="star3">
			<label for="star3"></label>

			<input type="radio" name="ratings" value="2" id="star2">
			<label for="star2"></label>

			<input type="radio" name="ratings" value="1" id="star1">
			<label for="star1"></label>
		</div>

		<input type="submit" id="submit" name="btnsave" value="Save">

		<!-- <table border="1px">
			<tr class="">
				<th>SocialMediaID</th>
				<th>SocialMediaName</th>
				<th>SocialMediaDescription</th>
				<th>SocialMediaLink</th>
				<th>SocialMediaRating</th>
				<th>SocialMediaReview</th>
				<th>SocialMediaImage</th>
				<th>Change Info</th>
			</tr>
		<?php 
			$checkmedia="SELECT * FROM socialmediaappstb";
			$result=mysqli_query($db,$checkmedia);
			$count=mysqli_num_rows($result);

			for ($i=0; $i < $count; $i++) { 
				$array=mysqli_fetch_array($result);		
				$SMID=$array['SocialMediaID'];
				$SMN=$array['SocialMediaName'];
				$SMdes=$array['SocialMediaDescription'];
				$SMlink=$array['SocialMediaLink']; 
				$SMrating=$array['SocialMediaRating']; 
				$SMreview=$array['SocialMediaReview']; 
				$SMimg=$array['SocialMediaImage']; 




				echo "<tr>";

				echo "<td>$SMID</td>";
				echo "<td>$SMN</td>";
				echo "<td>$SMdes</td>";
				echo "<td>$SMlink</td>";
				echo "<td>$SMrating</td>";
				echo "<td>$SMreview</td>";
				echo "<td>$SMimg</td>";



				echo "<td>
				<a href='hotelupdate.php?SMID=$SMID'>Edit</a>/
				<a href='hoteldelete.php?SMID=$SMID'>Delete<a/>
				</td>";

				echo "</tr>";
			}
			 ?>
			</table> -->


	</form>
		</div>
	</div>
</body>
</html>
