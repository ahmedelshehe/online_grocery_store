<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SHOPPLAZA</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{asset('css/main.css')}}" rel="stylesheet">

    </head>
    <body>
    <div class="container">
        <header>
            <div class="title">
                <h1>SHOPPLAZA</h1>
            </div>
            <div class="menu">
                <nav>
                    <ul id="nav-bar">
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="{{route('login')}}">Login</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div>
        <img src="images/hero.jpg"class="heroimage" alt="">
        </div>
        <div class="quote">
            <p>" On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of "
            </p>

        </div>
    <div class="featuered">
        <h1>Featured Products</h1>
    </div>
        <div class="products">
            <div class="product">
            <img src="images/tomato.jpg" alt="">
                <h3>Tomatoes</h3>
            </div>
            <div class="product">
            <img src="images/tomato.jpg " alt="">
            <h3>Carrots</h3>
            </div>
            <div class="product">
            <img src="images/tomato.jpg" alt="">
            <h3>basil</h3>
            </div>

        </div>

    </div>
    </body>
</html>
