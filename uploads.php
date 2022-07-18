<?php
$messo="";
$error="";
$newFname="";
require ("connect.php");

if(isset($_POST['submit'])){

if(!empty($_POST['hname']) && !empty($_POST['location']) && !empty($_POST['Nrooms']) && !empty($_POST['HNumber'])
&& !empty($_FILES['image']['tmp_name']) && !empty($_POST['cash']) && !empty($_POST['decription'])){

$hname=$_POST['hname'];
$location=$_POST['location'];
$htype=$_POST['htype'];
$Nrooms=$_POST['Nrooms'];
$Hnumber=$_POST['HNumber'];
$desc=$_POST['decription'];
$cash=$_POST['cash'];

        $image=$_FILES['image']['tmp_name'];
        
		$imageName=$_FILES['image']['name'];
		$ImageType=$_FILES['image']['type'];
		
		

if($ImageType=='image/jpeg' || $ImageType=='image/GIF' || $ImageType=='image/png'){

$query="SELECT *FROM houses WHERE HNumber='$Hnumber'";

$execute=mysql_query($query,$connect) or die("Here");



$numrows=mysql_num_rows($execute);

	
if($numrows==0){
		
		
		$directory='Houses/';
		
		$newFname=explode(".",$imageName);
		$newFname=end($newFname);
		
		$path=$directory.$hname.".".$newFname;
		
		move_uploaded_file($image,$path);
		
		$imageName=$hname.".".$newFname;
		
		
		
  $query="INSERT INTO houses VALUES('$Hnumber','$hname','$imageName','$location','$htype','$Nrooms','$desc','$cash','$Nrooms')";
  
  $execute=mysql_query($query,$connect) or die(mysql_error());
  
$messo="Data Has Been Uploaded";


}else{

$messo="House Number Is Alread In Database";

}
}else{

$messo="The Image Format Is Not Supported";
}
		

}else{

$messo="Please Correct The Highlighted Boxes";

}


}else{

$messo="Upload House Data To Be Displayed To Members";

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RentalsLogin</title>
<link rel="stylesheet" href="Css/uploads.css">
</head>

<body>

<div id="Content">

<div id="title">

<div id="tt1">
Rentals Nairobi.com
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
	
	  <li><a href="">Profile Pages</a></li>
	  <li><a href="">Users</a></li>
	</ul>
	</li>
	
	<li><a href="">Our Issues</a>
	<ul>
		<li><a href="SendMessage.php">Send Message</a></li>
		<li><a href="CheckMessages.php">Check Messages</a></li>
		
	</ul>
	</li>
	
	
	<li><a href="#">Contacts</a>
	
	
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



<form action="uploads.php" method="post" enctype="multipart/form-data">
<fieldset>

<legend >Upload Data</legend>

<div id="firstTwo">

<label>House Name

<input type="text" name="hname" >

<?php print $error;?>

</label>

<label>Location

<input type="text" name="location">

<?php print $error;?>

</label>

</div>




<div id="secondTwo">

<label>House Type

<select name="htype">
<option>Single Room</option>
<option>Double Room</option>
<option>Self Contained</option>
<option>Double/Single Room</option>
<option>Others</option>

</select>
<?php print $error;?>

</label>

<label>Number Of Rooms

<input type="text" name="Nrooms">
<?php print $error;?>

</label>

</div>




<div id="thirdTwo">

<label>House Number

<input type="text" name="HNumber">
<?php print $error;?>

</label>


<label>House Image

<input type="file" name="image">
<?php print $error;?>

</label>

</div>

<div id="FifthTwo">

<label>Cash @ Room:

<input type="text" name="cash" >

<?php print $error;?>

</label>



</div>




<div id="thirdtarea">

<textarea cols="33" rows="3" name="decription">

</textarea>




</div>

<div id="fourthTwo">


<?php print $messo;?>


<label>

<input type="submit" name="submit" value="Upload">

</label>

</div>



</fieldset>

</form>

</div>
</div>


</body>
</html>