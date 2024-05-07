@extends('layouts.dashboard-app')
@section('title', 'Edit Role')


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
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">
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
            <span class="text-muted fw-light"> Permission / </span>{{ $data['data']['name'] }}
        </h4>
        <!-- User Search and Permission Form -->
        <div class="card mb-4">
            <div class="card-body">
                <!-- Permission Form -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Permission</th>
                                <th>Create</th>
                                <th>Read</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            <tr>
                                <td><strong>Dashboard</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Dashboard" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                            </tr>

                            <tr>
                                <td><strong>Role</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_Role" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Role" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_Role" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_Role" /></td>
                            </tr>

                            <tr>
                                <td><strong>User</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_User" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_User" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_User" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_User" /></td>
                            </tr>

                            <tr>
                                <td><strong>User Config</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_UserConfig" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                            </tr>

                            <tr>
                                <td><strong>Position</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_Position" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Position" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_Position" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_Position" /></td>
                            </tr>

                            <tr>
                                <td><strong>Department</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_Department" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Department" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_Department" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_Department" /></td>
                            </tr>

                            <tr>
                                <td><strong>Division</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_Division" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Division" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_Division" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_Division" /></td>
                            </tr>
                            
                            <tr>
                                <td><strong>Attendance</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Attendance" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                            </tr>

                            <tr>
                                <td><strong>ProductTag</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_ProductTag" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_ProductTag" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_ProductTag" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_ProductTag" /></td>
                            </tr>

                            <tr>
                                <td><strong>Product</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_Product" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Product" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_Product" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_Product" /></td>
                            </tr>

                            {{-- <tr>
                                <td><strong>Inventory</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Inventory" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                            </tr>

                            <tr>
                                <td><strong>Item</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_Item" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Item" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_Item" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_Item" /></td>
                            </tr>

                            <tr>
                                <td><strong>Room</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_Room" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Room" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_Room" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_Room" /></td>
                            </tr>

                            <tr>
                                <td><strong>Category</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_Category" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Category" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_Category" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_Category" /></td>
                            </tr>

                            <tr>
                                <td><strong>Office</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_Office" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Office" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_Office" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_Office" /></td>
                            </tr>

                            <tr>
                                <td><strong>Usage History</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_UsageHistory" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_UsageHistory" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_UsageHistory" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_UsageHistory" /></td>
                            </tr>

                            <tr>
                                <td><strong>Damage History</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_DamageHistory" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_DamageHistory" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_DamageHistory" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_DamageHistory" /></td>
                            </tr> --}}

                            <tr>
                                <td><strong>Leave</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Leave" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                            </tr>

                            <tr>
                                <td><strong>Leave Management</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_LeaveManagement" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_LeaveManagement" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_LeaveManagement" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_LeaveManagement" /></td>
                            </tr>

                            <tr>
                                <td><strong>Leave Type</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_LeaveType" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_LeaveType" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_LeaveType" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_LeaveType" /></td>
                            </tr>

                            <tr>
                                <td><strong>Leave Apllication</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_LeaveApplication" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_LeaveApplication" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" disabled /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_LeaveApplication" /></td>
                            </tr>

                            <tr>
                                <td><strong>Notice</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_Notice" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Notice" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_Notice" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_Notice" /></td>
                            </tr>

                            <tr>
                                <td><strong>Banner</strong></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Create_Banner" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Read_Banner" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Update_Banner" /></td>
                                <td><input type="checkbox" name="myCheckboxes[]" value="Delete_Banner" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <!-- Save Button -->
                <button type="submit" id="save-button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
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
    {{-- <script src="{{ asset('./assets/new-dashboard/vendor/libs/pdfmake/pdfmake.js') }}"></script> --}}
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
    <script src="{{ asset('./assets/new-dashboard/js/extended-ui-blockui.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/ui-toasts.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/block-ui/block-ui.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/toastr/toastr.js') }}"></script>
    @yield('custom-javascript')
    <script src="{{ asset('./assets/new-dashboard/js/tables-datatables-basic.js') }}"></script>
    </script>
@endsection


@section('custom-javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            let permissions = {!! json_encode($data['data']['permissions']) !!};
            permissions.forEach(function(permission) {
                var checkbox = document.querySelector('input[value="' + permission[
                    'name'] +
                    '"]');
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
            $('#save-button').click(function() {
                var checkboxes = document.getElementsByName('myCheckboxes[]');

                var checkedCheckboxes = [];

                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        checkedCheckboxes.push(checkboxes[i].value);
                    }
                }
                $.ajax({
                    type: "PUT",
                    url: "{{ env('URL_API') }}/api/v1/role",
                    data: {
                        "permissions": checkedCheckboxes,
                        "guid": "{{ $data['data']['guid'] }}"
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
                            window.location.href = "{{ route('index-role') }}";
                        };
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
