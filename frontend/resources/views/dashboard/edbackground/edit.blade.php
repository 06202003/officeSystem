@extends('layouts.dashboard-app')
@section('title', 'Edit Education')


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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Educational Background /</span> Edit</h4>
        <!-- Basic Layout -->
        <div class="row" id="card-block">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Form Educational Background</h5>
                    </div>
                    <div class="card-body">
                        <form id="update">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Employee Name</label>
                                <input type="text" class="form-control d-none" id="guid"
                                    value="{{ $data['data']['guid'] }}" readonly />
                                <input type="text" class="form-control d-none" id="user-guid"
                                    value="{{ $data['data']['user_guid'] }}" readonly />
                                @foreach ($users['data'] as $user)
                                @if ($data['data']['user_guid'] == $user['guid'])
                                        <input type="text" class="form-control" style="background-color:#7777"
                                            value="{{ $user['name'] }}" readonly />
                                @endif
                                @endforeach
                            </div>
                            <div class="mb-3" id="user-block">
                                <label class="form-label" for="basic-default-fullname">Entry Year</label>
                                <select id="entry-year" class="select2 form-select form-select-lg" required>
                                    <?php
                                        $selected = $data['data']['entry_year'];
                                        $currentYear = date("Y");
                                        for ($year = $currentYear-75; $year <= $currentYear + 75; $year++) {
                                            if($year == $selected){
                                                echo "<option value=\"$year\" selected>$year</option>";
                                            }else{
                                                echo "<option value=\"$year\">$year</option>";
                                            }  
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Graduation Year</label>
                                <select id="out-year" class="select2 form-select form-select-lg" required>
                                    <?php
                                        $selected = $data['data']['out_year'];
                                        $currentYear = date("Y");
                                        for ($year = $currentYear-75; $year <= $currentYear + 75; $year++) {
                                            if($year == $selected){
                                                echo "<option value=\"$year\" selected>$year</option>";
                                            }else{
                                                echo "<option value=\"$year\">$year</option>";
                                            }   
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">School / University / Instance</label>
                                <input type="text" class="form-control" rows="1" id="instance" value="{{ $data['data']['institution_name'] }}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Major</label>
                                <input type="text" class="form-control" rows="1" id="major" value="{{ $data['data']['department'] }}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Qualification</label>
                                <select id="qualify" class="select2 form-select form-select-lg">
                                    <?php
                                        $selected = $data['data']['qualification'];
                                        for($i = 1; $i <= 4; $i++){
                                            if($i == $selected){
                                                echo "<option value=\"$i\" selected>$i</option>";
                                            }else{
                                                echo "<option value=\"$i\">$i</option>";
                                            }
                                        }
                                    ?>
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
@endsection


@section('custom-javascript')
<script type="text/javascript">
        $(document).ready(function() {
            $('#update').on('submit', function(e) {
                e.preventDefault();

                var guid = $('#guid').val();
                var startyear = $("#entry-year").val();
                var outyear = $("#out-year").val();
                var institution = $("#instance").val();
                var major = $("#major").val();
                var qualification = $("#qualify").val();
                var userguid = $('#user-guid').val();

                $.ajax({
                    type: "PUT",
                    url: "{{ env('URL_API') }}/api/v1/education",
                    data: {
                        "guid": guid,
                        "entry_year":startyear,
                        "out_year": outyear,
                        "institution_name": institution,
                        "department": major,
                        "qualification": qualification,
                        "user_guid": userguid,
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
                            window.location.href = "{{ route('index-edbg') }}";
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
