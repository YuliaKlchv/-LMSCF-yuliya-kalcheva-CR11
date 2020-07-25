<?php 


	require_once "actions/db_connect.php";

	if($_GET["id"])
	{
		$id = $_GET["id"];

		$sql = "DELETE FROM animal WHERE animal_id = $id";

		if(mysqli_query($conn, $sql))
		{
			echo "Success";
			header("refresh:3; URL=index.php");

		}
		else
		{
			echo $conn->error;
		}
	}

	$conn->close();

 ?>