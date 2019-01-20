<nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
    <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
    <div class="container">
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <img src="assets/img/obbs.png" height="100" width="100">
        </div>

        @if(Auth::check())
        <div class="collapse navbar-collapse">            
            <ul class="nav navbar-nav navbar-right navbar-uppercase">
                <li>
                    <a  href="#"> Hello {{ Auth::user()->name }}</a>
                </li>

                <li>
                    <a  href="http://127.0.0.1:8000/signout"> Logout</a>
                </li>
            </ul>
        </div>

        @else
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right navbar-uppercase">
                <li>
                    <a href="http://127.0.0.1:8000/signup" target="">NEW Donor</a>
                </li>
                <li>
                    <a href="http://127.0.0.1:8000/signin" target="">LogIn</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
        @endif

        
    </div>


</nav> <!-- Nav -->