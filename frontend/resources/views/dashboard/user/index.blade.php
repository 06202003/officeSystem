@extends('layouts.dashboard-app')
@section('title', 'User')


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


@section('helpers')

@endsection


@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Users / User Configuration /</span> User
        </h4>
        <!-- DataTable with Buttons -->
        <div class="card" id="card-block">
            <div class="card-datatable table-responsive pt-0">
                <table class="table" id="table-data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Division</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="modalReset" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Reset Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <p>Are you sure want to reset password this user?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form id="reset-password-form">
                                    <input id="reset-id" class="d-none" />
                                    <button type="button" class="btn btn-label-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" type="button"
                                        data-bs-dismiss="modal">Reset</button>
                                </form>
                            </div>
                        </div>
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
    <script src="{{ asset('./assets/new-dashboard/js/tables-datatables-basic.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/extended-ui-blockui.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/ui-toasts.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/block-ui/block-ui.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/toastr/toastr.js') }}"></script>
@endsection


@section('custom-javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
            type: "GET",
            url: "{{ env('URL_API') }}/api/v1/user/datatable",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization",
                    "Bearer {{ $token }}");
            },
            success: function(result) {
                console.log(result)
            },
            error: function(xhr, status, error) {
                var jsonResponse = JSON.parse(xhr.responseText);
            }
        });

            $('#table-data').DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ env('URL_API') }}/api/v1/user/datatable",
                    //path ori: user/datatable
                    "type": "GET",
                    'beforeSend': function(request) {
                        request.setRequestHeader("Authorization", "Bearer {{ $token }}");
                    },
                    "data": function(result) {
                        console.log(result)
                    },
                    // success: 
                },
                "columns": [
                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'id_employee',
                        render: function(data, type, row) {
                            if (data == null) {
                                return '<span class="badge rounded-pill bg-label-info">-</span>';
                            } else {
                                return '<span class="badge rounded-pill bg-label-info">' + data +
                                    '</span>';
                            }
                        }
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'department.department_name',
                        name: 'department.department_name',
                        render: function(data, type, row) {
                            if (data == null) {
                                return '-';
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: 'division.division_name',
                        name: 'division.division_name',
                        render: function(data, type, row) {
                            if (data == null) {
                                return '-';
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: 'position.position_name',
                        name: 'position.position_name',
                        render: function(data, type, row) {
                            if (data == null) {
                                return '-';
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            if (data == "active") {
                                return '<span class="badge  bg-label-success">Active</span>';
                            } else if (data == "pending") {
                                return '<span class="badge  bg-label-warning">Pending</span>';
                            } else {
                                return '<span class="badge  bg-label-danger">Deleted</span>';
                            }
                        }
                    },
                    {
                        data: null,
                        title: "Actions",
                        render: function(data, type, full, meta) {
                            var actionsHtml = '';

                            @isPermissions('Read_User')
                                actionsHtml += '<a href="/user/detail/profile/' + data['guid'] + '" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-eye"></i></a>';
                            @endisPermissions

                            @isPermissions('Update_User')
                                actionsHtml += '<a href="/user/edit/' + data['guid'] + '" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>';
                            @endisPermissions

                            @isPermissions('Update_User')
                                actionsHtml += '<button data-bs-toggle="modal" data-bs-target="#modalReset" data-guid="' + data['guid'] + '" class="btn btn-sm btn-icon item-edit open-reset-dialog"><i class="text-primary ti ti-key"></i></button>';
                            @endisPermissions

                            return actionsHtml;
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
                        @isPermissions('Create_User')
                        window.location = 'user/insert';
                        @endisPermissions
                    }
                }
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
                },
            }), $("div.head-label").html('<h5 class="card-title mb-0">User Data</h5>');

            $(document).on("click", ".open-reset-dialog", function() {
                var guid = $(this).data('guid');
                $("#reset-id").val(guid);
            });

            $('#reset-password-form').on('submit', function(e) {
                e.preventDefault();

                var guid = $('#reset-id').val();

                $.ajax({
                    type: "PUT",
                    url: "{{ env('URL_API') }}/api/v1/forgot-password/reset-password" + guid,
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
                            window.location.href = "{{ route('index-user') }}";
                        }
                        toastr.success(
                            "Success reset user password", "Success"
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
