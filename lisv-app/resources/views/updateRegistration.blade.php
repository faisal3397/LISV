<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style0.css">
    <title>Registration</title>

</head>
<body>

    @include('partials.nav')

    <div class="container">
       
        <div class="row">
            <div class="col-sm-9 col-lg-12 mx-auto">
                <div class="card card-signin my-5" >
                    <div class="card-body">
                        @if(Auth::check())
                            <h1 class="text-center">Your Registration</h1>
                            <br>
                            <div class="row">
                                @if(count($registrations) > 0)
                                    @foreach($registrations as $registration)
                                        <div class="col-sm-12 col-lg-4 mx-auto">
                                            <div class="card12">
                                                <div class="container12">
                                                    <br>
                                                    <h4 class="card-title"><b>Registration Details</b></h4> 
                                                    <p>VIN: {{$registration->vin}}</p> 
                                                    <p>Registration Expiry Date: {{$registration->expirydate}}</p>
                                                    <p>Car Company: {{$registration->company}}</p>
                                                    <p>Car Model: {{$registration->model}}</p>    
                                                    <p>Year: {{$registration->year}}</p> 
                                                    <p>Car Color: {{$registration->color}}</p>
                                                    <p>Registration Type: {{$registration->registrationtype}}</p>    
                                                    <p>Plate Number: {{$registration->platenumber}}</p>
                                                    <p>Registration will cost you 100 SAR, do you want to update registration?</p>
                                                    <form method="POST" action="{{ route('registration.update', [$registration->id]) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PUT') }}
                                                        <button type="submit" class="btn btn-danger btn-block text-uppercase" style="border-radius: 25px;">Yes</button>
                                                    </form>
                                                    <br>

                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    @endforeach
                                @endif



                            </div>
                        @else 
                            <div class="links">
                                    <a href="http://127.0.0.1:8000/signup">Sign up</a>
                                    <a href="http://127.0.0.1:8000/signin">Login</a>
                            </div>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</body>
</html>