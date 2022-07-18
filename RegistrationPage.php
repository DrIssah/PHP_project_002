<?php
//Confirm if all the filds are submitted, none of the boxes are empty
$message="";
if(isset($_POST['register'])){

if(!empty($_POST['Username']) && !empty($_POST['idnumber']) && !empty($_POST['pnumber']) && !empty($_POST['eadress'])  && !empty($_POST['pass1']) && !empty($_POST['pass2'])){

if($_POST['pass1']==$_POST['pass2'])
{ 

$UserName=$_POST['Username'];

$IdNumber=$_POST['idnumber'];
$Pnumber=$_POST['pnumber'];
$EmailAdress=$_POST['eadress'];
$Pass=$_POST['pass1'];

require ("connect.php");

//check user

$query="SELECT *FROM registeredmembers	WHERE IdNumber='$IdNumber' ";

$execute=mysql_query($query,$connect) or die(mysql_error());

$numrows=mysql_num_rows($execute);

if($numrows==1){

$message="<p>The User Name Alread Exists <a href='index.html'>Back</a></p>";

}else{

//registration starts here

$query="INSERT INTO registeredmembers VALUES('$UserName','$Pass','$EmailAdress','$IdNumber','$Pnumber','')";
		
$query=mysql_query($query) or die('Here 23'.mysql_error());
		

$message="Account Created,<a href='login.php'>Log In</a>";


}       

}else{

$message="The Password Do Not Match";
}


}else{

$message="<p>All The Boxes Must Not Be Empty</p>";

}

}else{

$message="<p>Welcome To The Registration Page <a href='index.html'>Home</a></p>";

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="Css/Registration.css">
<title>RegistrationPage</title>

<style>
table{margin-left:20%;}
</style>
</head>

<body>

<div id="content">

<div id="title">

<h2>ONLINE HOUSE RENTAL</h2>


</div>

<div id="slideshow">
<img src="photos/8d47195f-3547-41c9-8dc7-f9a5f29f84ee-6.jpg" width="100%" height="410"/>



<div id="logInPage">

<fieldset>

<legend>Registration</legend>

<form action="registrationpage.php" method="post" >
<table>
<tr>

<td>FullName:</td><td><input type="text" name="Username" placeholder="Musa"></td>

<td>IdName:</td><td><input type="text" name="idnumber" placeholder="31671487"></td>

</tr>

<tr>
<td>PhoneNumber:</td><td><input type="text" name="pnumber" placeholder="0723413242"></td>
<td>emailAdress:</td><td><input type="text" name="eadress" placeholder="saliminho44@gmail.com"></td>

</tr>


<tr>
<td>
Password:</td><td><input type="password" name="pass1"></td>
<td>Confirm Password:</td><td><input type="password" name="pass2"></td>

</tr>
<tr>
<td><input type="submit" name="register" value="Register"></td>
<td><h5><?php print $message;?></h5></td>
</tr>
</table>
</form>

</fieldset>

<div id="message">


</div>



</div>
</div>
</body>
</html>



