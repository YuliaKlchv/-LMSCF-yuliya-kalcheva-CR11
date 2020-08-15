<?php

	ob_start();
	session_start();
	require_once 'actions/db_connect.php';

	// it will never let you open index(login) page if session is set
	if (isset($_SESSION['user'])!=""){
 		header("Location: home.php");
 		exit;
	}
  	if(isset($_SESSION['admin'])!=""){
    	header("location: admin.php");
    	exit;
  	}

	$error = false;	

	if(isset($_POST['login'])){
		// prevent sql injections/ clear user invalid inputs
 		$email = trim($_POST['userEmail']);
 		$email = strip_tags($email);
 		$email = htmlspecialchars($email);

 		// prevent sql injections / clear user invalid inputs
 		$pass = trim($_POST['userPass']);
 		$pass = strip_tags($pass);
 		$pass = htmlspecialchars($pass);

 		if(empty($email)){
  			$error = true;
  			$emailError = "Please enter your email address.";
 		}else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
  			$error = true;
  			$emailError = "Please enter valid email address.";
		}		

 		if(empty($pass)){
  			$error = true;
  			$passError = "Please enter your password.";
 		}

 		// if there's no error, continue to login
 		if(!$error) {
 
  		$passwort = hash('sha256', $pass); // password hashing

  		$res=mysqli_query($conn, "SELECT * FROM `users` WHERE userEmail='$email'");
		$row=mysqli_fetch_array($res, MYSQLI_ASSOC);		  
  		$count=mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
 
  		if($count == 1 && $row['userPass'] == $passwort) {
        	if($row["status"] == 'admin') {
          		$_SESSION["admin"] = $row["userId"];
          		header("Location: admin.php");
        	} else {
            	$_SESSION['user']= $row['userId'];
            	header("Location: home.php");
        	}
   			
  		} else {
   			$errMSG ="Incorrect Credentials, Try again...";
  		}
	}
}    
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Welcome to Pet Adoption</title> 

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">   
  <link rel="stylesheet" href="style.css">
	
</head>
<body style="background-color:powderblue;">
	<!-- A grey horizontal navbar that becomes vertical on small screens -->
  <nav class="navbar navbar-expand-sm bg-warning navbar-dark sticky-top">
    <!-- Logo -->
    <a class="navbar-brand" href="#">
        <img src="images/logo.jpg" alt="Logo" style="width:60px;">
      </a>
      <!-- Links -->
      <ul class="navbar-nav">       
        <li class="nav-item">
            <a class="nav-link text-danger" href="register.php">Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger" href="logout.php?logout">Logout</a>
        </li>        
      </ul>     
  </nav>
	<hr>
	
<div class="errMSG">
		<?php
    		if(isset($errMSG) ) {
				echo $errMSG; 
			}     
  		?>
	</div>
	
  <!-- container start -->
	<div class="container-fluid">

    <h3 class="welcome">
      Welcome to Our Home,
      <br>
      to meet with our lovely friends!
    </h3>
		
    <!-- container form start -->
		<div class="back mt-3">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off">
				<div class="form-group">
    				<label for="email">Email address:</label>
    				<input type="email" name="userEmail" class="form-control" placeholder="Enter email" maxlength="40"/>
  				</div>
  				<div class="form-group">
    				<label for="pwd">Password:</label>
    				<input type="password" name="userPass" class="form-control" placeholder="Enter password" maxlength="15">
  				</div>
  				<button type="submit" name="login">Sign In</button>
			</form>
		</div>
     <!-- container form end -->		
	</div>
 <!--  container end -->


</body>
</html>
<?php ob_end_flush();?>