@extends('layouts.dashboard-app')
@section('title', 'Dashboard')


@section('icons')

@endsection

@section('core-css')

@endsection


@section('vendor-css')
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
@endsection


@section('helpers')

@endsection


@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            {{-- Statistic --}}
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0 me-2">{{ $overall['data']['users'] }}</h5>
                            <small>Users</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-primary rounded-pill p-2">
                                <i class="ti ti-users ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0 me-2">{{ $overall['data']['banners'] }}</h5>
                            <small>Banners</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-success rounded-pill p-2">
                                <i class="ti ti-photo ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0 me-2">{{ $overall['data']['notices'] }}</h5>
                            <small>Notices</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-danger rounded-pill p-2">
                                <i class="ti ti-alert-triangle ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0 me-2">{{ $overall['data']['events'] }}</h5>
                            <small>Events</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-info rounded-pill p-2">
                                <i class="ti ti-calendar ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Statistic --}}

            <div class="col-lg-12 mb-4 col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Total Checked In Today By Location</h5>
                    </div>
                    <div class="card-body pt-2">
                        <div class="row gy-3">
                            <div class="col-md-3 col-6" data-bs-toggle="modal" data-bs-target="#modalCounterLocationSKII" style="cursor: pointer">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-primary me-3 p-2"><i
                                            class="ti ti-briefcase ti-sm"></i></div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ $locations['data']['count']['sk_ii_40'] }}</h5>
                                        <small>SK II/40</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-6" data-bs-toggle="modal" data-bs-target="#modalCounterLocationBuilding" style="cursor: pointer">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-info me-3 p-2"><i
                                            class="ti ti-building-skyscraper ti-sm"></i></div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ $locations['data']['count']['wit_building'] }}</h5>
                                        <small>WIT. Building</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6" data-bs-toggle="modal" data-bs-target="#modalCounterLocationPatal" style="cursor: pointer">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-danger me-3 p-2"><i
                                            class="ti ti-building-community ti-sm"></i></div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ $locations['data']['count']['patal_senayan'] }}</h5>
                                        <small>Patal Senayan</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6" data-bs-toggle="modal" data-bs-target="#modalCounterLocationOther" style="cursor: pointer">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-success me-3 p-2"><i
                                            class="ti ti-map-pins ti-sm"></i></div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ $locations['data']['count']['other'] }}</h5>
                                        <small>Other</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendance Summary -->
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Attendance</h5>
                            <small class="text-muted">Today</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-1">
                                    <h1 class="mb-0">{{ $overall['data']['attendances']['total_attendances'] }}</h1>
                                    <p class="mb-0">Total Attendances</p>
                                </div>
                                <ul class="p-0 m-0">
                                    <li class="d-flex gap-3 align-items-center mb-lg-3 pt-2 pb-1">
                                        <div class="badge rounded bg-label-success p-1">
                                            <i class="ti ti-circle-check ti-sm"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-nowrap">Already Checked In</h6>
                                            <small class="text-muted">{{ $overall['data']['attendances']['checked_in'] }}
                                                Users</small>
                                        </div>
                                    </li>
                                    <li class="d-flex gap-3 align-items-center mb-lg-3 pb-1">
                                        <div class="badge rounded bg-label-danger p-1"><i class="ti ti-x ti-sm"></i></div>
                                        <div>
                                            <h6 class="mb-0 text-nowrap">Haven't Check In Yet</h6>
                                            <small
                                                class="text-muted">{{ $overall['data']['attendances']['not_checked_in'] }}
                                                Users</small>
                                        </div>
                                    </li>
                                    <li class="d-flex gap-3 align-items-center mb-lg-3 pt-2 pb-1">
                                        <div class="badge rounded bg-label-success p-1">
                                            <i class="ti ti-circle-check ti-sm"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-nowrap">Already Checked Out</h6>
                                            <small class="text-muted">{{ $overall['data']['attendances']['checked_out'] }}
                                                Users</small>
                                        </div>
                                    </li>
                                    <li class="d-flex gap-3 align-items-center mb-lg-3 pb-1">
                                        <div class="badge rounded bg-label-danger p-1"><i class="ti ti-x ti-sm"></i></div>
                                        <div>
                                            <h6 class="mb-0 text-nowrap">Haven't Check Out Yet</h6>
                                            <small
                                                class="text-muted">{{ $overall['data']['attendances']['not_checked_out'] }}
                                                Users</small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div id="supportTracker"></div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div id="supportTracker2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Attendance Summary -->

            <!-- Activity Timeline -->
            <div class="col-md-6 mb-4">
                <div class="card overflow-hidden mb-4" style="height: 600px;">
                    <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0">Activity Timeline</h5>
                        <small class="text-muted">Latest</small>
                    </div>
                    <div class="card-body" id="vertical-example">
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
            </div>
            <!--/ Activity Timeline -->

        </div>
    </div>
    <!-- / Content -->

    <!-- Modal 1 -->
    <div class="modal fade" id="modalCounterLocationSKII" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">SK II/40</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <small class="card-text text-uppercase">Attendances</small>
                        @foreach ($locations['data']['sk_ii_40'] as $user)
                            <div class="mt-4">
                                <div class="d-flex flex-wrap">
                                    <div class="avatar me-2">
                                        <span class="avatar-initial rounded-circle bg-label-success">
                                            <?php
                                            $str = $user['name'];
                                            
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
                                        <h6 class="mb-0">{{ $user['name'] }}</h6>
                                        <span>{{ $user['position']['position_name'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 1 -->

    <!-- Modal 2 -->
    <div class="modal fade" id="modalCounterLocationBuilding" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">WIT. Building</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <small class="card-text text-uppercase">Attendances</small>
                        @foreach ($locations['data']['wit_building'] as $user)
                            <div class="mt-4">
                                <div class="d-flex flex-wrap">
                                    <div class="avatar me-2">
                                        <span class="avatar-initial rounded-circle bg-label-success">
                                            <?php
                                            $str = $user['name'];
                                            
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
                                        <h6 class="mb-0">{{ $user['name'] }}</h6>
                                        <span>{{ $user['position']['position_name'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 2 -->

    <!-- Modal 3 -->
    <div class="modal fade" id="modalCounterLocationPatal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Patal Senayan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <small class="card-text text-uppercase">Attendances</small>
                        @foreach ($locations['data']['patal_senayan'] as $user)
                            <div class="mt-4">
                                <div class="d-flex flex-wrap">
                                    <div class="avatar me-2">
                                        <span class="avatar-initial rounded-circle bg-label-success">
                                            <?php
                                            $str = $user['name'];
                                            
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
                                        <h6 class="mb-0">{{ $user['name'] }}</h6>
                                        <span>{{ $user['position']['position_name'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 3 -->

    <!-- Modal 4 -->
    <div class="modal fade" id="modalCounterLocationOther" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Other</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <small class="card-text text-uppercase">Attendances</small>
                        @foreach ($locations['data']['other'] as $user)
                            <div class="mt-4">
                                <div class="d-flex flex-wrap">
                                    <div class="avatar me-2">
                                        <span class="avatar-initial rounded-circle bg-label-success">
                                            <?php
                                            $str = $user['name'];
                                            
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
                                        <h6 class="mb-0">{{ $user['name'] }}</h6>
                                        <span>{{ $user['position']['position_name'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 4 -->
@endsection


@section('core-js')

@endsection


@section('vendor-js')
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-responsive/datatables.responsive.js') }}">
    </script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}">
    </script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js') }}">
    </script>
@endsection


@section('main-js')

@endsection


@section('page-js')
    <script src="{{ asset('./assets/new-dashboard/js/extended-ui-perfect-scrollbar.js') }}"></script>
@endsection

@section('custom-javascript')
    <script type="text/javascript">
        "use strict";
        ! function() {
            let e, t, a, r, o;
            o = isDarkStyle ? (e = config.colors_dark.cardColor, a = config.colors_dark.textMuted, t = config.colors_dark
                .headingColor, r = "dark", "#5E6692") : (e = config.colors.cardColor, a = config.colors.textMuted, t =
                config.colors.headingColor, r = "", "#817D8D");
            var s = document.querySelector("#swiper-with-pagination-cards"),
                s = (null !== s && new ApexCharts(s, i).render(), document.querySelector("#supportTracker")),
                i = {
                    series: [{{ $percentageCheckedIn }}],
                    labels: ["Completed Checked In"],
                    chart: {
                        height: 360,
                        type: "radialBar"
                    },
                    plotOptions: {
                        radialBar: {
                            offsetY: 10,
                            startAngle: -140,
                            endAngle: 130,
                            hollow: {
                                size: "65%"
                            },
                            track: {
                                background: e,
                                strokeWidth: "100%"
                            },
                            dataLabels: {
                                name: {
                                    offsetY: -20,
                                    color: a,
                                    fontSize: "13px",
                                    fontWeight: "400",
                                    fontFamily: "Public Sans"
                                },
                                value: {
                                    offsetY: 10,
                                    color: t,
                                    fontSize: "38px",
                                    fontWeight: "600",
                                    fontFamily: "Public Sans"
                                }
                            }
                        }
                    },
                    colors: [config.colors.primary],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shade: "dark",
                            shadeIntensity: .5,
                            gradientToColors: [config.colors.primary],
                            inverseColors: !0,
                            opacityFrom: 1,
                            opacityTo: .6,
                            stops: [30, 70, 100]
                        }
                    },
                    stroke: {
                        dashArray: 10
                    },
                    grid: {
                        padding: {
                            top: -20,
                            bottom: 5
                        }
                    },
                    states: {
                        hover: {
                            filter: {
                                type: "none"
                            }
                        },
                        active: {
                            filter: {
                                type: "none"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 1025,
                        options: {
                            chart: {
                                height: 330
                            }
                        }
                    }, {
                        breakpoint: 769,
                        options: {
                            chart: {
                                height: 280
                            }
                        }
                    }]
                },
                s = (null !== s && new ApexCharts(s, i).render(), document.querySelector("#supportTracker2")),
                i = {
                    series: [{{ $percentageCheckedOut }}],
                    labels: ["Completed Checked Out"],
                    chart: {
                        height: 360,
                        type: "radialBar"
                    },
                    plotOptions: {
                        radialBar: {
                            offsetY: 10,
                            startAngle: -140,
                            endAngle: 130,
                            hollow: {
                                size: "65%"
                            },
                            track: {
                                background: e,
                                strokeWidth: "100%"
                            },
                            dataLabels: {
                                name: {
                                    offsetY: -20,
                                    color: a,
                                    fontSize: "13px",
                                    fontWeight: "400",
                                    fontFamily: "Public Sans"
                                },
                                value: {
                                    offsetY: 10,
                                    color: t,
                                    fontSize: "38px",
                                    fontWeight: "600",
                                    fontFamily: "Public Sans"
                                }
                            }
                        }
                    },
                    colors: [config.colors.primary],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shade: "dark",
                            shadeIntensity: .5,
                            gradientToColors: [config.colors.primary],
                            inverseColors: !0,
                            opacityFrom: 1,
                            opacityTo: .6,
                            stops: [30, 70, 100]
                        }
                    },
                    stroke: {
                        dashArray: 10
                    },
                    grid: {
                        padding: {
                            top: -20,
                            bottom: 5
                        }
                    },
                    states: {
                        hover: {
                            filter: {
                                type: "none"
                            }
                        },
                        active: {
                            filter: {
                                type: "none"
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 1025,
                        options: {
                            chart: {
                                height: 330
                            }
                        }
                    }, {
                        breakpoint: 769,
                        options: {
                            chart: {
                                height: 280
                            }
                        }
                    }]
                },
                s = (null !== s && new ApexCharts(s, i).render(), document.querySelector("#totalEarningChart")),
                i = {
                    series: [{
                        name: "Earning",
                        data: [15, 10, 20, 8, 12, 18, 12, 5]
                    }, {
                        name: "Expense",
                        data: [-7, -10, -7, -12, -6, -9, -5, -8]
                    }],
                    chart: {
                        height: 230,
                        parentHeightOffset: 0,
                        stacked: !0,
                        type: "bar",
                        toolbar: {
                            show: !1
                        }
                    },
                    tooltip: {
                        enabled: !1
                    },
                    legend: {
                        show: !1
                    },
                    plotOptions: {
                        bar: {
                            horizontal: !1,
                            columnWidth: "18%",
                            borderRadius: 5,
                            startingShape: "rounded",
                            endingShape: "rounded"
                        }
                    },
                    colors: [config.colors.primary, o],
                    dataLabels: {
                        enabled: !1
                    },
                    grid: {
                        show: !1,
                        padding: {
                            top: -40,
                            bottom: -20,
                            left: -10,
                            right: -2
                        }
                    },
                    xaxis: {
                        labels: {
                            show: !1
                        },
                        axisTicks: {
                            show: !1
                        },
                        axisBorder: {
                            show: !1
                        }
                    },
                    yaxis: {
                        labels: {
                            show: !1
                        }
                    },
                    responsive: [{
                        breakpoint: 1468,
                        options: {
                            plotOptions: {
                                bar: {
                                    columnWidth: "22%"
                                }
                            }
                        }
                    }, {
                        breakpoint: 1197,
                        options: {
                            chart: {
                                height: 228
                            },
                            plotOptions: {
                                bar: {
                                    borderRadius: 8,
                                    columnWidth: "26%"
                                }
                            }
                        }
                    }, {
                        breakpoint: 783,
                        options: {
                            chart: {
                                height: 232
                            },
                            plotOptions: {
                                bar: {
                                    borderRadius: 6,
                                    columnWidth: "28%"
                                }
                            }
                        }
                    }, {
                        breakpoint: 589,
                        options: {
                            plotOptions: {
                                bar: {
                                    columnWidth: "16%"
                                }
                            }
                        }
                    }, {
                        breakpoint: 520,
                        options: {
                            plotOptions: {
                                bar: {
                                    borderRadius: 6,
                                    columnWidth: "18%"
                                }
                            }
                        }
                    }, {
                        breakpoint: 426,
                        options: {
                            plotOptions: {
                                bar: {
                                    borderRadius: 5,
                                    columnWidth: "20%"
                                }
                            }
                        }
                    }, {
                        breakpoint: 381,
                        options: {
                            plotOptions: {
                                bar: {
                                    columnWidth: "24%"
                                }
                            }
                        }
                    }],
                    states: {
                        hover: {
                            filter: {
                                type: "none"
                            }
                        },
                        active: {
                            filter: {
                                type: "none"
                            }
                        }
                    }
                }
        }();
    </script>
@endsection
