<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style0.css">
    <title>Sign in</title>
</head>
<body>

	@include('partials.nav')

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" method="POST" action="/signin">
                            {{ csrf_field() }}
                            <div class="form-label-group">
                                <input type="email" id="email" class="form-control" placeholder="Email" name="email" required >
                                <label for="email">Email</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="password" class="form-control" placeholder="Password" name="password" required >
                                <label for="password">Password</label>
                            </div>                                
                             
                            <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit">Sign in</button>

                            <br>
                            <a  class="text-uppercase" href="http://127.0.0.1:8000/signup" style="margin-left: 42%;">Sign up</a>
                        </form>
                    </div>
                    @include('partials.errors')
                </div>
            </div>
        </div>
    </div>
</body>
</html>