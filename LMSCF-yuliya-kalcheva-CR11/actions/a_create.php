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
			$fk_location_id = $_POST["fk_location_id"];
			
						
		$sql = "INSERT INTO `animal`(`animal_name`, `animal_age`, `animal_type`, `animal_size`, `description`, `animal_img`, `hobbies`, `fk_location_id`) VALUES ('$animal_name',$animal_age,'$animal_type','$animal_size','$description','$animal_img','$hobbies',$fk_location_id)";

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
 </div>

</body>
</html>