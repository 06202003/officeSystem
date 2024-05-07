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
                <h4 class="mb-0">Project Management <span class="text-danger" id="judulProject"></span> </h4>
            </div>
            <div class="col-2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#listProjectsModal">
                    Select Project
                </button>

                <!-- Modal -->
                <div class="modal modal-top fade" id="listProjectsModal" tabindex="-1">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <form class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title m-auto" id="modalTopTitle">List Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="ms-5 btn btn-success col-1" id="AddBtnProject" data-bs-toggle="modal" data-bs-target="#addDataProjectModal"><i class="menu-icon tf-icons ti ti-plus m-0 p-0"></i></button>
                <!-- Modal -->
                <div class="modal fade" id="addDataProjectModal" tabindex="-1" aria-hidden="true">
                    <form id="formAddProject" enctype="multipart/form-data">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Add New Project</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="projectName" class="form-label">Project Name</label>
                                            <input type="text" id="projectName" class="form-control" placeholder="Enter Name">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="projectDescription" class="form-label">Description</label>
                                            <textarea class="form-control" id="projectDescription" rows="2" placeholder="Enter Description"></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="projectStatus" class="form-label">Status</label>
                                            <select class="form-control select2 form-select form-select-lg" name="projectStatus" id="projectStatus">
                                                <option value="projectOngoing">Ongoing</option>
                                                <option value="projectFinished">Finished</option>
                                            </select>
                                        </div>
                                        <div class="col mb-3">
                                            <label for="projectCategory" class="form-label">Category</label>
                                            <select class="form-control select2 form-select form-select-lg" name="projectCategory" id="projectCategory">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="projectStartDate" class="form-label">Start Date</label>
                                            <input type="datetime-local" id="projectStartDate" class="form-control" placeholder="DD / MM / YY">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="projectEndDate" class="form-label">End Date</label>
                                            <input type="datetime-local" id="projectEndDate" class="form-control" placeholder="DD / MM / YY">
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
        <div class="card-body">
            <hr>
            <p id="descriptionProject"></p>
        </div>
    </div>

    <!-- Start List Board -->
    <div class="card mt-2">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 col-1">Board</h5>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <div class="row m-0 p-0" id="listBoards">

                </div>
            </div>
            <div id="BtnaddBoard">

            </div>
        </div>
    </div>
    <!-- End List Board -->

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
    var dataBoard = <?php echo json_encode($dataBoard, JSON_PRETTY_PRINT); ?>;

    var currentURL1 = window.location.href;
    var lastIndex = currentURL1.lastIndexOf('/');
    var newURL = currentURL1.substring(0, lastIndex + 1);

    var selectedGUIDProject = localStorage.getItem('selectedGUIDProject');

    $(document).ready(function() {
        function updateProjectList() {
            var dataTarget = $('#listProjects');
            dataTarget.empty();
            dataProject.data.forEach(function(data) {
                dataTarget.append('<div class="col m-1 p-0 text-center"> <div class="btn-group"> <input type="radio" class="btn-check" value="' + data.guid + '" name="btnradio" id="' + data.guid + '" autocomplete="off"> <label class="btn btn-outline-primary" for="' + data.guid + '">' + data.project_name + '</label> </div> </div>');
            })
        }
        updateProjectList();

        function updateBoardList() {
            var dataTarget = $('#listBoards');
            dataTarget.empty();
            dataBoard.data.forEach(function(data) {
                if (selectedGUIDProject === data.project.guid) {
                    dataTarget.append(
                        '<div class="col m-1 p-0"> <!-- Example split danger button --> <div class="btn-group"> <input type="radio" class="btn-check" value="' +
                        data.guid + '" name="btnradio" id="' + data.guid +
                        '" autocomplete="off"> <label class="btn btn-outline-primary" for="' +
                        data.guid + '">' + data.board_name +
                        '</label> <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" value="' +
                        data.guid +
                        '" id="btnSettingBoard"> <span class="visually-hidden">Toggle Dropdown</span> </button> <ul class="dropdown-menu"> <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#modalEditBoard' +
                        data.guid + '" id="btnEditBoard" value="' + data.guid + '">Edit</button> </li> <li><button class="dropdown-item" id="btnDeleteBoard" value="' + data.guid +
                        '">Delete</button></li> </ul> </div> </div> <!-- Modal --> <div class="modal fade" id="modalEditBoard' +
                        data.guid +
                        '" tabindex="-1" aria-hidden="true"> <form id="formEditBoard' + data
                        .guid +
                        '" enctype="multipart/form-data"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="exampleModalLabel1">Edit Data Board </h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body"> <div class="row"> <div class="col mb-3"> <label for="boardNameEdit" class="form-label">Name Board</label> <input type="text" id="boardNameEdit' +
                        data.guid +
                        '" class="form-control" placeholder="Enter Name" value="' + data
                        .board_name +
                        '"> </div> <div class="col mb-3"> <label for="boardDescriptionEdit" class="form-label">Description</label> <textarea class="form-control" id="boardDescriptionEdit' +
                        data.guid + '" rows="2" placeholder="Enter Description">' + data
                        .description +
                        '</textarea> </div> </div> </div> <div class="modal-footer"> <button class="btn btn-success" id="btnEditDataBoard' +
                        data.guid +
                        '">Save Changes</button> </div> </div></form> </div> </div>');
                };
            });
        }
        updateBoardList()

        var dataJudul = $('#judulProject');
        var dataDescriptionProject = $('#descriptionProject');
        dataJudul.empty();
        dataDescriptionProject.empty();
        var projectNamesDisplayed = {};
        dataProject.data.forEach(function(data) {
            if (selectedGUIDProject === data.guid) {
                dataJudul.append(data.project_name +
                    '<i type="button" class="text-secondary menu-icon tf-icons ti ti-settings m-0 p-0" data-bs-toggle="modal" data-bs-target="#modalProjectSetting" id="btnSetting"></i> <div class="modal fade" id="modalProjectSetting" tabindex="-1" aria-hidden="true"> <form id="formProjectSetting" enctype="multipart/form-data"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="exampleModalLabel1">Project ' +
                    data.project_name +
                    '</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body"> <div class="row"> <div class="col mb-3"><input type="text" id="projectGuidSetting" class="form-control d-none" placeholder="Enter Name" value="' +
                    selectedGUIDProject +
                    '"> <label for="projectNameSetting" class="form-label">Project Name</label> <input type="text" id="projectNameSetting" class="form-control" placeholder="Enter Name" value="' +
                    data.project_name +
                    '"> </div> <div class="col mb-3"> <label for="projectDescriptionSetting" class="form-label">Description</label> <textarea class="form-control" id="projectDescriptionSetting" rows="2" placeholder="Enter Description">' +
                    data.description +
                    '</textarea> </div> </div> <div class="row"> <div class="col mb-3"> <label for="projectStatusSetting" class="form-label">Status</label> <select class="form-control select2 form-select form-select-lg" name="projectStatusSetting" id="projectStatusSetting" > <option value="' +
                    data.status + 'ProjectSetting">' + data.status +
                    '</option> </select> </div> <div class="col mb-3"> <label for="projectCategorySetting" class="form-label">Category</label> <select class="form-control select2 form-select form-select-lg" name="projectCategorySetting" id="projectCategorySetting"> </select> </div> </div> <div class="row"> <div class="col mb-3"> <label for="projectStartDateSetting" class="form-label">Start Date</label> <input type="datetime-local" id="projectStartDateSetting" class="form-control" placeholder="DD / MM / YY" value="' +
                    data.start_date +
                    '"> </div> <div class="col mb-3"> <label for="projectEndDateSetting" class="form-label">End Date</label> <input type="datetime-local" id="projectEndDateSetting" class="form-control" placeholder="DD / MM / YY" value="' +
                    data.end_date +
                    '"> </div> </div> </div> <div class="modal-footer"> <button class="btn btn-danger" id="deleteBtnProject"><i class="menu-icon tf-icons ti ti-trash m-0 p-0"></i></button><button type="submit" class="btn btn-success">Save Changes</button> </div> </div> </div> </form> </div>'
                );
                dataDescriptionProject.append(data.description);

                var projectCategorySetting = $('#projectCategorySetting');
                projectCategorySetting.empty();
                dataProjectCategory.data.forEach(function(dataProCa) {
                    projectCategorySetting.append('<option value="' + dataProCa.guid + '"' + '>' + dataProCa.category_name + '</option>');
                });
                projectNamesDisplayed[selectedGUIDProject] = true;
            }
        });

        $('#listProjects').on('change', 'input[type="radio"]', function() {
            var selectedProjects = $(this).val();
            window.location.href = newURL + selectedProjects;
            localStorage.setItem('selectedGUIDProject', selectedProjects);
        });

        $('#listBoards').on('change', 'input[type="radio"]', function() {
            var selectedBoard = $(this).val();
            window.location.href = selectedGUIDProject + "/board/" + selectedBoard;
            localStorage.setItem('selectedGUIDBoard', selectedBoard);
        });
        
        var BtnaddBoard = $('#BtnaddBoard');
        BtnaddBoard.empty();
        if (selectedGUIDProject === "0") {
            BtnaddBoard.empty();
        } else {
            BtnaddBoard.append(
                '<button type="button" class="ms-5 btn btn-success col-1" data-bs-toggle="modal" data-bs-target="#modalAddBoard"><i class="menu-icon tf-icons ti ti-plus m-0 p-0"></i></button> <!-- Modal --> <!-- Modal --> <div class="modal fade" id="modalAddBoard" tabindex="-1" aria-hidden="true"> <form id="formAddBoard" enctype="multipart/form-data"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" >Add Data Board </h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body"> <div class="row"> <div class="col mb-3"> <label for="boardName" class="form-label">Name Board</label> <input type="text" id="boardName" class="form-control" placeholder="Enter Name"> </div> <div class="col mb-3"> <label for="boardDescription" class="form-label">Description</label> <textarea class="form-control" id="boardDescription" rows="2" placeholder="Enter Description"></textarea> </div> </div> </div> <div class="modal-footer">  <button type="button" class="btn btn-outline-success" id="btnAddDataBoard">ADD</button> </div> </div> </form> </div> </div>'
            );
        }

        var projectCategory = $('#projectCategory');
        var projectCategorySetting = $('#projectCategorySetting');
        var dataStatus = $('#projectStatusSetting');
        var selectedStatus = dataStatus.val();
        dataStatus.empty();
        projectCategory.empty();
        dataProjectCategory.data.forEach(function(data) {
            projectCategory.append('<option value="' + data.guid + '" ' + '>' + data.category_name + '</option>');
        });
        if (selectedStatus === 'ongoingProjectSetting') {
            dataStatus.append('<option value="projectOngoingSetting">Ongoing</option>');
            dataStatus.append('<option value="projectFinishedSetting">Finished</option>');
        } else {
            dataStatus.append('<option value="projectFinishedSetting">Finished</option>');
            dataStatus.append('<option value="projectOngoingSetting">Ongoing</option>');
        }

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
                    location.reload();
                    toastr.options.closeButton = true;
                    toastr.options.timeOut = 1000;
                    // toastr.options.onHidden = function() {}
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

        // Start Edit Data project
        $('#formProjectSetting').on('submit', function(e) {
            e.preventDefault();
            var guid = $('#projectGuidSetting').val();
            var project_name = $('#projectNameSetting').val();
            var description = $('#projectDescriptionSetting').val();
            var start_date = $('#projectStartDateSetting').val();
            var end_date = $('#projectEndDateSetting').val();
            var status = $('#projectStatusSetting').val();
            var project_category_guid = $('#projectCategorySetting').val();
            if (status === "projectOngoingSetting") {
                status = "ongoing"
            } else {
                status = "finished"
            }
            $.ajax({
                type: "PUT",
                url: "{{ env('URL_API') }}/api/v1/project",
                data: {
                    "guid": guid,
                    "project_name": project_name,
                    "description": description,
                    "start_date": start_date,
                    "end_date": end_date,
                    "status": status,
                    "project_category_guid": project_category_guid,
                    "project_manager_guid": "25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9" //
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
                    $('#modalProjectSetting').modal('hide');
                    location.reload();
                    toastr.options.closeButton = true;
                    toastr.options.timeOut = 1000;
                    toastr.options.onHidden = function() {}
                    toastr.success(
                        "Success edit data", "Success"
                    );
                    var judulProjectElemen = document.getElementById(
                        'judulProject');
                    judulProjectElemen.textContent = project_name;
                    var descriptionProjectElemen = document.getElementById(
                        'descriptionProject');
                    descriptionProjectElemen.textContent = description;
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
        // End Edit Data Project

        // Start Delete Data Project
        $(document).on('click', '#deleteBtnProject', function(e) {
            e.preventDefault();
            $.ajax({
                type: "DELETE",
                url: "{{ env('URL_API') }}/api/v1/project/" + selectedGUIDProject,
                data: {},
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
                    $('#modalProjectSetting').modal('hide');
                    location.reload();
                    window.location.href = "{{ route('index-project_management') }}";
                    toastr.options.closeButton = true;
                    toastr.options.timeOut = 1000;
                    toastr.options.onHidden = function() {}
                    toastr.success(
                        "Success delete data", "Success"
                    );
                    var judulProjectElemen = document.getElementById(
                        'judulProject');
                    judulProjectElemen.textContent = "";
                    var descriptionProjectElemen = document.getElementById(
                        'descriptionProject');
                    descriptionProjectElemen.textContent = description;
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
        // End Delete Data Project

        // Start Add Data Board
        $(document).on('click', '#btnAddDataBoard', function(e) {
            e.preventDefault();
            var guid = null;
            var board_name = $('#boardName').val();
            var description = $('#boardDescription').val();
            var project_guid = selectedGUIDProject;

            $.ajax({
                type: "POST",
                url: "{{ env('URL_API') }}/api/v1/board",
                data: {
                    "guid": guid,
                    "board_name": board_name,
                    "description": description,
                    "project_guid": project_guid,
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
                    $('#modalAddBoard').modal('hide');
                    location.reload();
                    toastr.options.closeButton = true;
                    toastr.options.timeOut = 1000;
                    toastr.options.onHidden = function() {}
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
        })
        // End Add Data Board

        // Start Edit Data Board
        $(document).on('click', '#btnEditBoard', function(e) {
            var selectedEditBoardButton = $(this).val();
            $(document).on('click', '#btnEditDataBoard' + selectedEditBoardButton, function(e) {
                e.preventDefault();
                var guid = selectedEditBoardButton;
                var board_name = $('#boardNameEdit' + selectedEditBoardButton).val();
                var description = $('#boardDescriptionEdit' + selectedEditBoardButton).val();
                var project_guid = selectedGUIDProject;

                $.ajax({
                    type: "PUT",
                    url: "{{ env('URL_API') }}/api/v1/board",
                    data: {
                        "guid": guid,
                        "board_name": board_name,
                        "description": description,
                        "project_guid": project_guid,
                    },
                    beforeSend: function(request) {
                        request
                            .setRequestHeader(
                                "Authorization",
                                "Bearer {{ $token }}"
                            );
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
                        $('#modalEditBoard' + selectedEditBoardButton).modal('hide');
                        location.reload();
                        toastr.options.closeButton = true;
                        toastr.options.timeOut = 1000;
                        toastr.options.onHidden = function() {}
                        toastr.success(
                            "Success edit data",
                            "Success");
                    },
                    error: function(xhr, status, error) {
                        $.unblockUI();
                        var jsonResponse = JSON.parse(xhr.responseText);
                        toastr.options.closeButton = true;
                        toastr.error(jsonResponse['message'], "Error");
                    }
                });
            });

        });
        // End Edit Data Board

        // Start Delete Data Board
        $(document).on('click', '#btnDeleteBoard', function(e) {
            var selectedDeleteBoardButton = $(this).val();
            e.preventDefault();
            $.ajax({
                type: "DELETE",
                url: "{{ env('URL_API') }}/api/v1/board/" + selectedDeleteBoardButton,
                data: {},
                beforeSend: function(request) {
                    request
                        .setRequestHeader(
                            "Authorization",
                            "Bearer {{ $token }}"
                        );
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
                    location.reload();
                    toastr.options.closeButton = true;
                    toastr.options.timeOut = 1000;
                    toastr.options.onHidden = function() {}
                    toastr.success("Success delete data", "Success");
                },
                error: function(xhr, status, error) {
                    $.unblockUI();
                    var jsonResponse = JSON.parse(xhr.responseText);
                    toastr.options.closeButton = true;
                    toastr.error(jsonResponse['message'], "Error");
                }
            });
        });
        // End Delete Data Board

    })
</script>
@endsection