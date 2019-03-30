<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style0.css">
    <title>Add New Card</title>
</head>
<body>

    @include('partials.nav')

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        @if(Auth::check())
                        <form method="GET" action="/insuranceOffer">
                            <button type="submit" class="btn btn-success btn-lg btn-block text-uppercase" style="border-radius: 25px;">Find Best Offer</button>
                        </form>
                        <h5 class="card-title text-center">Already have Insurance?</h5>
						<form class="form-signin" method="POST" action="/insurance">
                            {{ csrf_field() }}
                            
							<div class="form-label-group">
                                    <input type="text" id="companyname" class="form-control" placeholder="Company Name" name="companyname" required >
                                    <label for="companyname">Company Name</label>
                            </div>

                            <div class="form-label-group">
                                    <input type="date" id="expirydate" class="form-control" placeholder="Expiry Date" name="expirydate" required >
                                    <label for="expirydate">Expiry Date</label>
                            </div>

							<div class="form-label-group">
                                <input type="text" id="car" class="form-control" placeholder="Car" name="car" required >
                                <label for="car">Car</label>
                            </div>
                            
                            <div class="form-label-group">
                                    <input type="text" id="year" class="form-control" placeholder="Year" name="year" required >
                                    <label for="year">Year</label>
                            </div>

                            <div class="form-label-group">
                                    <input type="text" id="platenumber" class="form-control" placeholder="Plate Number" name="platenumber" required >
                                    <label for="platenumber">Plate Number</label>
                            </div>

                            <div class="form-label-group">
                                    <input type="text" id="policynumber" class="form-control" placeholder="Policy Number" name="policynumber" required >
                                    <label for="policynumber">Policy Number</label>
                            </div>
							
                             
                            <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit">Add Insurance</button>

                            <br>
                        </form>
                        @else 
                        <div class="links">
                                <a href="http://127.0.0.1:8000/signup">Sign up</a>
                                <a href="http://127.0.0.1:8000/signin">Login</a>
                        </div>
                    @endif
					</div>
					
					@include('partials.errors')
                </div>
            </div>
        </div>
    </div>
</body>
</html>