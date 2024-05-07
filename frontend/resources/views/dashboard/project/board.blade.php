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

    <head>
        <style>
            .blur-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(50, 50, 50, 0.5);
                backdrop-filter: blur(10px);
                z-index: 9999;
            }

            .content {
                position: relative;
                z-index: 10000;
            }
        </style>
    </head>
    <div class="" id="blurOverlay"></div>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y contentBlur">
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
            <div class="card-body">
                <hr>
                <p id="descriptionBoard">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </div>
        </div>

        <!-- End List Board -->

        <div class="container-l flex-grow-1 my-3">
            <div class="listCatalogs" style="display: flex; flex-wrap: nowrap; overflow-x: auto;" id="sortableCatalog">

            </div>
        </div>

        <div class=" bottom-0 end-0" id="btnAddCatalog">

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
        var dataBoard = <?php echo json_encode($dataBoard, JSON_PRETTY_PRINT); ?>;
        var dataCatalog = <?php echo json_encode($dataCatalog, JSON_PRETTY_PRINT); ?>;
        var dataCard = <?php echo json_encode($dataCard, JSON_PRETTY_PRINT); ?>;
        var datachecklist = <?php echo json_encode($datachecklist, JSON_PRETTY_PRINT); ?>;

        var currentURL = window.location.href;
        var URLProject = currentURL.substring(0, currentURL.indexOf("/project/"));
        var URLBoard = currentURL.substring(0, currentURL.indexOf("/board/"));
        var selectedGUIDProject = localStorage.getItem('selectedGUIDProject');
        var selectedGUIDBoard = localStorage.getItem('selectedGUIDBoard');

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
                var dataDescriptionBoard = $('#descriptionBoard');
                dataTargets.empty();
                dataDescriptionBoard.empty();
                var foundBoard = dataBoard.data.find(function(item) {
                    return item.guid === selectedGUIDBoard;
                });

                if (foundBoard) {
                    dataDescriptionBoard.append(foundBoard.description)
                } else {
                    dataDescriptionBoard.append("No Description")
                }
                var dropdownCatalogInCard = '';
                var dropdownOptions = [];

                dataCatalog.data.forEach(function(item) {
                    dropdownOptions.push({
                        guid: item.guid,
                        list_name: item.list_name
                    });
                });

                dropdownOptions.forEach(function(option) {
                    dropdownCatalogInCard += `<option value="${option.guid}">${option.list_name}</option>`;
                });

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
                                                                                <input type="text" class="form-control" placeholder="Name Checklist" id="nameChecklist" />
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
                                    cardHtml += `
                                <li class="mb-2 drag-item cursor-move d-flex justify-content-between align-items-center cardSelected" style="cursor: pointer;" id="cardSelected${card.guid}" data-catalog="${data.catalog_guid}" value="${card.guid}">
                                <button class="border-0 m-0 p-0 w-100 rounded" data-bs-toggle="modal" data-bs-target="#guidCard${card.guid}" value="${card.guid}">
                                    <div class="card bg-dark">
                                        
                                        ${card.img_url ? `<img src="${card.img_url}" alt="Img Url" class="rounded-top">` : ''}

                                        <div class="card-body rounded-bottom m-0 p-0">
                                            <p class="text-white m-3 text-start">${card.card_name}</p>
                                            <p class="text-white m-3 text-end">${card.order}</p>
                                        </div>
                                    </div>
                                </button>
                                <button class="btn bg-primary p-0 m-0 d-none" style="position: absolute; left: 88%; z-index: 100;" id="dropdownCatalog-${card.guid}">
                                    <div class="card p-0 m-0" style="width: 8rem;">
                                        <div class="card-body p-3 m-0">
                                        <a id="closeButtonDropdown-${card.guid}" class="btn-primary d-block rounded-1 p-1" style="position: absolute; bottom: 90px; right: 0%; transform: translateX(50%);"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style="width: 25px; height: 25px;">
                                        <path fill="#ffffff" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                                    </svg>
                                    </a>
                                            <p class="card-title">Move To <i class="ti ti-arrow-right"></i> ?</p>
                                            <select class="form-select" aria-label="Default select example" id="dropdownSelect-${card.guid}">
                                                <option selected>Select Catalog</option>
                                                ${dropdownCatalogInCard}
                                            </select>                                
                                            </div>
                                        </div>
                                    </button>
                                </li>`;
                                }
                            });
                        });


                        dataTargets.append(`
                    <div class="col-2 me-3" id="Catalog-${data.guid}">
                            <div class="card mb-3">
                                <div class="card-header cursor-move">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="m-0">${data.list_name} --- ${data.order}</p>
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
                        var sortableCard = Sortable.create(Tasks, {
                            animation: 150,
                            group: `TaskList-${data.guid}`,
                            onEnd: function(evt) {
                                var movedCardId = evt.item.id;
                                var dataGuidCatalogMovedCard = evt.item.dataset.catalog;

                                var newIndexCard = Array.from(evt.to.children).indexOf(evt
                                    .item);
                                var newOrderCard = newIndexCard + 1;

                                var otherIndexesCard = [];
                                Array.from(evt.to.children).forEach(function(item, index) {
                                    if (index !== newIndexCard) {
                                        otherIndexesCard.push(index + 1);
                                    }
                                });

                                var movedCard = dataCard.data.find(function(item) {
                                    return 'cardSelected' + item.guid === movedCardId;
                                });

                                var movedCardDataCatalog = dataCatalog.data.find(function(
                                    item) {
                                    return item.guid === dataGuidCatalogMovedCard;
                                });

                                var notMovedCard = dataCard.data.filter(function(item) {
                                    return 'cardSelected' + item.guid !== movedCardId &&
                                        item.catalog_guid === movedCard.catalog_guid;
                                });

                                notMovedCard.sort(function(a, b) {
                                    return a.order - b.order;
                                });

                                for (let i = 0; i < notMovedCard.length; i++) {
                                    var parts = notMovedCard[i].deadline.split(/[\s-:]/);
                                    var year = parts[0];
                                    var month = parts[1];
                                    var day = parts[2];
                                    var hours = parts[3];
                                    var minutes = parts[4];
                                    var originalDate = new Date(year, month - 1, day, hours,
                                        minutes);
                                    var formattedDateTime =
                                        `${originalDate.getFullYear()}-${('0' + (originalDate.getMonth() + 1)).slice(-2)}-${('0' + originalDate.getDate()).slice(-2)}T${('0' + originalDate.getHours()).slice(-2)}:${('0' + originalDate.getMinutes()).slice(-2)}`;
                                    $.ajax({
                                        type: "PUT",
                                        url: "{{ env('URL_API') }}/api/v1/card",
                                        data: {
                                            "guid": notMovedCard[i].guid,
                                            "card_name": notMovedCard[i].card_name,
                                            "description": notMovedCard[i].description,
                                            "deadline": formattedDateTime,
                                            "order": otherIndexesCard[i],
                                            "catalog_guid": data.guid,
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
                                            toastr.options.closeButton = true;
                                            toastr.options.timeOut = 1000;
                                            toastr.options.onHidden = function() {}
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
                                }

                                if (movedCard.order !== newOrderCard) {
                                    movedCard.order = newOrderCard;
                                    var parts = movedCard.deadline.split(/[\s-:]/);
                                    var year = parts[0];
                                    var month = parts[1];
                                    var day = parts[2];
                                    var hours = parts[3];
                                    var minutes = parts[4];
                                    var originalDate = new Date(year, month - 1, day, hours,
                                        minutes);
                                    var formattedDateTime =
                                        `${originalDate.getFullYear()}-${('0' + (originalDate.getMonth() + 1)).slice(-2)}-${('0' + originalDate.getDate()).slice(-2)}T${('0' + originalDate.getHours()).slice(-2)}:${('0' + originalDate.getMinutes()).slice(-2)}`;
                                    $.ajax({
                                        type: "PUT",
                                        url: "{{ env('URL_API') }}/api/v1/card",
                                        data: {
                                            "guid": movedCard.guid,
                                            "card_name": movedCard.card_name,
                                            "description": movedCard.description,
                                            "deadline": formattedDateTime,
                                            "order": movedCard.order,
                                            "catalog_guid": data.guid,
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
                                            toastr.options.timeOut = 1000;
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
                                }
                            }
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
                    } else {
                        console.error("no data")
                    }
                });
                var sortableCatalog = document.getElementById('sortableCatalog');
                var sortable = Sortable.create(sortableCatalog, {
                    animation: 150,
                    onEnd: function(evt) {
                        var movedItemId = evt.item.id;
                        var newIndex = Array.from(evt.to.children).indexOf(evt.item);
                        var newOrder = newIndex + 1;
                        var otherIndexes = [];
                        Array.from(evt.to.children).forEach(function(item, index) {
                            if (index !== newIndex) {
                                otherIndexes.push(index + 1);
                            }
                        });
                        var movedItem = dataCatalog.data.find(function(item) {
                            return 'Catalog-' + item.guid === movedItemId;
                        });
                        var notMovedItems = dataCatalog.data.filter(function(item) {
                            return 'Catalog-' + item.guid !== movedItemId;
                        });
                        for (let i = 0; i < notMovedItems.length; i++) {
                            if (otherIndexes[i] !== notMovedItems[i].order) {
                                $.ajax({
                                    type: "PUT",
                                    url: "{{ env('URL_API') }}/api/v1/catalog",
                                    data: {
                                        "guid": notMovedItems[i].guid,
                                        "list_name": notMovedItems[i].list_name,
                                        "description": notMovedItems[i].description,
                                        "board_guid": selectedGUIDBoard,
                                        "order": otherIndexes[i],
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
                                        toastr.options.onHidden = function() {}
                                    },
                                    error: function(xhr, status, error) {
                                        $.unblockUI();
                                        var jsonResponse = JSON.parse(xhr.responseText);
                                        toastr.options.closeButton = true;
                                        toastr.error(jsonResponse['message'], "Error");
                                    }
                                });
                            }
                        }
                        if (movedItem.order !== newOrder) {
                            movedItem.order = newOrder;
                            $.ajax({
                                type: "PUT",
                                url: "{{ env('URL_API') }}/api/v1/catalog",
                                data: {
                                    "guid": movedItem.guid,
                                    "list_name": movedItem.list_name,
                                    "description": 'description',
                                    "board_guid": selectedGUIDBoard,
                                    "order": newOrder,
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
                                    toastr.success("Success edit data", "Success");
                                },
                                error: function(xhr, status, error) {
                                    $.unblockUI();
                                    var jsonResponse = JSON.parse(xhr.responseText);
                                    toastr.options.closeButton = true;
                                    toastr.error(jsonResponse['message'], "Error");
                                }
                            });
                        }
                    }
                });

                dataCard.data.forEach(function(data) {
                    var cardElement = document.getElementById("cardSelected" + data.guid);
                    var buttonElement = document.getElementById("dropdownCatalog-" + data.guid);
                    var blurOverlay = document.getElementById("blurOverlay");
                    var contentBlur = document.getElementById("cardSelected" + data.guid);
                    var closeButtonDropdown = document.getElementById("closeButtonDropdown-" + data.guid);

                    if (cardElement && buttonElement && blurOverlay && contentBlur && closeButtonDropdown) {
                        cardElement.addEventListener("contextmenu", function(event) {
                            var cardElements = document.querySelectorAll(
                                '[id^="dropdownCatalog"]:not(.d-none)');
                            if (closeButtonDropdown) {
                                closeButtonDropdown.addEventListener("click", function() {
                                    buttonElement.classList.add("d-none");
                                    contentBlur.classList.remove("content");
                                    blurOverlay.classList.remove("blur-overlay");
                                });
                            }
                            if (!buttonElement.classList.contains("d-none")) {
                                buttonElement.classList.add("d-none");
                                contentBlur.classList.remove("content");
                                blurOverlay.classList.remove("blur-overlay");
                            } else if (cardElements.length > 0) {
                                cardElements.forEach(function(cardElement) {
                                    cardElement.classList.add("d-none");
                                });
                            } else {
                                buttonElement.classList.remove("d-none");
                                blurOverlay.classList.add("blur-overlay");
                                contentBlur.classList.add("content");
                            }
                            event.preventDefault();
                        });

                        var selectElement = document.getElementById('dropdownSelect-' + data.guid);
                        selectElement.addEventListener('change', (event) => {
                            var selectedOptionValue = event.target.value;
                            var foundCatalog = dataCatalog.data.find(function(item) {
                                return item.guid === selectedOptionValue;
                            });
                            var orders = foundCatalog.card.map(function(card) {
                                return card.order;
                            });
                            var maxOrder = orders.length > 0 ? orders.reduce(function(prev,
                                current) {
                                return Math.max(prev, current);
                            }, -Infinity) : 0;
                            dataCard.data.sort(function(a, b) {
                                return a.order - b.order;
                            });
                            console.log(data.catalog_guid);
                            let counter = 1;
                            dataCard.data.forEach(function(dataCards) {
                                if (data.catalog_guid === dataCards.catalog_guid && data
                                    .guid !== dataCards.guid) {
                                    var parts = dataCards.deadline.split(/[\s-:]/);
                                    var year = parts[0];
                                    var month = parts[1];
                                    var day = parts[2];
                                    var hours = parts[3];
                                    var minutes = parts[4];
                                    var originalDate = new Date(year, month - 1, day, hours,
                                        minutes);
                                    var formattedDateTime =
                                        `${originalDate.getFullYear()}-${('0' + (originalDate.getMonth() + 1)).slice(-2)}-${('0' + originalDate.getDate()).slice(-2)}T${('0' + originalDate.getHours()).slice(-2)}:${('0' + originalDate.getMinutes()).slice(-2)}`;
                                    $.ajax({
                                        type: "PUT",
                                        url: "{{ env('URL_API') }}/api/v1/card",
                                        data: {
                                            "guid": dataCards.guid,
                                            "card_name": dataCards.card_name,
                                            "description": dataCards.description,
                                            "deadline": formattedDateTime,
                                            "order": counter,
                                            "catalog_guid": dataCards.catalog_guid,
                                        },
                                        beforeSend: function(request) {
                                            request.setRequestHeader(
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
                                            buttonElement.classList.add(
                                                "d-none");
                                            contentBlur.classList.remove(
                                                "content");
                                            blurOverlay.classList.remove(
                                                "blur-overlay");
                                            toastr.options.closeButton = true;
                                            toastr.options.timeOut = 1000;
                                            toastr.options.onHidden =
                                                function() {}
                                        },
                                        error: function(xhr, status, error) {
                                            $.unblockUI();
                                            var jsonResponse = JSON.parse(xhr
                                                .responseText);
                                            toastr.options.closeButton = true;
                                            toastr.error(jsonResponse[
                                                'message'], "Error");
                                        }
                                    });
                                    counter++;
                                }
                            });
                            var parts = data.deadline.split(/[\s-:]/);
                            var year = parts[0];
                            var month = parts[1];
                            var day = parts[2];
                            var hours = parts[3];
                            var minutes = parts[4];
                            var originalDate = new Date(year, month - 1, day, hours, minutes);
                            var formattedDateTime =
                                `${originalDate.getFullYear()}-${('0' + (originalDate.getMonth() + 1)).slice(-2)}-${('0' + originalDate.getDate()).slice(-2)}T${('0' + originalDate.getHours()).slice(-2)}:${('0' + originalDate.getMinutes()).slice(-2)}`;
                            if (selectedOptionValue !== data.catalog_guid) {
                                $.ajax({
                                    type: "PUT",
                                    url: "{{ env('URL_API') }}/api/v1/card",
                                    data: {
                                        "guid": data.guid,
                                        "card_name": data.card_name,
                                        "description": data.description,
                                        "deadline": formattedDateTime,
                                        "order": maxOrder + 1,
                                        "catalog_guid": selectedOptionValue,
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
                                        buttonElement.classList.add("d-none");
                                        contentBlur.classList.remove("content");
                                        blurOverlay.classList.remove("blur-overlay");
                                        location.reload();
                                        toastr.options.closeButton = true;
                                        toastr.options.timeOut = 1000;
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
                            } else {
                                toastr.error("Cannot be moved to the same catalog", "Denied");
                            }
                        });
                    } else {
                        console.error("One or more elements are null.");
                    }
                });

            }
            if (dataCatalog.data.length > 0) {
                updateCatalogList(selectedGUIDBoard)
            } else {
                console.log("No Data Catalog")

            }

            $('#listProjects').on('change', 'input[type="radio"]', function() {
                var selectedProjects = $(this).val();
                window.location.href = URLProject + '/project/' + selectedProjects;
                localStorage.setItem('selectedGUIDProject', selectedProjects);
            });

            $('#listBoards').on('change', 'input[type="radio"]', function() {
                var selectedBoard = $(this).val();
                window.location.href = URLBoard + '/board/' + selectedBoard;
                localStorage.setItem('selectedGUIDBoard', selectedBoard);
            });

            dataCard.data.forEach(function(data) {
                var cardSelected = document.querySelectorAll('#cardSelected' + data.guid);
                cardSelected.forEach(card => {
                    card.addEventListener('click', () => {
                        var cardGuidSelected = card.getAttribute('value');
                        window.location.href = URLBoard + '/board/' + selectedGUIDBoard +
                            '/card/' + cardGuidSelected;
                        localStorage.setItem('selectedGUIDCard', cardGuidSelected);
                    });
                });
            })

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
                        projectCategorySetting.append('<option value="' + dataProCa.guid + '"' +
                            '>' + dataProCa.category_name + '</option>');
                    });
                    projectNamesDisplayed[selectedGUIDProject] = true;
                }
            });

            var BtnaddBoard = $('#BtnaddBoard');
            var btnAddCatalog = $('#btnAddCatalog');
            BtnaddBoard.empty();
            btnAddCatalog.empty();
            if (selectedGUIDProject === "0") {
                BtnaddBoard.empty();
                btnAddCatalog.empty();
            } else {
                BtnaddBoard.append(
                    '<button type="button" class="ms-5 btn btn-success col-1" data-bs-toggle="modal" data-bs-target="#modalAddBoard"><i class="menu-icon tf-icons ti ti-plus m-0 p-0"></i></button> <!-- Modal --> <!-- Modal --> <div class="modal fade" id="modalAddBoard" tabindex="-1" aria-hidden="true"> <form id="formAddBoard" enctype="multipart/form-data"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" >Add Data Board </h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body"> <div class="row"> <div class="col mb-3"> <label for="boardName" class="form-label">Name Board</label> <input type="text" id="boardName" class="form-control" placeholder="Enter Name"> </div> <div class="col mb-3"> <label for="boardDescription" class="form-label">Description</label> <textarea class="form-control" id="boardDescription" rows="2" placeholder="Enter Description"></textarea> </div> </div> </div> <div class="modal-footer">  <button type="button" class="btn btn-outline-success" id="btnAddDataBoard">ADD</button> </div> </div> </form> </div> </div>'
                );
                btnAddCatalog.append(
                    '<!-- Button trigger modal --> <button type="button" class="btn btn-primary m-3 p-3" data-bs-toggle="modal" data-bs-target="#modalCatalogAdd" style="position: fixed; bottom: 10px; right: 10px; z-index: 10;"> <i class="ti ti-plus"></i> Add Catalog </button> <div class="modal fade" id="modalCatalogAdd" tabindex="-1" aria-hidden="true"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title">Add Catalog</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body"> <div class="row"> <div class="col mb-3"> <label for="catalogName" class="form-label">Catalog Name</label> <input type="text" id="catalogName" class="form-control" placeholder="Enter Name"> <input type="text" id="catalogBoard" class="form-control d-none" value="${selectedGUIDBoard}"> </div> <div class="col mb-3"> <label for="catalogDescription" class="form-label">Description</label> <textarea name="catalogDescription" id="catalogDescription" cols="20" rows="3" placeholder="Enter Description" class="form-control"></textarea> </div> </div> </div> <div class="modal-footer"> <button type="button" class="btn btn-primary" id="addDataCatalog">ADD</button> </div> </div> </div> </div>'
                );
            }

            var projectCategory = $('#projectCategory');
            projectCategory.empty();
            var projectCategorySetting = $('#projectCategorySetting');
            dataProjectCategory.data.forEach(function(data) {
                projectCategory.append('<option value="' + data.guid + '" ' + '>' + data.category_name +
                    '</option>');
            });

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

            // Start Add Data Project
            $('#formAddProject').on('submit', function(e) {
                e.preventDefault();
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
                        "guid": null,
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
                        descriptionProjectElemen.textContent = "";
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
                var board_name = $('#boardName').val();
                var description = $('#boardDescription').val();

                $.ajax({
                    type: "POST",
                    url: "{{ env('URL_API') }}/api/v1/board",
                    data: {
                        "guid": null,
                        "board_name": board_name,
                        "description": description,
                        "project_guid": selectedGUIDProject,
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
                    var board_name = $('#boardNameEdit' + selectedEditBoardButton).val();
                    var description = $('#boardDescriptionEdit' + selectedEditBoardButton).val();

                    $.ajax({
                        type: "PUT",
                        url: "{{ env('URL_API') }}/api/v1/board",
                        data: {
                            "guid": selectedEditBoardButton,
                            "board_name": board_name,
                            "description": description,
                            "project_guid": selectedGUIDProject,
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
                            $('#modalEditBoard' + selectedEditBoardButton).modal(
                                'hide');
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

            // Start Add Data Catalog
            $(document).on('click', '#addDataCatalog', function(e) {
                e.preventDefault();
                var list_name = $('#catalogName').val();
                var description = $('#catalogDescription').val();

                var endOrder = 0;
                dataCatalog.data.forEach(function(dataCatalog) {

                    if (dataCatalog.board_guid === selectedGUIDBoard) {
                        if (dataCatalog.order > endOrder) {
                            endOrder = dataCatalog.order;
                        }
                    }
                });
                endOrder = endOrder > 0 ? endOrder : 0;
                var order = endOrder + 1;

                $.ajax({
                    type: "POST",
                    url: "{{ env('URL_API') }}/api/v1/catalog",
                    data: {
                        "guid": null,
                        "list_name": list_name,
                        "description": description,
                        "board_guid": selectedGUIDBoard,
                        "order": order,
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
                        $('#modalCatalogAdd').modal('hide');
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
            // End Add Data Catalog

            // Start Edit Data Catalog
            $(document).on('click', '#btnEditDataCatalog', function(e) {
                e.preventDefault();
                var guidCatalogEditSelected = $(this).val();
                var list_name = $('#catalogEditName' + guidCatalogEditSelected).val();
                var description = $('#catalogEditDescription' + guidCatalogEditSelected).val();
                var order = 0; // 
                $.ajax({
                    type: "PUT",
                    url: "{{ env('URL_API') }}/api/v1/catalog",
                    data: {
                        "guid": guidCatalogEditSelected,
                        "list_name": list_name,
                        "description": description,
                        "board_guid": selectedGUIDBoard,
                        "order": order,
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
                        $('#modalCatalogSetting' + guidCatalogEditSelected).modal('hide');
                        location.reload();
                        toastr.options.closeButton = true;
                        toastr.options.timeOut = 1000;
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
            // End Edit Data Catalog

            // Start Delete Data Catalog
            $(document).on('click', '#deleteBtnCatalog', function(e) {
                e.preventDefault();
                var guidCatalogDeleteSelected = $(this).val();
                $.ajax({
                    type: "DELETE",
                    url: "{{ env('URL_API') }}/api/v1/catalog/" + guidCatalogDeleteSelected,
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
                        $('#modalCatalogSetting' + guidCatalogDeleteSelected).modal('hide');
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
            // End Delete Data Catalog

            // Start Add Data Card
            $(document).on('click', '#addDataCard', function(e) {
                e.preventDefault();
                var guidCardAddSelected = $(this).val();

                var endOrder = 0;
                dataCard.data.forEach(function(dataCard) {
                    if (dataCard.catalog_guid === guidCardAddSelected) {
                        if (dataCard.order > endOrder) {
                            endOrder = dataCard.order;
                        }
                    }
                });
                endOrder = endOrder > 0 ? endOrder : 0;

                var card_name = $('#cardName' + guidCardAddSelected).val();
                var description = $('#cardDescription' + guidCardAddSelected).val();
                var deadline = $('#cardDeadline' + guidCardAddSelected).val();
                var catalog_guid = guidCardAddSelected;
                var order = endOrder + 1;

                $.ajax({
                    type: "POST",
                    url: "{{ env('URL_API') }}/api/v1/card",
                    data: {
                        "guid": null,
                        "card_name": card_name,
                        "description": description,
                        "deadline": deadline,
                        "catalog_guid": catalog_guid,
                        "order": order,
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
                        $('#modalCardAdd' + guidCardAddSelected).modal('hide');
                        location.reload();
                        toastr.options.closeButton = true;
                        toastr.options.timeOut = 1000;
                        toastr.options.onHidden = function() {}
                        toastr.success("Success insert data", "Success");
                    },
                    error: function(xhr, status, error) {
                        $.unblockUI();
                        var jsonResponse = JSON.parse(xhr.responseText);
                        toastr.options.closeButton = true;
                        toastr.error(jsonResponse['message'], "Error");
                    }
                });
            })
            // End Add Data Card

            // Start Delete Data Card
            $(document).on('click', '#deleteBtnCard', function(e) {
                e.preventDefault();
                var guidCardDeleteSelected = $(this).val();
                $.ajax({
                    type: "DELETE",
                    url: "{{ env('URL_API') }}/api/v1/card/" + guidCardDeleteSelected,
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
                        $('#guidCard' + guidCardDeleteSelected).modal('hide');
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
            // End Delete Data Card

        })
    </script>
@endsection
