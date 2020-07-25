<!DOCTYPE html>
<html>
<head>
	
	<title>Welcome to Pet Adoption</title> 

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">   
	<style type="text/css">
	body {
 background-image: url("images/jungle.jpg");
 background-color: #cccccc;
}
 
	div {
		width:100%;
		height: 100%;
		background-color: hsla(89, 43%, 51%, 0.3);
		}

	img {
		width: 100%;
 		object-fit: cover;
	}
}
body {
  background-color: #fefbd8;
}

h1 {
  background-color: green;
}

span {
  background-color: green;
}


		
	</style>
</head>
<body>
	<hr>
	<h1 style="text-align: center; border: 5px solid green; position: fixed;left: 0%; top: 0%;width: 100%; color: solid;">Welcome to Pet Adoption</h1>

	<hr>
	<div>
	<img src="images/funny.jpg" alt="animal"><hr>

	</div>
	
<div class="container">
		<div class="row">
<?php
	include ("actions/db_connect.php");

	$sql = "SELECT * FROM animal";
	$result = mysqli_query($conn,$sql);

	if($result->num_rows == 0){
		echo "No results";
	}elseif ($result->num_rows ==1 ){
		$row = $result->fetch_assoc();
		
		echo "<div class='card col-4 '>
  				<img class='card-img-top' src='".$value["animal_img"]."' alt='Animal Image'>
  				<div class='card-body'>
    			<h5 class='card-title'>".$value["animal_name"]."</h5>
    			<p class='card-text'>".$value["animal_age"]."</p>
    			<p class='card-text'>".$value["animal_type"]."</p>
    			<p class='card-text'>".$value["animal_size"]."</p>
    			<p class='card-text'>".$value["description"]."</p>
    			<p class='card-text'>".$value["hobbies"]."</p>
    			<p class='card-text'>".$value["fk_location_id"]."</p>
    			<a href='update.php?id=".$value["animal_id"]."' class='btn btn-primary'>Update</a>
    			<a href='delete.php?id=".$value["animal_id"]."' class='btn btn-primary'>Delete</a>

  				</div>
				</div>";
	}else
		{
			$rows = $result->fetch_all(MYSQLI_ASSOC);
			foreach ($rows as $key => $value) 
			{
			
				echo "<div class='card col-4 '>
  				<img class='card-img-top' src='".$value["animal_img"]."' alt='Animal Image'>
  				<div class='card-body'>
    			<h5 class='card-title'>".$value["animal_name"]."</h5>
    			<p class='card-text'>".$value["animal_age"]."</p>
    			<p class='card-text'>".$value["animal_type"]."</p>
    			<p class='card-text'>".$value["animal_size"]."</p>
    			<p class='card-text'>".$value["description"]."</p>
    			<p class='card-text'>".$value["hobbies"]."</p>
    			<p class='card-text'>".$value["fk_location_id"]."</p>
    			
    			<a href='update.php?id=".$value["animal_id"]."' class='btn btn-primary'>Update</a>
    			<a href='delete.php?id=".$value["animal_id"]."' class='btn btn-primary'>Delete</a>

  				</div>
				</div>";
			}
		}

		echo "</div>
		<hr>";


		echo "<div class='card-body'>
		<a href='create.php' class='btn btn-primary'>New Animal</a>
		</div>";

		$conn->close();

?>



</body>
</html>