@extends('layouts.dashboard-app')
@section('title', 'Insert Damage History')


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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Inventory / Damage History /</span> Insert</h4>
    <!-- Basic Layout -->
    <div class="row" id="card-block">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Insert Form Damage History</h5>
                </div>
                <div class="card-body">
                    <form id="form">
                        <div id="inventory-block" class="d-none">
                            <label class="form-label" for="basic-default-fullname">guid</label>
                            <input type="text" class="form-control" id="guid" placeholder="Input guid" />
                        </div>
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <!-- <div id="inventory-block">
                                        <label class="form-label" for="basic-default-fullname">Inventory<span class="text-danger" style="font-size: 20px;">*</span></label>
                                        <input id="inventory-guid" name="inventory-guid" class="form-control" placeholder="Select inventory" value="" required>
                                    </div> -->

                                    <label class="form-label" for="basic-default-fullname">Inventory<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <select class="form-control select2 form-select form-select-lg" name="inventory" id="inventory">
                            </select>

                                </td>
                                <td>
                                    <!-- <div id="user-repair-block">
                                        <label class="form-label" for="basic-default-fullname">User Repair<span class="text-danger" style="font-size: 20px;">*</span></label>
                                        <input id="user-repair-tag" name="user-repair-tag" class="form-control" placeholder="Select user" value="" required>
                                    </div> -->

                                    <label class="form-label" for="basic-default-fullname">User Repair<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <select class="form-control select2 form-select form-select-lg" name="repairUser" id="repairUser">
                            </select>

                                </td>
                                <td>
                                    <!-- <div id="user-last-block">
                                        <label class="form-label" for="basic-default-fullname">User Last<span class="text-danger" style="font-size: 20px;">*</span></label>
                                        <input id="user-last-tag" name="user-last-tag" class="form-control" placeholder="Select user" value="" required>
                                    </div> -->

                                    <label class="form-label" for="basic-default-fullname">Last User<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <select class="form-control select2 form-select form-select-lg" name="lastUser" id="lastUser">
                            </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Repair Date<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="date" class=" form-control" id="repair_date" placeholder="Input Repair Date" required />
                                </td>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Date of Damage<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="date" class=" form-control" id="date_of_damage" placeholder="Input Date of Damage" required />
                                </td>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Completion Date of Repair<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="date" class=" form-control" id="completion_date_of_repair" placeholder="Input Completion Date of Repair" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Repair Cost<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="text" inputmode="numeric" class="format form-control" id="repair_cost" placeholder="Input Repair Cost" required />
                                </td>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Repair Vendor<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="text" class="form-control" id="repair_vendor" placeholder="Input Repair Vendor" required />
                                </td>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Description<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <textarea type="text" inputmode="text" class="form-control" id="description" placeholder="Input Repair Vendor" required> </textarea>
                                </td>
                            </tr>

                        </table>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
            url: "{{ env('URL_API') }}/api/v1/inventory",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization",
                    "Bearer {{ $token }}");
            },
            success: function(result) {
                var dataAPI = $('#inventory');
                dataAPI.empty();
                result.data.forEach(function(data) {
                    dataAPI.append('<option value="' + data.guid + '" ' + '>' + data.inventory_name + '</option>');
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
                var dataAPI = $('#lastUser');
                dataAPI.empty();
                result.data.forEach(function(data) {
                    dataAPI.append('<option value="' + data.guid + '" ' + '>' + data.name + '</option>');
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
                    dataAPI.append('<option value="' + data.guid + '" ' + '>' + data.name + '</option>');
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

        // --------------- INVENTORY ---------------
        // $.ajax({
        //     type: "GET",
        //     url: "{{ env('URL_API') }}/api/v1/inventory",
        //     data: {
        //         "status": "active"
        //     },
        //     beforeSend: function(request) {
        //         request.setRequestHeader("Authorization",
        //             "Bearer {{ $token }}");

        //         $("#inventory-block").block({
        //             message: '<div class="spinner-border text-primary" role="status"></div>',
        //             timeout: 1e3,
        //             css: {
        //                 backgroundColor: "transparent",
        //                 border: "0"
        //             },
        //             overlayCSS: {
        //                 backgroundColor: "#fff",
        //                 opacity: .8
        //             }
        //         });
        //     },
        //     success: function(result) {
        //         $.unblockUI();

        //         var a = (new Tagify(a),
        //             document.querySelector("#inventory-guid"));

        //         var t = [];
        //         for (let i = 0; i < result['data'].length; i++) {
        //             var obj = {};
        //             obj["id"] = result['data'][i]['guid'];
        //             obj["name"] = result['data'][i]['guid'];
        //             obj["value"] = result['data'][i]['inventory_name'];
        //             t.push(obj);
        //         }

        //         let i = new Tagify(a, {
        //             whitelist: t,
        //             maxTags: 1,
        //             enforceWhitelist: true,
        //             dropdown: {
        //                 maxItems: 20,
        //                 classname: "tags-inline",
        //                 enabled: 0,
        //                 closeOnSelect: !1
        //             }
        //         });
        //     },
        //     error: function(xhr, status, error) {
        //         $.unblockUI();
        //         var jsonResponse = JSON.parse(xhr.responseText);

        //         toastr.options.closeButton = true;
        //         toastr.error(
        //             jsonResponse['message'],
        //             "Error",
        //         );
        //     }
        // });
        // --------------- INVENTORY ---------------

        // --------------- USER REPAIR ---------------
        // $.ajax({
        //     type: "GET",
        //     url: "{{ env('URL_API') }}/api/v1/user",
        //     data: {
        //         "status": "active"
        //     },
        //     beforeSend: function(request) {
        //         request.setRequestHeader("Authorization",
        //             "Bearer {{ $token }}");

        //         $("#user-repair-block").block({
        //             message: '<div class="spinner-border text-primary" role="status"></div>',
        //             timeout: 1e3,
        //             css: {
        //                 backgroundColor: "transparent",
        //                 border: "0"
        //             },
        //             overlayCSS: {
        //                 backgroundColor: "#fff",
        //                 opacity: .8
        //             }
        //         });
        //     },
        //     success: function(result) {
        //         $.unblockUI();

        //         var a = (new Tagify(a),
        //             document.querySelector("#user-repair-tag"));

        //         var t = [];
        //         for (let i = 0; i < result['data'].length; i++) {
        //             var obj = {};
        //             obj["id"] = result['data'][i]['guid'];
        //             obj["name"] = result['data'][i]['guid'];
        //             obj["value"] = result['data'][i]['name'];
        //             t.push(obj);
        //         }

        //         let i = new Tagify(a, {
        //             whitelist: t,
        //             maxTags: 1,
        //             enforceWhitelist: true,
        //             dropdown: {
        //                 maxItems: 20,
        //                 classname: "tags-inline",
        //                 enabled: 0,
        //                 closeOnSelect: !1
        //             }
        //         });
        //     },
        //     error: function(xhr, status, error) {
        //         $.unblockUI();
        //         var jsonResponse = JSON.parse(xhr.responseText);

        //         toastr.options.closeButton = true;
        //         toastr.error(
        //             jsonResponse['message'],
        //             "Error",
        //         );
        //     }
        // });
        // --------------- USER REPAIR ---------------

        // --------------- USER LAST ---------------
        // $.ajax({
        //     type: "GET",
        //     url: "{{ env('URL_API') }}/api/v1/user",
        //     data: {
        //         "status": "active"
        //     },
        //     beforeSend: function(request) {
        //         request.setRequestHeader("Authorization",
        //             "Bearer {{ $token }}");

        //         $("#user-last-block").block({
        //             message: '<div class="spinner-border text-primary" role="status"></div>',
        //             timeout: 1e3,
        //             css: {
        //                 backgroundColor: "transparent",
        //                 border: "0"
        //             },
        //             overlayCSS: {
        //                 backgroundColor: "#fff",
        //                 opacity: .8
        //             }
        //         });
        //     },
        //     success: function(result) {
        //         $.unblockUI();

        //         var a = (new Tagify(a),
        //             document.querySelector("#user-last-tag"));

        //         var t = [];
        //         for (let i = 0; i < result['data'].length; i++) {
        //             var obj = {};
        //             obj["id"] = result['data'][i]['guid'];
        //             obj["name"] = result['data'][i]['guid'];
        //             obj["value"] = result['data'][i]['name'];
        //             t.push(obj);
        //         }

        //         let i = new Tagify(a, {
        //             whitelist: t,
        //             maxTags: 1,
        //             enforceWhitelist: true,
        //             dropdown: {
        //                 maxItems: 20,
        //                 classname: "tags-inline",
        //                 enabled: 0,
        //                 closeOnSelect: !1
        //             }
        //         });
        //     },
        //     error: function(xhr, status, error) {
        //         $.unblockUI();
        //         var jsonResponse = JSON.parse(xhr.responseText);

        //         toastr.options.closeButton = true;
        //         toastr.error(
        //             jsonResponse['message'],
        //             "Error",
        //         );
        //     }
        // });
        // --------------- USER LAST ---------------

        $('#form').on('submit', function(e) {
            e.preventDefault();

            var guid = $('#guid').val();

            var inventoryGuid = $('#inventory').val();
            // const selectedInventoryGuid = JSON.parse(inventoryGuid);
            // inventoryGuid = selectedInventoryGuid[0]['id']

            var user_repair_guid = $('#repairUser').val();
            // const selectedUserRepair = JSON.parse(user_repair_guid);
            // user_repair_guid = selectedUserRepair[0]['id']

            var user_last_guid = $('#lastUser').val();
            // const selectedUserLast = JSON.parse(user_last_guid);
            // user_last_guid = selectedUserLast[0]['id']

            var repair_date = $('#repair_date').val();
            var date_of_damage = $('#date_of_damage').val();
            var completion_date_of_repair = $('#completion_date_of_repair').val();
            var repair_cost = $('#repair_cost').val();
            var repair_vendor = $('#repair_vendor').val();
            var description = $('#description').val();



            $.ajax({
                type: "POST",
                url: "{{ env('URL_API') }}/api/v1/damage-history",
                data: {
                    "guid": guid,

                    "inventory_guid": inventoryGuid,
                    "user_repair_guid": user_repair_guid,
                    "user_last_guid": user_last_guid,

                    "repair_date": repair_date,
                    "date_of_damage": date_of_damage,
                    "completion_date_of_repair": completion_date_of_repair,
                    "repair_cost": repair_cost,
                    "repair_vendor": repair_vendor,
                    "description": description,
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
                        window.location.href = "{{ route('index-all_damage_history') }}";
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