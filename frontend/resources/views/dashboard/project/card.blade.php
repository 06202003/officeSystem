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

        <div class="container-l flex-grow-1 my-3">
            <div class="listCatalogs" style="display: flex; flex-wrap: nowrap; overflow-x: auto;" id="sortable-4">

            </div>
        </div>

        <div class=" bottom-0 end-0" id="btnAddCatalog">

        </div>

        <!-- Button trigger modal -->
        <button type="button" class="border-0 m-0 p-0 w-100 rounded d-none" data-bs-toggle="modal"
            data-bs-target="#guidCardSelected" id="triggerModalBtn" value="">asd</button>
        <!-- Modal -->

        <div class="modal fade" id="guidCardSelected" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">

            <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                <form id="formCardEdit" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <input type="text" class="form-control border-0 d-none" id="editCardGuid" value="">
                            <input type="text" class="form-control border-0 d-none" id="editCardStatus"
                                value="">
                            <input type="text" class="form-control border-0 d-none" id="editCardOrder"
                                value="">
                            <input type="text" class="form-control border-0 d-none" id="editCardCatalogGuid"
                                value="">

                            <div class="form-floating">
                                <input type="text" class="form-control border-0" id="editCardName" value=""
                                    aria-describedby="floatingInputHelp">
                                <label for="floatingInput"></label>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="btnCloseCard"></button>

                        </div>
                        <div class="modal-body">

                            <label for="cardDeadlineEdit" class="form-label">Deadline</label>
                            <input type="datetime-local" id="cardDeadlineEdit" class="form-control" value="">

                            <div class="mb-3" id="image-block">
                                <label class="form-label" for="basic-default-fullname">Image</label>
                                <input class="form-control" type="file" id="image"
                                    accept=".png, .PNG, .jpg, .JPG, .jpeg, .JPEG">
                                <img class="mt-3" src="" id="uploaded-image" height="200px" />
                                <input class="form-control d-none" type="text" id="image-url" readonly
                                    value="">
                                <input type="hidden" id="old-image-url">
                            </div>

                            <div class="my-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" id="editCardDescription" rows="2" value=""></textarea>
                            </div>

                            <div class="m-0 p-0" id="listChecklistInCard">
                                <div class="my-3">

                                </div>
                            </div>

                            <div class="my-3">
                                <div class="row">
                                    <div class="col-6 col-sm-10">
                                        <label class="form-label">Add Checklist</label>
                                        <input type="text" class="form-control" placeholder="Name Checklist"
                                            id="nameChecklist">
                                    </div>
                                    <div class="col-6 col-sm-2 mt-4">
                                        <button type="button" class="btn btn-success" id="addBtnChecklist"> <i
                                                class="ti ti-plus"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-danger" id="deleteBtnCard" value="">
                                <i class="menu-icon tf-icons ti ti-trash m-0 p-0"></i>
                            </button>

                            <button type="button" class="btn btn-success" id="saveBtnCard" value="">Save
                                changes</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>

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
        var dataCatalog = <?php echo json_encode($dataCatalog, JSON_PRETTY_PRINT); ?>;
        var dataCard = <?php echo json_encode($dataCard, JSON_PRETTY_PRINT); ?>;
        var datachecklist = <?php echo json_encode($datachecklist, JSON_PRETTY_PRINT); ?>;
        var dataChecklistItem = <?php echo json_encode($dataChecklistItem, JSON_PRETTY_PRINT); ?>;

        var currentURL = window.location.href;
        var URLProject = currentURL.substring(0, currentURL.indexOf("/project/"));
        var URLBoard = currentURL.substring(0, currentURL.indexOf("/board/"));

        var selectedGUIDProject = localStorage.getItem('selectedGUIDProject');
        var selectedGUIDBoard = localStorage.getItem('selectedGUIDBoard');
        var selectedGUIDCard = localStorage.getItem('selectedGUIDCard');

        $(document).ready(function() {
            console.log($("#uploaded-image").attr("src"));
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

            function updateBoardList() {
                var dataTarget = $('#listBoards');
                dataTarget.empty();
                dataBoard.data.forEach(function(data) {
                    if (selectedGUIDProject === data.project.guid) {
                        dataTarget.append(
                            '<div class="col m-1 p-0 d-flex justify-content-center"> <!-- Example split danger button --> <div class="btn-group"> <input type="radio" class="btn-check" value="' +
                            data.guid + '" name="btnradio" id="' + data.guid +
                            '" autocomplete="off"> <label class="btn btn-outline-primary" for="' +
                            data.guid + '">' + data.board_name +
                            '</label> <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" value="' +
                            data.guid +
                            '" id="btnSettingBoard"> <span class="visually-hidden">Toggle Dropdown</span> </button> <ul class="dropdown-menu"> <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#modalEditBoard' +
                            data.guid + '" id="btnEditBoard" value="' + data.guid +
                            '">Edit</button> </li> <li><button class="dropdown-item" id="btnDeleteBoard" value="' +
                            data.guid +
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

            function generateChecklistItem(dataChecklistItem) {
                var listChecklistItem = '';

                datachecklist.data.forEach(function(data) {
                    if (dataChecklistItem === data.guid) {
                        data.checklist_item.forEach(function(item) {
                            listChecklistItem += `
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" type="checkbox" >
                        </div>
                        <input type="text" class="form-control" value="${item.checklist_item_name}">
                        <button class="btn btn-danger" id="" value="">
                            <i class="menu-icon tf-icons ti ti-trash m-0 p-0"></i>
                        </button>
                    </div>`
                        });
                    }
                })

                return listChecklistItem;
            }

            function updateCatalogList(selectedGUIDBoard) {
                var sortedData = dataCatalog.data.sort((a, b) => a.order - b.order);
                var dataTargets = $('.listCatalogs');
                dataTargets.empty();
                sortedData.forEach(function(data) {
                    if (selectedGUIDBoard === data.board_guid) {
                        data.card.sort((a, b) => a.order - b.order);
                        var cardHtml = '';
                        var listChecklistHtml = '';

                        data.card.forEach(function(card) {
                            var projectCategory = $('#projectCategory');

                            var cardGuidShowed = card.guid;
                            dataCard.data.forEach(function(data) {

                                if (cardGuidShowed === data.guid) {
                                    data.checklist.forEach(function(dataChecklist) {
                                        var listChecklistItem = '';
                                        var dataChecklistItem = dataChecklist.guid
                                        listChecklistItem += generateChecklistItem(
                                            dataChecklistItem)
                                        listChecklistHtml += ` <div class="my-3">
                                                        <div class="accordion" id="">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header">
                                                                    <div class="input-group flex-nowrap">
                                                                        <span class="input-group-text" id="addon-wrapping"><i class="ti ti-check"></i></span>
                                                                        <input type="text" class="form-control" placeholder="${dataChecklist.checklist_name}" value="${dataChecklist.checklist_name}">
                                                                        <button class="btn btn-danger" id="" value="">
                                                                            <i class="menu-icon tf-icons ti ti-trash m-0 p-0"></i>
                                                                        </button>
                                                                        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#panelsChecklist-${dataChecklist.guid}" aria-expanded="true" aria-controls="panelsChecklist-${dataChecklist.guid}">V</button>
                                                                    </div>
                                                                </h2>
                                                                <div id="panelsChecklist-${dataChecklist.guid}" class="accordion-collapse collapse show">
                                                                    <div class="accordion-body">
                                                                        <div class="my-2">

                                                                            ${listChecklistItem}

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-6 col-sm-10">
                                                                                <label class="form-label">Add Checklist Item</label>
                                                                                <input type="text" class="form-control" placeholder="Name Checklist" id="nameChecklistasdas" />
                                                                            </div>
                                                                            <div class="col-6 col-sm-2 mt-4">
                                                                                <button type="button" class="btn btn-success" id="addBtnChecklist${card.guid}"> <i class="ti ti-plus"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> `;
                                    })
                                    // $("#uploaded-image").attr("src", card.img_url);
                                }
                            });
                        });

                        dataTargets.append(`
                        <div class="col-2 me-3">
                            <div class="card mb-3">
                                <div class="card-header cursor-move">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="m-0">${data.list_name}</p>
                                        <span class="text-end">
                                            <i type="button" class="text-secondary menu-icon tf-icons ti ti-settings m-0 p-0 text-end" data-bs-toggle="modal" data-bs-target="#modalCatalogSetting${data.guid}" id="btnCatalogSetting"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush" id="listCard-${data.list_name}-${data.guid}">
                                        ${cardHtml}
                                    </ul>

                                    <button class="btn btn-primary m-0 p-3 w-100" id="btnAddDataCard${data.guid}" data-bs-toggle="modal" data-bs-target="#modalCardAdd${data.guid}"> <i class="ti ti-plus"></i> Add Card </button> 

                                    <div class="modal fade" id="modalCardAdd${data.guid}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Card to ${data.list_name}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                    <div class="col mb-3 d-none">
                                                            <input type="text" id="cardCatalogGuid${data.guid}" class="form-control" placeholder="Enter Name" value="${data.guid}">
                                                            <input type="text" id="cardStatus${data.guid}" class="form-control" placeholder="Enter Name" value="active">
                                                        </div>

                                                        <div class="col mb-3">
                                                            <label for="cardName" class="form-label">Card Name</label>
                                                            <input type="text" id="cardName${data.guid}" class="form-control" placeholder="Enter Name">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label for="cardDeadline" class="form-label">Deadline</label>
                                                            <input type="datetime-local" id="cardDeadline${data.guid}" class="form-control" placeholder="Enter Deadline">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="cardDescription" class="form-label">Description</label>
                                                            <textarea name="cardDescription" id="cardDescription${data.guid}" cols="20" rows="3" placeholder="Enter Description" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" id="addDataCard" value="${data.guid}">ADD</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>`);
                        var Tasks = document.getElementById(`listCard-${data.list_name}-${data.guid}`);
                        Sortable.create(Tasks, {
                            animation: 150,
                            group: 'TaskList'
                        });

                        // Modal untuk pengaturan katalog
                        var modalCatalogSetting = `
                        <div class="modal fade" id="modalCatalogSetting${data.guid}" tabindex="-1" aria-hidden="true">
                            <form id="formCatalogSetting" enctype="multipart/form-data">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Catalog ${data.list_name}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <input type="text" id="catalogGuidSetting" class="form-control d-none" placeholder="Enter Name" value="${data.guid}">
                                                    <label for="catalogEditName${data.guid}" class="form-label">Catalog Name</label>
                                                    <input type="text" id="catalogEditName${data.guid}" class="form-control" value="${data.list_name}">
                                                    <input type="text" id="catalogBoard" class="form-control d-none" value="${selectedGUIDBoard}">
                                                </div>
                                                <div class="col mb-3">
                                                    <label for="catalogEditDescription${data.guid}" class="form-label">Description</label>
                                                    <textarea name="catalogEditDescription${data.guid}" id="catalogEditDescription${data.guid}" cols="20" rows="3" class="form-control">${data.description}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" id="deleteBtnCatalog" value="${data.guid}"><i class="menu-icon tf-icons ti ti-trash m-0 p-0"></i></button>
                                            <button type="submit" class="btn btn-success" id="btnEditDataCatalog" value="${data.guid}">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>`;

                        $("body").append(modalCatalogSetting);
                    }
                });
            }
            updateCatalogList(selectedGUIDBoard)


            $('#listProjects').on('change', 'input[type="radio"]', function() {
                var selectedProjects = $(this).val();
                window.location.href = URLProject + '/project/' + selectedProjects;
            });

            $('#listBoards').on('change', 'input[type="radio"]', function() {
                var selectedBoard = $(this).val();
                window.location.href = URLBoard + '/board/' + selectedBoard;
            });

            var dataJudul = $('#judulProject');
            dataJudul.empty();
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

                    var projectCategorySetting = $('#projectCategorySetting');
                    projectCategorySetting.empty();
                    dataProjectCategory.data.forEach(function(dataProCa) {
                        projectCategorySetting.append('<option value="' + dataProCa.guid + '"' +
                            '>' + dataProCa.category_name + '</option>');
                    });
                    projectNamesDisplayed[selectedGUIDProject] = true;
                }
            });

            var projectButton = document.getElementById('triggerModalBtn');
            var editCardGuid = document.getElementById('editCardGuid');
            var editCardStatus = document.getElementById('editCardStatus');
            var editCardOrder = document.getElementById('editCardOrder');
            var editCardCatalogGuid = document.getElementById('editCardCatalogGuid');
            var editCardImage = $('#image-url').val();
            // console.log(editCardImage);
            var editCardName = document.getElementById('editCardName');
            var cardDeadlineEdit = document.getElementById('cardDeadlineEdit');
            var editCardDescription = document.getElementById('editCardDescription');
            var editImage = document.getElementById('uploaded-image');

            var listChecklistInCard = document.getElementById('listChecklistInCard')


            var selectedChecklist = null
            datachecklist.data.forEach(function(dataCheck) {
                if (dataCheck.card_guid === selectedGUIDCard) {

                    selectedChecklist = dataCheck.guid
                    listChecklistInCard.innerHTML += `
                <div class="my-3">
                                <!--  -->
                                <div class="accordion" id="${dataCheck.guid}">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><i class="ti ti-check"></i></span>
                                                <input type="text" class="form-control" value="${dataCheck.checklist_name}" id="checklistName-${dataCheck.guid}">
                                                <button class="btn btn-danger" id="deleteChecklist" value="${dataCheck.guid}">
                                                    <i class="menu-icon tf-icons ti ti-trash m-0 p-0"></i>
                                                </button>
                                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#panelsChecklist-${dataCheck.guid}" aria-expanded="true" aria-controls="panelsChecklist-${dataCheck.guid}">V</button>
                                            </div>
                                        </h2>
                                        <div id="panelsChecklist-${dataCheck.guid}" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <div class="my-2" id="listChecklistItemInCard-${dataCheck.guid}">
                                                    <!--  -->
                                                    
                                                    <!--  -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 col-sm-10">
                                                        <label class="form-label">Add Checklist Item</label>
                                                        <input type="text" class="form-control" placeholder="Name Checklist Item" id="nameChecklistItem-${dataCheck.guid}" />
                                                    </div>
                                                    <div class="col-6 col-sm-2 mt-4">
                                                        <button type="button" class="btn btn-success" id="addBtnChecklistItem" value="${dataCheck.guid}"> <i class="ti ti-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                            </div>
                `
                    dataChecklistItem.data.forEach(function(dataCheckItem) {
                        var listChecklistItemInCard = document.getElementById(
                            'listChecklistItemInCard-' + dataCheckItem.checklist_guid)
                        var isChecked = dataCheckItem.checked === 1 ? 'checked' : '';

                        if (dataCheckItem.checklist_guid === selectedChecklist) {
                            listChecklistItemInCard.innerHTML += `
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" ${isChecked}>
                                </div>
                                <input type="text" class="form-control" value="${dataCheckItem.checklist_item_name}" id="editChecklistItem-${dataCheckItem.guid}">
                                <button class="btn btn-danger" id="deleteChecklistItem" value="${dataCheckItem.guid}">
                                    <i class="menu-icon tf-icons ti ti-trash m-0 p-0"></i>
                                </button>
                            </div>
                        `;

                        }
                    })
                }
            });

            datachecklist.data.forEach(function(dataChecks) {
                if (dataChecks.card_guid === selectedGUIDCard) {
                    var checklistName = document.getElementById('checklistName-' + dataChecks.guid);
                    checklistName.addEventListener('blur', function() {
                        $.ajax({
                            type: "PUT",
                            url: "{{ env('URL_API') }}/api/v1/checklist",
                            data: {
                                "guid": dataChecks.guid,
                                "checklist_name": this.value,
                                "status": dataChecks.status,
                                "card_guid": selectedGUIDCard,
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
                                location.reload();
                                toastr.options.closeButton = true;
                                toastr.options.timeOut = 500;
                                toastr.options.onHidden = function() {}
                                toastr.success("Success edit data", "Success");
                            },
                            error: function(xhr, status, error) {
                                $.unblockUI();
                                var jsonResponse = JSON.parse(xhr.responseText);
                                toastr.options.closeButton = true;
                                toastr.error(jsonResponse['message'], "Error");
                            }
                        });
                    });

                    dataChecklistItem.data.forEach(function(dataChecksItem) {
                        if (dataChecksItem.checklist_guid === dataChecks.guid) {
                            var editChecklistItem = document.getElementById('editChecklistItem-' +
                                dataChecksItem.guid);
                            editChecklistItem.addEventListener('blur', function() {
                                $.ajax({
                                    type: "PUT",
                                    url: "{{ env('URL_API') }}/api/v1/checklist-item",
                                    data: {
                                        "guid": dataChecksItem.guid,
                                        "checklist_item_name": this.value,
                                        "status": dataChecksItem.status,
                                        "checklist_guid": dataChecks.guid,
                                        "checked": dataChecksItem.checked,
                                    },
                                    beforeSend: function(request) {
                                        request.setRequestHeader(
                                            "Authorization",
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
                                        location.reload();
                                        toastr.options.closeButton = true;
                                        toastr.options.timeOut = 500;
                                        toastr.options.onHidden = function() {}
                                        toastr.success("Success edit data",
                                            "Success");
                                    },
                                    error: function(xhr, status, error) {
                                        $.unblockUI();
                                        var jsonResponse = JSON.parse(xhr
                                            .responseText);
                                        toastr.options.closeButton = true;
                                        toastr.error(jsonResponse['message'],
                                            "Error");
                                    }
                                });
                            })
                        }
                    })
                }
            });

            projectButton.value = selectedGUIDCard;
            projectButton.click();
            dataCard.data.forEach(function(data) {
                if (data.guid === selectedGUIDCard) {
                    editCardGuid.value = data.guid;
                    editCardStatus.value = data.status;
                    editCardOrder.value = data.order;
                    editCardCatalogGuid.value = data.catalog.guid;
                    editCardName.value = data.card_name;
                    cardDeadlineEdit.value = data.deadline;
                    editCardDescription.value = data.description;
                    if (data.img_url) {
                        editImage.src = data.img_url;
                    }

                }
            })

            $(document).on('click', '#btnCloseCard', function(e) {
                e.preventDefault();
                var currentUrl = window.location.href;
                var urlParts = currentUrl.split('/');

                // Menghapus dua bagian terakhir dari array (dua slash terakhir)
                urlParts.pop();
                urlParts.pop();

                // Menggabungkan kembali array menjadi URL baru
                var newUrl = urlParts.join('/');
                window.location.href = newUrl;
            })

            // Start Edit Data Card
            $(document).on('click', '#saveBtnCard', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "PUT",
                    url: "{{ env('URL_API') }}/api/v1/card",
                    data: {
                        "guid": selectedGUIDCard,
                        "card_name": editCardName.value,
                        "description": editCardDescription.value,
                        "deadline": cardDeadlineEdit.value,
                        "order": editCardOrder.value,
                        "status": editCardStatus.value,
                        "catalog_guid": editCardCatalogGuid.value,
                        "img_url": $('#image-url').val()
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
                        $('#modalCatalogSetting' + selectedGUIDCard).modal('hide');
                        location.reload();
                        toastr.options.closeButton = true;
                        toastr.options.timeOut = 500;
                        toastr.options.onHidden = function() {}
                        toastr.success("Success edit data", "Success");
                    },
                    error: function(xhr, status, error) {
                        $.unblockUI();
                        var jsonResponse = JSON.parse(xhr.responseText);
                        toastr.options.closeButton = true;
                        toastr.error(jsonResponse['message'], "Error");
                    }
                });

            });
            // End Edit Data Card

            // Start Delete Data Card
            $(document).on('click', '#deleteBtnCard', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "DELETE",
                    url: "{{ env('URL_API') }}/api/v1/card/" + selectedGUIDCard,
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
                        $('#guidCard' + selectedGUIDCard).modal('hide');
                        window.location.href = URLBoard + '/board/' + selectedGUIDBoard;;
                        toastr.options.closeButton = true;
                        toastr.options.timeOut = 500;
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
            // End Delete Data Card

            // Start Add Data Checklist
            $(document).on('click', '#addBtnChecklist', function(e) {
                e.preventDefault();
                var status = "active";
                var checklist_name = $("#nameChecklist").val();
                $.ajax({
                    type: "POST",
                    url: "{{ env('URL_API') }}/api/v1/checklist",
                    data: {
                        "guid": null,
                        "checklist_name": checklist_name,
                        "status": status,
                        "card_guid": selectedGUIDCard,
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
            });
            // End Add Data Checklist

            // Start Add Data Checklist Item
            $(document).on('click', '#addBtnChecklistItem', function(e) {
                e.preventDefault();
                var dataCheclistSelect = $(this).val()
                var status = "active";
                var checklist_item_name = $("#nameChecklistItem-" + dataCheclistSelect).val();
                var checked = 0;
                var checklist_guid = dataCheclistSelect;
                $.ajax({
                    type: "POST",
                    url: "{{ env('URL_API') }}/api/v1/checklist-item",
                    data: {
                        "guid": null,
                        "checklist_item_name": checklist_item_name,
                        "status": status,
                        "checklist_guid": checklist_guid,
                        "checked": checked,
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
            });
            // End Add Data Checklist Item

            // Start Delete Data Checklist item
            $(document).on('click', '#deleteChecklistItem', function(e) {
                e.preventDefault();
                var checklistItemGUID = $(this).val();
                $.ajax({
                    type: "DELETE",
                    url: "{{ env('URL_API') }}/api/v1/checklist-item/" + checklistItemGUID,
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
                        location.reload();
                        toastr.options.closeButton = true;
                        toastr.options.timeOut = 500;
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
            // End Delete Data Checklist item

            // Start Delete Data Checklist
            $(document).on('click', '#deleteChecklist', function(e) {
                e.preventDefault();
                var checklistGUID = $(this).val();
                $.ajax({
                    type: "DELETE",
                    url: "{{ env('URL_API') }}/api/v1/checklist/" + checklistGUID,
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
                        location.reload();
                        toastr.options.closeButton = true;
                        toastr.options.timeOut = 500;
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
            // End Delete Data Checklist

        })
    </script>
@endsection
