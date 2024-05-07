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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Damage History /</span> Insert</h4>
        <!-- Basic Layout -->
        <div class="row" id="card-block">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Insert Form Damage History</h5>
                    </div>
                    <div class="card-body">
                        <form id="form">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Inventory <span class="text-danger"
                                        style="font-size: 20px;">*</span></label>
                                <input type="text" class="form-control" id="inventory" placeholder="Input Inventory"
                                    value="{{ $data['guid'] }} - {{ $data['inventory_name'] }}" required readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Damage Date <span class="text-danger"
                                        style="font-size: 20px;">*</span></label>
                                <input type="date" class="form-control" id="damage-date" placeholder="Input Damage Date"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Description <span class="text-danger"
                                        style="font-size: 20px;">*</span></label>
                                <textarea class="form-control" id="description" placeholder="Input Description" required></textarea>
                            </div>
                            <div class="mb-3" id="last-user-block">
                                <label class="form-label" for="basic-default-fullname">Last User <span class="text-danger"
                                        style="font-size: 20px;">*</span></label>
                                <input id="last-user-tag" name="last-user-tag" class="form-control"
                                    placeholder="Select User" value="{{ $user }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Repair Date</label>
                                <input type="date" class="form-control" id="repair-date"
                                    placeholder="Input Repair Date" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Vendor</label>
                                <input type="text" class="form-control" id="vendor" placeholder="Input Vendor" />
                            </div>
                            <div class="mb-3" id="user-repair-block">
                                <label class="form-label" for="basic-default-fullname">User Repair</label>
                                <input id="user-repair-tag" name="user-repair-tag" class="form-control"
                                    placeholder="Select User">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Repair Done Date</label>
                                <input type="date" class="form-control" id="repair-done-date"
                                    placeholder="Input Repair Done Date" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Repair Cost</label>
                                <input type="text" inputmode="numeric" class="format form-control" id="repair-cost"
                                    placeholder="Input Repair Cost" />
                            </div>
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

            new AutoNumeric.multiple('.format', {
                currencySymbol: "Rp. ",
                decimalCharacter: ",",
                digitGroupSeparator: ".",
                unformatOnSubmit: true
            });

            // --------------- LAST USER ---------------
            $.ajax({
                type: "GET",
                url: "{{ env('URL_API') }}/api/v1/user",
                data: {
                    "role_guid": "2c2ce088-92f3-4ffa-b81d-9a1dd17a9076",
                    "status": "active"
                },
                beforeSend: function(request) {
                    request.setRequestHeader("Authorization",
                        "Bearer {{ $token }}");

                    $("#last-user-block").block({
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

                    var a = (new Tagify(a),
                        document.querySelector("#last-user-tag"));

                    var t = [];
                    for (let i = 0; i < result['data'].length; i++) {
                        var obj = {};
                        obj["id"] = result['data'][i]['guid'];
                        obj["name"] = result['data'][i]['name'];
                        obj["value"] = result['data'][i]['guid'];
                        obj["avatar"] =
                            "{{ asset('./assets/new-dashboard/img/avatars/PP-oval.png') }}";
                        obj["email"] = result['data'][i]['email'];
                        t.push(obj);
                    }

                    let i = new Tagify(a, {
                        tagTextProp: "name",
                        enforceWhitelist: !0,
                        skipInvalid: !0,
                        maxTags: 1,
                        dropdown: {
                            closeOnSelect: !1,
                            enabled: 0,
                            classname: "users-list",
                            searchKeys: ["name", "email"]
                        },
                        templates: {
                            tag: function(a) {
                                return `
                    <tag title="${a.title || a.email}"
                    contenteditable='false'
                    spellcheck='false'
                    tabIndex="-1"
                    class="${this.settings.classNames.tag} ${a.class || ""}"
                    ${this.getAttributes(a)}
                    >
                    <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
                    <div>
                        <div class='tagify__tag__avatar-wrap'>
                        <img onerror="this.style.visibility='hidden'" src="${a.avatar}">
                        </div>
                        <span class='tagify__tag-text'>${a.name}</span>
                    </div>
                    </tag>
                `
                            },
                            dropdownItem: function(a) {
                                return `
                    <div ${this.getAttributes(a)}
                    class='tagify__dropdown__item align-items-center ${a.class || ""}'
                    tabindex="0"
                    role="option"
                    >
                    ${a.avatar ? `<div class='tagify__dropdown__item__avatar-wrap'>
                                                                                                                                                                                                                                                                                                                                                                                                                                                <img onerror="this.style.visibility='hidden'" src="${a.avatar}">
                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>`: ""}
                    <strong>${a.name}</strong>
                    <span>${a.email}</span>
                    </div>
                `
                            }
                        },
                        whitelist: t
                    });
                    let n;
                    e = Array.apply(null, Array(100)).map(function() {
                        return Array.apply(null, Array(~~(10 * Math.random() + 3))).map(
                            function() {
                                return String.fromCharCode(26 * Math.random() + 97)
                            }).join("") + "@gmail.com"
                    });

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
            // --------------- LAST USER ---------------
            // --------------- REPAIR USER ---------------
            $.ajax({
                type: "GET",
                url: "{{ env('URL_API') }}/api/v1/user",
                data: {
                    "role_guid": "2c2ce088-92f3-4ffa-b81d-9a1dd17a9076",
                    "status": "active"
                },
                beforeSend: function(request) {
                    request.setRequestHeader("Authorization",
                        "Bearer {{ $token }}");

                    $("#user-repair-block").block({
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

                    var a = (new Tagify(a),
                        document.querySelector("#user-repair-tag"));

                    var t = [];
                    for (let i = 0; i < result['data'].length; i++) {
                        var obj = {};
                        obj["id"] = result['data'][i]['guid'];
                        obj["name"] = result['data'][i]['name'];
                        obj["value"] = result['data'][i]['guid'];
                        obj["avatar"] =
                            "{{ asset('./assets/new-dashboard/img/avatars/PP-oval.png') }}";
                        obj["email"] = result['data'][i]['email'];
                        t.push(obj);
                    }

                    let i = new Tagify(a, {
                        tagTextProp: "name",
                        enforceWhitelist: !0,
                        skipInvalid: !0,
                        maxTags: 1,
                        dropdown: {
                            closeOnSelect: !1,
                            enabled: 0,
                            classname: "users-list",
                            searchKeys: ["name", "email"]
                        },
                        templates: {
                            tag: function(a) {
                                return `
                    <tag title="${a.title || a.email}"
                    contenteditable='false'
                    spellcheck='false'
                    tabIndex="-1"
                    class="${this.settings.classNames.tag} ${a.class || ""}"
                    ${this.getAttributes(a)}
                    >
                    <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
                    <div>
                        <div class='tagify__tag__avatar-wrap'>
                        <img onerror="this.style.visibility='hidden'" src="${a.avatar}">
                        </div>
                        <span class='tagify__tag-text'>${a.name}</span>
                    </div>
                    </tag>
                `
                            },
                            dropdownItem: function(a) {
                                return `
                    <div ${this.getAttributes(a)}
                    class='tagify__dropdown__item align-items-center ${a.class || ""}'
                    tabindex="0"
                    role="option"
                    >
                    ${a.avatar ? `<div class='tagify__dropdown__item__avatar-wrap'>
                                                                                                                                                                                                                                                                                                                                                                                                                                                <img onerror="this.style.visibility='hidden'" src="${a.avatar}">
                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>`: ""}
                    <strong>${a.name}</strong>
                    <span>${a.email}</span>
                    </div>
                `
                            }
                        },
                        whitelist: t
                    });
                    let n;
                    e = Array.apply(null, Array(100)).map(function() {
                        return Array.apply(null, Array(~~(10 * Math.random() + 3))).map(
                            function() {
                                return String.fromCharCode(26 * Math.random() + 97)
                            }).join("") + "@gmail.com"
                    });

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
            // --------------- REPAIR USER ---------------

            $('#form').on('submit', function(e) {
                e.preventDefault();

                var damageDate = $('#damage-date').val();
                var description = $('#description').val();
                var repairDate = $('#repair-date').val();
                var vendor = $('#vendor').val();
                var repairDoneDate = $('#repair-done-date').val();
                var repairCost = $('#repair-cost').val();
                var lastUser = $('#last-user-tag').val();
                const selectedLastUser = JSON.parse(lastUser);
                lastUser = selectedLastUser[0]['id']
                var userRepair = $('#user-repair-tag').val();
                if (userRepair != "") {
                    const selectedUserRepair = JSON.parse(userRepair);
                    userRepair = selectedUserRepair[0]['id']
                }



                $.ajax({
                    type: "POST",
                    url: "{{ env('URL_API') }}/api/v1/damage-history",
                    data: {
                        "inventory_guid": "{{ $guid }}",
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
                                "{{ route('index-detail-inventory', ['guid' => $guid]) }}";
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
