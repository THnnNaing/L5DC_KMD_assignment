<?php 
session_start();
include('../dbconnect.php');

if (!isset($_SESSION['AID'])) {
	echo "<script>window.alert('Please login first')</script>";
		echo "<script>window.location='adminlogin.php'</script>";
}

if (isset($_POST['btnadd'])) {
	$txtname=$_POST['txtcampaigntitle'];
	$txtdes=$_POST['txtcampaigndescription'];
	$txtSdate=$_POST['txtSdate'];
	$txtEdate=$_POST['txtEdate'];
	$txtfees=$_POST['txtfees'];
	$txtaim=$_POST['txtaim'];
	$txttarget=$_POST['txttarget'];
	$txtvision=$_POST['txtvision'];
	$txtcbosocialmediaapp=$_POST['cbosocialmediaapp'];
	$txtcbocampaigntype=$_POST['cbocampaigntype'];
	$txtmap=$_POST['txtmap'];


	// image upload
	$img1=$_FILES['fileimg1']['name'];
	$folder="../Addimg/";
	$campaignimg1=$folder.uniqid()."_".$img1;
	$copy=copy($_FILES['fileimg1']['tmp_name'], $campaignimg1); //copy
	if (!$copy) {
		echo "<p>Cannot Upload Image 1</p>";
	}

	// image2 upload
	$img2=$_FILES['fileimg2']['name'];
	$folder="../Addimg/";
	$campaignimg2=$folder.uniqid()."_".$img2;
	$copy=copy($_FILES['fileimg2']['tmp_name'], $campaignimg2); //copy
	if (!$copy) {
		echo "<p>Cannot Upload Image 2</p>";
	}

	// image3 upload
	$img3=$_FILES['fileimg3']['name'];
	$folder="../Addimg/";
	$campaignimg3=$folder.uniqid()."_".$img3;
	$copy=copy($_FILES['fileimg3']['tmp_name'], $campaignimg3); //copy
	if (!$copy) {
		echo "<p>Cannot Upload Image 3</p>";
	}

	$checkcampaign="SELECT * FROM campaignstb WHERE CampaignTitle='$txtname'";
	$query=mysqli_query($db,$checkcampaign);
	$count=mysqli_num_rows($query);

	if ($count>0) {
			echo "<script>window.alert('Technique Name Already Exist')</script>";
			echo "<script>window.location='technique.php'</script>";
	}

	else{
		$insert="INSERT INTO campaignstb(CampaignTitle,CampaignStatus,CampaignDescription,SocialMediaID,CampaignImage1,	CampaignImage2,CampaignImage3,CampaignTypeID,StartDate,EndDate,Fees,Aim,Target,Vision,Map)
					VALUES('$txtname','Available','$txtdes','$txtcbosocialmediaapp','$campaignimg1','$campaignimg2','$campaignimg3','$txtcbocampaigntype','$txtSdate','$txtEdate','$txtfees','$txtaim','$txttarget','$txtvision','$txtmap')";
		$inserted=mysqli_query($db,$insert);

		if ($inserted) {
			echo "<script>window.alert('Technique Is Saved Successfully')</script>";
			echo "<script>window.location='campaign.php'</script>";
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
	<div class="registration-form dash campaignnav">
		<nav class="slide-nav ">
		
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
<div class="container-campaign">
	<div class="registration-form campaign">
		<form action="campaign.php" method="POST" enctype="multipart/form-data">
		<h2>Add Campaign Data</h2>
		<label>Campaign Title</label>
		<input class="campaign" type="text" name="txtcampaigntitle" placeholder="Enter Campaign Title" required>

		<label>Campaign Description</label>
		<input type="text" name="txtcampaigndescription" placeholder="Enter Campaign Description" required>

		<label>Campaign Image1</label>
		<input type="file" name="fileimg1"  required>

		<label>Campaign Image2</label>
		<input type="file" name="fileimg2" required>

		<label>Campaign Image3</label>
		<input type="file" name="fileimg3"  required>

		<label>StartDate</label>
		<input type="date" name="txtSdate" value="<?php echo date('Y-m-d') ?>" required/>

		<label>EndDate</label>
		<input type="date" name="txtEdate" value="<?php echo date('Y-m-d') ?>" required/>

		<label>Campaign Fees</label>
		<input type="text" name="txtfees" placeholder="Enter Campaign's Fess" required>

		<label>Campaign Aim</label>
		<input type="text" name="txtaim" placeholder="Enter Campaign's Aim" required>

		<label>Targeted Person :</label>
                <select class="form-input" type="text"  id="person" name="txttarget">
                    <option value="both">Both Parents and Teenagers</option>
                    <option value="parents">Parents</option>
                    <option value="teenagers">Children</option>
                    <option value="teenagers">Teenagers</option>
                </select><br/>
		<label>Campaign Vision</label>
		<textarea name="txtvision"></textarea>

		<label>Campaign Map</label>
		<input type="text" name="txtmap"  required>

		<label>Choose Social Media App</label>
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

 		<label>Choose Campaign Type </label>
 		<select name="cbocampaigntype">
 			<?php 
 				$select="SELECT * FROM campaigntypestb";
 				$query=mysqli_query($db, $select);
 				$count=mysqli_num_rows($query);

 				for ($i=0; $i <$count ; $i++) { 
 					$fetch=mysqli_fetch_array($query);
 					$CTID=$fetch['CampaignTypeID'];
 					$CTN=$fetch['CampaignTypeName'];

 					echo "<option value='$CTID'>$CTN</option>";
 				}
 			 ?>
 		</select>

 		<div class="submit">
 			<input type="submit" name="btnadd"	value="Add">
 		</div>

</form> 
	</div>
</div>


 </body>
 </html>