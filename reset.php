<?php 
	include("navbar.php");
	if (isset($_GET["resetValue"])) 
	{
		$reset_value = $_GET["resetValue"];
		$email= $_GET["username"];
		$check_user = "SELECT * FROM user_register WHERE pss_reset = '$reset_value'";
		$check_hos = "SELECT * FROM hospital_reg WHERE pss_reset = '$reset_value'";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style/login.css">
	<script src="js/login.js"></script>
</head>
<body>
	

<?php

		if (mysqli_query($conn,$check_user)) 
		{
			?>
<div class="container">
	<!-- password error -->
<div class="mt-3 alert alert-danger alert-dismissible fade show" id="password_error" style="display: none;">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Password did not match</strong>




<!-- php password error -->
<?php 
if (isset($_GET["error"])) 
{
	?>
		<script>
			passworderror();
		</script>
	<?php
}
 ?>
</div>
			</div>
			<div class="container">
				<div class="row mt-5">
					<div class="col-md-4 offset-md-4 pt-1 pb-1" id="set_text">
						<span style="font-size: 30px;" >Set Password</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 offset-md-4 border-me">
						<form action="" method="POST">
							<label for="New Password">New Password</label>
							<input type="password" id="password" name="password" class="form-control" required="true">
							<label for="repassword">Re-Password</label>
							<input type="password" class="form-control" onkeyup ="checkpass()" id="repassword" name="repassword" required="true">
							<input type="hidden" value="<?php echo $email; ?>" name="username">
							<input type="hidden" name="reset_value" value="<?php echo $reset_value; ?>">
							<br>
							<input type="submit" class="btn btn-outline-dark" value="Set Password" name="user_submit">
						</form>
					</div>
				</div>
			</div>

			<?php
		}
		else if (mysqli_query($conn,$check_hos)) 
		{
			?>
			<div class="container">
				<div class="row mt-5">
					<div class="col-md-4 offset-md-4 pt-1 pb-1" id="set_text">
						<span style="font-size: 30px;" >Set Password</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 offset-md-4 border-me">
						<form action="" method="POST">
							<label for="New Password">New Password</label>
				<input type="password" id="password" name="password" class="form-control" required="true">
							<label for="repassword">Re-Password</label>
							<input type="password" id="repassword" onkeyup="checkpass()" class="form-control" name="repassword" required="true">
							<br>
							<input type="submit" class="btn btn-outline-dark" value="Set Password" name="hos_submit">
						</form>
					</div>
				</div>
			</div>

			<?php
		}
		else
		{
			echo "<script>window.location.href='index.php'</script>";
		}

	}
 ?>
 <?php 
// change user password
 if (isset($_POST["user_submit"])) 
 {
 	$password = $_POST["password"];
 	$repassword = $_POST["repassword"];
 	$username = $_POST["username"];
 	$resetValue = $_POST["reset_value"];
 	if ($password==$repassword) 
 	{
	 	$md5pass = md5($password);  
		$sha1pass = sha1($md5pass);
		$cryptpass = crypt($sha1pass,'pk');
		$updt_user = "UPDATE user_register SET password = '$cryptpass' WHERE email = '$username'";
		if (mysqli_query($conn,$updt_user)) 
		{
			echo "<script>window.location.href='login.php'</script>";
		}
 	}
	else
	{
echo "<script>
	window.location.href='reset.php?error=yes&username=$username&resetValue=$resetValue';
	</script>";
	}
 }
  ?>
 <!-- for hospital -->
 <?php 
if (isset($_POST["user_submit"])) 
 {
 	$password = $_POST["password"];
 	$repassword = $_POST["repassword"];
 	$username = $_POST["username"];
 	$resetValue = $_POST["reset_value"];
 	if ($password==$repassword) 
 	{
	 	$md5pass = md5($password);  
		$sha1pass = sha1($md5pass);
		$cryptpass = crypt($sha1pass,'pk');
		$updt_user = "UPDATE hospital_reg SET password = '$cryptpass' WHERE email = '$username'";
		if (mysqli_query($conn,$updt_user)) 
		{
			echo "<script>window.location.href='login.php'</script>";
		}
 	}
	else
	{
echo "<script>
	window.location.href='reset.php?error=yes&username=$username&resetValue=$resetValue';
	</script>";
	}
 }
  ?>
</body>
</html>