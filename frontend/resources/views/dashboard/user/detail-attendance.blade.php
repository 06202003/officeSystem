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
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/leaflet/leaflet.css') }}" />
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
                            </div>
                        </div>
                        <div class="buttonexport">
                            <button data-popup-target="#popup" class="btn btn-primary">Export CV</button>
                            <div class="popup" id="popup">
                                <div class="popup-header">
                                    <div class="title">Choose To Export</div>
                                    <button data-close-button class="close-button">&times;</button>
                                </div>
                                <div class="popup-body">
                                    <form action="#">
                                        <ol>
                                            <li>
                                                <input type="checkbox" id="item1" name="item1">
                                                <label for="item1">Biodata Diri</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="item2" name="item2">
                                                <label for="item2">Riwayat Pendidikan</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="item3" name="item3">
                                                <label for="item3">Keahlian</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="item3" name="item3">
                                                <label for="item3">Riwayat Proyek</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="item3" name="item3">
                                                <label for="item3">Riwayat Kerja</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="item3" name="item3">
                                                <label for="item3">Additional Information</label>
                                            </li>
                                        </ol>
                                        <div class="buttonex">
                                            <a href="/user/detail/print/{{ $guid }}"><button
                                                    class="btn btn-primary">Export CV</button></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="overlay"></div>
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
                        <a class="nav-link" href="/user/detail/profile/{{ $guid }}">
                            <i class='ti-xs ti ti-user-check me-1'></i>
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);">
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

        <div class="row">
            <div class="col-xl">
                <div class=" card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Filter</h5>
                    </div>
                    <div class="card-body">
                        <form id="form-filter">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Check In Time</label>
                                <input type="text" id="check-in-picker" class="form-control"
                                    value="{{ $date }}" />
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- DataTable with Buttons -->
        <div class="card" id="card-block">
            <div class="card-datatable table-responsive pt-0">
                <table class="table" id="table-data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Attendance Date</th>
                            <th>Check In Time</th>
                            <th>Check Out Time</th>
                            <th>Day Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <!-- Modal -->
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Attendance Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <small class="card-text text-uppercase">Data</small>
                            <ul class="list-unstyled mb-4 mt-3">
                                <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span
                                        class="fw-bold mx-2">Full Name:</span>
                                    <span id="fullName">-</span>
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="ti ti-id-badge"></i><span
                                        class="fw-bold mx-2">NIK:</span>
                                    <span id="nik">-</span>
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="ti ti-calendar"></i><span
                                        class="fw-bold mx-2">Attendance Date:</span>
                                    <span id="attendanceDate">-</span>
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="ti ti-clock"></i><span
                                        class="fw-bold mx-2">Checked In Time:</span>
                                    <span id="checkInTime">-</span>
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="ti ti-clock-off"></i><span
                                        class="fw-bold mx-2">Checked Out Time:</span>
                                    <span id="checkOutTime">-</span>
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="ti ti-location"></i><span
                                        class="fw-bold mx-2">Checked In Location:</span>
                                    <span id="checkInLocation">-</span>
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="ti ti-map-pin"></i><span
                                        class="fw-bold mx-2">Current Location:</span>
                                    <span id="currentLocation">-</span>
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="ti ti-flag"></i><span
                                        class="fw-bold mx-2">Reason:</span>
                                    <span id="reason">-</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="card mb-4">
                                <h5 class="card-header">Image Selfie</h5>
                                <div class="card-body">
                                    <img id="img-selfie" width="100%" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card mb-4">
                                <h5 class="card-header">Current Location</h5>
                                <div class="card-body">
                                    <div class="leaflet-map" id="dragMap" style="height: 250px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card mb-4">
                                <h5 class="card-header">Log Location</h5>
                                <div class="card-body">
                                    <table class="table" id="tableLogLocation">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Location</th>
                                                <th>Time</th>
                                                <th>Reason</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBodyLogLocation">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- / Modal -->
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
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}">
    </script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/pickr/pickr.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/leaflet/leaflet.js') }}"></script>
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
    <script src="{{ asset('./assets/new-dashboard/js/maps-leaflet.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/pop-up.js') }}"></script>
@endsection


@section('custom-javascript')
    <script type="text/javascript">
        $(document).ready(function() {

            /// INITIAL MAP
            var map = L.map('dragMap').setView([40.737, -73.923],
                18);

            L.tileLayer(
                'https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);
            /// INITIAL MAP

            $("#check-in-picker").datepicker({
                format: "mm-yyyy",
                startView: "months",
                minViewMode: "months",
            });

            var monthCheckIn = $("#check-in-picker").val();

            $('#table-data').DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ env('URL_API') }}/api/v1/attendance/filter/user/datatable",
                    "type": "POST",
                    'beforeSend': function(request) {
                        request.setRequestHeader("Authorization", "Bearer {{ $token }}");
                    },
                    "data": {
                        "user_guid": "{{ $guid }}",
                        "month_check_in": monthCheckIn,
                    }
                },
                "columns": [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'attendance_date',
                        render: function(data, type, full, meta) {
                            var date = moment(data).add(7, 'hours').format('DD MMMM YYYY');
                            return date;
                        },
                    },
                    {
                        data: 'check_in_time',
                        render: function(data, type, full, meta) {
                            if (data == null) {
                                return '<span class="badge  bg-label-secondary">-</span>';
                            } else {
                                var date = moment(data).add(7, 'hours').format('HH:mm:ss');
                                return '<span class="badge  bg-label-success">' + date + '</span>';
                            }
                        },
                    },
                    {
                        data: 'check_out_time',
                        render: function(data, type, full, meta) {
                            if (data == null) {
                                return '<span class="badge  bg-label-secondary">-</span>';
                            } else {
                                var date = moment(data).add(7, 'hours').format('HH:mm:ss');
                                return '<span class="badge  bg-label-success">' + date + '</span>';
                            }
                        },
                    },
                    {
                        data: null,
                        title: 'Day Type',
                        render: function(data, type, full, meta) {
                            if (data['is_weekend']) {
                                return '<span class="badge rounded-pill bg-danger">Weekend</span>';
                            } else {
                                return '<span class="badge rounded-pill bg-success">Weekday</span>';
                            }
                        },
                    },
                    {
                        data: null,
                        title: "Actions",
                        render: function(data, type, full, meta) {
                            if (data['guid'] == "") {
                                return "";
                            } else {
                                return '<button type="button" data-bs-toggle="modal" data-bs-target="#modalDetail" data-guid="' +
                                    data['guid'] +
                                    '" class="btn btn-sm btn-icon item-edit open-detail-dialog"><i class="text-primary ti ti-eye"></i></button>';
                            }
                        },
                        orderable: false,
                        searchable: false
                    },
                ],
                dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 10,
                lengthMenu: [7, 10, 25, 50],
                buttons: [{
                    text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add Data</span>',
                    className: "create-new btn btn-primary d-none",
                    action: function(e, dt, node, config) {
                        window.location = 'attendance/insert';
                    }
                }],
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(e) {
                                return "Details of " + e.data().full_name
                            }
                        }),
                        type: "column",
                        renderer: function(e, t, a) {
                            a = $.map(a, function(e, t) {
                                return "" !== e.title ? '<tr data-dt-row="' + e.rowIndex +
                                    '" data-dt-column="' + e.columnIndex + '"><td>' + e.title +
                                    ":</td> <td>" + e.data + "</td></tr>" : ""
                            }).join("");
                            return !!a && $('<table class="table"/><tbody />').append(a)
                        }
                    }
                }
            }), $("div.head-label").html('<h5 class="card-title mb-0">Attendance Data</h5>');

            $('#form-filter').on('submit', function(e) {
                e.preventDefault();

                var checkInMonth = $("#check-in-picker").val();
                window.location = "?date=" + checkInMonth;
            });

            $(document).on("click", ".open-detail-dialog", function() {
                var guid = $(this).data('guid');

                $.ajax({
                    type: "GET",
                    url: "{{ env('URL_API') }}/api/v1/attendance/detail/" +
                        guid,
                    data: {

                    },
                    beforeSend: function(request) {
                        request.setRequestHeader("Authorization",
                            "Bearer {{ $token }}");

                        $("#card-block").block({
                            message: '<div class="spinner-border text-primary" role="status"></div>',
                            timeout: 1e3,
                            css: {
                                backgroundColor: "transparent",
                                border: "0"
                            },
                            overlayCSS: {
                                backgroundColor: "#fff",
                                opacity: .8
                            }
                        });
                    },
                    success: function(result) {
                        $.unblockUI();

                        if (result['data']['user']['name']) {
                            $("#fullName").text(result['data']['user'][
                                'name'
                            ]);
                        }

                        if (result['data']['user']['nik']) {
                            $("#nik").text(result['data']['user']['nik']);
                        }

                        if (result['data']['check_in_time']) {
                            var date = moment(result['data'][
                                    'check_in_time'
                                ]).add(7, 'hours')
                                .format('DD MMMM YYYY');
                            $("#attendanceDate").text(date);
                        }

                        if (result['data']['check_in_time']) {
                            var date = moment(result['data'][
                                    'check_in_time'
                                ]).add(7, 'hours')
                                .format('HH:mm:ss');
                            $("#checkInTime").text(date);
                        }

                        if (result['data']['check_out_time']) {
                            var date = moment(result['data'][
                                'check_out_time'
                            ]).add(7, 'hours').format('HH:mm:ss');
                            $("#checkOutTime").text(date);
                        }

                        if (result['data']['location']) {
                            $("#checkInLocation").text(result['data'][
                                'location'
                            ]);
                        }

                        if (result['data']['current_location'][
                                'location'
                            ]) {
                            $("#currentLocation").text(result['data'][
                                'current_location'
                            ]['location']);
                        }

                        if (result['data']['current_location'][
                                'other_reason'
                            ]) {
                            $("#reason").text(result['data'][
                                'current_location'
                            ]['other_reason']);
                        }

                        $('#img-selfie').attr("src", result['data']['url_selfie']);

                        $('#tableBodyLogLocation').empty();
                        var count = 1;
                        for (let i = 0; i < result['data']['log'].length; i++) {


                            var googleLocation =
                                "https://www.google.com/maps/search/" + result['data']['log'][i]
                                ['latitude'] + "+" + result['data']['log'][i]['longitude'] +
                                "/@" + result['data']['log'][i]['latitude'] + "," + result[
                                    'data']['log'][i]['longitude'] + ",17z";

                            var location = '<a href="' + googleLocation +
                                '" target="_BLANK">' + result['data']['log'][i]['location'] +
                                '</a>';
                            var time = moment(result['data']['log'][i]['created_at']).format(
                                'HH:mm:ss');

                            if (result['data']['log'][i]['other_reason']) {
                                var reason = result['data']['log'][i]['other_reason'];
                            } else {
                                var reason = "-";
                            }


                            if (result['data']['log'][i]['url_selfie']) {
                                var img = result['data']['log'][i]['url_selfie'];
                                var imageSelfie = '<a href="' + img +
                                    '" target="_BLANK"><img src="' + img +
                                    '" width="100px"></a>';
                            } else {
                                var imageSelfie = "-";
                            }

                            $('#tableLogLocation > tbody:last-child').append('<tr><td>' +
                                count + '</td><td>' + location +
                                '</td><td>' + time + '</td><td>' + reason + '</td><td>' +
                                imageSelfie + '</td></tr>');
                            count++;
                        }

                        $("#modalDetail").modal("show");

                        map.setView(new L.LatLng(result['data'][
                            'current_location'
                        ]['latitude'], result['data'][
                            'current_location'
                        ]['longitude']));

                        var marker = L.marker([result['data'][
                                'current_location'
                            ]['latitude'], result['data'][
                                'current_location'
                            ]['longitude']]).addTo(map)
                            .bindPopup("<b>You're here!</b>");

                        $('#modalDetail').on('shown.bs.modal', function() {
                            map.invalidateSize();
                        });

                        $('#modalDetail').on('hidden.bs.modal', function() {
                            map.removeLayer(marker);
                        });
                    },
                    error: function(xhr, status, error) {
                        $.unblockUI();
                        var jsonResponse = JSON.parse(xhr.responseText);

                        toastr.options.closeButton = true;
                        toastr.error(
                            jsonResponse['message'],
                            "Error",
                        );
                    }
                });
            });
        });
    </script>
@endsection
