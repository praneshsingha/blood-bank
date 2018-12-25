<?php 
	include("navbar.php");
	if (isset($_SESSION["userType"])) 
	{
		echo "<script>windiw.location.href='index.php';</script>";
	}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<link rel="stylesheet" href="style/login.css">
 	<script src="js/login.js"></script>
 </head>
 <body>
 <!-- login start -->
<div class="container-fluid mt-5" id="login-div">
	<div class="container">
	 <!-- error message -->
<div class="mt-3 alert alert-danger alert-dismissible fade show" id="password_error" style="display: none;">
    <button type="button" onclick="refresh()" class="close" data-dismiss="alert">&times;</button>
	<strong>Password did not match</strong>
</div>
<!-- error message -->
<div class="mt-3 alert alert-danger alert-dismissible fade show" id="mactingerror" style="display: none;">
    <button type="button" onclick="refresh()" class="close" data-dismiss="alert">&times;</button>
	<strong>Information did not match</strong>
</div>
 <!-- error message -->
	<?php 
		if (isset($_GET["error"])) 
		{
			?>
			<script>
				call_error();
			</script>
			<?php
		}
		if (isset($_GET["error"])) 
		{
			?>
			<script>
				call_error();
			</script>
			<?php
		}
	 ?>


		<div class="row">
			<div class="col-md-6 btn p-2" id="user_login" onclick="showUser()">
				User Login
			</div>
			<div class="col-md-6 btn p-2" id="hos_login" onclick ="showHospital()">
				Hospital Login
			</div>
		</div>
		<div class="row mt-3">
			<!-- user login -->
			<div class="offset-md-0 col-md-5 border-me" id="user">
				<span style="font-size: 30px;">User Login</span>
				<form action="" class="form-group" method="POST" >
					<label for="Email">Email</label>
					<input type="email" class="form-control" name="email" required="true">
					<label for="Email">Password</label>
					<input type="Password" class="form-control" name="password" required="true">
					<!-- for lage screen -->
					<span  onclick="usershowreset()" class="d-none d-md-block" style="cursor: pointer;">Forgot Passwrd?</span>
					<!-- for small screen -->
					<span  onclick="showMobuserReset()" class="d-block d-md-none" style="cursor: pointer;">Forgot Password</span>
					<button type="submit" name="log_user" value="submit" class="btn btn-outline-dark mt-2"><i class="fas fa-unlock fa-2x"> Unlock Me</i></button>
				</form>	
			</div>
			<div class="offset-md-7 col-md-5 border-me" id="hospital" style="display: none;">
				<span style="font-size: 30px;">User / Hospital Login</span>
				<!-- hospital login -->
				<form action="" class="form-group" method="POST">
					<label for="Email">Email</label>
					<input type="email" class="form-control" name="email" required="true">
					<label for="Email">Hospital ID</label>
					<input type="text" class="form-control" name="hospital_id" required="true">
					<label for="Email">Password</label>
					<input type="Password" class="form-control" name="password" required="true">
					<!-- for lage screen -->
					<span  onclick="hosptlshowreset()" class="d-none d-md-block" style="cursor: pointer;">Forgot Passwrd?</span>
					<!-- for small screen -->
					<span  onclick="showMobhosReset()" class="d-block d-md-none" style="cursor: pointer;">Forgot Passwrd?</span>
					<button type="submit" name="log_hospital" value="submit" class="btn btn-outline-dark mt-2"><i class="fas fa-unlock fa-2x"> Unlock Me</i></button>
				</form>	
			</div>
		</div>
	</div>
</div>

<!-- reset large user -->
<div class="container-fluid d-none d-md-block reset" id="userreset" style="display:none;">
	<div id="reset-dtls">
		<div style="left: 10px;top: 10px; cursor: pointer;" onclick="closeme()">
			<i class="fas fa-times-circle text-danger fa-2x"></i>
		</div>
		<div class="container-fluid">
			<div class="col">
				<div class="col-md-12 text-center p-2">
					<span style="font-size: 30px;">Password Reset</span>
				</div>
			</div>
			<div class="col">
				<div class="col-md-12 text-center p-2">
					<form action="login.php" method="POST" autocomplete="off">
						<label for="email">Email</label>
			<input type="email" name="email" class="form-control" required="true" autocomplete="off">
						<label for="Secret Question">Secret Question</label>
						<select name="question" class="form-control">
							<option value="what is your pet name">What is your pet name?</option>
							<option value="What was the name of your first school">What was the name of your first school?</option>
							<option value="What is your car name">What is your car name?</option>
							<option value="What is the question">What is the question?</option>
							<option value="where is your home town">where is your home town?</option>
						</select>
						<label for="answer">Answer</label>
						<input type="text" name="answer" class="form-control" required="true">
						<input type="submit" name="setuser1" class=""> <br>
						<span style="color: red;">* Please type using keyboard</span>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- for small screen -->
<div class="container d-block d-md-none"  >
	<div  style="display: none;" id="userresets" class="border-me">
		<div class="p-2">
			<span style="font-size: 30px;">Reset Password</span>
		</div>
	<form action="" method="POST" autocomplete="false">
		<label for="email">Email</label>
		<input type="email" name="email" required="true" class="form-control" autocomplete="false">
		<label for="Secret Question">Secret Question</label>
		<select name="question" class="form-control">
			<option value="what is your pet name">What is your pet name?</option>
			<option value="What was the name of your first school">What was the name of your first school?</option>
			<option value="What is your car name">What is your car name?</option>
			<option value="What is the question">What is the question?</option>
			<option value="where is your home town">where is your home town?</option>
			</select>
		<label for="answer">Answer</label>
		<input type="text" name="answer" class="form-control" required="true">
		<input type="submit" name= "setuser2" class="">
	</form>
	</div>
</div>
<!-- reset large hospital -->
<div class="container-fluid d-none d-md-block reset" id="hospitlreset" style="display:none;">
	<div id="reset-dtls">
		<div style="left: 10px;top: 10px; cursor: pointer;" onclick="closeme()">
			<i class="fas fa-times-circle text-danger fa-2x"></i>
		</div>
		<div class="container-fluid">
			<div class="col">
				<div class="col-md-12 text-center p-2">
					<span style="font-size: 30px;">Password Reset</span>
				</div>
			</div>
			<div class="col">
				<div class="col-md-12 text-center p-2">
					<form action="" method="POST" autocomplete="false">
						<label for="email">Email</label>
						<input type="email" name="email" required="true" class="form-control" autocomplete="false">
						<label for="Secret Question">Secret Question</label>
						<select name="question" class="form-control">
							<option value="what is your pet name">What is your pet name?</option>
							<option value="What was the name of your first school">What was the name of your first school?</option>
							<option value="What is your car name">What is your car name?</option>
							<option value="What is the question">What is the question?</option>
							<option value="where is your home town">where is your home town?</option>
						</select>
						<label for="answer">Answer</label>
						<input type="text" name="answer" class="form-control" required="true">
						<input type="submit" name="hos_set" class=""> <br>
						<span style="color: red;">* Please type using keyboard</span>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- for small hospital -->
<div class="container d-block d-md-none">
	<div  style="display: none;" id="hosreset" class="border-me">
		<div class="p-2">
			<span style="font-size: 30px;">Reset Password</span>
		</div>
	<form action="" method="POST" autocomplete="false">
		<label for="email">Email</label>
		<input type="email" name="email" required="true" class="form-control" autocomplete="false">
		<label for="Secret Question">Secret Question</label>
		<select name="question" class="form-control">
			<option value="what is your pet name">What is your pet name?</option>
			<option value="What was the name of your first school">What was the name of your first school?</option>
			<option value="What is your car name">What is your car name?</option>
			<option value="What is the question">What is the question?</option>
			<option value="where is your home town">where is your home town?</option>
		</select>
		<label for="answer">Answer</label>
		<input type="text" name="answer" class="form-control" required="true">
		<input type="submit" name= "hos_set" class="">
	</form>
	</div>
</div>
<!-- login end -->
 </body>
 </html>

 <?php 
 // user login check

 if (isset($_POST["log_user"])) 
 {
 	$email = $_POST["email"];
 	$password = $_POST["password"];

 	$md5pass = md5($password);  
	$sha1pass = sha1($md5pass);
	$cryptpass = crypt($sha1pass,'pk');
	$slt_reg = "SELECT * FROM user_register WHERE email='$email' AND password='$cryptpass'";

	if($result = mysqli_fetch_array($conn->query($slt_reg))) 
	{
		$_SESSION["username"] = $email;
		$_SESSION["userType"] = $result["type"];
		echo "<script>window.location.href='index.php';</script>";
	}
	else
	{
		echo "<script>window.location.href='login.php?error=yes';</script>";
		exit();
	}
 }
 else
 {
 	echo $conn->error;
 }

  ?>
  <!-- hospital login -->
  <?php 
  if (isset($_POST["log_hospital"])) 
  {
  	$email = $_POST["email"];
  	$hospital_id = $_POST["hospital_id"];
  	$password = $_POST["password"];
  	$md5pass = md5($password);  
	$sha1pass = sha1($md5pass);
	$cryptpass = crypt($sha1pass,'pk');
  	$slt_hos = "SELECT * FROM hospital_reg WHERE email='$email' AND h_id = '$hospital_id' AND password='$cryptpass'";
  	if($result = mysqli_fetch_array($conn->query($slt_hos))) 
	{
		$_SESSION["username"] = $email;
		$_SESSION["userType"] = $result["type"];
		echo "<script>window.location.href='index.php';</script>";
	}
	else
	{
		echo "<script>window.location.href='login.php?error=yes';</script>";
		exit();
	}
  }
   ?>

   <!-- for password reset of user -->
 <?php 
// user larger screen
if (isset($_POST["setuser1"])) 
{
	$email = $_POST["email"];
	$question = $_POST["question"];
	$answer = $_POST["answer"];
	$slt_user = "SELECT * FROM user_register WHERE email='$email' AND question = '$question' AND answer = '$answer'";
	if ($res2 = mysqli_query($conn,$slt_user)) 
	{
		if (mysqli_num_rows($res2)==1) 
		{
			$reset_val = uniqid();
			$updt_user = "UPDATE user_register SET pss_reset = '$reset_val' WHERE email = '$email'";
			if (mysqli_query($conn,$updt_user)) 
			{
				echo "<script>window.location.href='reset.php?resetValue=$reset_val&username=$email'</script>";
				exit();
			}
		}
		else
		{
			?>
				<script>
					mactingerror();
				</script>
			<?php
		}
	}
}
// user small screen
if (isset($_POST["setuser2"])) 
{
	$email = $_POST["email"];
	$question = $_POST["question"];
	$answer = $_POST["answer"];
	$slt_user = "SELECT * FROM user_register WHERE email='$email' AND question = '$question' AND answer = '$answer'";
	if ($res2 = mysqli_query($conn,$slt_user)) 
	{
		if (mysqli_num_rows($res2)==1) 
		{
			$reset_val = uniqid();
			$updt_user = "UPDATE user_register SET pss_reset = '$reset_val' WHERE email = '$email'";
			if (mysqli_query($conn,$updt_user)) 
			{
				echo "<script>window.location.href='reset.php?resetValue=$reset_val&username=$email'</script>";
				exit();
			}
		}
		else
		{
			echo "Did not match";
		}
	}
}
  ?>

<!-- reset password for hospital -->
<?php 
if (isset($_POST["hos_set"])) 
{
	$email = $_POST["email"];
	$question = $_POST["question"];
	$answer = $_POST["answer"];
	$slt_user = "SELECT * FROM hospital_reg WHERE email='$email' AND question = '$question' AND answer = '$answer'";
	if ($res2 = mysqli_query($conn,$slt_user)) 
	{
		if (mysqli_num_rows($res2)==1) 
		{
			$reset_val = uniqid();
			$updt_user = "UPDATE hospital_reg SET pss_reset = '$reset_val' WHERE email = '$email'";
			if (mysqli_query($conn,$updt_user)) 
			{
				echo "<script>window.location.href='reset.php?resetValue=$reset_val&username=$email'</script>";
				exit();
			}
		}
		else
		{
			?>
				<script>
					mactingerror();
				</script>
			<?php
		}
	}
}
 ?>