<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Voerro Tutorial - Shopping Cart w/ Vue.js 2 & Vuex</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar is-primary">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    Voerro Shopping Cart Tutorial
                </a>

                <div class="navbar-burger burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div id="navbarExampleTransparentExample" class="navbar-menu">
                <div class="navbar-end">
                    <cart-dropdown></cart-dropdown>
                </div>
            </div>
        </nav>

        <div class="section content">
            <h1>Our Products</h1>
            <products-list></products-list>
        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
