<?php
session_start();

require ("connect.php");
$username=$_SESSION['UserName'];

$query="SELECT *FROM registeredmembers WHERE UserName='$username'";

$execute=mysql_query($query,$connect);

$array=mysql_fetch_array($execute);

$UserId=$array['IdNumber'];
$username=$array['UserName'];
$emailAdress=$array['EmailAdress'];

$query1="SELECT *FROM tenants WHERE UserId='$UserId'";

 
$execute1=mysql_query($query1,$connect);
$array1=mysql_fetch_array($execute1);

$House=$array1['Hnumber'];
$Room=$array1['Rnumber'];
$Debit=$array1['Debit'];
$Amount=$array1['AmountPaid'];



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RentalsLogin</title>
<link rel="stylesheet" href="Css/AdminPage.css">
</head>

<body>

<div id="Content">

<div id="title">

<div id="tt1">
<?php print  'Administrator ('. $emailAdress.')';?>
</div>
</div>


<div id="topmenu">




<div id="footer2">

<ul>
	 <li><a href="userprofile.php">Home Page</a></li>
	 <li><a href="#" >Rooms To Rent</a> 
	 <ul>
	 <li><a href="SingleRooms.php">Single Rooms</a></li>
	 <li><a href="DoubleRooms.php">Double Rooms</a></li>
	 <li><a href="SelfContainedRooms.php">Self Contained Rooms</a></li>
     <li><a href="DoubleSingleRooms.php">Double/Single Rooms</a></li>
	</ul>
     </li>
	

<li><a href="#" >Houses To Sell</a>
	<ul>
	
	  <li><a href="HousesForSale.php">Houses For Sale</a></li>
	  <li><a href="PlotsForSale.php">Plots For Sale</a></li>
	  <li><a href="CompanyForSale.php">Company For Sale</a></li>
	  
	  
	</ul>
	</li>
	
	<li><a href="#">Our Issues</a>
	<ul>
	    
		<li><a href="SendMessage.php">Send Message</a></li>
		<li><a href="CheckMessages.php">Check Messages</a></li>
		
	</ul>
	</li>
	
	
	<li><a href="#">Manage</a>
	<ul>
	<li><a href="tenants.php">Tenants</a></li>
	<li><a href="Members.php">Members</a></li>
	</ul>
	</li>
	
	<li><a href="aboutus.php">About Us</a>
	<ul>
	
	</ul>
	</li>
	
	
	<li><a href="#">My Profile</a>
	<ul>
	<li><a href="LogOut.php" >Log Out</a></li>
	<li><a href="settings.php" >Settings</a></li>
	<li><a href="uploads.php" >Uploads</a></li>
	</ul>
	</li>
</ul>

</div>


<div id="content2">

<form action="uploads.php" method="post">

<fieldset style="text-align:center">

<legend style="text-align:right">Tenants</legend>

<ul>
<li><a href="withbalances.php">With Balances</a></li>
<li><a href="tenants.php">View Tenants</a></li>
<li><a href="delete.php">Delete  Account</a></li>
<li><a href="search.php">Search</a></li>
</ul>
</fieldset>

</form>

</div>




</div>



</body>
</html>