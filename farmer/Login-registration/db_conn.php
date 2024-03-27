<?php

$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "farm_next";
// $tbl_name = "farmer"; 
// $db_name = "farmer";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
else{
	echo "conn";
}

