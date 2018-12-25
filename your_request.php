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
 			background-color: #E5DFDE;
 		}
 	</style>
</head>
<body>
<div class="container">
	<div class="row mt-5">
		<div class="col-md-12 pt-2 pb-2 text-center tbhead">
			<span class="font-weight-bold">Your Requests</span>
		</div>
	</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-light" style="width:100%;">
					<thead>
						<tr>
							<th>Blood Group</th>
							<th>Hospital</th>
							<th>Status</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$count = 0;
							$slt_req = "SELECT * FROM request WHERE email = '$username'";
	 						if ($result = mysqli_query($conn,$slt_req)) 
	 						{
	 							$count=mysqli_num_rows($result);
	 							while ($row = mysqli_fetch_array($result)) 
	 							{
	 								$res_id = $row["req_id"];
	 								?>
									<tr>
										<td><?php echo $row["hosptl_name"]; ?></td>
										<td><?php echo $row["blg_grp"]; ?></td>
										<td><?php echo $row["status"]; ?></td>
										<td>
											<?php 
											echo "<a href='your_request.php?delete=$res_id'>";
											 ?>
											<i class="fas fa-trash-alt fa-2x text-danger"></i>
											</a>
											 </td>
									</tr>
	 								<?php
	 							}
	 						}
						 ?>
					</tbody>
				</table>
				<?php 
				if ($count==0) 
				{
					?>
						<div class="text-center mt-5">
							<span style="font-size: 20px;">You have no request</span>
						</div>
					<?php
				}
				 ?>
			</div>
		</div>
</div>
</body>
</html>
<?php 
if (isset($_GET["delete"])) 
{
	$req_id = $_GET["delete"];
	$dlt_req = "DELETE FROM request WHERE req_id = '$req_id'";
	if (mysqli_query($conn,$dlt_req)) 
	{
		echo "<script>window.location.href='your_request.php';</script>";
	}
	else
	{
		echo $conn->error;
	}

}

 ?>