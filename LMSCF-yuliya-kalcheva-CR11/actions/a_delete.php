<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../style.css">
  	
</head>
<body>

	<div class="container-fluid">

<?php

	ob_start();
	session_start();
	
	// if session is not set this will redirect to login page
	if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
	 header("Location: index.php");
	 exit;
	}	
	

	require_once "db_connect.php";

	if (($_POST["animal_id"])) 
	{
		$id = $_POST["animal_id"];

		$sql = "DELETE FROM `animal` WHERE `animal_id` = '{$id}'";

		if(mysqli_query($conn, $sql)) {
			echo "<div class='msg'>
					success <br>
					he/she is now lucky :)  <br>					
					<a href='../admin.php'>back home</a>
				</div>";
		} else {
			echo "<p class='actions'>Something goes wrong<br>
				 <a href='a_delete.php'>please try again</a>
				 <a href='../admin.php'>Home</a></p>";
		}

		$conn->close();
	}
?>

</div>

</body>
</html>