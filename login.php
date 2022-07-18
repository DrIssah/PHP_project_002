<?php
$Messo="";
$star="*";
$Image="";
if(isset($_POST['submit']))
 {

$Image="<img src='images/ajax-loader2.gif' />";

$userName=$_POST['UserName'];
$Password=$_POST['userPass'];


if(!empty($userName)){

if(!empty($Password)){


$query="SELECT *FROM registeredmembers WHERE UserName='$userName' AND Password='$Password'";
   
require ("connect.php");
   
   $execute=mysql_query($query,$connect) or die(mysql_error());
   
   $NumberOfRows=mysql_num_rows($execute);
   
   if ($NumberOfRows==1){
   
   $Messo="Welcome ".$userName." To Our System";
       session_start();
	   
	   $_SESSION['UserName']=$userName;
	   
	   
       sleep(1);
	   if($userName=='Administrator'){
	   
       header('Location:AdminPage.php');
	   
	   }else{
	   
	   header('Location:userprofile.php'); 
	   }	   
   }else{
   
   $Messo="Sorry The Password, UserName </br>
             PleaseSubmit Your Correct Details </br> Or 
			  You Dont Remember ? <a href='forgotpass.html'>Yes</a></br>
			  Or Are You A New Member ? <a href='RegistrationPage.php'>Yes</a></br>";
   }
   

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
<link rel="stylesheet" href="Css/login.css">

</head>

<body>

<div id="content">
<div id="title">
<h2>ONLINE HOUSE RENTALS SYSTEM</h2>
</div>

<div id="slideshow">


<img src="photos/8d47195f-3547-41c9-8dc7-f9a5f29f84ee-6.jpg" width="100%" height="410"/>


<fieldset>
<legend>LogIn</legend>

<div id="logForm">

<form action="login.php" method="post" >
<tr>
<br>
<td>User Name:<input type="text" name="UserName" placeholder="Musa Salim" ><td></br>
</br>
<td>Password  :  <input type="password" name="userPass" ></td></br>
</br>
<td><input type="submit" name="submit" value="Log In" ></td></br>
</br>
</tr>
</form>
</div>


<div id="footer">
<p><?php print $Messo ;?></p>
<p><?php print $Image; ?></p>
</div>



</fieldset>
</div>



</div>
</body>
</html>