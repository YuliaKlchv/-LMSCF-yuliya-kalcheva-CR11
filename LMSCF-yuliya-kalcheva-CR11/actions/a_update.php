<?php 

	require_once "db_connect.php";

		if(isset($_POST['Upload']))
	{
		$id= $_POST["hidden_id"];

        	$animal_name = $_POST["animal_name"];
			$animal_age = $_POST["animal_age"];
			$animal_type =$_POST["animal_type"];
			$animal_size =$_POST["animal_size"];
			$description = $_POST["description"];
			$animal_img = $_POST["animal_img"];
			$hobbies = $_POST["hobbies"];
			$fk_location_id = $_POST["fk_location_id"];
					
		$sql = "UPDATE animal SET animal_name='$animal_name',animal_age= '$animal_age',animal_type='$animal_type',animal_size='$animal_size',description='$description',animal_img='$animal_img',hobbies='$hobbies',fk_location_id='$fk_location_id' WHERE animal_id={id}" ;

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