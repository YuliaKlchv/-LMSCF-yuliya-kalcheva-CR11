<?php

	ob_start();
	session_start();


	if(isset($_SESSION['user'])!=""){
		header("location: home.php"); // redirects to home.php
	}
  if(isset($_SESSION['admin'])!=""){
    header("location: admin.php");
  }

  	include_once 'actions/db_connect.php';

  	$error = false;

  	if(isset($_POST['submit'])) {

		$name = trim($_POST['userName']); // sanitize user input to prevent sql injection
		$name = strip_tags($name); // strip_tags — strips HTML and PHP tags from a string
		$name = htmlspecialchars($name); // htmlspecialchars converts special characters to HTML entities

		$email = trim($_POST['userEmail']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		$pass = trim($_POST['userPass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);


		//name check
		if (empty($name)) {
  			$error = true ;
  			$nameError = "Please enter a name.";
 		} else if (strlen($name) < 3) {
  			$error = true;
  			$nameError = "Name must have at least 3 characters.";
 		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  			$error = true ;
  			$nameError = "Name must contain alphabets and space.";
 		}

 		//email check
 		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
  			$error = true;
  			$emailError = "Please enter valid email address." ;
 		} else {
  			// checks email exists or not
  			$query = "SELECT `userEmail` FROM `users` WHERE userEmail='$email'";
  			$result = mysqli_query($conn, $query);
  			$count = mysqli_num_rows($result);
  			if($count!=0){
   				$error = true;
  	 			$emailError = "Provided Email is already in use.";
  			}
    	}

    	//passwort check
    	if (empty($pass)){
  			$error = true;
  			$passError = "Please enter password.";
 		} else if(strlen($pass) < 6) {
  			$error = true;
  			$passError = "Password must have atleast 6 characters.";
 			}

 		// password hashing for security
		$pass = hash('sha256', $pass);

		if(!$error) { 
  			$query = "INSERT INTO `users`(`userName`,`userEmail`,`userPass`) VALUES('$name','$email','$pass')";
  			// var_dump($query);
      		$res = mysqli_query($conn, $query);      
  
  			if ($res) {
   				$errTyp = "success";
   				$errMSG = "Successfully registered, you may login now";
   				unset($name);
    			unset($email);
   				unset($pass);
  			} else {
   				$errTyp = "danger";
   				$errMSG = "Something went wrong, try again later..." ;
  				} 
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Adopt-a-pet</title>
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
            <a class="nav-link text-danger" href="index.php">Sign in</a>
        </li>        
        <li class="nav-item">
            <a class="nav-link text-danger" href="logout.php?logout">Logout</a>
        </li>
      </ul>
  </nav>

 <!--  container start -->
	<div class="container-fluid">

  <!-- error msg -->
    <?php
        if(isset($errMSG)) { 
        ?>
              <div class="alert alert-<?php echo $errTyp;?>">
                    <?php echo $errMSG;?>
            </div>
        <?php
        }
      ?>

      <h3 class="welcome">
       Welcome to Our Home,
      <br>
      to meet with our lovely friends!
    </h3>

    <!-- container for form start -->
		<div class="back mt-3">

     <!--  form start -->
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off">
				<div class="form-group">
    				<label for="name">Name:</label>
    				<input type="text" name="userName" class="form-control"  placeholder="Enter email">
  				</div>
				<div class="form-group">
    				<label for="email">Email address:</label>
    				<input type="email" name="userEmail" class="form-control" placeholder="Enter email">
  				</div>
  				<div class="form-group">
    				<label for="pwd">Password:</label>
    				<input type="password" name="userPass" class="form-control" placeholder="Enter password">
  				</div>
  				<button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>
      <!-- form end -->

		</div>
    <!-- container for form end -->

	</div>
  <!-- container end -->

</body>
</html>
<?php ob_end_flush();?>