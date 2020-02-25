<?php 
$host = "localhost";
$user = "root";
$pass = "pass";
$database = "quantox_db";

$con = mysqli_connect($host, $user, $pass, $database);
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}