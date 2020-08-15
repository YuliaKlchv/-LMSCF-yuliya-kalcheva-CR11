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


	require_once "actions/db_connect.php";

	if(isset($_GET["animal_id"]))
	{
		$id = $_GET["animal_id"];

		$sql = "DELETE FROM `animal` WHERE `animal_id` = $id";
		$go = mysqli_query($conn, $sql);

    $row = $go->fetch_assoc();
  }

	$conn->close();

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>new Pet</title>
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
      			<a class="nav-link text-danger" href="create.php">Add new Pet</a>
    		</li>
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

      <!-- container ask start -->
      

      <!--form start-->
      <form action ="actions/a_delete.php" method="post">
          <input type="hidden" name="animal_id" value="<?php echo $row['animal_id']?>"/>
          <button class="btn_y" type="submit"></button>
          <a href="admin.php"><button type="button" class="btn_n"></button></a>
      </form>
      <!--form end-->

      </div>
       <!-- container ask start -->

  	</div>
  <!-- container ask end -->


</body>
</html>
<?php ob_end_flush();?>