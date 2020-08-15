<?php

	ob_start();
	session_start();
	require_once 'actions/db_connect.php';
	
	// if session is not set this will redirect to login page
	if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
	 header("Location: index.php");
	 exit;
	}
	if(isset($_SESSION['user'])) {
		header("Location: home.php");
		exit;
	}

  $res = mysqli_query($conn, "SELECT * FROM `users` WHERE 'userId'=".$_SESSION['admin']);
  $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">

</head>
<body>
	<nav class="navbar navbar-expand-sm bg-warning navbar-dark sticky-top ">
		<!-- Logo -->
		<a class="navbar-brand" href="admin.php">
    		<img src="images/logo.jpg" alt="Logo" style="width:60px;">
  		</a>
  		<!-- Links -->
  		<ul class="navbar-nav"> 
    		<li class="nav-item">
      			<a class="nav-link text-danger" href="admin.php">home</a>
    		</li> 
    		<li class="nav-item">
      			<a class="nav-link text-danger" href="logout.php?logout">Logout</a>
    		</li>
  		</ul>  		
  	</nav>

    <!-- container start -->
  	<div class="container-fluid">

      <!--  container welcome msg start -->
    <div class="welcome mt-3">
      <p class="h2">
       <br>
       </p>     
    </div>
    <!--  container welcome msg end -->

      <!-- container form start -->
  		<div class="back mt-3">
	<form action ="actions/a_create.php" method ="post">
		<input type="hidden" name="animal_id">

		<input type="text" name="animal_name" placeholder="animal_name"><br>
		<input type="number" name="animal_age" placeholder="animal_age"><br>
		
    				<label for="animal_type">Typ:</label>
					<select name="animal_type" id="animal_type">
						<option value="Birds">birds</option>
						<option value="Reptiles">reptiles</option>
						<option value="Cuties">cuties</option>
					</select>    
  				
  		<div class="form-group">
    				<label for="animal_size">Size:</label>
					<select name="animal_size" id="animal_size">
						<option value="Small">small</option>
						<option value="Large">large</option>
					</select>    
  				</div>
		
		<input type="text" name="description" placeholder="description"><br>
		<input type="text" name="animal_img" placeholder="animal_img"><br>
		<input type="text" name="hobbies" placeholder="hobbies"><br>
		<input type="number" name="fk_location_id" placeholder="fk_location_id"><br>

		<input type="submit" name ="submit" value="Upload">


	</form>
</div>
		

</body>
</html>
<?php ob_end_flush();?>