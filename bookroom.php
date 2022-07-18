
<?php
$messo="";
$error="";
$newFname="";
require ("connect.php");

if(isset($_POST['submit'])){

if(!empty($_POST['hnumber']) && !empty($_POST['cadress']) && !empty($_POST['rnumber']) && !empty($_POST['UserId']) && !empty($_POST['time']) && !empty($_POST['ptype']) ){

$Hnumber=$_POST['hnumber'];
$cadress=$_POST['cadress'];
$rnumber=$_POST['rnumber'];
$UserId=$_POST['UserId'];
$time=$_POST['time'];
$ptype=$_POST['ptype'];


$query="SELECT *FROM houses WHERE HNumber='$Hnumber'";

$execute=mysql_query($query,$connect) or die("Here");
$array=mysql_fetch_array($execute);


$numrows=mysql_num_rows($execute);

	
if($numrows==1){


$availablerooms=$array['NumberOfRooms'];
$amount=$array['Amount'];
$Debit=$amount*$time;
$AmountPaid=0;



if($availablerooms>0){


$maxroomnumber=$array['Crooms'];

if($rnumber<=$maxroomnumber){

//check if room is booked

$tenants="SELECT *FROM tenants WHERE Rnumber='$rnumber' AND Hnumber='$Hnumber'";
$execute=mysql_query($tenants,$connect) or die(mysql_error());
$numrooms=mysql_num_rows($execute);

if($numrooms ==0){
//book room

 $query="INSERT INTO tenants VALUES('$Hnumber','$rnumber','$Debit','$AmountPaid','$UserId','$cadress','$time')";
  
 $execute=mysql_query($query,$connect) or die(mysql_error());
 
 $remnumbers=$availablerooms-1;
 
 $query1="UPDATE  houses SET NumberOfRooms='$remnumbers' WHERE HNumber='$Hnumber'";
 $execute=mysql_query($query1,$connect) or die(mysql_error());
  
$messo="Room Booked-House Number:".$Hnumber."  Room Number:".$rnumber."</br>Amount To Pay:".$Debit."
  For ".$time." Months";
  
}else{

$messo="The Room Is occupied";

}

}else{

$messo="We Are Sorry Our Rooms Number Start From 1 To".$maxroomnumber;

}

}else{

$messo="There Are No Available Rooms In This House";

}

		
 
}else{

$messo="The House Number Is Not In Our Database</br>
Confirm The Number And Re-Write";

}



}else{

$messo="Please Correct The Highlighted Boxes";

}


}else{

$messo="Fill The Above Form To Secure Room";

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RentalsLogin</title>
<link rel="stylesheet" href="Css/bookroom.css">
</head>

<body>

<div id="Content">

<div id="title">

<div id="tt1">
ONLINE HOUSE RENTAL
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
	
	
	<li><a href="contacts.php">Contacts</a>
	
	</li>
	
	<li><a href="aboutus.php">About Us</a>
	<ul>
	
	</ul>
	</li>
	
	
	<li><a href="#">My Profile</a>
	<ul>
	<li><a href="" >Log Out</a></li>
	<li><a href="" >Settings</a></li>
	<li><a href="AdminPage.php" >Back</a></li>
	</ul>
	</li>
</ul>
</form>
</div>



</div>


<div id="content2">



<form action="bookroom.php" method="post" enctype="multipart/form-data">
<fieldset>

<legend >Booking Form</legend>

<div id="firstTwo">

<label>House Number

<input type="text" name="hnumber" >

</label>


<label>Current Adress

<input type="text" name="cadress">

</label>

</div>




<div id="secondTwo">

<label>Room Number

<input type="text" name="rnumber">

</label>

<label>My National Id(registration id)

<input type="text" name="UserId">

</label>



</div>




<div id="thirdTwo">

<label>Expected Time(in months)

<input type="text" name="time">


</label>


<label>Pay Through

<select name="ptype">
<option>M-PESA</option>
<option>Bank</option>
<option>Office</option>
</select>

</label>

</div>


<div id="fourthTwo">


<?php print $messo;?>


<label>

<input type="submit" name="submit" value="Book Now">

</label>

</div>



</fieldset>

</form>

</div>

<div id="content2">



<form action="bookroom.php" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Occupied Rooms</legend>

Search For Empty Rooms:
<input type="text" name="house" width="150px">
<input type="submit" name="search" value="search">
</br>

<?php
$mess="";
require ("connect.php");

if(isset($_POST['search'])){


if(!empty($_POST['house'])){

$houseName=$_POST['house'];

$query="SELECT Rnumber FROM tenants WHERE Hnumber='$houseName'";
$execute=mysql_query($query,$connect) or die(mysql_error());

while($array=mysql_fetch_array($execute)){

$roomno=$array['Rnumber'];

print '<div id="rooms">

       <label>Room No.'.$roomno.'</label>
	   
       </div>';


}

}else{

echo "Type The House Number In The Box Given";
}
} 

?>


</fieldset>

</form>


</div>
</div>




</body>
</html>