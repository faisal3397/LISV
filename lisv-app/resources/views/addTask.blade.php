<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style0.css">
    <title>Add new Task</title>
</head>
<body>

    @include('partials.nav')

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        @if(Auth::check())
                        <h5 class="card-title text-center">Add Task</h5>
                        <form class="form-signin" method="POST" action="/tasks">
                            {{ csrf_field() }}
                            {{-- <div class="btn-group btn-block" role="group">
                                <button type="button" class="btn btn-secondary" name="taskname">Open Doors</button>
                                <button type="button" class="btn btn-secondary" name="t">Close Doors</button>
                                <button type="button" class="btn btn-secondary">Turn car On</button>
                                <button type="button" class="btn btn-secondary">Turn car Off</button>
                            </div> --}}
                            <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" style="border-radius: 25px; height: 53px;" name="taskname">
                                        <option selected>Task</option>
                                        <option value="Open Doors">Open Doors</option>
                                        <option value="Close Doors">Close Doors</option>
                                        <option value="Turn on">Turn on</option>
                                        <option value="Turn off">Turn off</option>
                                    </select>
                            </div>
                            
                            <div class="form-label-group">
                                <input type="date" id="date" class="form-control" placeholder="Date" name="date" required >
                                <label for="date">Date</label>
                            </div>
                            
                            <div class="form-label-group">
                                <input type="time" id="time" class="form-control" placeholder="Time" name="time" required >
                                <label for="time">Time</label>
                            </div>    
                             
                            <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit">Add Task</button>
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