<!DOCTYPE html>
<html lang="en">
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

					Phone number:
					<div class="wrap-input100 validate-input" data-validate = "Valid phone is required: 0555555555">
					
						<input class="input100" type="text"  placeholder="Phone" name="phonenumber">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					Full name:
					<div class="wrap-input100 validate-input" data-validate = "Valid name is required">
						<input class="input100" type="text" name="name" placeholder="Name" id="name">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					Date of birth:
					<div class="wrap-input100 validate-input" data-validate = "Valid age is required">
						<input class="input100" type="date" name="age" placeholder="Age" id="age">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					City:
					<div class="wrap-input100 validate-input" data-validate = "Valid city is required">
						<!-- <input class="input100" type="text" name="city" placeholder="City"> -->
						<select class="select1 input100" name="city">
                                  <option selected value="">Select City:</option>
                                  <option value="Riyadh">Riyadh</option>
                                  <option value="Jeddah">Jeddah</option>
                                  <option value="Ad Dammam">Ad Dammam</option>
                                  <option value="Medina">Medina</option>
                                  <option value="At taif">At taif</option>
                                  <option value="Al Hufuf">Al Hufuf</option>
                                  <option value="Tabuk">Tabuk</option>
                                  <option value="Buraydah">Buraydah</option>
                                  <option value="Hail">Hail</option>
                                  <option value="Najran">Najran</option>
                                  <option value="Al Qatif">Al Qatif</option>
                                  <option value="Al Mubarraz">Al Mubarraz</option>
                                  <option value="Al Kharj">Al Kharj</option>
                                  <option value="Al Jubayl">Al Jubayl</option>
                                  <option value="Ar'ar">Ar'ar</option>
                                  <option value="Abha">Abha</option>
                                  <option value="Jazan">Jazan</option>
                                  <option value="Dhahran">Dhahran</option>
                                  <option value="Mecca">Mecca</option> 
                              </select>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					Blood type:
					<div class="wrap-input100 validate-input" data-validate = "Valid blood type is required: A+ , B+ ...etc">
						<!-- <input class="input100" type="text" name="bloodtype" placeholder="Blood Type"> -->
							<select  class= "input100 select1" name="bloodtype">
								<option selected value="" >Choose Blood Type</option>
								<option value="O+">O+</option>
								<option value="O-">O-</option>
								<option value="A+">A+</option>
								<option value="A-">A-</option>
								<option value="B+">B+</option>
								<option value="B-">B-</option>
								<option value="AB+">AB+</option>
							</select>
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