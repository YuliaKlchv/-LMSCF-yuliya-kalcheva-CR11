<?php

	ob_start();
	session_start();
	
	 // if session is not set this will redirect to login page 
	if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
	 header("Location: index.php");
	 exit;
	}	
	if(isset($_SESSION['user'])) {
		header("Location: home.php");
		exit;
	}

	require_once 'actions/db_connect.php';

	 // select logged-in users details 
	$res = mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
	$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

	$resPets = mysqli_query($conn, "SELECT * FROM animal");

?>

<!DOCTYPE html>
<html>
<head>
	<script
  	src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  	crossorigin="anonymous"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
	<title>HomePage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">


</head>
<body>

	<!-- A grey horizontal navbar that becomes vertical on small screens -->
	<nav class="navbar navbar-expand-sm bg-warning navbar-dark sticky-top">
		<!-- Logo -->
		<a class="navbar-brand" href="#">
    		<img src="images/logo.jpg" alt="Logo" style="width:60px;">
  		</a>
  		<!-- Links -->
  		<ul class="navbar-nav">    		
    		<li class="nav-item">
      			<a class="nav-link text-danger" href="#">Friends</a>
    		</li>
    		<li class="nav-item">
      			<a class="nav-link text-danger" href="create.php">Add New Pet</a>
    		</li>
    		<li class="nav-item">
      			<a class="nav-link text-danger" href="logout.php?logout">Logout</a>
    		</li>
    	</ul>  		
	</nav>
   	<!-- container start -->
	<div class="container-fluid">

		<!-- container for for welcome msg -->
		<div class="welcome mt-3">
			<p class="h2"> Hello <?php echo $userRow['userName']?>!</p>
			
		</div>
				
			
		<!-- container for output sql start with php -->
		<div class="row justify-content-around">		
		
		<?php

			include 'actions/db_connect.php';

			if(mysqli_num_rows($resPets) == 0) {
				echo "no Pets";

			}elseif (mysqli_num_rows($resPets) == 1) {
				$row = $resPets->fetch_assoc();
				echo "<div class='card self mt-3'>							
  							<div class='card-body body'>
  								<img class='img-fluid' src='".$row["animal_img"]."'>
  							<div class='card-body'>
  								<p>".$row["animal_name"]."</p>
  								<p>".$row["animal_age"]."</p>
  								<p>".$row["animal_type"]."</p>
  								<p>".$row["animal_size"]."</p>
  								<p>".$row["description"]."</p>
  								<p>".$row["hobbies"]."</p>
  								<p>pick up location number:".$row["fk_location_id"]."</p>
  							</div>
  							<div class='d-flex justify-content-around'>
								<a class='crud' href='update.php?id=".$row["animal_id"]."'>update</a>
								<a class='crud' href='delete.php?id=".$row["animal_id"]."'>delete</a>
  							</div>
						 </div>";

			}else {
				$rows = $resPets->fetch_all(MYSQLI_ASSOC);
				foreach ($rows as $value) {
					echo "<div class='card self mt-3'>							
  							<div class='card-body body'>
  								<img class='img-fluid' src='".$value["animal_img"]."'>
  							<div class='card-body'>
  								<p>".$value["animal_name"]."</p>
  								<p>".$value["animal_age"]."</p>
  								<p>".$value["animal_type"]."</p>
  								<p>".$value["animal_size"]."</p>
  								<p>".$value["description"]."</p>
  								<p>".$value["hobbies"]."</p>
  								<p>pick up location number:".$value["fk_location_id"]."</p>
  							</div>
  							<div class='d-flex justify-content-around'>
								<a class='crud' href='update.php?id=".$value["animal_id"]."'>update</a>
								<a class='crud' href='delete.php?id=".$value["animal_id"]."'>delete</a>
  							</div>
						 </div>";					       
				}
			}
		?>
		</div>
		<!-- container for output sql end with php -->				
	</div>
	<!-- container end -->


<script type="text/javascript" src="script.js"></script>
</body>
</html>
<?php ob_end_flush();?>