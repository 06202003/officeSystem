@extends('layouts.dashboard-app')
@section('title', 'Edit User')


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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users / User Configuration / User /</span> Edit
        </h4>
        <!-- Basic Layout -->
        <div class="row" id="card-block">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Form User</h5>
                    </div>
                    <div class="card-body">
                        <form id="form">
                            <div class="mb-3 d-none">
                                <label class="form-label" for="basic-default-fullname">GUID</label>
                                <input type="text" class="form-control" id="guid" placeholder="Input GUID" required
                                    value="{{ $data['data']['guid'] }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Department</label>
                                <select id="department" class="select2 form-select form-select-lg" data-allow-clear="true"
                                    required>
                                    <option value="" selected>-- Select Department --</option>
                                    @foreach ($departments['data'] as $department)
                                        <option value="{{ $department['guid'] }}"
                                            @if ($data['data']['department_guid'] == $department['guid']) selected @endif>
                                            {{ $department['department_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Name</label>
                                <input type="text" class="form-control" id="name"
                                    placeholder="Input User Name" required
                                    value="{{ $data['data']['name'] }}" />
                            </div>
                            <div class="mb-3">
                                <div class="text-light small fw-semibold">Status</div>
                                <div class="demo-inline-spacing">
                                    <label class="switch switch-success">
                                        <input type="checkbox" class="switch-input"
                                            @if ($data['data']['status'] == 'active') checked @endif id="status" />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <i class="ti ti-check"></i>
                                            </span>
                                            <span class="switch-off">
                                                <i class="ti ti-x"></i>
                                            </span>
                                        </span>
                                        <span class="switch-label">Active</span>
                                    </label>
                                </div>
                            </div>
                            @isPermissions('Update_User')
                            <button type="submit" class="btn btn-primary">Submit</button>
                            @endisPermissions
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
            $('#form').on('submit', function(e) {
                e.preventDefault();

                var guid = $('#guid').val();
                var department = $("#department").val();
                var name = $('#name').val();

                var status = 'deleted';
                if ($('#status').is(":checked")) {
                    status = 'active'
                }


                $.ajax({
                    type: "PUT",
                    url: "{{ env('URL_API') }}/api/v1/user",
                    data: {
                        "guid": guid,
                        "department_guid": department,
                        "name": name,
                        "status": status,
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
                            "Success edit data", "Success"
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
