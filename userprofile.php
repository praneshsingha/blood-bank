<?php 
include("navbar.php");
$username = $_SESSION["username"];
$userTable = '';
if (isset($_SESSION["userType"])) 
{
	if ($_SESSION["userType"]!=$user) 
	{
		echo "<script>window.location.href='index.php';</script>";
		exit();	
	}
	else
	{
		$GLOBALS['userTable'] = 'hospital_reg';
	}
}
else
{
	echo "<script>window.location.href='index.php';</script>";
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<link rel="stylesheet" href="style/user.css">
 	<style>
 		body
 		{
 			background-color: #F3F1F0;
 		}
 	</style>
 </head>
 <body>
<?php 
$slt_reg = "SELECT * FROM user_register WHERE email = '$username'";
if ($result=mysqli_query($conn,$slt_reg)) 
{
	if ($row = mysqli_fetch_array($result)) 
	{
		?>
			 <div class="container" style="background-color: white;">
			 	<div class="row content mt-5 text-center">
			 		<div class="col-md-6">
			 			<span class="top">Full Name</span> <br>
			 			<span class="details"><?php echo $row["name"]; ?></span>
			 		</div>
			 		<div class="col-md-6">
			 			<span class="top">Username</span> <br>
			 			<span class="details"><?php echo $row["email"]; ?></span>
			 		</div>
			 	</div>
			 	<div class="row content text-center">
			 		<div class="col-md-6">
			 			<span class="top">Phone</span> <br>
			 			<span class="details"><?php echo $row["phone"]; ?></span>
			 		</div>
			 		<div class="col-md-6">
			 			<span class="top">Blood Group</span> <br>
			 			<span class="details"><?php echo $row["blood_type"]; ?></span>
			 		</div>
			 	</div>
			 	<div class="row content text-center">
			 		<div class="col-md-6">
			 			<span class="top">Gender</span> <br>
			 			<span class="details"><?php echo $row["gender"]; ?></span>
			 		</div>
			 		<div class="col-md-6">
			 			<span class="top">Account Type</span> <br>
			 			<span class="details"><?php echo $row["type"]; ?></span>
			 		</div>
			 	</div>
			 </div>
		<?php
	}
}
?>
 </body>
 </html>