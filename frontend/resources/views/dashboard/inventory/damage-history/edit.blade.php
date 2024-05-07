@extends('layouts.dashboard-app')
@section('title', 'Edit Damage History')


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
<h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Inventory / Item / Detail / {{ $data['inventory']['inventory_name'] }} / Damage History /</span> edit
    </h4>
    <!-- Basic Layout -->
    <div class="row" id="card-block">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Form Damage History</h5>
                </div>
                <div class="card-body">
                    <form id="form">
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                <label class="form-label" for="basic-default-fullname">Inventory <span class="text-danger" style="font-size: 20px;">*</span></label>
                            <input type="text" class="form-control" id="inventory" placeholder="Input Inventory" value=" {{ $data['inventory']['inventory_name'] }}" readonly disabled />
                                </td>
                                <td>
                                <label class="form-label" for="basic-default-fullname">Damage Date <span class="text-danger" style="font-size: 20px;">*</span></label>
                            <input type="date" class="form-control" id="damage-date" placeholder="Input Damage Date" required value="{{ $data['date_of_damage'] }}" />
                                </td>
                                <td>
                                <label class="form-label" for="basic-default-fullname">Description <span class="text-danger" style="font-size: 20px;">*</span></label>
                            <textarea class="form-control" id="description" placeholder="Input Description" required>{{ $data['description'] }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                        <label class="form-label" for="basic-default-fullname">Last User<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <select class="form-control select2 form-select form-select-lg" name="lastUser" id="lastUser"></select>
                                </td>
                                <td>
                                <label class="form-label" for="basic-default-fullname">Repair Date<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <input type="date" class="form-control" id="repair-date" placeholder="Input Repair Date" value="{{ $data['repair_date'] }}" />
                                </td>
                                <td>
                                <label class="form-label" for="basic-default-fullname">Repair Vendor<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <input type="text" class="form-control" id="vendor" placeholder="Input Vendor" value="{{ $data['repair_vendor'] }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                        <label class="form-label" for="basic-default-fullname">User Repair<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <select class="form-control select2 form-select form-select-lg" name="repairUser" id="repairUser">

                            </select>

                                </td>
                                <td>
                                <label class="form-label" for="basic-default-fullname">Repair Done Date<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <input type="date" class="form-control" id="repair-done-date" placeholder="Input Repair Done Date" value="{{ $data['completion_date_of_repair'] }}" />
                                </td>
                                <td>
                                <label class="form-label" for="basic-default-fullname">Repair Cost<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <input type="text" inputmode="numeric" class="format form-control" id="repair-cost" placeholder="Input Repair Cost" value="{{ $data['repair_cost'] }}" />
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

        $.ajax({
            type: "GET",
            url: "{{ env('URL_API') }}/api/v1/user",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization",
                    "Bearer {{ $token }}");
            },
            success: function(result) {
                var dataAPI = $('#lastUser');
                dataAPI.empty();
                result.data.forEach(function(data) {
                    var selected = data.guid === "{{ $data['user_last_guid'] }}" ? 'selected' : '';
                    dataAPI.append('<option value="' + data.guid + '" ' + selected + '>' + data.name + '</option>');
                });
            },

            error: function(xhr, status, error) {
                var jsonResponse = JSON.parse(xhr.responseText);
            }
        });

        $.ajax({
            type: "GET",
            url: "{{ env('URL_API') }}/api/v1/user",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization",
                    "Bearer {{ $token }}");
            },
            success: function(result) {
                var dataAPI = $('#repairUser');
                dataAPI.empty();
                result.data.forEach(function(data) {
                    var selected = data.guid === "{{ $data['user_repair_guid'] }}" ? 'selected' : '';
                    dataAPI.append('<option value="' + data.guid + '" ' + selected + '>' + data.name + '</option>');
                });
            },

            error: function(xhr, status, error) {
                var jsonResponse = JSON.parse(xhr.responseText);
            }
        });
        
        new AutoNumeric.multiple('.format', {
            currencySymbol: "Rp. ",
            decimalCharacter: ",",
            digitGroupSeparator: ".",
            unformatOnSubmit: true
        });

        $('#form').on('submit', function(e) {
            e.preventDefault();
            var damageDate = $('#damage-date').val();
            var description = $('#description').val();
            var repairDate = $('#repair-date').val();
            var vendor = $('#vendor').val();
            var repairDoneDate = $('#repair-done-date').val();
            var repairCost = $('#repair-cost').val();
            var lastUser = $('#lastUser').val();
            var userRepair = $('#repairUser').val();
            // if (userRepair != "") {
            //     const selectedUserRepair = JSON.parse(userRepair);
            //     userRepair = selectedUserRepair[0]['id']
            // }

            $.ajax({
                type: "PUT",
                url: "{{ env('URL_API') }}/api/v1/damage-history",
                data: {
                    "guid": "{{ $guid }}",
                    "inventory_guid": "{{ $data['inventory']['guid'] }}",
                    "date_of_damage": damageDate,
                    "repair_date": repairDate,
                    "completion_date_of_repair": repairDoneDate,
                    "repair_cost": repairCost,
                    "repair_vendor": vendor,
                    "description": description,
                    "user_last_guid": lastUser,
                    "user_repair_guid": userRepair,
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
                        window.location.href =
                            "{{ route('index-detail-inventory', ['guid' => $data['inventory']['guid']]) }}";
                    }
                    toastr.success(
                        "Success update data", "Success"
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