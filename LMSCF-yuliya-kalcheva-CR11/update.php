<?php 

	ob_start();
  	session_start();
	

	 if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
   header("Location: index.php");
   exit;
  } 
  if(isset($_SESSION['user'])) {
    header("Location: home.php");
    exit;
  }

  require_once "actions/db_connect.php";


  $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
  $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];

		$sql = "SELECT * FROM animal WHERE animal_id =$id";
		$result = mysqli_query($conn, $sql);

		$row = $result->fetch_assoc();

	}
	// $conn->close();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Update</title>
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
            <a class="nav-link text-danger" href="admin.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger" href="add.php">new Pet</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger" href="logout.php?logout">Logout</a>
        </li>
      </ul>
  </nav>
 
 
 <div class="container-fluid">

   <!--  container welcome msg start -->
    <div class="welcome mt-3">
      <p class="h2">
        Hello <?php echo $userRow['userName']?>
            
    </div>
    <!--  container welcome msg end -->

    <!--  container form start -->
    <div class="back mt-3">
	<form action="actions/a_update.php" method="post">
		<input type="hidden" name="animal_id" value="<?php echo $row['animal_id'] ?>"><br>
		<input type="text" name="animal_name" value="<?php echo $row['animal_name'] ?>"><br>
		<input type="text" name="animal_age" value="<?php echo $row['animal_age'] ?>"><br>
		<input type="text" name="animal_type" value="<?php echo $row['animal_type'] ?>"><br>
		<input type="text" name="animal_size" value="<?php echo $row['animal_size'] ?>"><br>
		<input type="text" name="description" value="<?php echo $row['description'] ?>"><br>
		<input type="text" name="animal_img" value="<?php echo $row['animal_img'] ?>"><br>
		<input type="text" name="hobbies" value="<?php echo $row['hobbies'] ?>"><br>
		<input type="text" name="fk_location_id" value="<?php echo $row['fk_location_id'] ?>"><br>
				
		</div>  
          <button type="submit" name="submit">Update</button>
        </form>
        <!-- form end -->
      </div>
      <!--  container form end -->    
  </div>

 </body>
 </html>
 <?php ob_end_flush();?>