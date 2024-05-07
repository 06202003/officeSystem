@extends('layouts.dashboard-app')
@section('title', 'Dashboard')


@section('icons')

@endsection

@section('core-css')

@endsection


@section('vendor-css')
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/flatpickr/flatpickr.css') }}" />
    <!-- Row Group CSS -->
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">
    <!-- Form Validation -->
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/spinkit/spinkit.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/toastr/toastr.css') }}" />
@endsection


@section('helpers')

@endsection


@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Inventory /</span> Dashboard
        </h4>
        <!-- DataTable with Buttons -->

        <div class="row">
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0 me-2" id="inventory">
                                { Number }
                            </h5>
                            <small>Inventory</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-primary rounded-pill p-2">
                                <i class="ti ti-package ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0 me-2" id="room">
                                { Number }
                            </h5>
                            <small>Room</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-primary rounded-pill p-2">
                                <i class="ti ti-layout ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0 me-2" id="office">
                                { Number }
                            </h5>
                            <small>Office</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-primary rounded-pill p-2">
                                <i class="ti ti-home ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0 me-2" id="category">
                                { Number }
                            </h5>
                            <small>Category</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-primary rounded-pill p-2">
                                <i class="ti ti-files ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-header header-elements">
                        <select class="form-control select2 form-select form-select-lg mb-3" name="optionItem"
                            id="optionItem">

                        </select>
                        <h5 class="card-title m-auto">Book Value Inventory</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart" class="chartjs" data-height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-header header-elements">
                        <h5 class="card-title ms-auto">Status Inventory</h5>
                        <div class="card-header-elements ms-auto py-0 dropdown">
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="polarChart" class="chartjs" data-height="337"></canvas>
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
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-responsive/datatables.responsive.js') }}">
    </script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}">
    </script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js') }}">
    </script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/jszip/jszip.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/pdfmake/pdfmake.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-buttons/buttons.print.js') }}"></script>
    <!-- Flat Picker -->
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <!-- Row Group JS -->
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-rowgroup/datatables.rowgroup.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js') }}">
    </script>
    <!-- Form Validation -->
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}">
    </script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}">
    </script>

@endsection


@section('main-js')

@endsection


@section('page-js')
    {{-- <script src="{{ asset('./assets/new-dashboard/js/tables-datatables-basic.js') }}"></script> --}}
    <script src="{{ asset('./assets/new-dashboard/js/extended-ui-blockui.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/ui-toasts.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/block-ui/block-ui.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/toastr/toastr.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/chartjs/chartjs.js') }}"></script>
@endsection


@section('custom-javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            var normal = 0;
            var maintenance = 0;
            var damaged = 0;
            var deleted = 0;

            var year1 = 0;
            var year2 = 0;
            var year3 = 0;
            var year4 = 0;

            // Array warna dan data
            var backgroundColor = [];
            var data = [];

            function createOrUpdateChart(data) {
                year1 = data.price_in_year_1;
                year2 = data.price_in_year_2;
                year3 = data.price_in_year_3;
                year4 = data.price_in_year_4;

                const barChartCanvas = document.getElementById('barChart');
                if (barChartCanvas) {
                    Chart.getChart(barChartCanvas)?.destroy();
                }

                const barChart = document.getElementById('barChart');
                if (barChart) {
                    const barChartVar = new Chart(barChart, {
                        type: 'bar',
                        data: {
                            labels: ['Year 1', 'Year 2', 'Year 3', 'Year 4'],
                            datasets: [{
                                data: [year1, year2, year3, year4],
                                backgroundColor: '#28dac6',
                                borderColor: 'transparent',
                                maxBarThickness: 15,
                                borderRadius: {
                                    topRight: 15,
                                    topLeft: 15
                                }
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            animation: {
                                duration: 500
                            },
                            plugins: {
                                tooltip: {
                                    rtl: isRtl,
                                    backgroundColor: cardColor,
                                    titleColor: headingColor,
                                    bodyColor: legendColor,
                                    borderWidth: 1,
                                    borderColor: borderColor
                                },
                                legend: {
                                    display: false
                                }
                            },
                            scales: {
                                x: {
                                    grid: {
                                        color: borderColor,
                                        drawBorder: false,
                                        borderColor: borderColor
                                    },
                                    ticks: {
                                        color: labelColor
                                    }
                                },
                            }
                        }
                    });
                }
            }
            $.ajax({
                type: "GET",
                url: "{{ env('URL_API') }}/api/v1/inventory/datatable",
                beforeSend: function(request) {
                    request.setRequestHeader("Authorization", "Bearer {{ $token }}");
                },
                success: function(result) {
                    var dataAPI = $('#inventory');
                    var dataOption = $('#optionItem');
                    dataAPI.empty();
                    dataOption.empty();
                    dataAPI.append(result.data.length);
                    dataOption.append('<option value="none" selected>Select Item</option>');
                    result.data.forEach(function(data) {
                        dataOption.append('<option value="' + data.guid + '" ' + '>' + data
                            .inventory_name + '</option>');
                        if (data.status == "normal") {
                            normal += 1;
                        }
                        if (data.status == "maintenance") {
                            maintenance += 1;
                        }
                        if (data.status == "damage") {
                            damaged += 1;
                        }
                        if (data.status == "deleted") {
                            deleted += 1;
                        }
                    });
                    // Color Variables
                    const purpleColor = '#836AF9',
                        yellowColor = '#ffe800',
                        cyanColor = '#28dac6',
                        orangeColor = '#FF8132',
                        oceanBlueColor = '#299AFF',
                        greyColor = '#4F5D70';
                    greenColor = '#00FF00';
                    redColor = '#FF0000';

                    let cardColor, headingColor, labelColor, borderColor, legendColor;

                    if (isDarkStyle) {
                        cardColor = config.colors_dark.cardColor;
                        headingColor = config.colors_dark.headingColor;
                        labelColor = config.colors_dark.textMuted;
                        legendColor = config.colors_dark.bodyColor;
                        borderColor = config.colors_dark.borderColor;
                    } else {
                        cardColor = config.colors.cardColor;
                        headingColor = config.colors.headingColor;
                        labelColor = config.colors.textMuted;
                        legendColor = config.colors.bodyColor;
                        borderColor = config.colors.borderColor;
                    }

                    // Logika untuk menambahkan warna dan data ke dalam array
                    if (normal !== 0) {
                        backgroundColor.push(greenColor);
                        data.push(normal);
                    }
                    if (maintenance !== 0) {
                        backgroundColor.push(orangeColor);
                        data.push(maintenance);
                    }
                    if (damaged !== 0) {
                        backgroundColor.push(yellowColor);
                        data.push(damaged);
                    }
                    if (deleted !== 0) {
                        backgroundColor.push(redColor);
                        data.push(deleted);
                    }
                    const polarChart = document.getElementById('polarChart');
                    if (polarChart) {
                        const polarChartVar = new Chart(polarChart, {
                            type: 'polarArea',
                            data: {
                                labels: ['Normal', 'Maintenance', 'Damaged', 'Deleted'],
                                datasets: [{
                                    backgroundColor: backgroundColor,
                                    data: data,
                                    borderWidth: 0
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                animation: {
                                    duration: 500
                                },
                                scales: {
                                    r: {
                                        ticks: {
                                            display: false,
                                            color: labelColor
                                        },
                                        grid: {
                                            display: false
                                        }
                                    }
                                },
                                plugins: {
                                    tooltip: {
                                        // Updated default tooltip UI
                                        rtl: isRtl,
                                        backgroundColor: cardColor,
                                        titleColor: headingColor,
                                        bodyColor: legendColor,
                                        borderWidth: 1,
                                        borderColor: borderColor
                                    },
                                    legend: {
                                        rtl: isRtl,
                                        position: 'right',
                                        labels: {
                                            usePointStyle: true,
                                            padding: 25,
                                            boxWidth: 8,
                                            boxHeight: 8,
                                            color: legendColor
                                        }
                                    }
                                }
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });

            $('#optionItem').on('change', function() {
                var selectedValue = $(this).val();
                if (selectedValue !== 'none') {
                    $.ajax({
                        type: "GET",
                        url: "{{ env('URL_API') }}/api/v1/inventory/" + selectedValue,
                        beforeSend: function(request) {
                            request.setRequestHeader("Authorization",
                                "Bearer {{ $token }}");
                        },
                        success: function(result) {
                            createOrUpdateChart(result.data);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error:", error);
                        }
                    });
                }
            });

            if (isDarkStyle) {
                cardColor = config.colors_dark.cardColor;
                headingColor = config.colors_dark.headingColor;
                labelColor = config.colors_dark.textMuted;
                legendColor = config.colors_dark.bodyColor;
                borderColor = config.colors_dark.borderColor;
            } else {
                cardColor = config.colors.cardColor;
                headingColor = config.colors.headingColor;
                labelColor = config.colors.textMuted;
                legendColor = config.colors.bodyColor;
                borderColor = config.colors.borderColor;
            }
            const barChart = document.getElementById('barChart');
            if (barChart) {
                const barChartVar = new Chart(barChart, {
                    type: 'bar',
                    data: {
                        labels: [
                            'Year 1',
                            'Year 2',
                            'Year 3',
                            'Year 4'
                        ],
                        datasets: [{
                            data: [year1, year2, year3, year4],
                            backgroundColor: '#28dac6',
                            borderColor: 'transparent',
                            maxBarThickness: 15,
                            borderRadius: {
                                topRight: 15,
                                topLeft: 15
                            }
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: {
                            duration: 500
                        },
                        plugins: {
                            tooltip: {
                                rtl: isRtl,
                                backgroundColor: cardColor,
                                titleColor: headingColor,
                                bodyColor: legendColor,
                                borderWidth: 1,
                                borderColor: borderColor
                            },
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    color: borderColor,
                                    drawBorder: false,
                                    borderColor: borderColor
                                },
                                ticks: {
                                    color: labelColor
                                }
                            },
                            y: {
                                min: 0,
                                max: 400,
                                grid: {
                                    color: borderColor,
                                    drawBorder: false,
                                    borderColor: borderColor
                                },
                                ticks: {
                                    stepSize: 100,
                                    color: labelColor
                                }
                            }
                        }
                    }
                });
            }

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
                    dataAPI.append(result.data.length);
                },

                error: function(xhr, status, error) {
                    var jsonResponse = JSON.parse(xhr.responseText);
                }
            });

            $.ajax({
                type: "GET",
                url: "{{ env('URL_API') }}/api/v1/office",
                beforeSend: function(request) {
                    request.setRequestHeader("Authorization",
                        "Bearer {{ $token }}");
                },
                success: function(result) {
                    var dataAPI = $('#office');
                    dataAPI.empty();
                    dataAPI.append(result.data.length);
                },

                error: function(xhr, status, error) {
                    var jsonResponse = JSON.parse(xhr.responseText);
                }
            });

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
                    dataAPI.append(result.data.length);
                },

                error: function(xhr, status, error) {
                    var jsonResponse = JSON.parse(xhr.responseText);
                }
            });
        });
    </script>
@endsection
