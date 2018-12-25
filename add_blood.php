<?php 
include("navbar.php");
$username = $_SESSION["username"];
$userTable = '';
if (isset($_SESSION["userType"])) 
{
	if ($_SESSION["userType"]!=$hospital) 
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
 	<link rel="stylesheet" href="style/dashboard.css">
 	<script src="js/dashboard.js"></script>
 	<style>
 		body
 		{
 			background-color: #F3F1F0;
 		}
 	</style>
 </head>
 <body>
 	<!-- all messages -->
 	<div class="container">
 		
	<!-- success message -->
 		<div class="mt-3 alert alert-success alert-dismissible fade show" id="query_success" style="display: none;">
		    <button type="button" onclick="refresh()" class="close" data-dismiss="alert">&times;</button>
			<strong>!Successful</strong> Blood added successfully
		</div>
	<!-- blood delete success message -->

		<div class="mt-3 alert alert-success alert-dismissible fade show" id="blood_del_success" style="display: none;">
		    <button type="button" onclick="refresh()" class="close" data-dismiss="alert">&times;</button>
			<strong>Blood record deleted successfully.</strong>
		</div>

		<!-- php code to call the function -->
		<?php 
			if (isset($_GET["success"])) 
			{
				?>
					<script>querySuccess()</script>
				<?php
			}
		 ?>
 	</div>
 	<div class="container mt-5">
 		<div class="row">
 			<div class="col-md-4 border-form" id="add_blood">
 				<div class="row">
 					<div class="col-md-12 form-header">
 						<span class="add_blood_text">ADD BLOOD SAMPLE</span>
 					</div>
 				</div>
		 		<form action="" method="POST" enctype="multipart/form-data" class="form-group">
		 			<?php 
		 				$slt_reg = "SELECT * FROM $userTable WHERE email = '$username'";
		 				if ($sel = mysqli_query($conn,$slt_reg)) 
		 				{
			 				if($result = mysqli_fetch_array($sel))
			 				{
			 					$hospital = $result["h_name"];
			 					$h_id = $result["h_id"];
			 					$email_id = $result["email"];
			 					?>
			 					<label for="Blood Group">Blood Group</label>
									<select name="blood_group" id="" class="form-control" required="true">
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
		<label for="Sample Image">Blood Sample</label> <br>
  			<input type="file" name="blood_sample" accept="image/*" required="true" />
		<label for="hospital">Hospital Name</label>
		<input type="text" value='<?php echo strtoupper($hospital); ?>' name='hospital' class='form-control' readonly='true'>
		<input type="hidden" value="<?php echo $h_id ?>" name="h_id">
		<label for="quentity">Quentity(bottle)</label>
		<input type="number" name="qnty" class="form-control" required="true">
		<br>
			 					<?php
			 				}
			 				else
			 				{
			 					echo $conn-error;
			 				}
		 				}
		 				else
		 				{
		 					echo $conn->error;
		 				}
		 			 ?>
		 			 <input type="submit" name="details" value="Upload Details" class="form-btn">
		 		</form>
 				
 			</div>
 			<!-- displaying all blood datas -->
 			<div class="offset-md-1 col-md-7">
 				<div style="overflow-x: auto; height: 100%;">
 					<table class="table table-bordered bg-light">
 						<thead class="form-header">
	 						<tr>
	 							<th>Blood_group</th>
	 							<th>Quentity</th>
	 							<th>Sample</th>
	 							<th>Delete</th>
	 						</tr>
 						</thead>
 						<?php 
 							$slt_blood = "SELECT * FROM upload_blood WHERE h_id='$h_id'";
 							if ($result2 = mysqli_query($conn,$slt_blood)) 
 							{
	 							while ($row = mysqli_fetch_array($result2)) 
	 							{
	 								$blood_id = $row["b_id"];
	 								echo "<tr>";
	 								?>
										<td><?php echo $row["b_group"]; ?></td>
										<td><?php echo $row["qnty"]; ?></td>
										<td class="text-center">
											<a  href="<?php echo $row["sample"]; ?>" target='_blank'>
												<i class="far fa-eye fa-2x"></i>
											</a>
										</td>
										<td class="text-center">
									<?php 
										echo "<a href='add_blood.php?deleteblood=$blood_id'>"; 
									?>
											<i class="fas fa-trash-alt fa-2x text-danger"></i>
											</a>
										</td>
	 								<?php
	 								echo "</tr>";
	 							}
 							}
 						 ?>
 					</table>
 				</div>
 			</div>
 		</div>
 	</div>

 </body>
 </html>
 <?php 
// uploading blood details
 if (isset($_POST["details"])) 
 {
 	$b_id = uniqid();
 	$blood_group = $_POST["blood_group"];
 	$hospital = $_POST["hospital"];
 	$h_id = $_POST["h_id"];
 	$qnty = $_POST["qnty"];
 	// $blood_sample = $_POST["blood_sample"];
 	// image file check and move  
	$f_blood_name = $_FILES['blood_sample']['name'];
    $f_blood_temp = $_FILES['blood_sample']['tmp_name'];
	$f_blood_size = $_FILES['blood_sample']['size'];
	$f_blood_shaperate = explode('.',$f_blood_name);
	$f_blood_extension = strtolower(end($f_blood_shaperate));
	$f_blood_newfile = uniqid().'.'.$f_blood_extension;
	$f_blood_store = "upload/".$f_blood_newfile;
        
	if ($f_blood_extension =='jpg' || $f_blood_extension=='jpeg'||$f_blood_extension=='png') 
	{
		if($f_blood_size>=5000000)
		{
			echo "<script>alert('File oversize');</script>";
			exit();
		}
		else if(move_uploaded_file($f_blood_temp, $f_blood_store))
		{
                // echo "<script>alert('Blood sample File moved');</script>";
        }
        else
        {
            echo "<script>alert('SERVER ERROR');</script>";
        }
	}
	else
	{
		echo "<script>alert('Please select jpg|jpeg|png file');</script>";
		exit();
	}
	// image file checking complete
	$insrt_blood = "INSERT INTO upload_blood (b_id, h_id, h_name, b_group, sample, qnty) 
	VALUES ('$b_id','$h_id','$hospital','$blood_group','$f_blood_store','$qnty')";
	if (mysqli_query($conn,$insrt_blood)) 
	{
		echo "<script>window.location.href='add_blood.php?success=yes';</script>";
	}
	else
	{
		echo $conn->error;
	}
 }
  ?>
  <?php 
  // delete blood
  if (isset($_GET["deleteblood"])) 
  {
  	$blood_id = $_GET["deleteblood"];
  	$del_blood = "DELETE FROM upload_blood WHERE b_id='$blood_id'";
  	if (mysqli_query($conn,$del_blood)) 
  	{
  		?>
			<script>
				deleteblood();
			</script>
  		<?php
  	}
  }
   ?>