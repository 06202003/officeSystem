@extends('layouts.dashboard-app')
@section('title', 'Edit Room')


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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Room /</span> Edit</h4>
    <!-- Basic Layout -->
    <div class="row" id="card-block">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Form Room</h5>
                </div>
                <div class="card-body">
                    <form id="form">
                        <div class="mb-3 d-none">
                            <label class="form-label" for="basic-default-fullname">GUID</label>
                            <input type="text" class="form-control" id="guid" placeholder="Input GUID" required value="{{ $data['data']['guid'] }}" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Room Name<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <input type="text" class="form-control" id="room_name" placeholder="Input Name" required value="{{ $data['data']['room_name'] }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Floor<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <input type="number" class="form-control" id="floor" placeholder="Input Floor" value="{{ $data['data']['floor'] }}" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Office<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <select class="form-control select2 form-select form-select-lg" name="office_guid" id="office_guid">

                            </select>
                        </div>
                        <div class="mb-3 d-none">
                            <div class="text-light small fw-semibold">Status</div>
                            <div class="demo-inline-spacing">
                                <label class="switch switch-success">
                                    <input type="checkbox" class="switch-input" @if($data['data']['status']=='active' ) checked @endif id="status" />
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
        $.ajax({
            type: "GET",
            url: "{{ env('URL_API') }}/api/v1/office",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization",
                    "Bearer {{ $token }}");
            },
            success: function(result) {
                var officeList = $('#office_guid');
                officeList.empty();
                result.data.forEach(function(office) {
                    var selected = office.guid === "{{ $data['data']['office_guid'] }}" ? 'selected' : '';
                    officeList.append('<option value="' + office.guid + '" ' + selected + '>' + office.office_name + '</option>');
                });
            },

            error: function(xhr, status, error) {
                var jsonResponse = JSON.parse(xhr.responseText);
            }
        });

        $('#form').on('submit', function(e) {
            e.preventDefault();

            var guid = $('#guid').val();
            var room_name = $('#room_name').val();
            var floor = $('#floor').val();
            var office_guid = $('#office_guid').val();

            var status = 'deleted';
            if ($('#status').is(":checked")) {
                status = 'active'
            }


            $.ajax({
                type: "PUT",
                url: "{{ env('URL_API') }}/api/v1/room",
                data: {
                    "guid": guid,
                    "room_name": room_name,
                    "floor": floor,
                    "office_guid": office_guid,
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
                        window.location.href = "{{ route('index-room') }}";
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