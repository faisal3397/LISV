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
    
    <style>
        #donter {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        #donter td, #donter th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        #donter tr:nth-child(even){background-color: #ddd;}
        #donter tr:nth-child(odd){background-color: #ddd;}
        
        #donter tr:hover {background-color: #ddd;}
        
        #donter th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color:#B0B5B7;
            color: white;
        }
        </style>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                @if(Auth::check())
                    <span class="login100-form-title p-b-33">
                            Credit Cards
                        </span>
    
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
    
    
                        @if(count($cards) > 0)
                            <table id="donter">
                                <tr>
                                <th>Credit Card Number</th>
                                <th>Cardd Holder's Name</th>
                                <th>Expiry Date</th>
                                </tr>
                            </table>
    
                            @foreach($cards as $card)
    
                                <tr>
                                    <td>{{$card->creditcardnumber}}</td>
                                    <td>{{$card->cardholdername}}</td>
                                    <td>{{$card->expirydate}}</td>
                                    <td>
                                        <form method="POST" action="{{ route('cards.destroy', [$card->id]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>

                                    <td>
                                            <form method="POST" action="{{ route('cards.update', [$card->id]) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}

                                                Credit Card Number:
                                                <div class="wrap-input100 validate-input" data-validate = "Valid Credit Card Number is required">
                                                
                                                    <input class="input100" type="text"  placeholder="Credit Card Number:" name="creditcardnumber">
                                                    <span class="focus-input100-1"></span>
                                                    <span class="focus-input100-2"></span>
                                                </div>
                            
                                                Card Holder's Name:
                                                <div class="wrap-input100 validate-input" data-validate = "Name is required">
                                                
                                                    <input class="input100" type="text"  placeholder="Name" name="cardholdername">
                                                    <span class="focus-input100-1"></span>
                                                    <span class="focus-input100-2"></span>
                                                </div>
                            
                                                CVV:
                                                <div class="wrap-input100 rs1 validate-input" data-validate="cvv is required">
                                                    <input class="input100" type="password" name="cvv" placeholder="Card's cvv">
                                                    <span class="focus-input100-1"></span>
                                                    <span class="focus-input100-2"></span>
                                                </div>
                            
                                                <br>
                                                Card's Expiry Date:
                                                <div class="wrap-input100 validate-input" data-validate = "Valid date is required">
                                                    <input class="input100" type="date" name="expirydate" placeholder="Card's Expiry Date" id="expirydate">
                                                    <span class="focus-input100-1"></span>
                                                    <span class="focus-input100-2"></span>
                                                </div>
                                                <br>
                                                
                                                <button type="submit">Edit</button>
                                            </form>
                                        </td>
                                </tr>
                            @endforeach
                        
                        @else 
                            <span class="login100-form-title p-b-33">
                                    No Credit Cards Available
                            </span>
                        @endif
				<form class="login100-form validate-form" method="POST" action="/cards">

					{{ csrf_field() }}


					<span class="login100-form-title p-b-33">
						Add Credit Card
                    </span>
                    
                    Credit Card Number:
					<div class="wrap-input100 validate-input" data-validate = "Valid Credit Card Number is required">
					
						<input class="input100" type="text"  placeholder="Credit Card Number:" name="creditcardnumber">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					Card Holder's Name:
					<div class="wrap-input100 validate-input" data-validate = "Name is required">
					
						<input class="input100" type="text"  placeholder="Name" name="cardholdername">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					CVV:
					<div class="wrap-input100 rs1 validate-input" data-validate="cvv is required">
						<input class="input100" type="password" name="cvv" placeholder="Card's cvv">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<br>
					Card's Expiry Date:
					<div class="wrap-input100 validate-input" data-validate = "Valid date is required">
						<input class="input100" type="date" name="expirydate" placeholder="Card's Expiry Date" id="expirydate">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<br>

					

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Add Credit Card
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