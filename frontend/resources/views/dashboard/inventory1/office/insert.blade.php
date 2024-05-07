@extends('layouts.dashboard-app')
@section('title', 'Insert office')


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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> office /</span> Insert</h4>
    <!-- Basic Layout -->
    <div class="row" id="card-block">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Insert Form office</h5>
                </div>
                <div class="card-body">
                    <form id="form" enctype="multipart/form-data">
                        <div class="mb-3 d-none">
                            <label class="form-label" for="basic-default-fullname">guid</label>
                            <input type="text" class="form-control" id="guid" placeholder="Input guid" />
                        </div>
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Office Name<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="text" class="form-control" id="office_name" placeholder="Input office_name" required />
                                </td>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">City<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="text" class="form-control" id="city" placeholder="Input city" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">District<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="text" class="form-control" id="district" placeholder="Input district" required />
                                </td>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Address<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="text" class="form-control" id="address" placeholder="Input address" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Phone<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="text" class="form-control" id="phone" placeholder="Input phone" required />
                                </td>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Status<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <select class="form-control form-select" id="status" name="status">
                                        <option value="normal">Normal</option>
                                        <option value="deleted">Deleted</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </td>
                            </tr>

                        </table>
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
        
        $('#form').on('submit', function(e) {
            e.preventDefault();

            var guid = $('#guid').val();
            var office_name = $('#office_name').val();
            var city = $('#city').val();
            var district = $('#district').val();
            var address = $('#address').val();
            var phone = $('#phone').val();
            var status = $('#status').val();

            $.ajax({
                type: "POST",
                url: "{{ env('URL_API') }}/api/v1/office",
                data: {
                    "guid": guid,
                    "office_name": office_name,
                    "city": city,
                    "district": district,
                    "address": address,
                    "phone": phone,
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
                        window.location.href = "{{ route('index-office') }}";
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