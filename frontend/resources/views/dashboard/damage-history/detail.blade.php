@extends('layouts.dashboard-app')
@section('title', 'Damage History Detail')


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
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection


@section('page-css')
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/css/pages/page-profile.css') }}" />
@endsection


@section('helpers')

@endsection


@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Damage History /</span> Detail
        </h4>

        <!-- User Profile Content -->
        <div class="row">
            <div>
                <div class="card mb-4">
                    <div class="card-body">
                        <small class="card-text text-uppercase">Detail</small>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-4 mt-3">
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-tag"></i><span
                                            class="fw-bold mx-2">Inventory</span>
                                        @if (empty($data['data']['inventory']))
                                            <span>-</span>
                                        @else
                                            <span>{{ $data['data']['inventory']['guid'] }} -
                                                {{ $data['data']['inventory']['inventory_name'] }}</span>
                                        @endif
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-copyright"></i><span
                                            class="fw-bold mx-2">Damage Date</span>
                                        @if (empty($data['data']['date_of_damage']))
                                            <span>-</span>
                                        @else
                                            <span>{{ $data['data']['date_of_damage'] }}</span>
                                        @endif
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-calendar"></i><span
                                            class="fw-bold mx-2">Description</span>
                                        @if (empty($data['data']['description']))
                                            <span>-</span>
                                        @else
                                            <span>{{ ucfirst(trans($data['data']['description'])) }}</span>
                                        @endif
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-money"></i><span
                                            class="fw-bold mx-2">Last User</span>
                                        @if (empty($data['data']['user_last']))
                                            <span>-</span>
                                        @else
                                            <span>{{ $data['data']['user_last']['nik'] }} -
                                                {{ $data['data']['user_last']['name'] }}</span>
                                        @endif
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-bars"></i><span
                                            class="fw-bold mx-2">Repair Date</span>
                                        @if (empty($data['data']['repair_date']))
                                            <span>-</span>
                                        @else
                                            <span>{{ $data['data']['repair_date'] }}</span>
                                        @endif
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-pencil-square-o"></i><span
                                            class="fw-bold mx-2">Repair Vendor</span>
                                        @if (empty($data['data']['repair_vendor']))
                                            <span>-</span>
                                        @else
                                            <span>{{ $data['data']['repair_vendor'] }}</span>
                                        @endif
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-user"></i><span
                                            class="fw-bold mx-2">User Repair</span>
                                        @if (empty($data['data']['user_repair']))
                                            <span>-</span>
                                        @else
                                            <span>{{ $data['data']['user_repair']['nik'] }} -
                                                {{ $data['data']['user_repair']['name'] }}</span>
                                        @endif
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-map-marker"></i><span
                                            class="fw-bold mx-2">Repair Cost</span>
                                        @if (empty($data['data']['repair_cost']))
                                            <span>-</span>
                                        @else
                                            <span>{{ $data['data']['repair_cost'] }}</span>
                                        @endif
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="fa fa-map-marker"></i><span
                                            class="fw-bold mx-2">Repair Done Date</span>
                                        @if (empty($data['data']['completion_date_of_repair']))
                                            <span>-</span>
                                        @else
                                            <span>{{ $data['data']['completion_date_of_repair'] }}</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
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
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/select2/select2.js') }}"></script>
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
    <script src="{{ asset('./assets/new-dashboard/js/pages-profile.js') }}"></script>
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
        });
    </script>
@endsection
