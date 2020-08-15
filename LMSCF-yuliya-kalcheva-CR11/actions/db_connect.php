<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cr11_yuliyakalcheva_petadoption";

$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn){
	
		echo $conn->connect_error;	
	
}
?>	
