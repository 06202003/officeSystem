<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    {{-- Favicon --}}
    <link href="{{ asset('./assets/auth/images/favicon.png') }}" rel="icon" />

    <!-- Web Fonts -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet -->
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/auth/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/auth/vendor/font-awesome/css/all.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/auth/css/stylesheet.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/auth/css/custom.css') }}" />

    <!-- Colors Css -->
    {{-- <link id="color-switcher" type="text/css" rel="stylesheet" href="#" /> --}}
</head>

<body>
    @yield('content')

    <!-- Styles Switcher -->
    <div id="styles-switcher" class="left">
        <h5>Color Switcher</h5>
        <hr>
        <ul class="mb-0">
            <li class="blue" data-bs-toggle="tooltip" title="Blue" data-path="#"></li>
            <li class="indigo" data-bs-toggle="tooltip" title="Indigo"
                data-path="{{ asset('./assets/auth/css/color-indigo.css') }}"></li>
            <li class="purple" data-bs-toggle="tooltip" title="Purple"
                data-path="{{ asset('./assets/auth/css/color-purple.css') }}"></li>
            <li class="pink" data-bs-toggle="tooltip" title="Pink"
                data-path="{{ asset('./assets/auth/css/color-pink.css') }}"></li>
            <li class="red" data-bs-toggle="tooltip" title="Red"
                data-path="{{ asset('./assets/auth/css/color-red.css') }}"></li>
            <li class="orange" data-bs-toggle="tooltip" title="Orange"
                data-path="{{ asset('./assets/auth/css/color-orange.css') }}"></li>
            <li class="yellow" data-bs-toggle="tooltip" title="Yellow"
                data-path="{{ asset('./assets/auth/css/color-yellow.css') }}"></li>
            <li class="teal" data-bs-toggle="tooltip" title="Teal"
                data-path="{{ asset('./assets/auth/css/color-teal.css') }}"></li>
            <li class="green" data-bs-toggle="tooltip" title="Green"
                data-path="{{ asset('./assets/auth/css/color-green.css') }}"></li>
            <li class="cyan" data-bs-toggle="tooltip" title="Cyan"
                data-path="{{ asset('./assets/auth/css/color-cyan.css') }}"></li>
            <li class="brown" data-bs-toggle="tooltip" title="Brown"
                data-path="{{ asset('./assets/auth/css/color-brown.css') }}"></li>
        </ul>
        <button class="btn switcher-toggle"><i class="fas fa-cog"></i></button>
    </div>
    <!-- Styles Switcher End -->

    <!-- Script -->
    <script src="{{ asset('./assets/auth/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('./assets/auth/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Style Switcher -->
    <script src="{{ asset('./assets/auth/js/switcher.min.js') }}"></script>
    <script src="{{ asset('./assets/auth/js/theme.js') }}"></script>

    @yield('library')

</body>

</html>
