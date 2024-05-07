@extends('layouts.dashboard-app')
@section('title', 'User Detail')


@section('icons')

@endsection


@section('core-css')

@endsection


@section('vendor-css')
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/flatpickr/flatpickr.css') }}" />
    <!-- Row Group CSS -->
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">
    <!-- Form Validation -->
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/spinkit/spinkit.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/toastr/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
@endsection


@section('page-css')
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/css/pages/page-profile.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/css/pages/style.css') }}">
@endsection


@section('helpers')

@endsection


@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">User Profile /</span> Profile
        </h4>


        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="user-profile-header-banner">
                        <img src="{{ asset('./assets/new-dashboard/img/pages/profile-banner-wit.png') }}"
                            alt="Banner image" class="rounded-top">
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <img src="{{ asset('./assets/new-dashboard/img/avatars/PP-rect.png') }}" alt="user image"
                                class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4>{{ $profile['data']['name'] }}</h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                        <li class="list-inline-item">
                                            <i class='ti ti-color-swatch'></i>
                                            {{ $profile['data']['position']['position_name'] }}
                                        </li>
                                    </ul>
                                </div>
                                <a href="/user/detail/print/{{ $guid }}"><button class="btn btn-primary">Export
                                        CV</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Header -->

        <!-- Navbar pills -->
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);">
                            <i class='ti-xs ti ti-user-check me-1'></i>
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/detail/attendance/{{ $guid }}">
                            <i class="ti ti-check me-1 ti-xs"></i> Attendances</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/detail/CV/{{ $guid }}">
                            <i class="ti ti-check me-1 ti-xs"></i> Curriculum Vitae</a>
                    </li>
                </ul>
            </div>
        </div>
        <!--/ Navbar pills -->

        <!-- User Profile Content -->
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- About User -->
                <div class="card mb-4">
                    <div class="card-body">
                        <small class="card-text text-uppercase">About</small>
                        <ul class="list-unstyled mb-4 mt-3">
                            <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span
                                    class="fw-bold mx-2">Full Name:</span>
                                @if (empty($profile['data']['name']))
                                    <span>-</span>
                                @else
                                    <span>{{ $profile['data']['name'] }}</span>
                                @endif
                            </li>
                            <li class="d-flex align-items-center mb-3"><i class="ti ti-id-badge"></i><span
                                    class="fw-bold mx-2">NIK:</span>
                                @if (empty($profile['data']['nik']))
                                    <span>-</span>
                                @else
                                    <span>{{ $profile['data']['nik'] }}</span>
                                @endif
                            </li>
                            <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span
                                    class="fw-bold mx-2">Status:</span>
                                @if (empty($profile['data']['status']))
                                    <span>-</span>
                                @else
                                    <span>{{ ucfirst(trans($profile['data']['status'])) }}</span>
                                @endif
                            </li>
                            <li class="d-flex align-items-center mb-3"><i class="ti ti-crown"></i><span
                                    class="fw-bold mx-2">Role:</span>
                                @if (empty($profile['data']['role']['role_name']))
                                    <span>-</span>
                                @else
                                    <span>{{ $profile['data']['role']['role_name'] }}</span>
                                @endif
                            </li>
                            <li class="d-flex align-items-center mb-3"><i class="ti ti-color-swatch"></i><span
                                    class="fw-bold mx-2">Position:</span>
                                @if (empty($profile['data']['position']['position_name']))
                                    <span>-</span>
                                @else
                                    <span>{{ $profile['data']['position']['position_name'] }}</span>
                                @endif
                            </li>
                            <li class="d-flex align-items-center mb-3"><i class="ti ti-building"></i><span
                                    class="fw-bold mx-2">Department:</span>
                                @if (empty($profile['data']['department']['department_name']))
                                    <span>-</span>
                                @else
                                    <span>{{ $profile['data']['department']['department_name'] }}</span>
                                @endif
                            </li>
                            <li class="d-flex align-items-center mb-3"><i class="ti ti-atom"></i><span
                                    class="fw-bold mx-2">Division:</span>
                                @if (empty($profile['data']['division']['division_name']))
                                    <span>-</span>
                                @else
                                    <span>{{ $profile['data']['division']['division_name'] }}</span>
                                @endif
                            </li>
                            <li class="d-flex align-items-center mb-3"><i class="ti ti-flag"></i><span
                                    class="fw-bold mx-2">Type:</span>
                                @if (empty($profile['data']['type']))
                                    <span>-</span>
                                @else
                                    <span>{{ $profile['data']['type'] }}</span>
                                @endif
                            </li>
                        </ul>
                        <small class="card-text text-uppercase">Contacts</small>
                        <ul class="list-unstyled mb-4 mt-3">
                            <li class="d-flex align-items-center mb-3"><i class="ti ti-phone-call"></i><span
                                    class="fw-bold mx-2">Contact:</span>
                                @if (empty($profile['data']['phone_number']))
                                    <span>-</span>
                                @else
                                    <span>{{ $profile['data']['phone_number'] }}</span>
                                @endif
                            </li>
                            <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                                    class="fw-bold mx-2">Email:</span>
                                @if (empty($profile['data']['email']))
                                    <span>-</span>
                                @else
                                    <span>{{ $profile['data']['email'] }}</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ About User -->
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">
                <!-- Activity Timeline -->
                <div class="card card-action mb-4">
                    <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0">Activity Timeline</h5>
                    </div>
                    <div class="card-body pb-0">
                        <ul class="timeline ms-1 mb-0">
                            @foreach ($timelines['data']['data'] as $timeline)
                                <li class="timeline-item timeline-item-transparent">
                                    <span
                                        class="timeline-point 
                                    @if (str_contains(strtolower($timeline['description']), 'change location')) timeline-point-info
                                    @elseif (str_contains(strtolower($timeline['description']), 'check in'))
                                        timeline-point-success
                                    @elseif (str_contains(strtolower($timeline['description']), 'check out'))
                                        timeline-point-danger
                                    @else
                                        timeline-point-success @endif

                                    "></span>
                                    <div class="timeline-event">
                                        <div class="timeline-header">
                                            <h6 class="mb-0">{{ $timeline['title'] }}</h6>
                                            <small
                                                class="text-muted">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($timeline['created_at']))->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-2">{{ $timeline['description'] }}</p>
                                        <div class="d-flex flex-wrap">
                                            <div class="avatar me-2">
                                                <span class="avatar-initial rounded-circle bg-label-success">
                                                    <?php
                                                    $str = $timeline['user']['name'];
                                                    
                                                    if (str_contains($str, ' ')) {
                                                        $words = explode(' ', $str);
                                                        $result = $words[0][0] . $words[1][0];
                                                    } else {
                                                        $result = substr($str, 0, 2);
                                                    }
                                                    
                                                    echo $result;
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="ms-1">
                                                <h6 class="mb-0">{{ $timeline['user']['name'] }}</h6>
                                                <span>{{ $timeline['user']['position']['position_name'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--/ Activity Timeline -->
            </div>
        </div>
        <!--/ User Profile Content -->


    </div>
    <!-- / Content -->
@endsection


@section('core-js')

@endsection


@section('vendor-js')
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-responsive/datatables.responsive.js') }}">
    </script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}">
    </script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js') }}">
    </script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/jszip/jszip.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/pdfmake/pdfmake.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons/buttons.print.js') }}"></script>
    <!-- Flat Picker -->
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <!-- Row Group JS -->
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-rowgroup/datatables.rowgroup.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js') }}">
    </script>
    <!-- Form Validation -->
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}">
    </script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}">
    </script>
@endsection


@section('main-js')

@endsection


@section('page-js')
    {{-- <script src="{{ asset('./assets/new-dashboard/js/tables-datatables-basic.js') }}"></script> --}}
    <script src="{{ asset('./assets/new-dashboard/js/extended-ui-blockui.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/ui-toasts.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/block-ui/block-ui.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/toastr/toastr.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/pages-profile.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/pop-up.js') }}"></script>
@endsection


@section('custom-javascript')
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection
