<!doctype html>
<html lang="en">
  <head>

  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="login/css/style.css">




    <link href="index/css/style.css" rel="stylesheet">


	</head>
	<?php
	include("header.php");
	?>
	<body class="img js-fullheight" style="background: url(login/images/bg.jpg) no-repeat center center fixed; background-size: cover; margin: 0; overflow: hidden; height: 700px; ;">
	<section class="ftco-section" style="padding-top: 20px;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<form action="loginaction.php" class="signin-form"  method="POST">
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Username"  name="username" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3 " name="submit" >LogIn</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center"> New here? Join us </p>
			  
	            <div class="social d-flex justify-content-center align-items-center text-center"
       style="width: 100px; height: 50px; margin: 0 auto;">
    <a href="customer_reg.php" class="px-2 py-2 mr-md-1 rounded"><span>👤</span></a>
  </div>

		
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

