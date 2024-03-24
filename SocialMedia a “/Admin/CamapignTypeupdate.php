<?php 
include('../dbconnect.php');

if (isset($_GET['CTID'])) {
	
	$CTID=$_GET['CTID'];

	$query="SELECT * from campaigntypestb WHERE CampaignTypeID='$CTID'";

	$result=mysqli_query($db,$query);

	$data=mysqli_fetch_array($result);

	$CTID=$data['CampaignTypeID'];
	$CTName=$data['CampaignTypeName'];
	$CTdes=$data['CampaignTypeDescription'];



}

if (isset($_POST['btnupdate'])) {
	$CTID=$_POST['txtID'];
	$CTName=$_POST['txtname'];
	$CTdes=$_POST['txtdes'];

	$update="UPDATE campaigntypestb SET
			CampaignTypeName='$CTName',
			CampaignTypeDescription	='$CTdes'
			WHERE CampaignTypeID='$CTID'";
	$result=mysqli_query($db,$update);
	if ($result) {
		echo "<script>window.alert('Update Success')</script>";
		echo "<script>window.location='campaigntype.php'</script>";
	}
	else{
		echo "<script>window.alert('Update Failed')</script>";
		echo "<script>window.location='campaigntype.php'</script>";
	}
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>
 	
 	<form action="" method="POST">
		<h2>Add CampaignType Update Data</h2>
	<input type="hidden" name="txtID" value="<?php echo $CTID; ?>" required>
	
	<label>CampaignType Name:</label><br>
	<input type="text" name="txtname" value="<?php echo $CTName; ?>" required>
	

	<label>CampaignType Description:</label><br>
	<input type="text" name="txtdes" value="<?php echo $CTdes; ?>" required><br>
	<input type="submit" name="btnupdate"	value="Update">
	 		

 	</form>

 </body>
 </html>