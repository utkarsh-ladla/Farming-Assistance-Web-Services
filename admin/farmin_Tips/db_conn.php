<?php

$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "farm_next";
// $tbl_name = "admin"; 

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
else{
	echo "conn";
}