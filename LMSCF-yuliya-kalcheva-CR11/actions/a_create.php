<?php 

	require_once "db_connect.php";

	if($_POST)
	{
			$animal_name = $_POST["animal_name"];
			$animal_age = $_POST["animal_age"];
			$animal_type =$_POST["animal_type"];
			$animal_size =$_POST["animal_size"];
			$description= $_POST["description"];
			$animal_img= $_POST["animal_img"];
			$hobbies = $_POST["hobbies"];
			
						
		$sql = "INSERT INTO `animal` (`animal_name`,`animal_age`,`animal_type`,`animal_size`,`description`,`animal_img`,`hobbies` VALUES ('$animal_name','$animal_age','$animal_type','$animal_size','$description','$animal_img','$hobbies')";

		if($conn->query($sql))
		{
			echo "Successfully created a new media .";
			header("refresh:3 ; URL=../index.php");
		}
		else
		{
			echo $conn->error;
		}
		
	$conn->close();


}
 ?>