<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style0.css">
    <title>Cards</title>

</head>
<body>

    @include('partials.nav')

    <div class="container">
       
        <div class="row">
            <div class="col-sm-9 col-lg-12 mx-auto">
                <div class="card card-signin my-5" >
                    <div class="card-body">
                        @if(Auth::check())
                            <h1 class="text-center">Your Cards</h1>
                            <br>
                            <div class="row">
                                @if(count($cards) > 0)
                                    @foreach($cards as $card)
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="card12">
                                                <img src="https://i.imgur.com/HimtftSr.png" alt="Avatar" style="width:100%">
                                                <div class="container12">
                                                    <br>
                                                    <h4 class="card-title"><b>{{$card->cardholdername}}</b></h4> 
                                                    <p>{{$card->creditcardnumber}}</p>
                                                    <p>{{$card->expirydate}}</p> 
                                                    <form method="POST" action="{{ route('cards.destroy', [$card->id]) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger btn-lg btn-block text-uppercase" style="border-radius: 25px;">Delete</button>
                                                    </form>
                                                    <br>

                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    @endforeach
                                @else 
                                    <h4 class="card-title"><b>No Credit Cards Available</b></h4>
                                @endif

                                <div class="col-sm-12 col-lg-4">
                                    <div class="card12">
                                        <img src="https://i.imgur.com/TAD3ciz.png" alt="Avatar" style="width:100%">
                                        <div class="container12">
                                            <br>
                                            <h4 class="card-title"><b>Add New card</b></h4> 
                                            <br>
                                            <form method="GET" action="/addCard">
                                                <button type="submit" class="btn btn-success btn-lg btn-block text-uppercase" style="border-radius: 25px;">Add New Card</button>
                                            </form>
                                            <br>                                    
                                        </div>
                                    </div>
                                </div>

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