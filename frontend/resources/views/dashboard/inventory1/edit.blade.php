@extends('layouts.dashboard-app')
@section('title', 'Edit Inventory')


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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Inventory /</span> Edit</h4>
    <!-- Basic Layout -->
    <div class="row" id="card-block">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Form Inventory</h5>
                </div>
                <div class="card-body">
                    <form id="form">
                        <div class="mb-3 d-none">
                            <label class="form-label" for="basic-default-fullname">GUID</label>
                            <input type="text" class="form-control" id="guid" placeholder="Input GUID" required value="{{ $data['data']['guid'] }}" readonly />
                        </div>
                        <div class="mb-3" id="image-block">
                            <label class="form-label" for="basic-default-fullname">Image</label>
                            <input class="form-control" type="file" id="image" accept=".png, .PNG, .jpg, .JPG, .jpeg, .JPEG">
                            <img class="mt-3" src="{{ $data['data']['img_url'] }}" id="uploaded-image" height="200px" />
                            <input class="form-control d-none" type="text" id="image-url" readonly value="{{ $data['data']['img_url'] }}">
                            <input type="hidden" id="old-image-url">
                        </div>

                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <label class="form-label" for="basic-default-fullname">Inventory Name <span class="text-danger" style="font-size: 20px;">*</span></label>
                                        <input type="text" class="form-control" id="inventory-name" placeholder="Input Inventory Name" required value="{{ $data['data']['inventory_name'] }}" />
                                    </td>
                                    <td>
                                        <label class="form-label" for="basic-default-fullname">Brand <span class="text-danger" style="font-size: 20px;">*</span></label>
                                        <input type="text" class="form-control" id="brand" placeholder="Input Brand" required value="{{ $data['data']['brand'] }}" />
                                    </td>
                                    <td>
                                        <label class="form-label" for="basic-default-fullname">Purchase Date <span class="text-danger" style="font-size: 20px;">*</span></label>
                                        <input type="date" class="form-control" id="purchase-date" required value="{{ $data['data']['purchase_date'] }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-label" for="basic-default-fullname">Price <span class="text-danger" style="font-size: 20px;">*</span></label>
                                        <input type="text" class="form-control format" id="price" inputmode="numeric" placeholder="Input Price" required value="{{ $data['data']['price'] }}" onchange="count()" />
                                    </td>
                                    <td>
                                        <label class="form-label" for="basic-default-fullname">Vendor <span class="text-danger" style="font-size: 20px;">*</span></label>
                                        <input type="text" class="form-control" id="vendor" placeholder="Input Vendor" required value="{{ $data['data']['vendor'] }}" />
                                    </td>
                                    <td>
                                        <label class="form-label" for="basic-default-fullname">Description <span class="text-danger" style="font-size: 20px;">*</span></label>
                                        <textarea class="form-control" id="description" placeholder="Input Description" required>{{ $data['data']['description'] }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="status" class="form-label">Status <span class="text-danger" style="font-size: 20px;">*</span></label>
                                        <select id="status" class="select2 form-select form-select-lg" data-allow-clear="true" value="{{ $data['data']['status'] }}" required>
                                            <option value="normal">Normal</option>
                                            <option value="damage">Repair</option>
                                            <option value="maintanance">Maintenance</option>
                                        </select>
                                    </td>
                                    <td>
                                        <!-- <div id="category-block">
                                            <label class="form-label" for="basic-default-fullname">Category <span class="text-danger" style="font-size: 20px;">*</span></label>
                                            
                                            <input id="category-tag" name="category-tag" class="form-control" placeholder="Select Category" value="{{ $category }}" required>
                                        </div> -->
                                        <label class="form-label" for="basic-default-fullname">Category<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <select class="form-control select2 form-select form-select-lg" name="category" id="category">

                            </select>
                                    </td>
                                    <td>
                                        <!-- <div class="" id="room-block">
                                            <label class="form-label" for="basic-default-fullname">Room <span class="text-danger" style="font-size: 20px;">*</span></label>
                                            <input id="room-tag" name="room-tag" class="form-control" placeholder="Select Room" value="{{ $room }}" required>
                                        </div> -->

                                        <label class="form-label" for="basic-default-fullname">Room<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <select class="form-control select2 form-select form-select-lg" name="room" id="room">

                            </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- <div class="" id="user-block">
                                            <label class="form-label" for="basic-default-fullname">User</label>
                                            <input id="user-tag" name="user-tag" class="form-control" placeholder="Select User" value="{{ $user }}">
                                        </div> -->

                                        <label class="form-label" for="basic-default-fullname">User<span class="text-danger" style="font-size: 20px;">*</span></label>
                            <select class="form-control select2 form-select form-select-lg" name="user" id="user">

                            </select>
                                    </td>
                                    <td>
                                        <label class="form-label" for="basic-default-fullname">Useful Life<span class="text-danger" style="font-size: 20px;">*</span></label>
                                        <input type="text" class="form-control" id="useful-life" placeholder="Input Useful Life" value="{{ $data['data']['useful_life'] }}" onchange="count()" />
                                    </td>
                                    <td>
                                        <label class="form-label" for="basic-default-fullname">Residual Value</label>
                                        <input type="text" class="form-control format" id="residual-value" placeholder="Input Residual Value" value="{{ $data['data']['residual_value'] }}" readonly disabled/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-label" for="basic-default-fullname">Depreciation</label>
                                        <input type="text" class="form-control format" id="depreciation" placeholder="Input Depreciation" value="{{ $data['data']['depreciation'] }}" readonly disabled/>
                                    </td>
                                    <td>
                                        <label class="form-label" for="basic-default-fullname">First Year Value</label>
                                        <input type="text" class="form-control format" id="year1" placeholder="Input First Year Value" value="{{ $data['data']['price_in_year_1'] }}" readonly disabled/>
                                    </td>
                                    <td>
                                        <label class="form-label" for="basic-default-fullname">Second Year Value</label>
                                        <input type="text" class="form-control format" id="year2" placeholder="Input Second Year Value" value="{{ $data['data']['price_in_year_2'] }}" readonly disabled/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-label" for="basic-default-fullname">Third Year Value</label>
                                        <input type="text" class="form-control format" id="year3" placeholder="Input Third Year Value" value="{{ $data['data']['price_in_year_3'] }}" readonly disabled/>
                                    </td>
                                    <td>
                                        <label class="form-label" for="basic-default-fullname">Fourth Year Value</label>
                                        <input type="text" class="form-control format" id="year4" placeholder="Input Fourth Year Value" value="{{ $data['data']['price_in_year_4'] }}" readonly disabled/>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
    function count() {
        let price = AutoNumeric.getNumber('#price');
        let residualValue;
        let usefulLife = $('#useful-life').val();

        if (usefulLife <= 4) {
            residualValue = price * 0.25
        } else if (4 < usefulLife <= 8) {
            residualValue = price * 0.125
        } else if (8 < usefulLife <= 16) {
            residualValue = price * 0.0625
        } else if (16 < usefulLife <= 20) {
            residualValue = price * 0.05
        }

        let depreciation = (price - residualValue) / usefulLife
        let year1 = price - depreciation
        let year2 = year1 - depreciation
        let year3 = year2 - depreciation
        let year4 = year3 - depreciation


        $("#depreciation").val(depreciation);
        $("#year1").val(year1);
        $("#year2").val(year2);
        $("#year3").val(year3);
        $("#year4").val(year4);
        $("#residual-value").val(residualValue);

        // new AutoNumeric.multiple('.format', {
        //     currencySymbol: "Rp. ",
        //     decimalCharacter: ",",
        //     digitGroupSeparator: ".",
        //     unformatOnSubmit: true
        // });
    }

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
                    var selected = data.guid === "{{ $data['data']['category_guid'] }}" ? 'selected' : '';
                    dataAPI.append('<option value="' + data.guid + '" ' + selected + '>' + data.category_name + '</option>');
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
                    var selected = data.guid === "{{ $data['data']['room_guid'] }}" ? 'selected' : '';
                    dataAPI.append('<option value="' + data.guid + '" ' + selected + '>' + data.room_name + '</option>');
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
                var dataAPI = $('#user');
                dataAPI.empty();
                result.data.forEach(function(data) {
                    var selected = data.guid === "{{ $data['data']['user_guid'] }}" ? 'selected' : '';
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

        $(window).on('beforeunload', function() {
                deleteOldImage();
            });

            function deleteOldImage() {
                var oldImage = $("#old-image-url").val();
                if (oldImage) {
                    console.log(oldImage)

                    $.ajax({
                        type: 'POST',
                        url: "{{ env('URL_API') }}/api/v1/delete/image",
                        data: {
                            "type": "other",
                            "url": oldImage
                        },
                        beforeSend: function(request) {
                            request.setRequestHeader("Authorization",
                                "Bearer {{ $token }}");

                            $("#image-block").block({
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
                }
            }

            $("#image").change(function() {
                deleteOldImage();
                var file = this.files[0];

                var formData = new FormData();
                formData.append('image', file);
                formData.append('type', 'other');
                $.ajax({
                    url: "{{ env('URL_API') }}/api/v1/upload/image",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function(request) {
                        request.setRequestHeader("Authorization",
                            "Bearer {{ $token }}");

                        $("#image-block").block({
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
                        $("#old-image-url").val(result['data']['url']);
                        $("#image-url").val(result['data']['url']);
                        $("#uploaded-image").attr("src", result['data']['url']);
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
            })
        
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
            // success: function(result) {
            //     $.unblockUI();

            //     var a = (new Tagify(a),
            //         document.querySelector("#category-tag"));

            //     var t = [];
            //     for (let i = 0; i < result['data'].length; i++) {
            //         var obj = {};
            //         obj["id"] = result['data'][i]['guid'];
            //         obj["name"] = result['data'][i]['guid'];
            //         obj["value"] = result['data'][i]['category_name'];
            //         t.push(obj);
            //     }

            //     let i = new Tagify(a, {
            //         whitelist: t,
            //         maxTags: 1,
            //         enforceWhitelist: true,
            //         dropdown: {
            //             maxItems: 20,
            //             classname: "tags-inline",
            //             enabled: 0,
            //             closeOnSelect: !1
            //         }
            //     });
            // },
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

        // --------------- USER ---------------
        // $.ajax({
        //     type: "GET",
        //     url: "{{ env('URL_API') }}/api/v1/user",
        //     data: {
        //         "role_guid": "2c2ce088-92f3-4ffa-b81d-9a1dd17a9076",
        //         "status": "active"
        //     },
        //     beforeSend: function(request) {
        //         request.setRequestHeader("Authorization",
        //             "Bearer {{ $token }}");

        //         $("#user-block").block({
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
        //             document.querySelector("#user-tag"));

        //         var t = [];
        //         for (let i = 0; i < result['data'].length; i++) {
        //             var obj = {};
        //             obj["id"] = result['data'][i]['guid'];
        //             obj["name"] = result['data'][i]['name'];
        //             obj["value"] = result['data'][i]['guid'];
        //             obj["avatar"] =
        //                 "{{ asset('./assets/new-dashboard/img/avatars/PP-oval.png') }}";
        //             obj["email"] = result['data'][i]['email'];
        //             t.push(obj);
        //         }

        //         let i = new Tagify(a, {
        //             tagTextProp: "name",
        //             enforceWhitelist: !0,
        //             skipInvalid: !0,
        //             maxTags: 1,
        //             dropdown: {
        //                 closeOnSelect: !1,
        //                 enabled: 0,
        //                 classname: "users-list",
        //                 searchKeys: ["name", "email"]
        //             },
        //             templates: {
        //                 tag: function(a) {
        //                     return `
        //             <tag title="${a.title || a.email}"
        //             contenteditable='false'
        //             spellcheck='false'
        //             tabIndex="-1"
        //             class="${this.settings.classNames.tag} ${a.class || ""}"
        //             ${this.getAttributes(a)}
        //             >
        //             <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
        //             <div>
        //                 <div class='tagify__tag__avatar-wrap'>
        //                 <img onerror="this.style.visibility='hidden'" src="${a.avatar}">
        //                 </div>
        //                 <span class='tagify__tag-text'>${a.name}</span>
        //             </div>
        //             </tag>
        //         `
        //                 },
        //                 dropdownItem: function(a) {
        //                     return `
        //             <div ${this.getAttributes(a)}
        //             class='tagify__dropdown__item align-items-center ${a.class || ""}'
        //             tabindex="0"
        //             role="option"
        //             >
        //             ${a.avatar ? `<div class='tagify__dropdown__item__avatar-wrap'>
        //             <img onerror="this.style.visibility='hidden'" src="${a.avatar}"></div>`: ""}<strong>${a.name}</strong>
        //             <span>${a.email}</span>
        //             </div>
        //         `
        //                 }
        //             },
        //             whitelist: t
        //         });
        //         let n;
        //         e = Array.apply(null, Array(100)).map(function() {
        //             return Array.apply(null, Array(~~(10 * Math.random() + 3))).map(
        //                 function() {
        //                     return String.fromCharCode(26 * Math.random() + 97)
        //                 }).join("") + "@gmail.com"
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
        // --------------- USER ---------------

        $('#form').on('submit', function(e) {
                e.preventDefault();

                var guid = $('#guid').val();
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
                var user = $('#user').val();
                // if (user != "") {
                //     const selectedUser = JSON.parse(user);
                //     user = selectedUser[0]['id']
                // }
                var status = $('#status').val();
                var usefulLife = $('#useful-life').val();
                var residualValue = $('#residual-value').val();
                var depreciation = $('#depreciation').val();
                var year1 = $('#year1').val();
                var year2 = $('#year2').val();
                var year3 = $('#year3').val();
                var year4 = $('#year4').val();
                var url = $('#image-url').val();


                $.ajax({
                    type: "PUT",
                    url: "{{ env('URL_API') }}/api/v1/inventory",
                    data: {
                        "guid": guid,
                        "inventory_name": inventoryName,
                        "brand": brand,
                        "purchase_date": purchaseDate,
                        "price": price,
                        "vendor": vendor,
                        "description": description,
                        "category_guid": category,
                        "room_guid": room,
                        "user_guid": user,
                        "status": status,
                        "useful_life": usefulLife,
                        "residual_value": residualValue,
                        "depreciation": depreciation,
                        "price_in_year_1": year1,
                        "price_in_year_2": year2,
                        "price_in_year_3": year3,
                        "price_in_year_4": year4,
                        "img_url": url

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