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

</head>

<body>

<div id="Content">

<div id="title">

<div id="tt1">
Rentals Nairobi.com
</div>

<div id="tt2">

<img src="userimages/Mr Maithaimage.png" class="img-circle" height="50px" width="50px">

</div>

<div id="tt3">

<label>User Name:<?php print $username;?></label>
</div>

</div>


<div id="topmenu">




<div id="footer2">


<form action="logout.php" method="post">
    
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
	  <li><a href="Others.php">Others</a></li>
	  
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



<div id="slider"
   class="cycle-slideshow" 
   data-cycle-pause-on-hover="true" 
   data-cycle-pager="#slideNavigation" 
   data-cycle-caption-plugin="caption2"
   data-cycle-timeout="3000"
   data-cycle-pager-template="<span></span>"                      
   data-cycle-overlay-template="<h3>{{title}}</h3>  <p>{{desc}}</p> "
   data-cycle-overlay=".cycle-overlay"
   data-cycle-pager-event="mouseover"
   >
   <img>

<div>

<div id="content2">
<div>

<form action="uploads.php" method="post">
<fieldset style="text-align:center">

<legend style="text-align:right">About Us</legend>
hshdhjdhjs




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