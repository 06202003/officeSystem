@extends('layouts.dashboard-app')
@section('title', 'Inventory Detail')


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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <span class="text-muted fw-light">Inventory / Item / Detail /</span> {{ $inventory['data']['inventory_name'] }}
    </h4>

    <!-- User Profile Content -->
    <div class="row">
        <div>
            <div class="card mb-4">
                <div class="card-body">
                    <small class="card-text text-uppercase">Detail</small>

                    <ul class="list-unstyled mb-4 mt-3">
                    <?php
                        // Memeriksa apakah img_url ada atau null
                        if(isset($inventory['data']['img_url']) && !empty($inventory['data']['img_url'])) {
                            // Jika img_url tidak null atau tidak kosong, gunakan img_url yang diberikan
                            $src = $inventory['data']['img_url'];
                        } else {
                            // Jika img_url null atau tidak ada, gunakan tautan yang disediakan
                            $src = 'https://cdn.discordapp.com/attachments/1008737827346989086/1192458223970689125/no-image.png?ex=65e08543&is=65ce1043&hm=51618b3ac38934375419329d9f173884a6ff9d805066926678d7bb2051af4e9b';
                        }
                    ?>
                        <li class="d-flex align-items-center mb-3">
                            <img src="<?php echo $src; ?>" height="150px" />
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled mb-4 mt-3">
                                <li class="d-flex align-items-center mb-3 "><i class="fa fa-tag"></i><span class="fw-bold mx-2">Inventory Name:</span>
                                    @if (empty($inventory['data']['inventory_name']))
                                    <span>-</span>
                                    @else
                                    <span>{{ $inventory['data']['inventory_name'] }}</span>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="fa fa-copyright"></i><span class="fw-bold mx-2">Brand:</span>
                                    @if (empty($inventory['data']['brand']))
                                    <span>-</span>
                                    @else
                                    <span>{{ $inventory['data']['brand'] }}</span>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-3">
    <i class="fa fa-calendar"></i>
    <span class="fw-bold mx-2">Purchase Date:</span>
    @if (empty($inventory['data']['purchase_date']))
        <span>-</span>
    @else
        <?php
            $purchase_date = date('d F Y', strtotime($inventory['data']['purchase_date']));
            echo "<span>$purchase_date</span>";
        ?>
    @endif
</li>

                                <li class="d-flex align-items-center mb-3"><i class="fa fa-money"></i><span class="fw-bold mx-2">Price:</span>
                                    @if (empty($inventory['data']['price']))
                                    <span>-</span>
                                    @else
                                    <span class="format">{{ $inventory['data']['price'] }}</span>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="fa fa-bars"></i><span class="fw-bold mx-2">Category:</span>
                                    @if (empty($inventory['data']['category']['category_name']))
                                    <span>-</span>
                                    @else
                                    <span>{{ $inventory['data']['category']['category_name'] }}</span>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="fa fa-pencil-square-o"></i><span class="fw-bold mx-2">Description:</span>
                                    @if (empty($inventory['data']['description']))
                                    <span>-</span>
                                    @else
                                    <span>{{ $inventory['data']['description'] }}</span>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="fa fa-user"></i><span class="fw-bold mx-2">User:</span>
                                    @if (empty($inventory['data']['user']))
                                    <span>-</span>
                                    @else
                                    <span>{{ $inventory['data']['user']['nik'] }} -
                                        {{ $inventory['data']['user']['name'] }}</span>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="fa fa-map-marker"></i><span class="fw-bold mx-2">Room:</span>
                                    @if (empty($inventory['data']['room']))
                                    <span>-</span>
                                    @else
                                    <span>{{ $inventory['data']['room']['room_name'] }} -
                                        {{ $inventory['data']['room']['office']['office_name'] }} -
                                        {{ $inventory['data']['room']['office']['city'] }}</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled mb-4 mt-3">
                                <li class="d-flex align-items-center mb-3"><i class="fa fa-check"></i><span class="fw-bold mx-2">Status:</span>
                                    @if (empty($inventory['data']['status']))
                                    <span>-</span>
                                    @else
                                    <span>{{ $inventory['data']['status'] }}</span>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="fa fa-clock-o"></i><span class="fw-bold mx-2">Useful Life:</span>
                                    @if (empty($inventory['data']['useful_life']))
                                    <span>-</span>
                                    @else
                                    <span>{{ $inventory['data']['useful_life'] }}</span>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="fa fa-trash-o"></i><span class="fw-bold mx-2">Residual Value:</span>
                                    @if (empty($inventory['data']['residual_value']))
                                    <span>-</span>
                                    @else
                                    <span class="format">{{ $inventory['data']['residual_value'] }}</span>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="fa fa-line-chart"></i><span class="fw-bold mx-2">Depreciation:</span>
                                    @if (empty($inventory['data']['depreciation']))
                                    <span>-</span>
                                    @else
                                    <span class="format">{{ $inventory['data']['depreciation'] }}</span>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="fa fa-minus"></i><span class="fw-bold mx-2">First Year Value:</span>
                                    @if (empty($inventory['data']['price_in_year_1']))
                                    <span>-</span>
                                    @else
                                    <span class="format">{{ $inventory['data']['price_in_year_1'] }}</span>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="fa fa-minus"></i><span class="fw-bold mx-2">Second Year Value:</span>
                                    @if (empty($inventory['data']['price_in_year_2']))
                                    <span>-</span>
                                    @else
                                    <span class="format">{{ $inventory['data']['price_in_year_2'] }}</span>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="fa fa-minus"></i><span class="fw-bold mx-2">Third Year Value:</span>
                                    @if (empty($inventory['data']['price_in_year_3']))
                                    <span>-</span>
                                    @else
                                    <span class="format">{{ $inventory['data']['price_in_year_3'] }}</span>
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-3"><i class="fa fa-minus"></i><span class="fw-bold mx-2">Fourth Year Value:</span>
                                    @if (empty($inventory['data']['price_in_year_4']))
                                    <span>-</span>
                                    @else
                                    <span class="format">{{ $inventory['data']['price_in_year_4'] }}</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div>
            <div class="card mb-4" id="card-block">
                <div class="card-datatable table-responsive pt-0">
                    <table class="table" id="table-data-usage">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Old User</th>
                                <th>New User</th>
                                <th>Old Room</th>
                                <th>New Room</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div>
            <div class="card mb-4" id="card-block">
                <div class="card-datatable table-responsive pt-0">
                    <table class="table" id="table-data-damage">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Damage Date</th>
                                <th>Description</th>
                                <th>Repair Date</th>
                                <th>Completion Repair Date</th>
                                <th>Repair Cost</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete Damage History-->
    <div class="modal fade" id="modalDeleteDamageHistory" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Delete Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <p>Are you sure want to delete this data?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form id="delete-damage-history-form">
                        <input id="delete-damage-history-id" class="d-none" />
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" type="button" data-bs-dismiss="modal">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete Usage History-->
    <div class="modal fade" id="modalDeleteUsageHistory" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Delete Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <p>Are you sure want to delete this data?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form id="delete-usage-history-form">
                        <input id="delete-usage-history-id" class="d-none" />
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" type="button" data-bs-dismiss="modal">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
@endsection


@section('custom-javascript')
<script type="text/javascript">
    $(document).ready(function() {
        new AutoNumeric.multiple('.format', {
            currencySymbol: "Rp. ",
            decimalCharacter: ",",
            digitGroupSeparator: ".",
            unformatOnSubmit: true
        });
        $('#table-data-usage').DataTable({
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ env('URL_API') }}/api/v1/usage-history/filter/inventory/datatable",
                "type": "POST",
                'beforeSend': function(request) {
                    request.setRequestHeader("Authorization", "Bearer {{ $token }}");
                },
                "data": {
                    "inventory_guid": "{{ $guid }}",
                }
            },
            "columns": [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'date',
                    render: function(data) {
                    return moment(data).format('DD MMMM YYYY');
                }
                },
                {
                    data: 'old_user',
                    render: function(data, type, full, meta) {
                        if (data != null) {
                            return data['nik'] + '-' + data['name']
                        } else {
                            return '<span class="badge  bg-label-secondary">-</span>';
                        }

                    },
                },
                {
                    data: 'new_user',
                    render: function(data, type, full, meta) {
                        return data['nik'] + '-' + data['name']
                    },
                },
                {
                    data: 'old_room',
                    render: function(data, type, full, meta) {
                        return data['room_name'] + '-' + data['office']['office_name'] + " " +
                            data['office']['city']
                    },
                },
                {
                    data: 'new_room',
                    render: function(data, type, full, meta) {
                        return data['room_name'] + '-' + data['office']['office_name'] + " " +
                            data['office']['city']
                    },
                },
                {
                    data: null,
                    title: "Actions",
                    render: function(data, type, full, meta) {
                        return '<button data-bs-toggle="modal" data-bs-target="#modalDeleteUsageHistory" data-guid="' +
                            data['guid'] +
                            '" class="btn btn-sm btn-icon item-edit open-delete-usage-history-dialog"><i class="text-primary ti ti-trash"></i></button>'
                    },
                    orderable: false,
                    searchable: false
                },
            ],
            dom: '<"card-header flex-column flex-md-row"<"head-label-usage text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 10,
            lengthMenu: [7, 10, 25, 50],
            buttons: [
    { extend: 'copy', className: 'dt-button create-new btn btn-primary' },
    { extend: 'csv', className: 'dt-button create-new btn btn-primary' },
    { extend: 'pdf', className: 'dt-button create-new btn btn-primary' },
    { extend: 'excel', className: 'dt-button create-new btn btn-primary' },
    { extend: 'print', className: 'dt-button create-new btn btn-primary' },
],
            
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
        }), $("div.head-label-usage").html('<h5 class="card-title mb-0">Usage History</h5>');

        $('#table-data-damage').DataTable({
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ env('URL_API') }}/api/v1/damage-history/filter/inventory/datatable",
                "type": "POST",
                'beforeSend': function(request) {
                    request.setRequestHeader("Authorization", "Bearer {{ $token }}");
                },
                "data": {
                    "inventory_guid": "{{ $guid }}",
                }
            },
            "columns": [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'date_of_damage',
                    render: function(data) {
                    return moment(data).format('DD MMMM YYYY');
                }
                },
                {
                    data: 'description',
                },
                {
                    data: 'repair_date',
                    render: function(data) {
                    return moment(data).format('DD MMMM YYYY');
                }
                },
                {
                    data: 'completion_date_of_repair',
                    render: function(data) {
                    return moment(data).format('DD MMMM YYYY');
                }
                },
                {
                    data: 'repair_cost',
                    render: $.fn.dataTable.render.number('.', ',', 0, 'Rp. ')
//                     render: {
//     _: $.fn.dataTable.render.number('.', ',', 0, 'Rp'),
//     display: function(data, type, full, meta) {
//         if (data != null) {
//             return data['nik'] + '-' + data['name'];
//         } else {
//             return '<span class="badge bg-label-secondary">-</span>';
//         }
//     }
// }

                    
                },
                {
                    data: null,
                    title: "Actions",
                    render: function(data, type, full, meta) {
                        return '<a href="/damage-history/detail/' + data['guid'] +
                            '" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-eye"></i></a>' +
                            '<a href="/damage-history/edit/' + data['guid'] +
                            '" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>' +
                            '<button data-bs-toggle="modal" data-bs-target="#modalDeleteDamageHistory" data-guid="' +
                            data['guid'] +
                            '" class="btn btn-sm btn-icon item-edit open-delete-damage-history-dialog"><i class="text-primary ti ti-trash"></i></button>'
                    },
                    orderable: false,
                    searchable: false
                },
            ],
            dom: '<"card-header flex-column flex-md-row"<"head-label-damage text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 10,
            lengthMenu: [7, 10, 25, 50],
            buttons: [{
                text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add Data</span>',
                className: "create-new btn btn-primary",
                action: function(e, dt, node, config) {
                    window.location =
                        '/damage-history/insert/detail/inventory/{{ $guid }}';
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
        }), $("div.head-label-damage").html('<h5 class="card-title mb-0">Damage History</h5>');

        $(document).on("click", ".open-delete-damage-history-dialog", function() {
            var guid = $(this).data('guid');
            $("#delete-damage-history-id").val(guid);
        });

        $('#delete-damage-history-form').on('submit', function(e) {
            e.preventDefault();

            var guid = $('#delete-damage-history-id').val();

            $.ajax({
                type: "DELETE",
                url: "{{ env('URL_API') }}/api/v1/damage-history/" + guid,
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
                    toastr.options.closeButton = true;
                    toastr.options.timeOut = 1000;
                    toastr.options.onHidden = function() {
                        window.location.href =
                            "{{ route('index-detail-inventory', ['guid' => $guid]) }}";
                    }
                    toastr.success(
                        "Success delete data", "Success"
                    );
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

        $(document).on("click", ".open-delete-usage-history-dialog", function() {
            var guid = $(this).data('guid');
            $("#delete-usage-history-id").val(guid);
        });

        $('#delete-usage-history-form').on('submit', function(e) {
            e.preventDefault();

            var guid = $('#delete-usage-history-id').val();

            $.ajax({
                type: "DELETE",
                url: "{{ env('URL_API') }}/api/v1/usage-history/" + guid,
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
                    toastr.options.closeButton = true;
                    toastr.options.timeOut = 1000;
                    toastr.options.onHidden = function() {
                        window.location.href =
                            "{{ route('index-detail-inventory', ['guid' => $guid]) }}";
                    }
                    toastr.success(
                        "Success delete data", "Success"
                    );
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