<title>LogOut</title>
<?php
session_start(); 
session_destroy();
header("Location:index.html");

?>