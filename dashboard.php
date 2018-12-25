<?php 
include("navbar.php");
if (isset($_SESSION["userType"])) 
{
	if ($_SESSION["userType"]!=$hospital) 
	{
		echo "<script>window.location.href='index.php';</script>";
		exit();	
	}
}
else
{
	echo "<script>window.location.href='index.php';</script>";
	exit();
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<link rel="stylesheet" href="style/dashboard.css">
 	<script src="js/dashboard.js"></script>
 </head>
 <body>
 	<div class="container-fluid back-col">
 		<div class="container">
	 		<div class="row pt-5">
	 			<div class="col-md-4 offset-md-1 text-center detals" id="request_div">
						<p class="mt-4 detals-text">All the request from user for this particular account.</p>
	 				<a href="view_request.php" target="_blank" class="my-btn">View Request</a>
	 			</div>
	 			<div class="col-md-4 offset-md-1 text-center detals">
					<p class="mt-4 detals-text">Click to add blood information which are available now.</p>
	 				<a href="add_blood.php" target="_blank" class="my-btn">Add Blood</a>
	 			</div>	
	 		</div>
	 	</div>
 	</div>

 	<div class="container mt-5">
 		<?php
 			$count=0; 
 			$username = $_SESSION["username"];
 			$slt_req = "SELECT * FROM hospital_reg WHERE email='$username'";
 			if($row = mysqli_fetch_array($conn->query($slt_req))) 
 			{
 				$hos_id = $row["h_id"]	;
 				$slt_req = "SELECT * FROM request WHERE hosptl_id = '$hos_id'";
 				if ($check = mysqli_query($conn,$slt_req)) 
 				{
 					$count = mysqli_num_rows($check);
 					?>
Request Bar <br>
 		0<div class="progress">
  			<?php
  	echo 
  	"<div class='progress-bar progress-bar-striped progress-bar-animated' style='width:".$count."%'></div>
  	Total: $count";
 				}
 			}
 		 ?>
		</div>

 	</div>
 </body>
 </html>