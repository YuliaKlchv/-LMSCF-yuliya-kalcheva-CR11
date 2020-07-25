<?php 

	require_once "actions/db_connect.php";

	if($_GET["id"])
	{
		$id = $_GET["id"];

		$sql = "SELECT * FROM animal WHERE animal_id =$id";
		$result = mysqli_query($conn, $sql);

		$row = $result->fetch_assoc();

	}
	$conn->close();
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Pet Adoption</title>
 </head>
 <body>
 
	<form action="actions/a_update.php" method="post">
		<input type="hidden" name="hidden_id" value="<?php echo $row['animal_id'] ?>"><br>
		<input type="text" name="animal_name" value="<?php echo $row['animal_name'] ?>"><br>
		<input type="text" name="animal_age" value="<?php echo $row['animal_age'] ?>"><br>
		<input type="text" name="animal_type" value="<?php echo $row['animal_type'] ?>"><br>
		<input type="text" name="animal_size" value="<?php echo $row['animal_size'] ?>"><br>
		<input type="text" name="description" value="<?php echo $row['description'] ?>"><br>
		<input type="text" name="animal_img" value="<?php echo $row['animal_img'] ?>"><br>
		<input type="text" name="hobbies" value="<?php echo $row['hobbies'] ?>"><br>
				
		<input type="submit" name="Upload" value="Upload">
	</form>


 </body>
 </html>