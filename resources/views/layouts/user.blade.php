<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SHOPPLAZA</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        
        @yield('style')

    </head>
<body>
    <div >
        <header>
            <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" id="title" href="#"><strong>S</strong>hopPlaza</a>
            </div>
            <div class="menu">
                <nav>
                    <ul class="nav navbar-nav menu">
                    <li><a href="{{route('products.index')}}">Products</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">About</a></li>
                    </ul>
                   
                    <ul class="nav navbar-nav navbar-right userpanel">
                    <li><a href="{{route('cart.show')}}"><span class="glyphicon glyphicon-shopping-cart"></span> Cart ({{session()->get('cart')?session()->get('cart')->totalQty:0}})</a></li>
                        @if(!Auth::check())
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        @else
                        <li><a href="{{route('home')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        @endif
                    </ul>
                        
                    

                </nav>
            </div>
            </nav>
        </header>
    </div>
    <div class="container">
    
        @yield('content')
    
    <script src="{{asset('js/app.js')}}"></script>
    @include('sweetalert::alert')
    @yield('script')
</body>
</html>