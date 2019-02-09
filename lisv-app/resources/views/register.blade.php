<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Sign up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" method="POST" action="/signup">

					{{ csrf_field() }}

					<span class="login100-form-title p-b-33">
						Sign up
					</span>

					Name:
					<div class="wrap-input100 validate-input" data-validate = "Name is required">
					
						<input class="input100" type="text"  placeholder="Name" name="name">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					Phone number:
					<div class="wrap-input100 validate-input" data-validate = "Valid phone is required: 0555555555">
					
						<input class="input100" type="text"  placeholder="Phone" name="phonenumber">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					Email:
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required">
						<input class="input100" type="text" name="email" placeholder="Email" id="email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					Password:
					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					Re-enter your password:
					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password_confirmation" placeholder="Password Confirmation">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<br>
					<span class="login100-form-title p-b-33">
						Car Information
					</span>
					Vehicle Registration Number:
					<div class="wrap-input100 validate-input" data-validate = "Valid VIN is required">
					
						<input class="input100" type="text"  placeholder="VIN" name="vin">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<br>
					Registration Expiry Date:
					<div class="wrap-input100 validate-input" data-validate = "Valid date is required">
						<input class="input100" type="date" name="expirydate" placeholder="Registration Expiry Date" id="expirydate">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<br>
					Car's Company:
					<div class="wrap-input100 validate-input" data-validate = "Company is required: e.g.Jeep">
					
						<input class="input100" type="text"  placeholder="Car's Company" name="company">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<br>
					Model:
					<div class="wrap-input100 validate-input" data-validate = "Model is required: e.g.Wrangler">
					
						<input class="input100" type="text"  placeholder="Model" name="model">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<br>
					Year:
					<div class="wrap-input100 validate-input" data-validate = "Year is required: e.g.2014">
					
						<input class="input100" type="text"  placeholder="Year" name="year">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<br>
					Color:
					<div class="wrap-input100 validate-input" data-validate = "Color is required">
					
						<input class="input100" type="text"  placeholder="Color" name="color">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<br>
					Registration Type:
					<div class="wrap-input100 validate-input" data-validate = "Registration Type is required: e.g.private">
					
						<input class="input100" type="text"  placeholder="Registration Type" name="registrationtype">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<br>
					Plate Number:
					<div class="wrap-input100 validate-input" data-validate = "Plate Number is required: XYZ 123">
					
						<input class="input100" type="text"  placeholder="Plate Number" name="platenumber">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<br>
					

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Sign up
						</button>
					</div>
					<br>

					
					@include('partials.errors')
				
					

					<div class="text-center">
						<span class="txt1">
							have an account?
						</span>
						<br>
						<a href="http://127.0.0.1:8000/signin" class="txt2 hov1">
							login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/animsition/js/animsition.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>

	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>

	<script src="vendor/daterangepicker/moment.min.js"></script>

	<script src="vendor/daterangepicker/daterangepicker.js"></script>

	<script src="vendor/countdowntime/countdowntime.js"></script>

	<script src="js/main.js"></script>

</body>
</html> 