<?php 
session_start();
include('../dbconnect.php');

if (!isset($_SESSION['AID'])) {
	echo "<script>window.alert('Please login first')</script>";
		echo "<script>window.location='adminlogin.php'</script>";
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Listing</title>
 	<link rel="stylesheet" type="" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
 </head>
 <body>
 
 <!-- Campaign Type Listing -->
<fieldset>
		<legend>Campaign Type Listing</legend>
		<table border="1px">
			<tr class="">
				<th>Campaign Type ID</th>
				<th>Campaign Type Name</th>
				<th>Campaign Type Description</th>
				<th>Action</th>
			</tr>
			<?php 
			$campaigntypeselect="SELECT * FROM campaigntypestb";
			$result=mysqli_query($db,$campaigntypeselect);
			$count=mysqli_num_rows($result);

			for ($i=0; $i < $count; $i++) { 
				$array=mysqli_fetch_array($result);		
				$CTID=$array['CampaignTypeID']; 
				$CTN=$array['CampaignTypeName'];
				$CTdes=$array['CampaignTypeDescription'];

				echo "<tr>";

				echo "<td>$CTID</td>";
				echo "<td>$CTN</td>";
				echo "<td>$CTdes</td>";

				echo "<td>
				<a href='CamapignTypeupdate.php?CTID=$CTID'>Edit</a>|
				<a href='CamapignTypedelete.php?CTID=$CTID'>Delete<a/>
				</td>";

				echo "</tr>";
			}
			 ?>
		</table>
</fieldset>

<!-- Media App Lisiting -->
<fieldset>
	<legend>MediaApp Type Listing</legend>
 
	<table border="1px" cellpadding="10px">
 
		<tr>
		<th>MediaID</th>
		<th>MediaImage</th>
		<th>MediaName</th>
		<th>MediaLink</th>
		<th>Rating</th>
		<th>Action</th>
		</tr>
 
		<?php
 
		$socialmediaappselect="SELECT * FROM socialmediaappstb";
		$result=mysqli_query($db,$socialmediaappselect);
		$count=mysqli_num_rows($result);
 
		for ($i=0; $i <$count; $i++) 
		{ 
			$array=mysqli_fetch_array($result);
			$SMID=$array['SocialMediaID'];
			$SMName=$array['SocialMediaName'];
			$SMlink=$array['SocialMediaLink'];
			$SMrating=$array['SocialMediaRating'];
			$SMreview=$array['SocialMediaReview'];
			$SMimg=$array['SocialMediaImage'];
 
			echo "<tr>";
 
			echo "<td>$SMID</td>";
			echo "<td><img src='$SMimg' width='50px'></td>";
			echo "<td>$SMName</td>";
			echo "<td>$SMlink</td>";
	
			echo "<td><i class='fa-regular fa-star' style='color: #ffc21a;'></i>$SMreview</td>";

 
			echo "<td>
			<a href='socialmediaUpdate.php?SMID=$SMID'>Edit</a>|
			<a href='socialmediaDelete.php?SMID=$SMID'>Delete</a>
 
			</td>";

			echo "</tr>";		
		}
		 ?> 
	</table>
 
</fieldset>

<!-- Technique Listing -->
<fieldset>
	<legend>Technique Listing</legend>
 
	<table border="1px" cellpadding="10px">
 
		<tr>
		<th>TechniqueID</th>
		<th>TechniqueName</th>
		<th>TechniqueStatus</th>
		<th>TechniqueDescription</th>
		<th>SocialMediaName</th>
		<th>TechniqueImage1</th>
		<th>TechniqueImage2</th>
		<th>ChangeData</th>

		</tr>
 
		<?php
 
		$techniqueselect="SELECT * FROM techniquestb t, socialmediaappstb sm WHERE t.SocialMediaID=sm.SocialMediaID";
		$result=mysqli_query($db,$techniqueselect);
		$count=mysqli_num_rows($result);
 
		for ($i=0; $i <$count; $i++) 
		{ 
			$array=mysqli_fetch_array($result);
			$TID=$array['TechniqueID'];
			$TName=$array['TechniqueName'];
			$Tstatus=$array['TechniqueStatus'];
			$Tdes=$array['TechniqueDescription'];
			$TSMname=$array['SocialMediaName'];
			$Timg1=$array['TechniqueImage1'];
			$Timg2=$array['TechniqueImage2'];

 
			echo "<tr>";
 
			echo "<td>$TID</td>";
			echo "<td>$TName</td>";
			echo "<td>$Tstatus</td>";
			echo "<td>$Tdes</td>";
			echo "<td>$TSMname</td>";
			echo "<td><img src='$Timg1' width='50px'></td>";
			echo "<td><img src='$Timg2' width='50px'></td>";
 
			echo "<td>
			<a href='TechniqueUpdate.php?TID=$TID'>Edit</a>|
			<a href='TechniqueDelete.php?TID=$TID'>Delete</a>
 
			</td>";

			echo "</tr>";		
		}
		 ?> 
	</table>
 
</fieldset>

<fieldset>
	<legend>Technique Listing</legend>
 
	<table border="1px" cellpadding="10px">
 
		<tr>

		<th>CampaignID</th>
		<th>CampaignTitle</th>
		<th>CampaignStatus</th>
		<th>CampaignDescription</th>
		<th>SocialMediaName</th>
		<th>CampaignImage1</th>
		<th>CampaignImage2</th>
		<th>CampaignImage3</th>
		<th>CampaignTypeName</th>
		<th>txtSdate</th>
		<th>txtEdate</th>
		<th>txtfees</th>
		<th>txtaim</th>
		<th>txttarget</th>
		<th>txtvision</th>
		<th>txtmap</th>
		<th>ChangeData</th>

		</tr>
 
		<?php
 
		$campaignselect="SELECT * FROM campaignstb c, campaigntypestb ct, socialmediaappstb sm WHERE 
							c.CampaignTypeID=ct.CampaignTypeID AND 
								c.SocialMediaID=sm.SocialMediaID ";
		$result=mysqli_query($db,$campaignselect);
		$count=mysqli_num_rows($result);
 
		for ($i=0; $i <$count; $i++) 
		{ 

			
			$array=mysqli_fetch_array($result);
			$CID=$array['CampaignID'];
			$txtname=$array['CampaignTitle'];
			$Tstatus=$array['CampaignStatus'];
			$txtdes=$array['CampaignDescription'];
			$CSMname=$array['SocialMediaName'];
			$fileimg1=$array['CampaignImage1'];
			$fileimg2=$array['CampaignImage2'];
			$fileimg3=$array['CampaignImage3'];
			$Cctname=$array['CampaignTypeName'];
			$txtSdate=$array['StartDate'];
			$txtEdate=$array['EndDate'];
			$txtfees=$array['Fees'];
			$txtaim=$array['Aim'];
			$txttarget=$array['Target'];
			$txtvision=$array['Vision'];
			$txtmap=$array['Map'];


			echo "<tr>";
 
			echo "<td>$CID</td>";
			echo "<td>$txtname</td>";
			echo "<td>$Tstatus</td>";
			echo "<td>$txtdes</td>";
			echo "<td>$CSMname</td>";
			echo "<td><img src='$fileimg1' width='50px'></td>";
			echo "<td><img src='$fileimg2' width='50px'></td>";
			echo "<td><img src='$fileimg3' width='50px'></td>";
			echo "<td>$Cctname</td>";
			echo "<td>$txtSdate</td>";
			echo "<td>$txtEdate</td>";
			echo "<td>$txtfees</td>";
			echo "<td>$txtaim</td>";
			echo "<td>$txttarget</td>";
			echo "<td>$txtvision</td>";
			echo "<td>$txtmap</td>";
			

 
			echo "<td>
			<a href='CampaignUpdate.php?CID=$CID'>Edit</a>|
			<a href='CampaignDelete.php?CID=$CID'>Delete</a>
 
			</td>";

			echo "</tr>";		
		}
		 ?> 
	</table>
 
</fieldset>




<!-- has context menu -->

 </body>
 </html>