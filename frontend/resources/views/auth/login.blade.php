@extends('layouts.auth-app')
@section('title', 'Login')

@section('css')

@endsection


@section('content')
    <!-- Preloader -->
    <div class="preloader">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloader End -->

    <div id="main-wrapper" class="oxyy-login-register">
        <div class="container-fluid px-0">
            <div class="row g-0 min-vh-100">

                <!-- Welcome Text
                                                                                                                                                                                  ========================= -->
                <div class="col-md-6 col-lg-7 bg-light">
                    <div class="hero-wrap d-flex align-items-center h-100">
                        <div class="hero-mask opacity-8"></div>
                        <div class="hero-bg hero-bg-scroll"
                            style="background-image:url('{{ asset('./assets/auth/images/team.png') }}');"></div>
                        {{-- <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
                            <div class="container">
                                <div class="row g-0 mt-5">
                                    <div class="col-11 col-md-10 col-lg-9 mx-auto">
                                        <h1 class="text-13 text-white fw-600 mb-4">To keep connected with largest shop in
                                            the world.</h1>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <!-- Welcome Text End -->

                <!-- Login Form
                                                                                                                                                                                  ========================= -->
                <div class="col-md-6 col-lg-5 d-flex flex-column align-items-center">
                    <div class="container pt-4">
                        <div class="row g-0">
                            <div class="col-11 col-md-10 col-lg-9 mx-auto pt-4">
                                <div class="logo">
                                    <img src="{{ asset('./assets/auth/images/logo-wit-red.png') }}" width="150px;" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container my-auto py-5">
                        <div class="row g-0">
                            <div class="col-11 col-md-10 col-lg-9 mx-auto">
                                <h3 class="text-12 mb-4">Sign In</h3>
                                {{-- <form id="loginForm" method="post"> --}}
                                <label class="form-label fw-500" for="emailAddress">Email Address</label>
                                <div class="mb-3 icon-group icon-group-end">
                                    <input type="email" class="form-control bg-light border-light" id="emailAddress"
                                        required placeholder="Email or Username">
                                    <span class="icon-inside text-muted"><i class="fas fa-envelope"></i></span>
                                </div>
                                <label class="form-label fw-500" for="loginPassword">Password</label>
                                <div class="mb-3 icon-group icon-group-end">
                                    <input type="password" class="form-control form-control-lg bg-light border-light"
                                        id="loginPassword" required placeholder="Password">
                                    <span class="icon-inside text-muted"><i class="fas fa-lock"></i></span>
                                </div>
                                <label class="form-label fw-500 d-none" id="error-message-login"
                                    style="color: #EE3C3B;"></label>
                                {{-- <div class="row my-4">
                                        <div class="col">
                                            <div class="form-check">
                                                <input id="remember-me" name="remember" class="form-check-input"
                                                    type="checkbox">
                                                <label class="form-check-label" for="remember-me">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="col text-end"><a href="forgot-password-18.html">Forgot Password ?</a>
                                        </div>
                                    </div> --}}
                                <div class="d-grid my-4">
                                    <button class="btn btn-red btn-lg" id="btn-sign-in">Sign In</button>
                                    <div class="loading-cover d-none" id="loading-sign-in">
                                        <div class="lds-ripple">
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <p class="text-2 text-muted text-center">Not a member? <a href="register-18.html">Sign
                                            Up now</a></p> --}}
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Login Form End -->

            </div>
        </div>
    </div>
@endsection


@section('library')
    <script type="text/javascript">
        $(document).ready(function() {

            $("#btn-sign-in").click(function(e) {
                e.preventDefault();

                var emailAddress = $("#emailAddress").val();
                var loginPassword = $("#loginPassword").val();

                $.ajax({
                    type: "POST",
                    url: "{{ env('URL_API') }}/api/v1/auth/login-admin",
                    data: {
                        _token: "{{ csrf_token() }}",
                        email: emailAddress,
                        password: loginPassword,
                    },
                    beforeSend: function() {
                        $('#loading-sign-in').removeClass("d-none");
                        $('#btn-sign-in').addClass("d-none");
                    },
                    success: function(resultLogin) {
                        $('#loading-sign-in').addClass("d-none");
                        $('#btn-sign-in').removeClass("d-none");

                        $.ajax({
                            type: "GET",
                            url: "{{ env('URL_API') }}/api/v1/user/self",
                            data: {
                                _token: "{{ csrf_token() }}",
                            },
                            beforeSend: function(request) {
                                $('#loading-sign-in').removeClass("d-none");
                                $('#btn-sign-in').addClass("d-none");

                                request.setRequestHeader("Authorization",
                                    "Bearer " + resultLogin['data'][
                                        'access_token'
                                    ],
                                );
                            },
                            success: function(result) {
                                $('#loading-sign-in').addClass("d-none");
                                $('#btn-sign-in').removeClass("d-none");
                                if (result['data']['division']) {
                                    var division_name = result['data'][
                                        'division'
                                    ]['division_name']
                                } else {
                                    var division_name = ''
                                }
                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('session.login') }}",
                                    data: {
                                        _token: "{{ csrf_token() }}",
                                        access_token: resultLogin['data'][
                                            'access_token'
                                        ],
                                        name: result['data'][
                                            'name'
                                        ],
                                        guid: result['data'][
                                            'guid'
                                        ],
                                        role_guid: result['data'][
                                            'roles'
                                        ][0]['guid'],
                                        role_name: result['data'][
                                            'roles'
                                        ][0]['name'],
                                        division_name: division_name


                                    },
                                    success: function(result) {
                                        if (result ==
                                            '2c2ce088-92f3-4ffa-b81d-9a1dd17a9076'
                                        ) {
                                            window.location =
                                                "/product";
                                        } else {
                                            window.location = "/home";
                                        }
                                    },

                                });

                            },
                            error: function(xhr, status, error) {
                                $('#loading-sign-in').addClass("d-none");
                                $('#btn-sign-in').removeClass("d-none");

                                var jsonResponse = JSON.parse(xhr.responseText);
                                $('#error-message-login').text(jsonResponse[
                                    'message']);
                                $('#error-message-login').removeClass("d-none");
                            }
                        });

                    },
                    error: function(xhr, status, error) {
                        $('#loading-sign-in').addClass("d-none");
                        $('#btn-sign-in').removeClass("d-none");

                        var jsonResponse = JSON.parse(xhr.responseText);
                        $('#error-message-login').text(jsonResponse['message']);
                        $('#error-message-login').removeClass("d-none");
                    }
                });

            });
        });
    </script>
@endsection
