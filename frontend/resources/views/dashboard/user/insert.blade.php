@extends('layouts.dashboard-app')
@section('title', 'Insert User')


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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users / User Configuration / User /</span>
            Insert</h4>
        <!-- Basic Layout -->
        <div class="row" id="card-block">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Insert Form User</h5>
                    </div>
                    <div class="card-body">
                        <form id="form">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Role<span style="color: #EE3C3B">*</span></label>
                                <select id="role" class="select2 form-select form-select-lg" data-allow-clear="true"
                                    required>
                                    <option value="" selected>-- Select Role --</option>
                                    @foreach ($roles['data'] as $role)
                                        <option value="{{ $role['guid'] }}">{{ $role['role_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Department</label>
                                <select id="department" class="select2 form-select form-select-lg" data-allow-clear="true">
                                    <option value="" selected>-- Select Department --</option>
                                    @foreach ($departments['data'] as $department)
                                        <option value="{{ $department['guid'] }}">{{ $department['department_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3" id="division-block">
                                <label class="form-label" for="basic-default-fullname">Division</label>
                                <select id="division" class="select2 form-select form-select-lg" data-allow-clear="true">
                                    <option value="" selected>-- Select Division --</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Position<span style="color: #EE3C3B">*</span></label>
                                <select id="position" class="select2 form-select form-select-lg" data-allow-clear="true"
                                    required>
                                    <option value="" selected>-- Select Position --</option>
                                    @foreach ($positions['data'] as $position)
                                        <option value="{{ $position['guid'] }}">{{ $position['position_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">NIK<span style="color: #EE3C3B">*</span></label>
                                <input type="text" class="form-control" id="nik" placeholder="Input NIK"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Name<span style="color: #EE3C3B">*</span></label>
                                <input type="text" class="form-control" id="name" placeholder="Input Name"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Email<span style="color: #EE3C3B">*</span></label>
                                <input type="email" class="form-control" id="email" placeholder="Input Email"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Phone Number</label>
                                <input type="phone" class="form-control" id="phone-number"
                                    placeholder="Input Phone Number" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Type</label>
                                <select id="type" class="select2 form-select form-select-lg" data-allow-clear="true"
                                    required>
                                    @foreach ($types as $type)
                                        <option value="{{ $type['value'] }}">{{ $type['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="text-light small fw-semibold">Generated Password Automatically</div>
                                <div class="demo-inline-spacing">
                                    <label class="switch switch-success">
                                        <input type="checkbox" class="switch-input" checked id="is-generate-password" />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <i class="ti ti-check"></i>
                                            </span>
                                            <span class="switch-off">
                                                <i class="ti ti-x"></i>
                                            </span>
                                        </span>
                                        <span class="switch-label">Yes</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3 d-none" id="field-password">
                                <label class="form-label" for="basic-default-fullname">Password</label>
                                <input type="text" class="form-control" id="password"
                                    placeholder="Input Password" />
                            </div>
                            <div class="mb-3">
                                <div class="text-light small fw-semibold">Send Registration Data To Email</div>
                                <div class="demo-inline-spacing">
                                    <label class="switch switch-success">
                                        <input type="checkbox" class="switch-input" checked id="is-notify-to-email" />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <i class="ti ti-check"></i>
                                            </span>
                                            <span class="switch-off">
                                                <i class="ti ti-x"></i>
                                            </span>
                                        </span>
                                        <span class="switch-label">Yes</span>
                                    </label>
                                </div>
                            </div>
                            @isPermissions('Create_User')
                            <button type="submit" class="btn btn-primary">Submit</button>
                            @endisPermissions
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

            $('#department').on('change', function(e) {
                var department = $("#department").val();
                $('#division').empty();

                $.ajax({
                    type: "GET",
                    url: "{{ env('URL_API') }}/api/v1/division",
                    data: {
                        department_guid: department,
                    },
                    beforeSend: function(request) {
                        request.setRequestHeader("Authorization",
                            "Bearer {{ $token }}");

                        $("#division-block").block({
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

                        $.each(result['data'], function(index, value) {
                            var data = {
                                id: value['guid'],
                                text: value['division_name']
                            };

                            var newOption = new Option(data.text, data.id, false,
                                false);
                            $('#division').append(newOption);
                        });
                        $('#division').trigger('change');
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

            $('#is-generate-password').change(function() {
                if (this.checked) {
                    $('#field-password').addClass("d-none");
                    $("#password").prop('required', false);
                } else {
                    $('#field-password').removeClass("d-none");
                    $("#password").prop('required', true);
                }

            });

            $('#form').on('submit', function(e) {
                e.preventDefault();

                var role = $("#role").val();
                var department = $("#department").val();
                if (department == "") {
                    department = null;
                }
                var division = $('#division').val();
                if (division == "") {
                    division = null;
                }
                var position = $('#position').val();
                var nik = $('#nik').val();
                var nama = $('#name').val();
                var email = $('#email').val();
                var phoneNumber = $('#phone-number').val();

                var type = $('#type').val();
                if (type == "-") {
                    type = null;
                }

                var isGeneratedPassword = 0;
                var password = null;
                if ($('#is-generate-password').is(":checked")) {
                    isGeneratedPassword = 1;
                } else {
                    password = $('#password').val();
                }

                var isNotofyToEmail = 0;
                if ($('#is-notify-to-email').is(":checked")) {
                    isNotofyToEmail = 1;
                }

                $.ajax({
                    type: "POST",
                    url: "{{ env('URL_API') }}/api/v1/user",
                    data: {
                        "role_guid": role,
                        "department_guid": department,
                        "division_guid": division,
                        "position_guid": position,
                        "nik": nik,
                        "name": nama,
                        "email": email,
                        "phone_number": phoneNumber,
                        "type": type,
                        "is_generate_password": isGeneratedPassword,
                        "password": password,
                        "is_notify_to_email": isNotofyToEmail,
                    },
                    datatype: "json",
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
                            "Success insert data", "Success"
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
