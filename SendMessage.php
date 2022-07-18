<?php
session_start();
$msg1="";
require ("connect.php");
$username=$_SESSION['UserName'];

$query="SELECT *FROM registeredmembers WHERE UserName='$username'";

$execute=mysql_query($query,$connect);

$array=mysql_fetch_array($execute);

$UserId=$array['IdNumber'];
$username=$array['UserName'];
$emailAdress=$array['EmailAdress'];

$query="SELECT *FROM tenants WHERE UserId='$UserId'";
$execute=mysql_query($query,$connect);
$array=mysql_fetch_array($execute);

$House=$array['Hnumber'];
$Room=$array['Rnumber'];
$Debit=$array['Debit'];
$Amount=$array['AmountPaid'];



if(isset($_POST['send'])){

$msg=$_POST['msg'];

if($msg != ""){


$target=$_POST['target'];;

$query="INSERT INTO usermessages VALUES('$UserId','$msg','$target','')";

$execute=mysql_query($query,$connect);

$msg1="Message Sent";


}else{

$msg1="Cant Send Empty Message";
}

}else{
$msg1="Messages";

}

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
	
	</ul>
	</li>
	
	<li><a href="#">Our Issues</a>
	<ul>
	    
		<li><a href="SendMessage.php">Send Message</a></li>
		<li><a href="CheckMessages.php">Check Messages</a></li>
		
	</ul>
	</li>
	
	
	<li><a href="Contacts.php">Contacts</a>
	<ul>
	
	</ul>
	</li>
	
	<li><a href="aboutus.php">About Us</a>
	<ul>
	</ul>
	</li>
	
	
	<li><a href="#">My Profile</a>
	<ul>
	<li><a href="" >Log Out</a></li>
	<li><a href="" >Settings</a></li>
	</ul>
	</li>
</ul>
</form>
</div>



</div>


<div id="content2">

<form action="" method="post">
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





</fieldset>

</form>


</div>

<div id="content2">

<form action="SendMessage.php" method="post">

<fieldset style="text-align:center">

<legend style="text-align:right">Compose msg</legend>
<label>To:
<select name="target">
<option>Admin</option>
<option>Fellow Members</option>
<option>With Balances</option>
</select>
</label>

</br>
<label>Your Message

<textarea cols="55" rows="10" name="msg" style="resize: none;" place-holder="Your Message">

</textarea>
</label>

<label>
<input type="submit" value="Send" name="send">

</label>

<label>
<?php 
print $msg1;
?>

</label>


</fieldset>

</form>


</div>




</div>
</body>
</html>