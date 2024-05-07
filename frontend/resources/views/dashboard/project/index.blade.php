@extends('layouts.dashboard-app')
@section('title', 'Project Management')


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
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-9">
                    <h4 class="mb-0">Project Management </h4>
                </div>
                <div class="col-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal"
                        data-bs-target="#listProjectsModal">
                        Select Project
                    </button>

                    <!-- Modal -->
                    <div class="modal modal-top fade" id="listProjectsModal" tabindex="-1">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                            <form class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title m-auto" id="modalTopTitle">List Project</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row m-0 p-0" name="listProjects" id="listProjects">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="">
                    <!-- Button trigger modal -->
                    <button type="button" class="ms-5 btn btn-success col-1" id="AddBtnProject" data-bs-toggle="modal"
                        data-bs-target="#addDataProjectModal"><i class="menu-icon tf-icons ti ti-plus m-0 p-0"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="addDataProjectModal" tabindex="-1" aria-hidden="true">
                        <form id="formAddProject" enctype="multipart/form-data">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Add New Project</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="projectName" class="form-label">Project Name</label>
                                                <input type="text" id="projectName" class="form-control"
                                                    placeholder="Enter Name">
                                            </div>
                                            <div class="col mb-3">
                                                <label for="projectDescription" class="form-label">Description</label>
                                                <textarea class="form-control" id="projectDescription" rows="2" placeholder="Enter Description"></textarea>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="projectStatus" class="form-label">Status</label>
                                                <select class="form-control select2 form-select form-select-lg"
                                                    name="projectStatus" id="projectStatus">
                                                    <option value="projectOngoing">Ongoing</option>
                                                    <option value="projectFinished">Finished</option>
                                                </select>
                                            </div>
                                            <div class="col mb-3">
                                                <label for="projectCategory" class="form-label">Category</label>
                                                <select class="form-control select2 form-select form-select-lg"
                                                    name="projectCategory" id="projectCategory">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="projectStartDate" class="form-label">Start Date</label>
                                                <input type="datetime-local" id="projectStartDate" class="form-control"
                                                    placeholder="DD / MM / YY">
                                            </div>
                                            <div class="col mb-3">
                                                <label for="projectEndDate" class="form-label">End Date</label>
                                                <input type="datetime-local" id="projectEndDate" class="form-control"
                                                    placeholder="DD / MM / YY">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">ADD</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="pageBoard" class="m-0 p-0">

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
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/sortablejs/sortable.js') }}"></script>

@endsection


@section('main-js')

@endsection


@section('page-js')
    <script src="{{ asset('./assets/new-dashboard/js/form-layouts.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/extended-ui-sweetalert2.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/extended-ui-blockui.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/ui-toasts.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/cards-actions.js') }}"></script>

@endsection


@section('custom-javascript')
    <script type="text/javascript">
        var dataProject = <?php echo json_encode($dataProject, JSON_PRETTY_PRINT); ?>;
        var dataProjectCategory = <?php echo json_encode($dataProjectCategory, JSON_PRETTY_PRINT); ?>;

        $(document).ready(function() {

            function updateProjectList() {
                var dataTarget = $('#listProjects');
                dataTarget.empty();
                dataProject.data.forEach(function(data) {
                    dataTarget.append(
                        '<div class="col m-1 p-0 text-center"> <div class="btn-group"> <input type="radio" class="btn-check" value="' +
                        data.guid + '" name="btnradio" id="' + data.guid +
                        '" autocomplete="off"> <label class="btn btn-outline-primary" for="' + data
                        .guid + '">' + data.project_name + '</label> </div> </div>');
                })
            }
            updateProjectList();

            $('#listProjects').on('change', 'input[type="radio"]', function() {
                var selectedProject = $(this).val();
                window.location.href = "project_management/project/" + selectedProject;
                localStorage.setItem('selectedGUIDProject', selectedProject);
            });

            // function loadProject(projectGuid) {
            //     $.ajax({
            //         type: "GET",
            //         url: "/project_management/project/" + projectGuid,
            //         beforeSend: function() {
            //             // Tampilkan animasi loading jika diperlukan
            //         },
            //         success: function(response) {
            //             // Ganti konten halaman dengan respons yang diterima
            //             $('#pageBoard').html(response);
            //         },
            //         error: function(xhr, status, error) {
            //             // Tampilkan pesan error jika terjadi kesalahan
            //         }
            //     });
            // }

            var projectCategory = $('#projectCategory');
            var projectCategorySetting = $('#projectCategorySetting');
            projectCategory.empty();
            dataProjectCategory.data.forEach(function(data) {
                projectCategory.append('<option value="' + data.guid + '" ' + '>' + data.category_name +
                    '</option>');
            });

            $(document).on('click', '#btnSetting', function() {
                var dataGuidSetting = $('#projectGuidSetting').val();
                var dataStatus = $('#projectStatusSetting');
                var selectedStatus = dataStatus.val();
                dataStatus.empty();
                if (selectedStatus === 'ongoingProjectSetting') {
                    dataStatus.append('<option value="projectOngoingSetting">Ongoing</option>');
                    dataStatus.append('<option value="projectFinishedSetting">Finished</option>');
                } else {
                    dataStatus.append('<option value="projectFinishedSetting">Finished</option>');
                    dataStatus.append('<option value="projectOngoingSetting">Ongoing</option>');
                }
            });

            // Start Add Data Project
            $('#formAddProject').on('submit', function(e) {
                e.preventDefault();
                var guid = null;
                var project_name = $('#projectName').val();
                var description = $('#projectDescription').val();
                var start_date = $('#projectStartDate').val();
                var end_date = $('#projectEndDate').val();
                var status = $('#projectStatus').val();
                var project_category_guid = $('#projectCategory').val();
                $.ajax({
                    type: "POST",
                    url: "{{ env('URL_API') }}/api/v1/project",
                    data: {
                        "guid": guid,
                        "project_name": project_name,
                        "description": description,
                        "start_date": start_date,
                        "end_date": end_date,
                        "status": status,
                        "project_category_guid": project_category_guid,
                        "project_manager_guid": "25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9", //
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
                        $('#addDataProjectModal').modal('hide');
                        // location.reload();
                        toastr.options.closeButton = true;
                        toastr.options.timeOut = 1000;
                        // toastr.options.onHidden = function() {}
                        var dataProjectNEW = <?php echo json_encode($dataProject, JSON_PRETTY_PRINT); ?>;
                        console.log(dataProjectNEW)
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
            // End Add Data Project

        })
    </script>
@endsection
