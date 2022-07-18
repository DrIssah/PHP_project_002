<?php

require ("connect.php");

$query="SELECT *FROM houses WHERE HouseType='Single Room' AND NumberOfRooms>1";
$execute=mysql_query($query,$connect);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RentalsLogin</title>
<link rel="stylesheet" href="Css/singlerooms.css">
</head>

<body>
<script language="javascript">
 

</script>

<div id="Content">
<div id="title">

<h2>Rentals Nairobi</h2>


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
	>

	</ul>
	</li>
	
	<li><a href="">Our Issues</a>
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
<legend>Available Single Rooms</legend>

<?php 
while($array=mysql_fetch_array($execute)){
 
 $ImageName=$array['ImageName'];
 $desc=$array['Description'];
 $hname=$array['Hnumber'];
 $location=$array['Location'];
 $AvailableRooms=$array['NumberOfRooms'];
 $Amount=$array['Amount'];
 
 
 
 
 //display image
 
 $dir = 'houses';
    $file_display = array('jpg', 'jpeg', 'png', 'gif');

    if ( file_exists( $dir ) == false ) {
       echo 'Directory \'', $dir, '\' not found!';
    } else {
       $dir_contents = scandir( $dir );

        foreach ( $dir_contents as $file ) {
           $file_type = strtolower( end( explode('.', $file ) ) );
           if ( ($file == $ImageName)  && (in_array( $file_type, $file_display)) ) {
              echo '<div id="image">
			        
					<img src="', $dir, '/', $file, '" alt="', $file, '"/>
					<label>Location:'.$location.'</label></br> <label>House Name:'.$hname.'</label>
					</br><label>Number Of Rooms:'.$AvailableRooms.'</label>
					</br><label>Ksh:'.$Amount.' @month</label>
					
			        </div>';
              
           }
        }
    }
 
 
 //----------------------------------
 }
 print '<div id="links">

***<a href="bookroom.php">Book room</a> *** <a href="rules.php">Rules And Regulation</a> 
</div>';
 
 

 ?>

</fieldset>

</form>


</div>
</div>


</body>
</html>