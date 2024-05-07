@extends('layouts.dashboard-app')
@section('title', 'Insert Additional Information')


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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Additional Information /</span> Insert</h4>
        <!-- Basic Layout -->
        <div class="row" id="card-block">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Insert Form Additional Information</h5>
                    </div>
                    <div class="card-body">
                        <form id="form">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Employee Name<span style="color: #EE3C3B">*</span></label>
                                <select id="user" class="select2 form-select form-select-lg" data-allow-clear="true" required>
                                    <option value=" " selected>-- Select Employee --</option>
                                    @foreach ($users['data'] as $user)
                                        <option value="{{ $user['guid'] }}">{{ $user['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3" id="user-block">
                                <label class="form-label" for="basic-default-fullname">Connection<span style="color: #EE3C3B">*</label>
                                <input type="text" class="form-control" id="connection" placeholder="Input Connection" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Name<span style="color: #EE3C3B">*</span></label>
                                <input type="text" class="form-control" id="name" placeholder="Name" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Birth City<span style="color: #EE3C3B">*</span></label>
                                <input type="text" class="form-control" id="birth_city" placeholder="Birth City, e.g. Jakarta" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Date of Birth<span style="color: #EE3C3B">*</span></label>
                                <input type="date" class="form-control" id="birth_date" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Address<span style="color: #EE3C3B">*</span></label>
                                <input type="text" class="form-control" id="adress" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Work<span style="color: #EE3C3B">*</span></label>
                                <input type="text" class="form-control" id="work" placeholder="Work/Occupation, e.g. Housewife" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Phone Number</label>
                                <input type="tel" class="form-control" id="phone_number" placeholder="Input Phone Number" required/>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/additionalinformation" class="btn btn-primary">Cancel</a>
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

                var user = $("#user").val();
                var connection = $('#connection').val();
                var name = $('#name').val();
                var birthcity = $('#birth_city').val();
                var birthdate = $('#birth_date').val();
                var adress = $('#adress').val();
                var work = $('#work').val();
                var phoneNumber = $('#phone_number').val();

                $.ajax({
                    type: "POST",
                    url: "{{ env('URL_API') }}/api/v1/additionalinformation",
                    data: {
                        "user_guid": user,
                        "connection": connection,
                        "name": name,
                        "birth_city": birthcity,
                        "birth_date": birthdate,
                        "adress": adress,
                        "work": work,
                        "phone_number": phoneNumber,
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
                            window.location.href = "{{ route('index-additionalinformation') }}";
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
