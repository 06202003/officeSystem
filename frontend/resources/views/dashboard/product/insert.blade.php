@extends('layouts.dashboard-app')
@section('title', 'Insert Product')


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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product /</span> Insert</h4>
        <!-- Basic Layout -->
        <div class="row" id="card-block">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Insert Form Product</h5>
                    </div>
                    <div class="card-body">
                        <form id="form">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Product Name</label>
                                <input type="text" class="form-control" id="product-name"
                                    placeholder="Input Product Name" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Description</label>
                                <textarea class="form-control" rows="3" id="description" required placeholder="Description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Link Google Drive</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-brand-google-drive"></i></span>
                                    <input type="text" class="form-control" id="link-google-drive"
                                        placeholder="Link Google Drive">
                                </div>
                                <label class="form-label" for="basic-default-fullname" style="color:red;">Access files must
                                    be open to the public in order to be downloaded.</label>
                            </div>
                            <div class="mb-3" id="tag-block">
                                <label class="form-label" for="basic-default-fullname">Tag</label>
                                <input id="product-tag" name="product-tag" class="form-control" placeholder="Select Tag"
                                    value="" required>
                            </div>
                            <div class="mb-3" id="user-block">
                                <label class="form-label" for="basic-default-fullname">Author</label>
                                <input id="user-tag" name="user-tag" class="form-control" placeholder="Select Author"
                                    value="" required>
                            </div>
                            @isPermissions('Create_Product')
                            <button type="submit" class="btn btn-primary">Submit</button>
                            @endisPermissions
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

            // --------------- PRODUCT TAG ---------------
            $.ajax({
                type: "GET",
                url: "{{ env('URL_API') }}/api/v1/product-tag",
                data: {
                    "status": "active",
                },
                beforeSend: function(request) {
                    request.setRequestHeader("Authorization",
                        "Bearer {{ $token }}");

                    $("#tag-block").block({
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
                        document.querySelector("#product-tag"));

                    var t = [];
                    for (let i = 0; i < result['data'].length; i++) {
                        var obj = {};
                        obj["id"] = result['data'][i]['guid'];
                        obj["name"] = result['data'][i]['guid'];
                        obj["value"] = result['data'][i]['product_tag_name'];
                        t.push(obj);
                    }

                    a = new Tagify(a, {
                        whitelist: t,
                        // maxTags: 10,
                        enforceWhitelist: true,
                        dropdown: {
                            maxItems: 20,
                            classname: "tags-inline",
                            enabled: 0,
                            closeOnSelect: !1
                        }
                    });

                    // a.addTags([{value:"banana", color:"yellow"}, {value:"apple", color:"red"}, {value:"watermelon", color:"green"}]);
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
            // --------------- PRODUCT TAG ---------------


            // --------------- AUTHOR ---------------
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

                    $("#user-block").block({
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
                        document.querySelector("#user-tag"));

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

                    i.on("dropdown:show dropdown:updated",
                        function(a) {
                            a = a.detail.tagify.DOM.dropdown.content;
                            1 < i.suggestedListItems.length && (n = i.parseTemplate("dropdownItem",
                                [{
                                    class: "addAll",
                                    name: "Add all",
                                    email: i.settings.whitelist.reduce(function(a, e) {
                                        return i.isTagDuplicate(e.value) ? a :
                                            a + 1
                                    }, 0) + " Members"
                                }]), a.insertBefore(n, a.firstChild))
                        }), i.on("dropdown:select", function(a) {
                        a.detail.elm == n && i.dropdown.selectAll.call(i)
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
            // --------------- AUTHOR ---------------



            $('#form').on('submit', function(e) {
                e.preventDefault();

                var productName = $('#product-name').val();
                var productTag = $('#product-tag').val();
                var author = $('#user-tag').val();

                const tagObject = JSON.parse(productTag);
                var tagString = [];
                for (let i = 0; i < tagObject.length; i++) {
                    tagString.push(tagObject[i]['id']);
                }

                const userObject = JSON.parse(author);
                var userString = [];
                for (let i = 0; i < userObject.length; i++) {
                    userString.push(userObject[i]['id']);
                }

                var description = $('#description').val();
                var linkGoogleDrive = $('#link-google-drive').val();

                // if (!linkGoogleDrive.startsWith("https://drive.google.com")) {
                //     toastr.options.closeButton = true;
                //     toastr.error(
                //         "Link google drive tidak valid",
                //         "Error",
                //     );
                // } else {
                $.ajax({
                    type: "POST",
                    url: "{{ env('URL_API') }}/api/v1/product",
                    data: {
                        "product_name": productName,
                        "description": description,
                        "is_google_drive": 1,
                        "link": linkGoogleDrive,
                        "product_tag": tagString,
                        "author": userString,
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
                            window.location.href = "{{ route('index-product') }}";
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
                // }
            });
        });
    </script>
@endsection
