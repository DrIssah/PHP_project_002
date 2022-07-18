<?php
session_start();

require ("connect.php");
$username=$_SESSION['UserName'];



$query1="SELECT tenants.Hnumber,tenants.Rnumber,tenants.Debit,tenants.AmountPaid,tenants.UserID,registeredmembers.EmailAdress,registeredmembers.PhoneNumbber	 FROM tenants,registeredmembers WHERE registeredmembers.IdNumber=
tenants.UserID";

 
$execute1=mysql_query($query1,$connect) or die(mysql_error());



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php print $_SESSION['UserName'];?></title>
<link rel="stylesheet" href="Css/tenants.css">
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




<div id="footer2">


<form action="logout.php" method="post">
    
<ul>
	 <li><a href="AdminPage.php">Home Page</a></li>
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
	<li><a href="AdminPage.php" >Back</a></li>
	
	</ul>
	</li>
</ul>
</form>
</div>



</div>


<div id="content2">

<form action="uploads.php" method="post">
<fieldset style="text-align:center">

<legend style="text-align:right">Availabe Tenants</legend>
<table>
<tr>
<td>User Id </td ><td>House</td><td>Amount</td>  <td>Phone Number</td>  <td>Room Number</td><td>Email Adress</td>
</tr>
<?php 
while($array1=mysql_fetch_array($execute1)){

$House=$array1['Hnumber'];
$Room=$array1['Rnumber'];
$Debit=$array1['Debit'];
$Amount=$array1['AmountPaid'];
$UserId=$array1['UserID'];
$email=$array1['EmailAdress'];
$phoneNumber=$array1['PhoneNumbber'];

print
'<tr>

<td>'.$UserId.'</td><td>'.$House.'</td><td>'.$Amount.'</td><td>'.$phoneNumber.'</td><td>'.$Room.'</td><td>'.$email.'</td>

</tr>';

}

?>

</table>

</fieldset>

</form>


</div>

</div>
</body>
</html>