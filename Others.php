

<?php
$Messo="";
$star="*";
$Image="";
if(isset($_POST['submit']))
 {

$Image="<img src='images/ajax-loader2.gif' />";

$userName=$_POST['UserName'];
$Password=$_POST['userPass'];
$md5pass=md5($Password);

if(!empty($userName)){

if(!empty($Password)){


$Messo="Well Done We are processing.....</b>
Your UserName Is ".$userName." And Password Is ".$md5pass;




sleep(5);
header('Location:userprofile.php');



}else{

$Messo="Please Enter Your Password!";

}



}else{

$Messo="Please Enter Your UserName!";

}

}else{

$Messo="<p>Welcome Our Member</p>";

$Image="<a href='index.html'><img src='images/back.gif' /></a>";


}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RentalsLogin</title>
<link rel="stylesheet" href="Css/userprofile.css">
</head>

<body>

<div id="logCover">
 
			
			<div id="text">
			<p>Rentals Nairobi</p>
			
			</div>
            
			
</div>

<div id="links">
<a href="index.html"><label style="font-family:Lucida Handwriting;font-size:16px;text-align:center;color:#FF0000;">For Rent</label></a>
		<a href="SingleRooms.php">Single Rooms</a>
		<a href="DoubleRooms.php">Double Rooms</a>
		<a href="SelfContainedRooms.php">Self Contained Rooms</a>
		<a href="DoubleSingleRooms.php">Double/Single Rooms</a>
		
		
<a href="index.html"><label style="font-family:Lucida Handwriting;font-size:16px;text-align:center;color:#FF0000;">To Let</label></a>
		<a href="HousesForSale.php">Houses For Sale</a>
		<a href="PlotsForSale.php">Plots For Sale</a>
		<a href="CompanyForSale.php">Company For Sale</a>
		<a href="Others.php">Others</a>
		
		
<a href="index.html"><label style="font-family:Lucida Handwriting;font-size:16px;text-align:center;color:#FF0000;">My Profile</label></a>
<a href="">Complaints</a>
		<a href="Settings.php">Settings</a>
		<a href="SendMessage.php">Send Message</a>
		<a href="CheckMessages.php">Check Messages</a>
		<a href="LogOut..php">Log Out</a>
				
		
		
</div>

<div id="bigone">




<div id="Content">

<fieldset>
<legend>My Profile</legend>

<div id="userImage">

<img src="userimages/Mr Maithaimage.png" height="150" width="150">

</div>

<div id="logForm">

<form action="login.php" method="post" >
   
 <p>My Names:<label>Erick Yaah Yeri</label></p>
 <p>Id Number:<label>093452663445773</label></p>
 <p>Email Number:<label>erickerickmlz@gmail.com</label></p>
 <p>Home Adress:<label>1238-8000 Malindi</label></p>
 <p>Resident:<label>Makao Bora Residents</label></p>
 <p>Current Resident:<label>MangiMangi Rentals</label></p>
 
</form>

</div>
</fieldset>

</div>

<div id="footer">

<p><?php print $Messo ;?></p>

<p><?php print $Image; ?></p>



</div>


</div>
</body>
</html>