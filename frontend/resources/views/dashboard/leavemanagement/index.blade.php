@extends('layouts.dashboard-app')
@section('title', 'Leave')

@section('vendor-css')
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/toastr/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Leave Management</span>
        </h4>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Filter</h5>
                    </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="status">Leave Status</label>
                                <select id="approval_status" class="select2 form-select" data-allow-clear="true">
                                    <option value=" " disabled selected>Select Status</option>
                                    <option value="waiting" @if ($currentApprovalStatus == 'waiting') selected @endif>Waiting</option>
                                    <option value="yes" @if ($currentApprovalStatus == 'approved') selected @endif>Approved</option>
                                    <option value="no" @if ($currentApprovalStatus == 'rejected') selected @endif>Rejected</option>
                                </select>
                            </div>
                        {{-- <button type="submit" class="btn btn-primary">Filter</button> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="card" id="card-block">
            <div class="card-datatable table-responsive pt-0">
                <table class="table" id="table-data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User Requested</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Duration</th>
                            <th>Leave Type</th>
                            <th>Date Requested</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Leave Request Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>User Requested:</strong></div>
                            <div class="col-md-8" id="modalUserRequested"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Start Date:</strong></div>
                            <div class="col-md-8" id="modalStartDate"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>End Date:</strong></div>
                            <div class="col-md-8" id="modalEndDate"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Description:</strong></div>
                            <div class="col-md-8" id="modalDescription"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Status:</strong></div>
                            <div class="col-md-8" id="modalStatus"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
 
@section('vendor-js')
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/jszip/jszip.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/pdfmake/pdfmake.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons/buttons.print.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/flatpickr/flatpickr.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('./assets/new-dashboard/js/form-layouts.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/extended-ui-sweetalert2.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/extended-ui-blockui.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/ui-toasts.js') }}"></script>
@endsection

@section('custom-javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            console.log("URL_API:", "{{ env('URL_API') }}");
            console.log("Token:", "{{ $token }}");

            $('#table-data').DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ env('URL_API') }}/api/v1/admin/leave-request/datatable/",
                    "type": "GET",
                    'beforeSend': function(request) {
                        request.setRequestHeader("Authorization", "Bearer {{ $token }}");
                    },
                    "data": {},
                },
                "columns": [
                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'requested_by_name',
                    },
                    {
                        data: 'start_date',
                        render: function(data, type, full, meta) {
                            return data ? new Date(data).toLocaleDateString() : '-';
                        },
                    },
                    {
                        data: 'end_date',
                        render: function(data, type, full, meta) {
                            return data ? new Date(data).toLocaleDateString() : '-';
                        },
                    },
                    {
                        data: null,
                        render: function(data, type, full, meta) {
                            var startDate = new Date(full.start_date);
                            var endDate = new Date(full.end_date);

                            if (!startDate || !endDate) {
                                return '-';
                            }

                            var diffInMilliseconds = endDate - startDate;
                            var diffInDays = Math.floor(diffInMilliseconds / (1000 * 60 * 60 * 24));

                            return diffInDays + ' Days';
                        },
                        title: 'Duration'
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'date_requested',
                        render: function(data, type, full, meta) {
                            return data ? new Date(data).toLocaleDateString() : '-';
                        },
                    },
                    {
                        data: 'description',
                    },
                    {
                        data: 'status',
                        render: function(data, type, full, meta) {
                            switch (data) {
                                case 'yes':
                                    return '<span class="badge bg-label-success">Approved</span>';
                                case 'no':
                                    return '<span class="badge bg-label-danger">Rejected</span>';
                                case 'waiting':
                                    return '<span class="badge bg-label-warning">Waiting</span>';
                                case 'canceled':
                                    return '<span class="badge bg-label-secondary">Canceled</span>';
                                default:
                                    return '-';
                            }
                        },
                    },
                    {
                        data: null,
                        title: "Actions",
                        render: function(data, type, full, meta) {
                            var actionsHtml = '';

                            actionsHtml += '<button data-bs-toggle="modal" data-bs-target="#modalDetail" data-guid="' + data['guid'] + '" class="btn btn-sm btn-icon item-edit open-detail-dialog"><i class="text-primary ti ti-eye"></i></button>';

                            actionsHtml += '<a href="/leave-management/edit/' + data['guid'] + '" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>';

                            return actionsHtml;
                        },
                        orderable: false,
                        searchable: false
                    },
                ],
                // "dom": '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                // "displayLength": 10,
                // "lengthMenu": [7, 10, 25, 50],
                // "buttons": [
                //     { extend: 'copy', className: 'dt-button create-new btn btn-primary' },
                //     { extend: 'csv', className: 'dt-button create-new btn btn-primary' },
                //     { extend: 'pdf', className: 'dt-button create-new btn btn-primary' },
                //     { extend: 'excel', className: 'dt-button create-new btn btn-primary' },
                //     { extend: 'print', className: 'dt-button create-new btn btn-primary' },
                // ],
                "responsive": {
                    "details": {
                        "display": $.fn.dataTable.Responsive.display.modal({
                            "header": function(e) {
                                return "Details of " + e.data().full_name;
                            }
                        }),
                        "type": "column",
                        "renderer": function(e, t, a) {
                            a = $.map(a, function(e, t) {
                                return "" !== e.title ? '<tr data-dt-row="' + e.rowIndex +
                                    '" data-dt-column="' + e.columnIndex + '"><td>' + e.title +
                                    ":</td> <td>" + e.data + "</td></tr>" : "";
                            }).join("");
                            return !!a && $('<table class="table"/><tbody />').append(a);
                        }
                    }
                }
            });

            $("div.head-label").html('<h5 class="card-title mb-0">Data All Requested Leave</h5>');

            $(document).on("click", ".open-detail-dialog", function() {
                var guid = $(this).data('guid'); 

                fetch("{{ env('URL_API') }}/api/v1/admin/leave-request/" + guid, {
                    method: "GET",
                    headers: {
                        "Authorization": "Bearer {{ $token }}"
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Failed to fetch leave request details");
                    }
                    return response.json();
                })
                .then(data => {
                    $("#modalUserRequested").text(data.requested_by_name);
                    $("#modalStartDate").text(data.start_date);
                    $("#modalEndDate").text(data.end_date);
                    $("#modalDescription").text(data.description);
                    $("#modalStatus").text(data.status);

                    $("#modalDetail").modal("show");
                })
                .catch(error => {
                    console.error("Error fetching leave request details:", error);
                    alert("Failed to fetch leave request details. Please try again.");
                });
            });
            
            $('#approval_status').on('change', function() {
                var selectedStatus = $(this).val(); 
                var apiUrl = "{{ env('URL_API') }}/api/v1/admin/leave-request/datatable/";

                if (selectedStatus) {
                    apiUrl += "?status=" + selectedStatus;
                }

                $('#table-data').DataTable().ajax.url(apiUrl).load();
            });
        });
    </script>
@endsection

