@extends('layouts.dashboard-app')
@section('title', 'Edit Leave Management')

@section('icons')

@endsection

@section('core-css')

@endsection

@section('vendor-css')
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/spinkit/spinkit.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/toastr/toastr.css') }}" />
@endsection

@section('helpers')

@endsection


@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Leave Requests /</span> Edit
        </h4>

        <!-- User Profile Content -->
        <div class="row">
            <div>
                <div class="card mb-4">
                    <div class="card-body">
                        <small class="card-text text">Detail</small>

                        <!-- Basic Layout -->
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-4 mt-3">
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-tag"></i><span
                                        class="fw-bold mx-2">Requested By:</span>
                                        @if (empty($data['data']['requested_by_name']))
                                            <span>-</span>
                                        @else
                                            <span>{{ $data['data']['requested_by_name'] }}</span>
                                        @endif
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-tag"></i><span
                                        class="fw-bold mx-2">Status:</span>
                                        @if (empty($data['data']['status']))
                                            <span>-</span>
                                        @else
                                            @if ($data['data']['status'] === 'yes')
                                                <span>Approved</span>
                                            @elseif ($data['data']['status'] === 'no')
                                                <span>Rejected</span>
                                            @elseif ($data['data']['status'] === 'waiting')
                                                <span>Waiting</span>
                                            @else
                                                <span>{{ $data['data']['status'] }}</span>
                                            @endif
                                        @endif
                                    </li>                                
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-calendar"></i><span
                                        class="fw-bold mx-2">Date Requested:</span>
                                        @if (empty($data['data']['date_requested']))
                                            <span>-</span>
                                        @else
                                            <span>{{ $data['data']['date_requested'] }}</span>
                                        @endif
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-message"></i><span
                                        class="fw-bold mx-2">Description:</span>
                                        @if (empty($data['data']['description']))
                                            <span>-</span>
                                        @else
                                            <span>{{ $data['data']['description'] }}</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-unstyled mb-4 mt-3">
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-calendar"></i><span
                                        class="fw-bold mx-2">StartDate:</span>
                                        @if (empty($data['data']['start_date']))
                                            <span>-</span>
                                        @else
                                            <span>{{ $data['data']['start_date'] }}</span>
                                        @endif
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-calendar"></i><span
                                        class="fw-bold mx-2">End Date:</span>
                                        @if (empty($data['data']['end_date']))
                                            <span>-</span>
                                        @else
                                            <span>{{ $data['data']['end_date'] }}</span>
                                        @endif
                                    </li>
                                    {{-- <li class="d-flex align-items-center mb-3"><i class="fa fa-clock"></i><span
                                        class="fw-bold mx-2">Duration:</span>
                                        <span value="{{ $req['guid'] }}">{{ $req['status'] }} </span>
                                    </li> --}}
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-clipboard"></i><span
                                        class="fw-bold mx-2">Leave Type:</span>
                                        @if (empty($data['data']['name']))
                                            <span>-</span>
                                        @else
                                            <span>{{ $data['data']['name'] }}</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>

                            <form id="form">
                                <div class="mb-3 d-none">
                                    <label class="form-label" for="guid">GUID</label>
                                    <input type="text" class="form-control" id="guid" placeholder="Input GUID" required value="{{ $data['data']['guid'] ?? '' }}" readonly/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="status">Status</label>
                                    <select id="status" class="select2 form-select " data-allow-clear="true" required>
                                        <option value=" " disabled selected>Select Status</option>
                                        <option value="yes" {{ isset($data['data']['status']) && $data['data']['status'] == 'approved' ? 'selected' : '' }}>Approve</option>
                                        <option value="no" {{ isset($data['data']['status']) && $data['data']['status'] == 'rejected' ? 'selected' : '' }}>Reject</option>
                                    </select>
                                </div>
                                <div class="mb-3" id="reasonTextArea">
                                    <label class="form-label" for="reason">Reason </label>
                                    <textarea class="form-control" id="reasonTextarea" rows="3"></textarea>
                                    <div id="reasonError" class="text-danger" style="display: none;">Reason is required for Reject status.</div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>                            
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
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/block-ui/block-ui.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/toastr/toastr.js') }}"></script>
@endsection

@section('main-js')                                                                                                                                                                                                                                                     

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
            function toggleReasonTextarea() {
                var status = $("#status").val();
                if (status === 'no') {
                    $("#reasonTextArea").show(); 
                } else {
                    $("#reasonTextArea").hide(); 
                }
            }

            toggleReasonTextarea();

            $("#status").on('change', function() {
                toggleReasonTextarea();
            });

            $("#form").on('submit', function(e) {
                e.preventDefault();

                var guid = $("#guid").val();
                var status = $("#status").val();
                var reason = $("#reasonTextarea").val();

                var dataToSend = {
                    "guid": guid,
                    "status": status,
                    "reason": reason
                };

                if (status === 'no' && !reason) {
                    $("#reasonError").show();
                    toastr.error("Reason is required for Reject status.", "Error");
                    return;
                } else {
                    $("#reasonError").hide();
                }

                $.ajax({
                    type: "PUT",
                    url: "{{ env('URL_API') }}/api/v1/admin/leave-request/",
                    data: dataToSend,
                    beforeSend: function(request) {
                        request.setRequestHeader("Authorization", "Bearer {{ $token }}");

                        $("#card-block").block({
                            message: '<div class="spinner-border text-primary" role="status"></div>',
                            timeout: 1000,
                            css: {
                                backgroundColor: "transparent",
                                border: "0"
                            },
                            overlayCSS: {
                                backgroundColor: "#fff",
                                opacity: 0.8
                            }
                        });
                    },
                    success: function(response) {
                        toastr.options.closeButton = true;
                        toastr.options.timeOut = 1000;
                        toastr.options.onHidden = function() {
                            window.location.href = "/leave-management";
                        };
                        toastr.success("Decision submitted successfully!", "Success");
                    },
                    error: function(xhr, status, error) {
                        var jsonResponse = JSON.parse(xhr.responseText);
                        toastr.options.closeButton = true;
                        toastr.error(jsonResponse['message'], "Error");
                    }
                });
            });
        });
    </script>
@endsection

