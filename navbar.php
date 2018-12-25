<?php 
	session_start();
	include("config/config.php");
	$user = "receiver";
	$hospital = "hospital";
	$userType='';
	$username='';
	$userTable='';
	// checking if user has logged in
	if (isset($_SESSION["userType"]))
	{
		if ($_SESSION["userType"]==$user) 
		{
			$GLOBALS['type'] = $_SESSION["userType"];
			$GLOBALS['username'] = $_SESSION["username"];
			$GLOBALS['userTable'] = "user_register";
		}
	}
	// checking if the hospitan has logged in
	else if (isset($_SESSION["userType"])) 
	{
		if ($_SESSION["userType"]==$hospital) 
		{
			$GLOBALS['type'] = $_SESSION["userType"];
			$GLOBALS['username'] = $_SESSION["username"];
			$GLOBALS['userTable'] = "hospital_reg";
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blood Bank</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="logo/blood_bank2.png" type="image/png">

	<link rel="stylesheet" href="style/index.css">
	
	<script src="js/main.js"></script>

	<script src="js/navbar.js"></script>
	<!-- =============stylesheet============= -->
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<!-- fonr awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<!-- css page -->
	<link rel="stylesheet" href="style/navbar.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<script src="js/index.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ee302d;color: white;">
  	<!-- <a class="navbar-brand" href="#">Blood Bank</a> -->
  	<img src="logo/blood_bank.png" alt=""><span style="font-size: 30px;"><u>Blood Bank</u></span>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  	</button>
  	<div class="collapse navbar-collapse" id="navbarNav">
    	<ul class="nav navbar-nav ml-auto">
      		<li class="nav-item active active">
        		<a class="nav-link" href="index.php">Home</a>
      		</li>
      		<li class="nav-item active active">
        		<a class="nav-link" href="blood_sample.php">Blood Sample</a>
      		</li>
      		<?php 
      		// checking if usertype(any login) has set
      			if (!isset($_SESSION["userType"])) 
      			{
      				?>
					    <li class="nav-item active">
					    	<a class="nav-link" href="registration.php">Registration</a>
				   		</li>
      				<?php
      			}
      		 ?>
	   		<?php 
	   		// if hospital logged in then show dashboard option
	   			if (isset($_SESSION["userType"])) 
	   			{
	   				if ($_SESSION["userType"]==$hospital) 
	   				{
	   					?>
					   		<li class="nav-item active active">
				        		<a class="nav-link" id="dash_link" href="Dashboard.php">Dashboard</a>
				      		</li>
				      		<li class="nav-item active active">
				        		<a class="nav-link" id="dash_link" href="hosprofile.php">Profile</a>
				      		</li>
	   					<?php
	   				}
	   			}

	   		 ?>
	   		 <?php 
	   		// if hospital logged in then show dashboard option
	   			if (isset($_SESSION["userType"])) 
	   			{
	   				if ($_SESSION["userType"]==$user) 
	   				{
	   					?>
					   		<li class="nav-item active active">
				        		<a class="nav-link" id="dash_link" href="your_request.php">Your Request</a>
				      		</li>
				      		<li class="nav-item active active">
				        		<a class="nav-link" id="dash_link" href="userprofile.php">Profile</a>
				      		</li>
	   					<?php
	   				}
	   			}
	   			
	   		 ?>
	   		 <?php 
	   		 	// if logged in show logout else login
	   		 if (isset($_SESSION["userType"])) 
	   		 {
	   		 	?>
					<li class="nav-item active">
		    			<a class="nav-link" href="logout.php">logout</a>
	    			</li>
	   		 	<?php
	   		 }
	   		 else
	   		 {
	   		 	?>
				    <li class="nav-item active">
				    	<a class="nav-link" href="login.php">Login</a>
			    	</li>
	   		 	<?php
	   		 }
	   		  ?>
    	</ul>
    </div>
</nav>
</body>
</html>