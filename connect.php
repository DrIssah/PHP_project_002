<?php
 
$host="localhost";
$userAdmin="erick";
$pass="";
$connect=mysql_connect($host,$userAdmin,$pass) or die(mysql_error());
$DB=mysql_select_db('rentalsnairobi',$connect) or die(mysql_error());

?>