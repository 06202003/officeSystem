@extends('layouts.dashboard-app')
@section('title', 'Insert Project History')


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
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/tagify/tagify.css') }}" />
@endsection


@section('helpers')

@endsection


@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Project History  /</span> Insert</h4>
        <!-- Basic Layout -->
        <div class="row" id="card-block">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Insert Form Project History</h5>
                    </div>
                    <div class="card-body">
                        <form id="form">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Employee Name<span style="color: #EE3C3B">*</span></label>
                                <select id="user" class="select2 form-select form-select-lg" data-allow-clear="true" required>
                                    <option value=" " selected disabled>-- Select Employee --</option>
                                    @foreach ($users['data'] as $user)
                                        <option value="{{ $user['guid'] }}">{{ $user['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3" id="user-block">
                                <label class="form-label" for="basic-default-fullname">Project Name<span style="color: #EE3C3B">*</label>
                                <input type="text" class="form-control" id="project_name" placeholder="Input Project Name" required />
                            </div>
                            <div class="mb-3" id="user-block">
                                <label class="form-label" for="basic-default-fullname">Year<span style="color: #EE3C3B">*</label>
                                <select id="year" class="select2 form-select form-select-lg" required>
                                    <option value="year" selected disabled>--Select Year--</option>
                                    <?php
                                        $currentYear = date("Y");
                                        for ($year = $currentYear-15; $year <= $currentYear + 5; $year++) {
                                            echo "<option value=\"$year\">$year</option>";
                                        }
                                    ?>
                                </select>          
                            </div>
                            <div class="mb-3" id="user-block">
                                <label class="form-label" for="basic-default-fullname">Platform<span style="color: #EE3C3B">*</label>
                                <input type="text" class="form-control" id="platform" placeholder="Input platform" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Role<span style="color: #EE3C3B">*</span></label>
                                <select id="projectmaster" class="select2 form-select form-select-lg" data-allow-clear="true" required>
                                    <option value=" " selected disabled>-- Select Role --</option>
                                    @foreach ($projectmasters['data'] as $projectmaster)
                                        <option value="{{ $projectmaster['guid'] }}">{{ $projectmaster['role'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3" id="user-block">
                                <label class="form-label" for="basic-default-fullname">Description<span style="color: #EE3C3B">*</label>
                                <input type="text" class="form-control" id="description" placeholder="Input description" required />
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/project" class="btn btn-primary">Cancel</a>
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
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/tagify/tagify.js') }}"></script>
@endsection


@section('main-js')

@endsection


@section('page-js')
    <script src="{{ asset('./assets/new-dashboard/js/form-layouts.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/extended-ui-sweetalert2.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/extended-ui-blockui.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/ui-toasts.js') }}"></script>
    {{-- <script src="{{ asset('./assets/new-dashboard/js/forms-tagify.js') }}"></script> --}}
@endsection


@section('custom-javascript')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#form').on('submit', function(e) {
                e.preventDefault();

                var user = $('#user').val();
                var projectmaster = $('#projectmaster').val();
                var projectname = $('#project_name').val();
                var year = $('#year').val();
                var platform = $('#platform').val();
                var description = $('#description').val();

                $.ajax({
                    type: "POST",
                    url: "{{ env('URL_API') }}/api/v1/projecthistory/",
                    data: {
                        "user_guid": user,
                        "role_guid": projectmaster,
                        "project_name": projectname,
                        "year": year,
                        "platform": platform,
                        "description": description,
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
                            window.location.href = "{{ route('index-project') }}";
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
