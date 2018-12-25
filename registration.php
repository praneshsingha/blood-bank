<?php
	include("config/config.php");
	include("navbar.php");
if(isset($_SESSION["userType"])) 
{
	echo "<script>window.location.href='index.php';</script>";
	exit();
}
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style/registration.css">
	<script src="js/registration.js"></script>
	<style>
 		body
 		{
 			background-color: #F3F1F0;
 		}
 	</style>
</head>

<body>
	<!-- alert box for password error -->
	<div class="mt-3 alert alert-danger alert-dismissible fade show" id="password_error" style="display: none;">
	    <button type="button" onclick="refresh()" class="close" data-dismiss="alert">&times;</button>
	    <strong>Password did not match</strong>
  	</div>
</div>
 <?php 
if (isset($_GET["password_error"])) 
	{
		?>
			<script>
				password_error();
			</script>
		<?php
	}
if (isset($_GET["register"])) 
{
	?>
		<script>
			registerSuccess();
		</script>
	<?php
}
 ?>
<!-- registration start -->
<div class="container-fluid mt-5 mb-5">
	<div class="container">
		<div class="row" >
			<div class="col-md-2"> 	
				<div class="row text-center">
					<div class="col-md-12">
						<button class="btn" id="user-btn" onclick="changeuser()">Recever Registration</button>
					</div>
					<div class="col-md-12 mt-1 ">
						<button class="btn back-red-reg" id="hos-btn" onclick="changehos()">Hospital Registration</button>
					</div>
				</div>
			</div>
			<div class="col-md-7 offset-md-1 border-me bg-light" id="user">
				<span style="font-size: 30px;">User Registration</span>
				<!-- user registration form -->
				<!-- inporting data from users -->
				<form action="" class="form-group" method="POST">
					<label for="Full Name">Full Name</label>
					<input type="text" class="form-control" id="fullName" name="fullName" required="true">
					<label for="Email">Email</label>
					<input type="email" class="form-control" id="email" name="email" required="true">
					<label for="Email">Phone</label>

					<input type="text" class="form-control" id="phone" name="phone" required="true" maxlength="10" minlength="10" onkeypress="javascript:return isNumber(event)">
					
					<label for="Password">Password</label>
					<input type="password" minlength="10" class="form-control" id="password"  name="password" required="true">
					<label for="Re-Password">Re-Password</label>
					<input type="password" minlength="10" class="form-control" id="re-password" onkeyup="checkpass()" name="re-password" required="true">
					<label for="gender">Gender</label>
					<select name="gender" class="form-control select" id="gender" required="true">
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
					<label for="Blood Group">Blood Group</label>
					<select name="blood-group" class="form-control select" id="gender" required="true">
						<option value="">----------Select----------</option>
						<option value="">----------Select----------</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="AB">AB</option>
										<option value="O">O</option>
										<option value="A nag">A-</option>
										<option value="A pos">A+</option>
										<option value="B nag">B-</option>
										<option value="B pos">B+</option>
										<option value="AB nag">AB-</option>
										<option value="AB pos">AB+</option>
										<option value="O nag">O-</option>
										<option value="O pos">O+</option>
					</select>
					<label for="question">Secret Question</label>
					<select name="question" class="form-control">
						<option value="what is your pet name">What is your pet name?</option>
						<option value="What was the name of your first school">What was the name of your first school?</option>
						<option value="What is your car name">What is your car name?</option>
						<option value="What is the question">What is the question?</option>
						<option value="where is your home town">where is your home town?</option>
					</select>
					<label for="Answer">Answer</label>
					<input type="text" name="answer" class="form-control" required="true">
					<input type="hidden" value="receiver" name="gtype">
					<input type="submit" name="user_reg" class="my-btn mt-2" value="Register">
				</form>	
			</div>


			<div class="col-md-7 offset-md-1 border-me bg-light" id="hospital" style="display: none;">
				<span style="font-size: 30px;">Hospital Registration</span>
				<!-- hospital registration forms -->
				<form action="" class="form-group" method="POST">
					<label for="hospital">Valid Hospital ID Number</label>
					<input type="text" name="hospital_id" class="form-control" required="true">
					<label for="hospital">Hospital Name</label>
					<input type="text" name="hospital_name" class="form-control" required="true">
					<label for="Email">Email</label>
					<input type="email" class="form-control" name="email" required="true">
					<label for="Email">Phone</label>
					<input type="text" class="form-control" name="phone" required="true" maxlength="10" minlength="10" onkeypress="javascript:return isNumber(event)">
					<label for="Password">Password</label>
					<input type="password" minlength="10" class="form-control" id="hpassword" name="hpassword" required="true">
					<label for="Re-Password">Re-Password</label>
					<input type="password" minlength="10" class="form-control" id="hre-password" onkeyup="hcheckpass()" name="hre-password" required="true">
					<label for="question">Secret Question</label>
					<select name="question" class="form-control">
						<option value="what is your pet name">What is your pet name?</option>
						<option value="What was the name of your first school">What was the name of your first school?</option>
						<option value="What is your car name">What is your car name?</option>
						<option value="What is the question">What is the question?</option>
						<option value="where is your home town">where is your home town?</option>
					</select>
					<label for="Answer">Answer</label>
					<input type="text" name="answer" class="form-control" required="true">
					<input type="hidden" value="hospital" name="htype">
					<input type="submit" name="hospital_reg" class="my-btn mt-2" value="Register">
				</form>	
			</div>
		</div>
	</div>
</div>
<!-- registration end -->
</body>
</html>

<?php 
// if the form value is set then execute this code
	if (isset($_POST["user_reg"])) 
	{
		$reg_id = uniqid();
		$fullName = $_POST["fullName"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$password = $_POST["password"];
		$rePassword = $_POST["re-password"];
		$gender = $_POST["gender"];
		$bloodGroup = $_POST["blood-group"];
		$type = $_POST["gtype"];
		$question = $_POST["question"];
		$answer = $_POST["answer"];
		if ($password!=$rePassword) 
		{
			echo "<script>window.location.href='registration.php?password_error=true'</script>";
			exit();
		}
		// converting real password to hash using 1.MD5 2.SHA1 3.CRYPT
		$md5pass = md5($password);  
		$sha1pass = sha1($md5pass);
		$cryptpass = crypt($sha1pass,'pk');
		$insrt_uReg = "INSERT INTO user_register(reg_id, name, email, phone, password, blood_type, gender, type, question, answer) VALUES('$reg_id','$fullName','$email','$phone','$cryptpass','$bloodGroup','$gender','$type','$question','$answer')";
		if (mysqli_query($conn,$insrt_uReg)) 
		{
			$_SESSION["username"] = $email;
			$_SESSION["userType"] = $type;
			?>
				<script>
					window.location.href='index.php';
				</script>
			<?php
		}
		else
		{
			echo $conn->error;
		}
	}
 ?>

 <!-- hospital registration -->
 <?php 
 if(isset($_POST["hospital_reg"]))
 {
 	$hospital_id = $_POST["hospital_id"];
 	$hospital_name = $_POST["hospital_name"];
 	$email = $_POST["email"];
 	$phone = $_POST["phone"];
 	$hpassword = $_POST["hpassword"];
 	$hrePassword = $_POST["hre-password"];
 	$htype = $_POST["htype"];
 	$question = $_POST["question"];
	$answer = $_POST["answer"];
 	if ($hpassword!=$hrePassword) 
	{
		echo "<script>window.location.href='registration.php?password_error=true'</script>";
		exit();
	}
	$md5pass = md5($hpassword);  
	$sha1pass = sha1($md5pass);
	$cryptpass = crypt($sha1pass,'pk');
	$insrt_hReg = "INSERT INTO hospital_reg (h_id, h_name, email, phone, password, type, question, answer) VALUES
	('$hospital_id','$hospital_name','$email','$phone','$cryptpass','$htype','$question','$answer')";
	if(mysqli_query($conn,$insrt_hReg)) 
	{
		$_SESSION["username"] = $email;
		$_SESSION["userType"] = $htype;
		echo "<script>window.location.href='index.php';</script>";
	}
	else
	{
		echo $conn->error;
	}
 }
  ?>