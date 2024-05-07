@extends('layouts.dashboard-app')
@section('title', 'Insert Inventory')


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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Inventory /</span> Insert</h4>
    <!-- Basic Layout -->
    <div class="row" id="card-block">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Insert Form Inventory</h5>
                </div>
                <div class="card-body">
                    <form id="form">
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Inventory Name<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="text" class="form-control" id="inventory-name" placeholder="Input Inventory Name" required />
                                </td>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Brand<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="text" class="form-control" id="brand" placeholder="Input Brand" required />
                                </td>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Purchase Date<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="date" class="form-control" id="purchase-date" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Price<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="text" inputmode="numeric" class="format form-control" id="price" placeholder="Input Price" required />
                                </td>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Vendor<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <input type="text" class="form-control" id="vendor" placeholder="Input Vendor" required />
                                </td>
                                <td>
                                    <label class="form-label" for="basic-default-fullname">Description<span class="text-danger" style="font-size: 20px;">*</span></label>
                                    <textarea class="form-control" id="description" placeholder="Input Description" required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <!-- <td>
                                    <div class="mb-3" id="category-block">
                                        <label class="form-label" for="basic-default-fullname">Category</label>
                                        <input id="category-tag" name="category-tag" class="form-control" placeholder="Select Category" value="" required>
                                    </div>
                                </td> -->
                                <td>
                                    <div class="mb-3">
                                        <!-- <label class="form-label" for="basic-default-fullname">Category</label>
                                        <input id="category-tag" name="category-tag" class="form-control" placeholder="Select Category" value="" required> -->

                                        <label class="form-label" for="basic-default-fullname">Category<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <select class="form-control select2 form-select form-select-lg" name="category" id="category">

                            </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="mb-3" >
                                        <!-- <label class="form-label" for="basic-default-fullname">Room</label>
                                        <input id="room-tag" name="room-tag" class="form-control" placeholder="Select Room" value="" required> -->

                                        <label class="form-label" for="basic-default-fullname">Room<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <select class="form-control select2 form-select form-select-lg" name="room" id="room">

                            </select>
                                    </div>
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
            url: "{{ env('URL_API') }}/api/v1/category",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization",
                    "Bearer {{ $token }}");
            },
            success: function(result) {
                var dataAPI = $('#category');
                dataAPI.empty();
                result.data.forEach(function(data) {
                    dataAPI.append('<option value="' + data.guid + '" ' + '>' + data.category_name + '</option>');
                });
            },

            error: function(xhr, status, error) {
                var jsonResponse = JSON.parse(xhr.responseText);
            }
        });

        $.ajax({
            type: "GET",
            url: "{{ env('URL_API') }}/api/v1/room",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization",
                    "Bearer {{ $token }}");
            },
            success: function(result) {
                var dataAPI = $('#room');
                dataAPI.empty();
                result.data.forEach(function(data) {
                    dataAPI.append('<option value="' + data.guid + '" ' + '>' + data.room_name + '</option>');
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

        // --------------- CATEGORY ---------------
        // $.ajax({
        //     type: "GET",
        //     url: "{{ env('URL_API') }}/api/v1/category",
        //     data: {
        //         "status": "active"
        //     },
        //     beforeSend: function(request) {
        //         request.setRequestHeader("Authorization",
        //             "Bearer {{ $token }}");

        //         $("#category-block").block({
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
        //             document.querySelector("#category-tag"));

        //         var t = [];
        //         for (let i = 0; i < result['data'].length; i++) {
        //             var obj = {};
        //             obj["id"] = result['data'][i]['guid'];
        //             obj["name"] = result['data'][i]['guid'];
        //             obj["value"] = result['data'][i]['category_name'];
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
        // --------------- CATEGORY ---------------

        // --------------- ROOM ---------------
        // $.ajax({
        //     type: "GET",
        //     url: "{{ env('URL_API') }}/api/v1/room",
        //     data: {
        //         "status": "active"
        //     },
        //     beforeSend: function(request) {
        //         request.setRequestHeader("Authorization",
        //             "Bearer {{ $token }}");

        //         $("#room-block").block({
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
        //             document.querySelector("#room-tag"));

        //         var t = [];
        //         for (let i = 0; i < result['data'].length; i++) {
        //             var obj = {};
        //             obj["id"] = result['data'][i]['guid'];
        //             obj["name"] = result['data'][i]['guid'];
        //             obj["value"] = result['data'][i]['room_name'];
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
        // --------------- ROOM ---------------

        $('#form').on('submit', function(e) {
            e.preventDefault();

            var inventoryName = $('#inventory-name').val();
            var brand = $('#brand').val();
            var purchaseDate = $('#purchase-date').val();
            var price = $('#price').val();
            var vendor = $('#vendor').val();
            var description = $('#description').val();
            var category = $('#category').val();
            // const selectedCategory = JSON.parse(category);
            // category = selectedCategory[0]['id']
            var room = $('#room').val();
            // const selectedRoom = JSON.parse(room);
            // room = selectedRoom[0]['id']


            $.ajax({
                type: "POST",
                url: "{{ env('URL_API') }}/api/v1/inventory",
                data: {
                    "inventory_name": inventoryName,
                    "brand": brand,
                    "purchase_date": purchaseDate,
                    "price": price,
                    "vendor": vendor,
                    "description": description,
                    "category_guid": category,
                    "room_guid": room,
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
                        window.location.href = "{{ route('index-inventory') }}";
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