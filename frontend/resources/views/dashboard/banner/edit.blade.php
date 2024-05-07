@extends('layouts.dashboard-app')
@section('title', 'Edit Banner')


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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">CMS / Banner /</span> Edit</h4>
        <!-- Basic Layout -->
        <div class="row" id="card-block">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Form Banner</h5>
                    </div>
                    <div class="card-body">
                        <form id="form">
                            <div class="mb-3 d-none">
                                <label class="form-label" for="basic-default-fullname">GUID</label>
                                <input type="text" class="form-control" id="guid" placeholder="Input GUID" required
                                    value="{{ $data['data']['guid'] }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Input Title" required
                                    value="{{ $data['data']['title'] }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Content</label>
                                <textarea type="text" class="form-control" id="content" placeholder="Input Content" required>{{ $data['data']['content'] }}</textarea>
                            </div>
                            <div class="mb-3" id="image-block">
                                <label class="form-label" for="basic-default-fullname">Image</label>
                                <input class="form-control" type="file" id="image"
                                    accept=".png, .PNG, .jpg, .JPG, .jpeg, .JPEG">
                                <img class="mt-3" src="{{ $data['data']['image'] }}" id="uploaded-image" height="200px" />
                                <input class="form-control d-none" type="text" id="image-url" readonly
                                    value="{{ $data['data']['image'] }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">URL</label>
                                <input type="text" class="form-control" id="url" placeholder="Input URL" required
                                    value="{{ $data['data']['url'] }}" />
                            </div>
                            <div class="mb-3">
                                <div class="text-light small fw-semibold">Status</div>
                                <div class="demo-inline-spacing">
                                    <label class="switch switch-success">
                                        <input type="checkbox" class="switch-input"
                                            @if ($data['data']['status'] == 'active') checked @endif id="status" />
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
                            @isPermission('Update_Banner')
                            <button type="submit" class="btn btn-primary">Submit</button>
                            @endisPermission
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
            $("#image").change(function() {
                var file = this.files[0];

                var formData = new FormData();
                formData.append('image', file);
                formData.append('type', 'banner');

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

            $('#form').on('submit', function(e) {
                e.preventDefault();

                var guid = $('#guid').val();
                var title = $('#title').val();
                var content = $('#content').val();
                var image = $('#image-url').val();
                var url = $('#url').val();

                var status = 'deleted';
                if ($('#status').is(":checked")) {
                    status = 'active'
                }


                $.ajax({
                    type: "PUT",
                    url: "{{ env('URL_API') }}/api/v1/banner",
                    data: {
                        "guid": guid,
                        "title": title,
                        "content": content,
                        "image": image,
                        "url": url,
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
                            window.location.href = "{{ route('index-banner') }}";
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