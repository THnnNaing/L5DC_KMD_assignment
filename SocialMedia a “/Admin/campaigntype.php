<?php 
session_start();
include('../dbconnect.php');

if (!isset($_SESSION['AID'])) {
	echo "<script>window.alert('Cannot Get the Direct Access! Login First')</script>";
	echo "<script>window.location='adminlogin.php'</script>";
}

if (isset($_POST['btnadd'])) {
	$CTname=$_POST['txtcampaigntypename'];
	$CTDes=$_POST['txtcampaigntypedes'];

	$check="SELECT * FROM campaigntypestb WHERE CampaignTypeName='$CTname'";
	$sql=mysqli_query($db,$check);
	$count=mysqli_num_rows($sql);

	if ($count>0) {
		echo "<script>window.alert('Campaign Type is Already Exist')</script>";
		echo "<script>window.location='campaigntype.php'</script>";
	}
	else{
		$insert="INSERT INTO campaigntypestb(CampaignTypeName,CampaignTypeDescription)
				VALUES('$CTname','$CTDes')";

		$inserted=mysqli_query($db,$insert);

		if ($inserted) {
		echo "<script>window.alert('Added Campaign Type')</script>";
		echo "<script>window.location='campaigntype.php'</script>";
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
<div class="container-campaigntype ">
	<div class="registration-form campaigntype ">
	<form  action="campaigntype.php" method="POST">	
		<h2>Add Campaign Type Informations</h2>

		<label>Campaign Type:</label>
		<input type="text" name="txtcampaigntypename" placeholder="Enter Campaign Type" required><br>
	
		<label>Campaign Type Description:</label>
		<input type="text" name="txtcampaigntypedes" placeholder="Enter Campaign Type Description" required><br>
		<input type="submit" name="btnadd"	value="Add">
	
	</form>
	
	


	<!-- Listing -->
	<!-- <fieldset class="cmptype">
		<legend>Campaign Type Listing</legend>
		<table border="1px">
			<tr class="">
				<th>Campaign Type ID</th>
				<th>Campaign Type Name</th>
				<th>Campaign Type  Description</th>
				<th>Action</th>
			</tr>
			<?php 
			$campaigntypeselect="SELECT * FROM campaigntypestb";
			$result=mysqli_query($db,$campaigntypeselect);
			$count=mysqli_num_rows($result);

			for ($i=0; $i < $count; $i++) { 
				$array=mysqli_fetch_array($result);		
				$CTID=$array['CampaignTypeID'];
				$CTname=$array['CampaignTypeName'];
				$CTDes=$array['CampaignTypeDescription'];

				echo "<tr>";

				echo "<td>$CTID</td>";
				echo "<td>$CTname</td>";
				echo "<td>$CTDes</td>";

				echo "<td>
				<a href='CampaignTypeupdate.php?CTID=$CTID'>Edit</a>|
				<a href='CampaignTypeDelete.php?CTID=$CTID'>Delete<a/>
				</td>";

				echo "</tr>";
			}
			 ?>
		</table>
	</fieldset> -->
</div>
</div>

</body>
</html>