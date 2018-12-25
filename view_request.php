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
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8"> 
 	<link rel="stylesheet" href="style/dashboard.css">
 	<script src="js/dashboard.js"></script>
 	<style>
 		body
 		{
 			background-color: #E5DFDE;
 		}
 	</style>
 </head>
 <body>
 <div class="container-fluid mt-4">
 	<div class="container">
 		<?php 
		// changing status
		 if (isset($_GET["changeStatus"])) 
		 {
		 	$res_id = $_GET["changeStatus"];
		 	?>
			<form action="" method="post">
				<select name="mystatus" class="form-control">
					<option value="Pending">Pending</option>
					<option value="Rejected">Rejected</option>
					<option value="Approve">Approve</option>
				</select>
				<input type="hidden" value="<?php echo $res_id; ?>" name='res_id'>
				<input type="submit" class="form-btn mt-1 mb-1" value="Change" name="change">
			</form>
		 	<?php
		 }
		 if (isset($_POST["change"])) 
		 {
		 	$status = $_POST["mystatus"];
		 	$res_id = $_POST["res_id"];

		 	if ($status=="Approve") 
		 	{
			 	$updt_req = "UPDATE request SET status = '$status' WHERE req_id = '$res_id'";
			 	if (mysqli_query($conn,$updt_req)) 
			 	{
			 		$slt_req = "SELECT * FROM request WHERE req_id = '$res_id' ";
			 		if ($res = mysqli_fetch_array($conn->query($slt_req))) 
			 		{
			 			$blood_id = $res["b_id"];
			 			$updt_blood = "UPDATE upload_blood SET qnty = qnty-1 WHERE b_id='$blood_id'";
			 			if (mysqli_query($conn,$updt_blood)) 
			 			{
			 				echo "<script>window.location.href='view_request.php';</script>";
			 				exit();
			 			}
			 		}
			 		exit();
			 	}
		 	}
		 	else
		 	{
		 		$updt_req = "UPDATE request SET status = '$status' WHERE req_id = '$res_id'";
			 	if (mysqli_query($conn,$updt_req)) 
			 	{
			 		echo "<script>window.location.href='view_request.php';</script>";
			 		exit();
			 	}	
		 	}

		 }
		  ?>
 	</div>
 	<div class="row">
 		<div class="col-md-12 text-center form-header">
 			<span class="add_blood_text">BLOOD REQUESTED LIST</span>
 		</div>
 		<div class="col-md-12">
 			<table class="table table-bordered bg-light">
 				<thead>
 					<tr>
 						<th>Blood ID</th>
 						<th>Hospital ID</th>
 						<th>Hospital Name</th>
 						<th>Blood Group</th>
 						<th>Email</th>
 						<th>Full Name</th>
 						<th>Phone</th>
 						<th>Date</th>
 						<th>Time</th>
 						<th>Status</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php 
 						$slt_reg = "SELECT * FROM hospital_reg WHERE email = '".$_SESSION["username"]."'";
 						if ($res2 = mysqli_fetch_array($conn->query($slt_reg))) 
 						{
 							$hos_id = $res2["h_id"];
	 						$slt_req = "SELECT * FROM request WHERE hosptl_id = '$hos_id'";
	 						if ($result = mysqli_query($conn,$slt_req)) 
	 						{
	 							while ($row = mysqli_fetch_array($result)) 
	 							{
	 								$res_id = $row["req_id"];
	 								?>
									<tr>
										<td><?php echo $row["b_id"]; ?></td>
										<td><?php echo $row["hosptl_id"]; ?></td>
										<td><?php echo $row["hosptl_name"]; ?></td>
										<td><?php echo $row["blg_grp"]; ?></td>
										<td><?php echo $row["email"]; ?></td>
										<td><?php echo $row["full_name"]; ?></td>
										<td><?php echo $row["phone"]; ?></td>
										<td><?php echo $row["date"]; ?></td>
										<td><?php echo $row["time"]; ?></td>
										<td><?php echo $row["status"]; ?></td>
										<td>
											<?php 
											echo "<a href='view_request.php?changeStatus=$res_id'>
												Change
											</a>";
											 ?>
											 </td>
									</tr>
	 								<?php
	 							}
	 						}
 						}
 					 ?>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>
 </body>
 </html>
