@extends('layouts.dashboard-app')
@section('title', 'Insert Education')


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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Educational Background /</span> Insert</h4>
        <!-- Basic Layout -->
        <div class="row" id="card-block">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Insert Form: Educatonal Background</h5>
                    </div>
                    <div class="card-body">
                        <form id="education">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Employee Name<span style="color: #EE3C3B">*</span></label>
                                <select id="user-guid" class="select2 form-select form-select-lg" data-allow-clear="true" required>
                                    <option value=" " selected>-- Select User --</option>
                                    @foreach ($users['data'] as $users)
                                        <option value="{{ $users['guid'] }}">{{ $users['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3" id="user-block">
                                <label class="form-label" for="basic-default-fullname">Entry Year<span style="color: #EE3C3B">*</span></label>
                                <select id="start-year" class="select2 form-select form-select-lg" required>
                                    <option value=" " selected>--Select Year--</option>
                                    <?php
                                        $currentYear = date("Y");
                                        for ($year = $currentYear-50; $year <= $currentYear + 50; $year++) {
                                            echo "<option value=\"$year\">$year</option>";
                                        }
                                    ?>
                                </select>               
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Graduation Year<span style="color: #EE3C3B">*</span></label>
                                <select id="out-year" class="select2 form-select form-select-lg" required>
                                    <option value=" " selected>--Select Year--</option>
                                    <?php
                                        $currentYear = date("Y");
                                        for ($year = $currentYear - 50; $year <= $currentYear + 50; $year++) {
                                            echo "<option value=\"$year\">$year</option>";
                                        }
                                    ?>
                                </select>  
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">School / University / Institution<span style="color: #EE3C3B">*</span></label>
                                <input type="text" class="form-control" id="institution" placeholder="Input Institution, e.g. University of Indonesia" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Major<span style="color: #EE3C3B">*</span></label>
                                <input type="text" class="form-control" id="major" placeholder="Major, e.g. Computer Science" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Qualification (1-4)<span style="color: #EE3C3B">*</span></label>
                                <select id="qualify" class="select2 form-select form-select-lg">
                                    <option value=" " selected>--Select Qualification--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/education" class="btn btn-primary">Cancel</a>
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
            $('#education').on('submit', function(e) {
                e.preventDefault();
                var startyear = $("#start-year").val();
                var outyear = $("#out-year").val();
                var institution = $("#institution").val();
                var major = $("#major").val();
                var qualification = $("#qualify").val();
                var guid = $("#user-guid").val();
                $.ajax({
                    type: "POST",
                    url: "{{ env('URL_API') }}/api/v1/education",
                    data: {
                        "entry_year":startyear,
                        "out_year": outyear,
                        "institution_name": institution,
                        "department": major,
                        "qualification": qualification,
                        "user_guid": guid,
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
                            window.location.href = "{{ route('index-edbg') }}";
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