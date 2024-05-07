@extends('layouts.dashboard-app')
@section('title', 'User Detail')


@section('icons')

@endsection


@section('core-css')

@endsection


@section('vendor-css')
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/flatpickr/flatpickr.css') }}" />
<!-- Row Group CSS -->
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">
<!-- Form Validation -->
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/spinkit/spinkit.css') }}" />
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/toastr/toastr.css') }}" />
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/pickr/pickr-themes.css') }}" />
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/leaflet/leaflet.css') }}" />
@endsection


@section('page-css')
<link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/css/pages/page-profile.css') }}" />
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
                    <img src="{{ asset('./assets/new-dashboard/img/pages/profile-banner-wit.png') }}" alt="Banner image" class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{ asset('./assets/new-dashboard/img/avatars/PP-rect.png') }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ $profile['data']['name'] }}</h4>
                                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item">
                                        <i class='ti ti-color-swatch'></i>
                                        {{ $profile['data']['position']['position_name'] }}
                                    </li>
                                </ul>
                            </div>
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
                    <a class="nav-link" href="/user/detail/profile/{{ $guid }}">
                        <i class='ti-xs ti ti-user-check me-1'></i>
                        Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/detail/attendance/{{ $guid }}">
                        <i class="ti ti-check me-1 ti-xs"></i> Attendances</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);">
                        <i class="ti ti-package me-1 ti-xs"></i> Inventory</a>
                </li>
            </ul>
        </div>
    </div>
    <!--/ Navbar pills -->

    <!-- DataTable with Buttons -->
    <div class="card d-none">
        <div class="card-datatable table-responsive pt-0">
            <table class="table table-wrapper table-responsive">
                <thead>
                    <tr>
                        <th>Inventory Name</th>
                        <th>Brand</th>
                        <th>Purchase Date</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="table-inventory">

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="table table-wrapper table-responsive" id="table-data">
                <thead>
                    <tr>
                        <!-- <th>No</th> -->
                        <th>Inventory Name</th>
                        <th>Brand</th>
                        <th>Purchase Date</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
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
@endsection


@section('custom-javascript')
<script type="text/javascript">
    $(document).ready(function() {
        var url = window.location.href;
        var parts = url.split('/');
        var guid = parts[parts.length - 1];

        var inventoryData = [];

        $.ajax({
            type: "GET",
            url: "{{ env('URL_API') }}/api/v1/inventory/datatable",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", "Bearer {{ $token }}");
            },
            success: function(result) {
                result.data.forEach(function(data) {
                    if (data.user_guid == guid) {
                        inventoryData.push(data);
                    }
                });

                initializeDataTable(inventoryData);
            },
            error: function(xhr, status, error) {
                var jsonResponse = JSON.parse(xhr.responseText);
            }
        });

        function initializeDataTable(data) {
            $('#table-data').DataTable({
                "destroy": true,
                "processing": true,
                "data": data,
                "columns": [
                    // {
                    //     data: 'DT_RowIndex',
                    //     orderable: false,
                    //     searchable: false
                    // },
                    {
                        data: 'inventory_name'
                    },
                    {
                        data: 'brand'
                    },
                    {
                        data: 'purchase_date',
                        render: function(data) {
                            return moment(data).format('DD MMMM YYYY');
                        }
                    },
                    {
                        data: 'price',
                        render: $.fn.dataTable.render.number('.', ',', 0, 'Rp. ')
                    },
                    {
                        data: 'category',
                        render: function(data, type, full, meta) {
                            return data['category_name']
                        },
                    },
                    {
                        data: 'room',
                        render: function(data, type, full, meta) {
                            return data['office']['office_name'] + "-" + data['office']['city']
                        },
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            if (data == "normal") {
                                return '<span class="badge  bg-label-success">Normal</span>';
                            } else if (data == "maintanance") {
                                return '<span class="badge  bg-label-danger">Maintanance</span>';
                            } else {
                                return '<span class="badge  bg-label-danger">Damage</span>';
                            }
                        }
                    },
                    {
                        data: null,
                        title: "Actions",
                        render: function(data, type, full, meta) {
                            return '<a href="/inventory/detail/' + data['guid'] +
                                '" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-eye"></i></a>' +
                                '<a href="/inventory/edit/' + data['guid'] +
                                '" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>' +
                                '<button data-bs-toggle="modal" data-bs-target="#modalDelete" data-guid="' +
                                data['guid'] +
                                '" class="btn btn-sm btn-icon item-edit open-delete-dialog"><i class="text-primary ti ti-trash"></i></button>'
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
                    className: "create-new btn btn-primary",
                    action: function(e, dt, node, config) {
                        window.location = 'inventory/insert';
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
                },
            });

            $("div.head-label").html('<h5 class="card-title mb-0">Item Used</h5>');
        }
    });
</script>
@endsection