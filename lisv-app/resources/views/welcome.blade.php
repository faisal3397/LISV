<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LISV</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

    
        <div class="flex-center position-ref full-height">


            <div class="content">
                <div class="title m-b-md">
                    LISV
                </div>
            @if(Auth::check())
                <div class="links">            
                    <a  href="#"> Hello {{ Auth::user()->email }}</a>
                    <a  href="http://127.0.0.1:8000/tasks">Tasks</a>
                    <a  href="http://127.0.0.1:8000/cards">Cards</a>
                    <a  href="http://127.0.0.1:8000/signout">Logout</a>
                </div>
            @else
                <div class="links">
                    <a href="http://127.0.0.1:8000/signup">Sign up</a>
                    <a href="http://127.0.0.1:8000/signin">Login</a>
                </div>
            </div>
            @endif
        </div>
    </body>
</html>
