<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="loginsystem";
$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (!$conn) {
	die("COULD NOT CONNECT!!:".mysqli_connect_error());
}
else{
	//echo "connected successfully!!";
}

?>