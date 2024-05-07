<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="loading " data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    {{-- Favicon --}}
    <link href="{{ asset('./assets/auth/images/favicon.png') }}" rel="icon" />

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet"
        href="{{ asset('./assets/dashboard/vendors/css/vendors.min%EF%B9%96id=cd237de63f2f3811a359.css') }}" />
    @yield('vendor-css')
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset('./assets/dashboard/css/core%EF%B9%96id=b969fd28478dc1ee887a.css') }}" />
    @yield('theme-css')
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet"
        href="{{ asset('./assets/dashboard/css/base/core/menu/menu-types/vertical-menu%EF%B9%96id=d6fb64b9fc56ebf927d5.css') }}" />
    @yield('page-css')
    <!-- END: Page CSS-->

    <!-- BEGIN: Laravel Style -->
    <link rel="stylesheet" href="{{ asset('./assets/dashboard/css/overrides%EF%B9%96id=a3a7abd8c9ef0f541059.css') }}" />
    @yield('laravel-style')
    <!-- END: Laravel Style -->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" href="{{ asset('./assets/dashboard/css/style%EF%B9%96id=68b329da9893e34099c7.css') }}" />
    @yield('custom-css')
    <!-- END: Custom CSS-->

</head>

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static default" data-open="click"
    data-menu="vertical-menu-modern" data-col="default" data-framework="laravel" data-asset-path="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow  ">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
                                data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Calendar"><i class="ficon"
                                data-feather="calendar"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                            data-feather="moon"></i></a></li>
                {{-- <li class="nav-item dropdown dropdown-notification me-25">
                    <a class="nav-link" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class="ficon" data-feather="bell"></i>
                        <span class="badge rounded-pill bg-danger badge-up">5</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                                <div class="badge rounded-pill badge-light-primary">6 New</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar">
                                            <img src="{{ asset('./assets/dashboard/images/portrait/small/avatar-s-15.jpg') }}" alt="avatar"
                                                width="32" height="32">
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Congratulation Sam
                                                🎉</span>winner!</p>
                                        <small class="notification-text"> Won the monthly best seller badge.</small>
                                    </div>
                                </div>
                            </a>
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar">
                                            <img src="{{ asset('./assets/dashboard/images/portrait/small/avatar-s-3.jpg') }}" alt="avatar"
                                                width="32" height="32">
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">New
                                                message</span>&nbsp;received</p>
                                        <small class="notification-text"> You have 10 unread messages</small>
                                    </div>
                                </div>
                            </a>
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-danger">
                                            <div class="avatar-content">MD</div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Revised Order
                                                👋</span>&nbsp;checkout</p>
                                        <small class="notification-text"> MD Inc. order updated</small>
                                    </div>
                                </div>
                            </a>
                            <div class="list-item d-flex align-items-center">
                                <h6 class="fw-bolder me-auto mb-0">System Notifications</h6>
                                <div class="form-check form-check-primary form-switch">
                                    <input class="form-check-input" id="systemNotification" type="checkbox"
                                        checked="">
                                    <label class="form-check-label" for="systemNotification"></label>
                                </div>
                            </div>
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-danger">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Server
                                                down</span>&nbsp;registered</p>
                                        <small class="notification-text"> USA Server is down due to hight CPU
                                            usage</small>
                                    </div>
                                </div>
                            </a>
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-success">
                                            <div class="avatar-content"><i class="avatar-icon"
                                                    data-feather="check"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Sales
                                                report</span>&nbsp;generated</p><small class="notification-text"> Last
                                            month sales report generated</small>
                                    </div>
                                </div>
                            </a>
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-warning">
                                            <div class="avatar-content"><i class="avatar-icon"
                                                    data-feather="alert-triangle"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">High memory</span>&nbsp;usage
                                        </p><small class="notification-text"> BLR Server using high memory</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-menu-footer">
                            <a class="btn btn-primary w-100" href="javascript:void(0)">Read all notifications</a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
                        data-bs-toggle="dropdown" aria-haspopup="true">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name fw-bolder">John Doe</span>
                            <span class="user-status">Admin</span>
                        </div>
                        <span class="avatar">
                            <img class="round"
                                src="{{ asset('./assets/dashboard/images/portrait/small/avatar-s-11.jpg') }}"
                                alt="avatar" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="#">
                            <i class="me-50" data-feather="user"></i> Edit Profile
                        </a>
                        <a class="dropdown-item" href="#" id="btn-sign-out">
                            <i class="me-50" data-feather="power"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <span class="brand-logo">
                            <img src="{{ asset('./assets/dashboard/images/logo/logo-wit.png') }}" width="150px;" />
                        </span>
                        <h2 class="brand-text">System</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pe-0" data-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                        <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
                            data-ticon="disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class="nav-item
                    {{ Request::is('home') ? 'active' : '' }}
                ">
                    <a href="{{ url('/home') }}" class="d-flex align-items-center" target="_self">
                        <i data-feather="home"></i>
                        <span class="menu-title text-truncate">Dashboard</span>
                    </a>
                </li>

                <li class="navigation-header">
                    <span>Users</span>
                    <i data-feather="more-horizontal"></i>
                </li>

                <li class="nav-item  ">
                    <a href="#" class="d-flex align-items-center" target="_self">
                        <i data-feather="users"></i>
                        <span class="menu-title text-truncate">User</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="javascript:void(0)" class="d-flex align-items-center" target="_self">
                        <i data-feather="settings"></i>
                        <span class="menu-title text-truncate">User Configuration</span>
                    </a>
                    <ul class="menu-content">
                        <li>
                            <a href="#" class="d-flex align-items-center" target="_self">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate">Role</span>
                            </a>
                        </li>
                        <li
                            class="
                            {{ Request::is('position') ? 'active' : '' }}
                            {{ Request::is('position/*') ? 'active' : '' }}
                        ">
                            <a href="{{ url('/position') }}" class="d-flex align-items-center" target="_self">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate">Position</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex align-items-center" target="_self">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate">Department</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex align-items-center" target="_self">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate">Division</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="navigation-header">
                    <span>Modules</span>
                    <i data-feather="more-horizontal"></i>
                </li>

                <li class="nav-item  ">
                    <a href="#" class="d-flex align-items-center" target="_self">
                        <i data-feather="check"></i>
                        <span class="menu-title text-truncate">Attendance</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="#" class="d-flex align-items-center" target="_self">
                        <i data-feather="calendar"></i>
                        <span class="menu-title text-truncate">Event</span>
                    </a>
                </li>

                <li class="navigation-header">
                    <span>CMS</span>
                    <i data-feather="more-horizontal"></i>
                </li>

                <li class="nav-item  ">
                    <a href="#" class="d-flex align-items-center" target="_self">
                        <i data-feather="alert-triangle"></i>
                        <span class="menu-title text-truncate">Notice</span>
                    </a>
                </li>

                <li class="nav-item  ">
                    <a href="#" class="d-flex align-items-center" target="_self">
                        <i data-feather="image"></i>
                        <span class="menu-title text-truncate">Banner</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: CONTENT-->
    @yield('content')
    <!-- END: CONTENT-->

    <!-- BEGIN: Customizer-->
    <div class="customizer d-none d-md-block">

        <a class="customizer-toggle d-flex align-items-center justify-content-center" href="javascript:void(0);">
            <i class="spinner" data-feather="settings"></i>
        </a>

        <div class="customizer-content">
            <!-- Customizer header -->
            <div class="customizer-header px-2 pt-1 pb-0 position-relative">
                <h4 class="mb-0">Theme Customizer</h4>
                <p class="m-0">Customize & Preview in Real Time</p>

                <a class="customizer-close" href="javascript:void(0);"><i data-feather="x"></i></a>
            </div>

            <hr />

            <!-- Styling & Text Direction -->
            <div class="customizer-styling-direction px-2">
                <p class="fw-bold">Skin</p>
                <div class="d-flex">
                    <div class="form-check me-1">
                        <input type="radio" id="skinlight" name="skinradio" class="form-check-input layout-name"
                            checked="" data-layout="">
                        <label class="form-check-label" for="skinlight">Light</label>
                    </div>
                    <div class="form-check me-1">
                        <input type="radio" id="skinbordered" name="skinradio"
                            class="form-check-input layout-name" data-layout="bordered-layout">
                        <label class="form-check-label" for="skinbordered">Bordered</label>
                    </div>
                    <div class="form-check me-1">
                        <input type="radio" id="skindark" name="skinradio" class="form-check-input layout-name"
                            data-layout="dark-layout">
                        <label class="form-check-label" for="skindark">Dark</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="skinsemidark" name="skinradio"
                            class="form-check-input layout-name" data-layout="semi-dark-layout">
                        <label class="form-check-label" for="skinsemidark">Semi Dark</label>
                    </div>
                </div>
            </div>

            <hr />

            <!-- Menu -->
            <div class="customizer-menu px-2">
                <div id="customizer-menu-collapsible" class="d-flex">
                    <p class="fw-bold me-auto m-0">Menu Collapsed</p>
                    <div class="form-check form-check-primary form-switch">
                        <input type="checkbox" class="form-check-input" id="collapse-sidebar-switch">
                        <label class="form-check-label" for="collapse-sidebar-switch"></label>
                    </div>
                </div>
            </div>
            <hr />

            <!-- Layout Width -->
            <div class="customizer-footer px-2">
                <p class="fw-bold">Layout Width</p>
                <div class="d-flex">
                    <div class="form-check me-1">
                        <input type="radio" id="layout-width-full" name="layoutWidth" class="form-check-input"
                            checked="">
                        <label class="form-check-label" for="layout-width-full">Full Width</label>
                    </div>
                    <div class="form-check me-1">
                        <input type="radio" id="layout-width-boxed" name="layoutWidth" class="form-check-input">
                        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                    </div>
                </div>
            </div>
            <hr />

            <!-- Navbar -->
            <div class="customizer-navbar px-2">
                <div id="customizer-navbar-colors">
                    <p class="fw-bold">Navbar Color</p>
                    <ul class="list-inline unstyled-list">
                        <li class="color-box bg-white border selected" data-navbar-default=""></li>
                        <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
                        <li class="color-box bg-secondary" data-navbar-color="bg-secondary"></li>
                        <li class="color-box bg-success" data-navbar-color="bg-success"></li>
                        <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
                        <li class="color-box bg-info" data-navbar-color="bg-info"></li>
                        <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
                        <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
                    </ul>
                </div>

                <p class="navbar-type-text fw-bold">Navbar Type</p>
                <div class="d-flex">
                    <div class="form-check me-1">
                        <input type="radio" id="nav-type-floating" name="navType" class="form-check-input"
                            checked="">
                        <label class="form-check-label" for="nav-type-floating">Floating</label>
                    </div>
                    <div class="form-check me-1">
                        <input type="radio" id="nav-type-sticky" name="navType" class="form-check-input">
                        <label class="form-check-label" for="nav-type-sticky">Sticky</label>
                    </div>
                    <div class="form-check me-1">
                        <input type="radio" id="nav-type-static" name="navType" class="form-check-input">
                        <label class="form-check-label" for="nav-type-static">Static</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="nav-type-hidden" name="navType" class="form-check-input">
                        <label class="form-check-label" for="nav-type-hidden">Hidden</label>
                    </div>
                </div>
            </div>
            <hr />

            <!-- Footer -->
            <div class="customizer-footer px-2">
                <p class="fw-bold">Footer Type</p>
                <div class="d-flex">
                    <div class="form-check me-1">
                        <input type="radio" id="footer-type-sticky" name="footerType" class="form-check-input">
                        <label class="form-check-label" for="footer-type-sticky">Sticky</label>
                    </div>
                    <div class="form-check me-1">
                        <input type="radio" id="footer-type-static" name="footerType" class="form-check-input"
                            checked="">
                        <label class="form-check-label" for="footer-type-static">Static</label>
                    </div>
                    <div class="form-check me-1">
                        <input type="radio" id="footer-type-hidden" name="footerType" class="form-check-input">
                        <label class="form-check-label" for="footer-type-hidden">Hidden</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Customizer-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-light  footer-static">
        <p class="clearfix mb-0">
            <span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script><a class="ms-25" href="https://1.envato.market/pixinvent_portfolio"
                    target="_blank">Pixinvent</a>,
                <span class="d-none d-sm-inline-block">All rights Reserved</span>
            </span>
            <span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span>
        </p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- Script -->
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('./assets/dashboard/vendors/js/vendors.min%EF%B9%96id=7dca1a1f6b86fd5d70ac.js') }}"></script>
    @yield('vendor-js')
    <!-- END Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('./assets/dashboard/vendors/js/ui/jquery.sticky%EF%B9%96id=17f0788e54b9dc4eb93d.js') }}">
    </script>
    @yield('page-vendor-js')
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('./assets/dashboard/js/core/app-menu%EF%B9%96id=0a3ed793d05ee5f6a9db.js') }}"></script>
    <script src="{{ asset('./assets/dashboard/js/core/app%EF%B9%96id=6b6c2cc9a41161053158.js') }}"></script>
    <script src="{{ asset('./assets/dashboard/js/core/scripts%EF%B9%96id=22050af26ee69f8533fc.js') }}"></script>
    <script src="{{ asset('./assets/dashboard/js/scripts/customizer%EF%B9%96id=00ad9be904861e76f046.js') }}"></script>
    @yield('theme-js')
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    @yield('page-js')
    <!-- END: Page JS-->

    <script type="text/javascript">
        $(document).ready(function() {

            $("#btn-sign-out").click(function(e) {
                e.preventDefault();

                var token = "{{ $token }}";

                $.ajax({
                    type: "POST",
                    url: "{{ env('URL_API') }}/api/v1/auth/logout",
                    headers: {
                        'Authorization': 'Bearer ' + token,
                    },
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    beforeSend: function() {

                    },
                    success: function(result) {
                        $.ajax({
                            type: "GET",
                            url: "{{ route('session.clear') }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(result) {
                                window.location = "/login";
                            },
                        });

                    },
                    error: function(xhr, status, error) {
                        var jsonResponse = JSON.parse(xhr.responseText);
                        alert(jsonResponse['message']);
                    }
                });
            });
        });

        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });
    </script>

    @yield('custom-javascript')
</body>

</html>
