<?php 
$server = "sql104.epizy.com";
$username = "epiz_27649969";
$password = "YT6foJLbtc";
$database = "epiz_27649969_swing";

$koneksi = mysqli_connect($server, $username, $password, $database);

if(mysqli_connect_errno()){
	echo "Failde to connect to MySQL : ". mysqli_connect_error();
	exit();
}

 ?>