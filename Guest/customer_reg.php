<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v1 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="reg/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="reg/css/style.css">
	</head>
<?php
include("../dboperation.php");

$obj=new dboperation;
    $sql="select ward_id,ward_name from tbl_ward ";
    $res=$obj->executequery($sql); 
?>
	<body>

		<div class="wrapper" style="background-image: url('reg/images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="reg/images/registration-form-1.jpg" alt="">
				</div>
				<form action="customer_regaction.php" method="POST">
					<h3>Registration Form</h3>
					<div class="form-wrapper">
						<input type="text" name="cname" placeholder="Name" class="form-control " required>
					</div>
					<div class="form-wrapper">
						<input type="email" name="eadd" placeholder="Email Address" class="form-control" required>
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="cnum" placeholder="Contact Number" class="form-control" required>
						<i class="zmdi zmdi-account"></i>
					</div>
					
					<div class="form-wrapper">
						<input type="text" name="add" placeholder="Address" class="form-control" required>
						<i class="zmdi zmdi-home"></i>
					</div>
					<div class="form-wrapper">
						<select name="ward" id="" class="form-control" required>
							<option value="">Select Ward </option>
                    <?php while ($ward= mysqli_fetch_assoc($res)) { ?>
                        <option value=" <?php echo $ward['ward_id']; ?>">
                          <?php echo $ward['ward_name']; ?>
                        </option>
                         <?php } ?>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="uname" placeholder="Username" class="form-control" required>
					</div>
					<div class="form-wrapper">
						<input type="password" name="pass" placeholder="Password" class="form-control" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button type="submit" class="btn btn-primary" name="submit">Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>