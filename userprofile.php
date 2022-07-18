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
<title><?php print $_SESSION['UserName'];?></title>
<link rel="stylesheet" href="Css/userprofile.css">
<script src="Slideshow"></script>
<script src="jQuery plugins/jquery-ui.js"></script>
<script src="jQuery plugins/jquery-1.9.1.min.js"></script>
<script src="jQuery plugins/jquery.cycle2.js"></script>
<link rel="stylesheet" href="jQuery plugins/jquery-ui.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

</head>

<body>

<div id="Content">

<div id="title">

<div id="tt1">
ONLINE HOUSE RENTAL
</div>

<div id="tt2">

<img src="userimages/Mr Maithaimage.png" class="img-circle" height="50px" width="50px">

</div>

<div id="tt3">

<label>User Name:<?php print $username;?></label>
</div>

</div>


<div id="topmenu">


<form action="logout.php" method="post">
    
<ul>
	 <li><a href="index.html">Home Page</a></li>
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
	
	
	<li><a href="contacts.php">Contacts</a>
	
	<ul>
	
	</ul>
	</li>
	
	<li><a href="aboutus.php">About Us</a>
	<ul>
	
	</ul>
	</li>
	
	
	<li><a href="#">My Profile</a>
	<ul>
	<li><a href="LogOut.php" >Log Out</a></li>
	<li><a href="" >Settings</a></li>
	</ul>
	</li>
</ul>
</form>
</div>


  
<img src="photos/homepage-slider1.jpg" width="100%" height="350"/>

 






<div id="content2">
<div>

<form action="uploads.php" method="post">
<fieldset style="text-align:center">

<legend style="text-align:right">My Profile</legend>

<label>My Id:
<?php print $UserId;?>
</label>

</br>

<label>My EmailAdress:

<?php print $emailAdress;?>

</label>

</br>
<label>My House:

<?php print $House;?>

</label>

</br>


<label>My Room Number:

<?php print $Room;?>

</label>

</br>
<label>Available Balance:

<?php print $Debit-$Amount;?>

</label>



</div>

</fieldset>

</form>


</div>
<?php 

$House="No House";
$Room="Room Number.Null";
$Debit="Null";
$Amount="Null";



?>



</div>
</body>
</html>