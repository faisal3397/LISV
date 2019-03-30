<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style0.css">
    <title>Add Registration</title>
</head>
<body>

    @include('partials.nav')

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Car Information</h5>
						<form class="form-signin" method="POST" action="/carRegistration"
						>
							{{ csrf_field() }}

							<div class="form-label-group">
                                <input type="text" id="vin" class="form-control" placeholder="VIN" name="vin" required >
                                <label for="vin">VIN</label>
                            </div>
                            
                            <div class="form-label-group">
                                    <input type="date" id="expirydate" class="form-control" placeholder="Expiry Date" name="expirydate" required >
                                    <label for="expirydate">Expiry Date</label>
                            </div>

                            <div class="form-label-group">
                                    <input type="text" id="company" class="form-control" placeholder="Company" name="company" required >
                                    <label for="company">Company</label>
                            </div>

                            <div class="form-label-group">
                                    <input type="text" id="model" class="form-control" placeholder="Model" name="model" required >
                                    <label for="model">Model</label>
                            </div>

                            <div class="form-label-group">
                                    <input type="text" id="year" class="form-control" placeholder="Year" name="year" required >
                                    <label for="year">Year</label>
                            </div>

                            <div class="form-label-group">
                                    <input type="text" id="color" class="form-control" placeholder="Color" name="color" required >
                                    <label for="color">Color</label>
                            </div>

                            <div class="form-label-group">
                                    <input type="text" id="registrationtype" class="form-control" placeholder="Registration Type" name="registrationtype" required >
                                    <label for="registrationtype">Registration Type</label>
                            </div>

                            <div class="form-label-group">
                                    <input type="text" id="platenumber" class="form-control" placeholder="Plate Number" name="platenumber" required >
                                    <label for="platenumber">Plate Number</label>
                            </div>
							 
                             
                            <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit">Add Registration</button>

                            <br>
                        </form>
					</div>
					
					@include('partials.errors')
                </div>
            </div>
        </div>
    </div>
</body>
</html>