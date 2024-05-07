@extends('layouts.dashboard-app')
@section('title', 'Edit Additional Information')


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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Additional Information /</span> Edit</h4>
        <!-- Basic Layout -->
        <div class="row" id="card-block">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Form Additional Information</h5>
                    </div>
                    <div class="card-body">
                        <form id="form">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Employee Name</label>
                                <input type="text" class="form-control d-none" id="guid"
                                    value="{{ $data['data']['guid'] }}" readonly />
                                <input type="text" class="form-control d-none" id="user"
                                    value="{{ $data['data']['user_guid'] }}" readonly />
                                @foreach ($users['data'] as $user)
                                @if ($data['data']['user_guid'] == $user['guid'])
                                        <input type="text" class="form-control" style="background-color:#7777"
                                            value="{{ $user['name'] }}" readonly />
                                @endif
                                @endforeach
                            </div>
                            <div class="mb-3" id="user-block">
                                <label class="form-label" for="basic-default-fullname">Connection</label>
                                <input type="text" class="form-control" id="connection" placeholder="Input Connection" value="{{ $data['data']['connection'] }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Input Name" value="{{ $data['data']['name'] }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Birth City</label>
                                <input type="text" class="form-control" id="birth_city" placeholder="Input Birth City" value="{{ $data['data']['birth_city'] }}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Date of Birth</label>
                                <input type="date" class="form-control" id="birth_date" placeholder="Input Date of Birth" value="{{ $data['data']['birth_date'] }}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Address</label>
                                <input type="text" class="form-control" id="adress" placeholder="Input Address" value="{{ $data['data']['adress'] }}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Work</label>
                                <input type="text" class="form-control" id="work" placeholder="Input Work" value="{{ $data['data']['work'] }}"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Phone Number</label>
                                <input type="tel" class="form-control" id="phone_number" value="{{ $data['data']['phone_number'] }}"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/additionalinformation" class="btn btn-primary">Cancel</a>
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
            $('#form').on('submit', function(e) {
                e.preventDefault();

                var guid = $('#guid').val();                
                var user = $("#user").val();
                var connection = $('#connection').val();
                var name = $('#name').val();
                var birthcity = $('#birth_city').val();
                var birthdate = $('#birth_date').val();
                var adress = $('#adress').val();
                var work = $('#work').val();
                var phoneNumber = $('#phone_number').val();

                $.ajax({
                    type: "PUT",
                    url: "{{ env('URL_API') }}/api/v1/additionalinformation",
                    data: {
                        "guid": guid,
                        "user_guid": user,
                        "connection": connection,
                        "name": name,
                        "birth_city": birthcity,
                        "birth_date": birthdate,
                        "adress": adress,
                        "work": work,
                        "phone_number": phoneNumber,
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
                            window.location.href = "{{ route('index-additionalinformation') }}";
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