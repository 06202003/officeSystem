<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        @yield('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('./assets/auth/vendor/bootstrap/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('./assets/auth/vendor/font-awesome/css/all.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('./assets/auth/css/stylesheet.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('./assets/auth/css/custom.css') }}" />
        <style>
            body {
                background-color: #f8f9fa;
            }
            .error-container {
                margin-top: 20%;
                text-align: center;
            }
            .error-heading {
                font-size: 2.5rem;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container error-container">
            <div>
                <h1 class="error-">@yield('code')</h1>
                <p class="lead">@yield('message')</p>
                <hr class="my-4">
                <a class="btn btn-primary" style="background-color: #ee3c3b; text-color: white" href="/home" role="button">Go to Home</a>
            </div>
        </div>
    </body>
</html>
