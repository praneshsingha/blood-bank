<?php 
	include("navbar.php");

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<script src="js/index.js"></script>
 	<style>
 		body
 		{
 			background-color: #E5DFDE;
 		}
 	</style>
 </head>
 <body>
<div class="container">
	 <!-- error message -->
<div class="mt-3 alert alert-danger alert-dismissible fade show" id="unauthorized" style="display: none;">
    <button type="button" onclick="refresh()" class="close" data-dismiss="alert">&times;</button>
	<strong>Hospital are not allowed to request blood.</strong>
</div>
<!-- login message -->
<div class="mt-3 alert alert-danger alert-dismissible fade show" id="login" style="display: none;">
    <button type="button" onclick="refresh()" class="close" data-dismiss="alert">&times;</button>
	<strong>Please login.</strong>
</div>

<!-- request success message -->
<div class="mt-3 alert alert-success alert-dismissible fade show" id="request" style="display: none;">
    <button type="button" onclick="refresh()" class="close" data-dismiss="alert">&times;</button>
	<strong>Successful!</strong> You request on queue.
</div>
<!-- invalid user blood group message -->
<div class="mt-3 alert alert-warning alert-dismissible fade show" id="wrongblood" style="display: none;">
    <button type="button" onclick="refresh()" class="close" data-dismiss="alert">&times;</button>
	<strong>Not Eligible to request blood.</strong> Only similar blood group can be requested same with the account holder.
</div>
<!-- php code -->
<?php 
if (isset($_GET["unauthorized"])) 
{
	?>
	<script>
		unauthorized();
	</script>
	<?php
}
if (isset($_GET["login"])) 
{
	?>
	<script>
		login();
	</script>
	<?php	
}
if (isset($_GET["requested"])) 
{
	?>
	<script>
		request();
	</script>
	<?php	
}
 ?>
</div>
 <!-- blood_samples start -->
<div class="container-fluid" id="bloods">

	<div class="container pt-3 pb-3">
		<div class="row mt-5 mb-5">

<?php 
$slt_blood = "SELECT * FROM upload_blood";
if ($result = mysqli_query($conn,$slt_blood)) 
{
	while ($row = mysqli_fetch_array($result)) 
	{
		$b_id = $row["b_id"];
		$h_id = $row["h_id"];
		$group = $row["b_group"];
		$hospital = $row["h_name"];
		$qnty = $row["qnty"];

 ?>
			<!-- blood details -->

			<div class="col-md-12 blood-detls p-3 mt-1" style="height: 180px;position: relative;">
				<div class="row">
					<div class="col-md-3 col-sm-12 text-center">
						<!-- <i class="fas fa-tint fa-6x"></i> -->
						<span>Blood Sample</span>
						<div style="width: 100px;position: absolute;">
							<?php 
								echo "<img src='".$row["sample"]."' class='sample-img'>";
							 ?>
						</div>
						 <br>
					</div>
					<div class="col-md-3 col-sm-12 text-center">
						<!-- <i class="fas fa-user fa-3x"></i> <br> -->
						Blood group <br>
						<span class="text-danger display-2"><?php echo $row["b_group"]; ?></span>
					</div>
					<div class="col-md-3 col-sm-12 text-center">
						<span><?php echo $row["h_name"] ?></span> <br>
						<i class="fas fa-hospital fa-4x mt-4"></i> <br>
					</div>
					<div class="col-md-3 col-sm-12 mt-5 text-center">
						<?php
						if ($qnty==0) 
						{
							?>
							<button class="btn " style="background-color: #EE5B59;">
								Not Available
							</button>
							<?php
						}
						else
						{

echo "<a href='blood_sample.php?bloodid=$b_id&hospital=$hospital&group=$group&hid=$h_id' class='btn
back-red'>Request Blood</a>";
						}

						 ?>
					</div>
				</div>
			</div>
			<?php 
	}
}
			 ?>
		</div>
	</div>
</div>
<!-- blood_samples end -->
 </body>
 </html>
<?php 
// if "request blood" is selected
if (isset($_GET["bloodid"])) 
{
	$user = "receiver";
	$hospital = "hospital";
	if (isset($_SESSION["userType"]))
	{
		
		if ($_SESSION["userType"]==$user) 
		{
			$username = $_SESSION["username"];
			$slt_reg = "SELECT * FROM user_register WHERE email='$username'";
			if ($row2 = mysqli_fetch_array($conn->query($slt_reg))) 
			{

				$phone = $row2["phone"];
				$full_name = $row2["name"];
				$userb_grup = $row2["blood_type"];
				$group = $_GET["group"];
				if ($userb_grup!=$group) 
				{
					?>
						<script>
							wrongblood();
						</script>
					<?php
					exit();
				}
				$reu_id = uniqid();
				$blood_id = $_GET["bloodid"];
				$h_id = $_GET["hid"];
				$hospital = $_GET["hospital"];
				date_default_timezone_set("Asia/Kolkata"); //setting timezone
				$c_date = date("y-m-d"); //current date
				$time =  date("h:i:s"); //current time
				$status = "pending";

				$insrt_req = "INSERT INTO request (req_id, b_id, hosptl_id, hosptl_name, blg_grp, email, full_name, phone, date, time, status) VALUES ('$reu_id','$blood_id','$h_id','$hospital','$group','$username','$full_name','$phone','$c_date','$time','$status')";
				if (mysqli_query($conn,$insrt_req)) 
				{
					echo "<script>window.location.href='blood_sample.php?requested=yes'</script>";
				}
			}

			
		}
		else
		{
			echo "<script>window.location.href='blood_sample.php?unauthorized=yes';</script>";
			exit();
		}
	}
	else
	{
		echo "<script>window.location.href='blood_sample.php?login=no';</script>";
		exit();
	}

}
 ?>

