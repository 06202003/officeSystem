@extends('layouts.dashboard-app')
@section('title', 'Edit Skill')


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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Skill /</span> Edit</h4>
        <!-- Basic Layout -->
        <div class="row" id="card-block">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Form: Skill</h5>
                    </div>
                    <div class="card-body">
                        <form id="form">
                            <div class="mb-3">
                                <input type="text" class="form-control d-none" id="guid" placeholder="Input GUID" required
                                    value="{{ $data['data']['guid'] }}" readonly />
                                <label class="form-label" for="basic-default-fullname">Employee Name<span style="color: #EE3C3B">*</span></label>
                                <input type="text" class="form-control d-none" id="user"
                                    value="{{ $data['data']['user_guid'] }}" readonly />
                                @foreach ($users['data'] as $user)
                                @if ($data['data']['user_guid'] == $user['guid'])
                                        <input type="text" class="form-control" style="background-color:#7777"
                                            value="{{ $user['name'] }}" readonly />
                                @endif
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Skill<span style="color: #EE3C3B">*</span></label>
                                <select id="skillmaster" class="select2 form-select form-select-lg" data-allow-clear="true" required>
                                    @foreach ($skillmasters['data'] as $skillmaster)
                                        @if ($data['data']['skill_guid'] == $skillmaster['guid'])
                                        <option value="{{ $skillmaster['guid'] }}" selected>{{ $skillmaster['skill'] }}</option>
                                        @else
                                        <option value="{{ $skillmaster['guid'] }}">{{ $skillmaster['skill'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3" id="user-block">
                                <label class="form-label" for="basic-default-fullname">Level<span style="color: #EE3C3B">*</label>
                                <select id="level" class="select2 form-select form-select-lg" required>
                                    <?php
                                        $userlvl = $data['data']['level'];
                                        $levels = ["Beginner","Intermediate","Fluent"];
                                        foreach($levels as $level){
                                            if($data['data']['level'] == $level){
                                                echo "<option value=\"$userlvl\" selected>$level</option>";
                                            }else{
                                                echo "<option value=\"$level\">$level</option>";
                                            }
                                        }

                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Notes</label>
                                @if($data['data']['notes'] == '-')
                                    <input type="text" class="form-control" id="notes" placeholder="Input Notes" required/>
                                @else
                                    <input type="text" class="form-control" id="notes" placeholder="Input Notes" required value="{{ $data['data']['notes'] }}"/>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/skill" class="btn btn-primary">Cancel</a>
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
                var skillmaster = $('#skillmaster').val();
                var level = $('#level').val();
                var notes = $('#notes').val();

                if(notes === ''){
                    notes = "-";
                }

                $.ajax({
                    type: "PUT",
                    url: "{{ env('URL_API') }}/api/v1/skill",
                    data: {
                        "guid": guid,
                        "user_guid": user,
                        "skill_guid": skillmaster,
                        "level": level,
                        "notes": notes,
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
                            window.location.href = "{{ route('index-skill') }}";
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
