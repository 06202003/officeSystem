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
<!-- Content -->
<div class="" id="blurOverlay"></div>
<div class="container-xxl flex-grow-1 container-p-y contentBlur">
    <div class="container-l flex-grow-1 my-3">
        <div class="listCatalogs" style="display: flex; flex-wrap: nowrap; overflow-x: auto;" id="sortableCatalog">

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
    var dataCatalog = <?php echo json_encode($dataCatalog, JSON_PRETTY_PRINT); ?>;
    var dataCard = <?php echo json_encode($dataCard, JSON_PRETTY_PRINT); ?>;

    var selectedGUIDProject = localStorage.getItem('selectedGUIDProject');
    var selectedGUIDBoard = localStorage.getItem('selectedGUIDBoard');

    $(document).ready(function() {
        var sortedData = dataCatalog.data.sort((a, b) => a.order - b.order);
        var dataTargets = $('.listCatalogs');
        dataTargets.empty();

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
                            // data.checklist.forEach(function(dataChecklist) {
                            //     var listChecklistItem = '';
                            //     var dataChecklistItem = dataChecklist.guid
                            //     listChecklistItem += generateChecklistItem(dataChecklistItem)
                            //     listChecklistHtml += ` <div class="my-3">
                            //                         <div class="accordion" id="">
                            //                             <div class="accordion-item">
                            //                                 <h2 class="accordion-header">
                            //                                     <div class="input-group flex-nowrap">
                            //                                         <span class="input-group-text" id="addon-wrapping"><i class="ti ti-check"></i></span>
                            //                                         <input type="text" class="form-control" placeholder="${dataChecklist.checklist_name}" value="${dataChecklist.checklist_name}">
                            //                                         <button class="btn btn-danger" id="" value="">
                            //                                             <i class="menu-icon tf-icons ti ti-trash m-0 p-0"></i>
                            //                                         </button>
                            //                                         <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#panelsChecklist-${dataChecklist.guid}" aria-expanded="true" aria-controls="panelsChecklist-${dataChecklist.guid}">V</button>
                            //                                     </div>
                            //                                 </h2>
                            //                                 <div id="panelsChecklist-${dataChecklist.guid}" class="accordion-collapse collapse show">
                            //                                     <div class="accordion-body">
                            //                                         <div class="my-2">

                            //                                             ${listChecklistItem}

                            //                                         </div>
                            //                                         <div class="row">
                            //                                             <div class="col-6 col-sm-10">
                            //                                                 <label class="form-label">Add Checklist Item</label>
                            //                                                 <input type="text" class="form-control" placeholder="Name Checklist" id="nameChecklist" />
                            //                                             </div>
                            //                                             <div class="col-6 col-sm-2 mt-4">
                            //                                                 <button type="button" class="btn btn-success" id="addBtnChecklist${card.guid}"> <i class="ti ti-plus"></i></button>
                            //                                             </div>
                            //                                         </div>
                            //                                     </div>
                            //                                 </div>
                            //                             </div>
                            //                         </div>
                            //                     </div> `;
                            // })

                            cardHtml += `
                            <li class="mb-2 drag-item cursor-move d-flex justify-content-between align-items-center" style="cursor: pointer;" id="cardSelected${card.guid}" data-catalog="${data.catalog_guid}">
                            <button class="border-0 m-0 p-0 w-100 rounded" data-bs-toggle="modal" data-bs-target="#guidCard${card.guid}" value="${card.guid}">
                                <div class="card bg-dark">
                                    <div class="card-body  rounded-bottom m-0 p-0">
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
                        </li>
                        `;
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

                        var newIndexCard = Array.from(evt.to.children).indexOf(evt.item);
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

                        var movedCardDataCatalog = dataCatalog.data.find(function(item) {
                            return item.guid === dataGuidCatalogMovedCard;
                        });

                        var notMovedCard = dataCard.data.filter(function(item) {
                            return 'cardSelected' + item.guid !== movedCardId && item.catalog_guid === movedCard.catalog_guid;
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
                            var originalDate = new Date(year, month - 1, day, hours, minutes);
                            var formattedDateTime = `${originalDate.getFullYear()}-${('0' + (originalDate.getMonth() + 1)).slice(-2)}-${('0' + originalDate.getDate()).slice(-2)}T${('0' + originalDate.getHours()).slice(-2)}:${('0' + originalDate.getMinutes()).slice(-2)}`;
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
                                    request.setRequestHeader("Authorization", "Bearer {{ $token }}");
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

                        if (movedCard.order !== newOrderCard) {
                            movedCard.order = newOrderCard;
                            var parts = movedCard.deadline.split(/[\s-:]/);
                            var year = parts[0];
                            var month = parts[1];
                            var day = parts[2];
                            var hours = parts[3];
                            var minutes = parts[4];
                            var originalDate = new Date(year, month - 1, day, hours, minutes);
                            var formattedDateTime = `${originalDate.getFullYear()}-${('0' + (originalDate.getMonth() + 1)).slice(-2)}-${('0' + originalDate.getDate()).slice(-2)}T${('0' + originalDate.getHours()).slice(-2)}:${('0' + originalDate.getMinutes()).slice(-2)}`;
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
                                    request.setRequestHeader("Authorization", "Bearer {{ $token }}");
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
                                request.setRequestHeader("Authorization", "Bearer {{ $token }}");
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
                            request.setRequestHeader("Authorization", "Bearer {{ $token }}");
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
            cardElement.addEventListener("contextmenu", function(event) {
                var cardElements = document.querySelectorAll('[id^="dropdownCatalog"]:not(.d-none)');
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
                var maxOrder = orders.length > 0 ? orders.reduce(function(prev, current) {
                    return Math.max(prev, current);
                }, -Infinity) : 0;
                dataCard.data.sort(function(a, b) {
                    return a.order - b.order;
                });
                console.log(data.catalog_guid);
                let counter = 1;
                dataCard.data.forEach(function(dataCards) {
                    if (data.catalog_guid === dataCards.catalog_guid && data.guid !== dataCards.guid) {
                        var parts = dataCards.deadline.split(/[\s-:]/);
                        var year = parts[0];
                        var month = parts[1];
                        var day = parts[2];
                        var hours = parts[3];
                        var minutes = parts[4];
                        var originalDate = new Date(year, month - 1, day, hours, minutes);
                        var formattedDateTime = `${originalDate.getFullYear()}-${('0' + (originalDate.getMonth() + 1)).slice(-2)}-${('0' + originalDate.getDate()).slice(-2)}T${('0' + originalDate.getHours()).slice(-2)}:${('0' + originalDate.getMinutes()).slice(-2)}`;
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
                                request.setRequestHeader("Authorization", "Bearer {{ $token }}");
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
                var formattedDateTime = `${originalDate.getFullYear()}-${('0' + (originalDate.getMonth() + 1)).slice(-2)}-${('0' + originalDate.getDate()).slice(-2)}T${('0' + originalDate.getHours()).slice(-2)}:${('0' + originalDate.getMinutes()).slice(-2)}`;
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
                            request.setRequestHeader("Authorization", "Bearer {{ $token }}");
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

        });

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
                    request.setRequestHeader("Authorization", "Bearer {{ $token }}");
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

    });
</script>
@endsection