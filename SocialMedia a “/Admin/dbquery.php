<?php 
include('../dbconnect.php');

$create="CREATE TABLE contactustb
(
	ContactusID int NOT NULL Primary Key Auto_Increment,
	ContactDate varchar(30),
	Subject varchar(50),	
	ContactMessage varchar(255),
	CustomerID int,
	Status varchar(30),
	Foreign Key (CustomerID) References customertb (CustomerID)
)";

$query=mysqli_query($db,$create);

if ($query) {
	echo "<p>ContactUs Table is set up Successfully</p>";
}
else{
	echo "<p>ContactUs Table is set up Failed</p>";
}


// $MemeberTable="CREATE TABLE memberstb
// (
// 	MemberID int NOT NULL Primary Key Auto_Increment,
// 	MemberDate varchar(50),
// 	Description varchar(255),	
// 	Email varchar(50),
// 	PaymentType varchar(250),
// 	CustomerID int,
// 	CampaignID int,
// 	MemberStatus varchar(30),
// 	Foreign Key (CustomerID) References customertb (CustomerID),
// 	Foreign Key (CampaignID) References campaignstb (CampaignID)
// )";

// $query=mysqli_query($db,$MemeberTable);

// if ($query) {
// 	echo "<p>Member Table is set up Successfully</p>";
// }
// else{
// 	echo "<p>Member Table is set up Failed</p>";
// }

// $AdminTable="CREATE TABLE adminstb
// (
// 	AdminID int NOT NULL Primary Key Auto_Increment,
// 	AdminName varchar(30),
// 	AdminDateOfBirth varchar(100),
// 	AdminEmail varchar(40),
// 	AdminPassword varchar(30), 
// 	AdminPhoneNumber varchar(30),
// 	AdminAddress varchar(255)
// )";

// $query=mysqli_query($db,$AdminTable);

// if ($query) {
// 	echo "<p>Admin Table is set up Successfully</p>";
// }
// else{
// 	echo "<p>Admin Table is set up Failed</p>";
// }



// $CustomerTable="CREATE TABLE customerstb
// (
// 	CustomerID int NOT NULL Primary Key Auto_Increment,
// 	CustomerFirstName varchar(50),
// 	CustomerLastName varchar(50),	
// 	UserName varchar(100),
// 	Email varchar(30),
// 	Age varchar(30),
// 	PhoneNumber varchar(30),
// 	Password varchar(30),
// 	Address varchar(255),
// 	RegisterMonth varchar(30),
// 	CustomerImage varchar(255)
// )";

// $query=mysqli_query($db,$CustomerTable);

// if ($query) {
// 	echo "<p>Customer Table is set up Successfully</p>";
// }
// else{
// 	echo "<p>Customer Table is set up Failed</p>";
// }



// $MediaAppTable="CREATE TABLE socialmediaappstb
// (
// 	SocialMediaID int NOT NULL Primary Key Auto_Increment,
// 	SocialMediaName varchar(30),
// 	SocialMediaDescription varchar(255),
// 	SocialMediaLink varchar(255),
// 	SocialMediaRating int,
// 	SocialMediaReview varchar(255),
// 	SocialMediaImage varchar(255)
// )";

// $query=mysqli_query($db,$MediaAppTable);

// if ($query) {
// 	echo "<p>Social Media Table is set up Successfully</p>";
// }
// else{
// 	echo "<p>Social Media Table is set up Failed</p>";
// }



// $CampaignTypeTable="CREATE TABLE campaigntypestb
// (
// 	CampaignTypeID int NOT NULL Primary Key Auto_Increment,
// 	CampaignTypeName varchar(30),
// 	CampaignTypeDescription varchar(255)
// )";

// $query=mysqli_query($db,$CampaignTypeTable);

// if ($query) {
// 	echo "<p>Campaign Type Table is set up Successfully</p>";
// }
// else{
// 	echo "<p>Campaign Type Table is set up Failed</p>";
// }




// $CampaignTable="CREATE TABLE campaignstb
// (
// 	CampaignID int NOT NULL Primary Key Auto_Increment,
// 	CampaignTitle varchar(30),
// 	CampaignStatus varchar(255),
// 	CampaignDescription varchar(255),
// 	SocialMediaID int,
// 	CampaignImage1 varchar(255),
// 	CampaignImage2 varchar(255),
// 	CampaignImage3 varchar(255),
// 	CampaignTypeID int,
// 	StartDate varchar(30),
// 	EndDate varchar(30),
// 	Fees int,
// 	Aim varchar(255),
// 	Target varchar(255),
// 	Vision varchar(255),
// 	Map text,
// 	Foreign Key (SocialMediaID) References socialmediaappstb (SocialMediaID),
// 	Foreign Key (CampaignTypeID) References campaigntypestb (CampaignTypeID)
// )";

// $query=mysqli_query($db,$CampaignTable);

// if ($query) {
// 	echo "<p>Campaign Table is set up Successfully</p>";
// }
// else{
// 	echo "<p>Campaign Table is set up Failed</p>";
// }



// $TechniqueTable="CREATE TABLE techniquestb
// (
// 	TechniqueID int NOT NULL Primary Key Auto_Increment,
// 	TechniqueName varchar(30),
// 	TechniqueStatus varchar(255),
// 	TechniqueDescription varchar(255),
// 	SocialMediaID int,
// 	TechniqueImage1 varchar(255),
// 	TechniqueImage2 varchar(255),
// 	Foreign Key (SocialMediaID) References socialmediaappstb (SocialMediaID)
// )";

// $query=mysqli_query($db,$TechniqueTable);

// if ($query) {
// 	echo "<p>Technique Table is set up Successfully</p>";
// }
// else{
// 	echo "<p>Technique Table is set up Failed</p>";
// }

?>





// $btable="CREATE TABLE booking
// (
// 	BookingID int NOT NULL Primary Key Auto_Increment,
// 	BookingDate varchar(30),
// 	Description varchar(100),
// 	TotalPrice int,
// 	AvaliablePerson int,
// 	ServiceTax int,
// 	ContactNumber varchar(100),
// 	ContactEmail varchar(255),
// 	CustomerCodeNo int, 
// 	PackageID int,
// 	Foreign Key (CustomerCodeNo) References customertb (CustomerCodeNo),
// 	Foreign Key (PackageID) References packagetb (PackageID)
// )";

// $query=mysqli_query($db,$btable);

// if ($query) {
// 	echo "<p>Booking Table set up Successfully</p>";
// }
// else{
// 	echo "<p>Booking Table set up Failed</p>";
// }

// $packagetable="CREATE TABLE packagetb
// (
// 	PackageID int NOT NULL Primary Key Auto_Increment,
// 	PackageName varchar(30),
// 	Description varchar(100),
// 	PackageImage1 varchar(255),
// 	PackageImage2 varchar(255),
// 	PackageImage3 varchar(255),
// 	FacilitiesDesc varchar(100),
// 	FacilitiesImage1 varchar(255),
// 	FacilitiesImage2 varchar(255),
// 	Locaitonmap text,
// 	RouteID int,
// 	HotelID int, 
// 	PackageTypeID int,
// 	Foreign Key (HotelID) References hoteltb (HotelID),
// 	Foreign Key (RouteID) References routetb (RouteID),
// 	Foreign Key (PackageTypeID) References packagetypetb (PackageTypeID)
// )";

// $query=mysqli_query($db,$packagetable);

// if ($query) {
// 	echo "<p>Package Table set up Successfully</p>";
// }
// else{
// 	echo "<p>Package Table set up Failed</p>";
// }



// $Route="CREATE TABLE routetb
// (
// 	RouteID int NOT NULL Primary Key Auto_Increment,
// 	RouteName varchar(30)
// )";

// $query=mysqli_query($db,$Route);

// if ($query) {
// 	echo "<p>Route set up Successfully</p>";
// }
// else{
// 	echo "<p>Route set up Failed</p>";
// }



// include('dbconnect.php');

// $PackageType="CREATE TABLE packagetypetb
// (
// 	PackageTypeID int NOT NULL Primary Key Auto_Increment,
// 	PackageTypeName varchar(30)
// )";

// $query=mysqli_query($db,$PackageType);

// if ($query) {
// 	echo "<p>Package Type set up Successfully</p>";
// }
// else{
// 	echo "<p>Package Type set up Failed</p>";
// }




// $HotelTable="CREATE TABLE hoteltb
// (
// 	HotelID int NOT NULL Primary Key Auto_Increment,
// 	HotelName varchar(30),
// 	Description varchar(255)
// )";

// $query=mysqli_query($db,$HotelTable);

// if ($query) {
// 	echo "<p>Hotel Table set up Successfully</p>";
// }
// else{
// 	echo "<p>Hotel Table set up Failed</p>";
// }

// $cusTable="CREATE TABLE Customertb
// (
// 	CustomerCodeNO int NOT NULL Primary Key Auto_Increment,
// 	CustomerName varchar(30),
// 	Email varchar(30),
// 	Password varchar(30),
// 	PhoneNo varchar(30),
// 	Address varchar(30),
// 	CusImg varchar(255)
// )";

// $query=mysqli_query($db,$cusTable);

// if ($query) {
// 	echo "<p>Customer Table set up Successfully</p>";
// }
// else{
// 	echo "<p>Customer Table set up Failed</p>";
// }








