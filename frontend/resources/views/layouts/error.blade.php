<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/auth/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/auth/vendor/font-awesome/css/all.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/auth/css/stylesheet.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/auth/css/custom.css') }}" />
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">@yield('code')</div>

                    <div class="card-body">
                        <h1>@yield('title')</h1>
                        <p>@yield('message')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
