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
             @if(Auth::check())

             @if(session('success'))
					<div class= "alert alert-success">
						{{session('success')}}
					</div>
            @endif
            

				<form class="login100-form validate-form" method="POST" action="/insurance">

					{{ csrf_field() }}

					<span class="login100-form-title p-b-33">
						Insurance Information
					</span>
					Company Name:
					<div class="wrap-input100 validate-input" data-validate = "Valid Name is required">
					
						<input class="input100" type="text"  placeholder="Insurance Company Name" name="companyname">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<br>
					Insurance Expiry Date:
					<div class="wrap-input100 validate-input" data-validate = "Valid date is required">
						<input class="input100" type="date" name="expirydate" placeholder="Insurance Expiry Date" id="expirydate">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<br>
					Car:
					<div class="wrap-input100 validate-input" data-validate = "Car is required: e.g.Jeep Wrangler">
					
						<input class="input100" type="text"  placeholder="Car" name="car">
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
					Policy Number:
					<div class="wrap-input100 validate-input" data-validate = "Policy Number is required">
					
						<input class="input100" type="text"  placeholder="Policy Number Number" name="policynumber">
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
							Submit Insurance
						</button>
					</div>
					<br>

					
					@include('partials.errors')
                </form>
                @else 
                <div class="content">

            
                    <div class="links">
                            <a href="http://127.0.0.1:8000/signup">Sign up</a>
                            <a href="http://127.0.0.1:8000/signin">Login</a>
                    </div>
            
                </div>
            @endif    
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