@extends('layouts.dashboard-app')
@section('title', 'User Detail')


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
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('./assets/new-dashboard/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/libs/leaflet/leaflet.css') }}" />
@endsection


@section('page-css')
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/css/pages/page-profile.css') }}" />
    <link rel="stylesheet" href="{{ asset('./assets/new-dashboard/vendor/css/pages/style.css') }}">
    <style>

        .container {
            margin-bottom: auto; /* Center the content horizontally */
            color: black;
        }

        h5{
            color: black;
        }

        .tableclass {
            width: 300px;
            height: 250px;
        }

        .border {
            border-collapse: collapse;
            width: 100%;
            color: black
        }

        .border2 {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            color: black;
        }

        .lgray {
            background-color: #D3D3D3; color: black;
        }

        .gray {
            background-color: grey; color: black;
        }

        td {
            padding-left: 10px;
            padding-right: 10px;
            border: 1px solid; /* Fixed missing border width */
            width: max-content;
        }

        label {
            text-align: justify;
        }

    </style>
@endsection


@section('helpers')

@endsection


@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">User Profile /</span> Profile
        </h4>


        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="user-profile-header-banner">
                        <img src="{{ asset('./assets/new-dashboard/img/pages/profile-banner-wit.png') }}"
                            alt="Banner image" class="rounded-top">
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <img src="{{ asset('./assets/new-dashboard/img/avatars/PP-rect.png') }}" alt="user image"
                                class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4>{{ $profile['data']['name'] }}</h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                        <li class="list-inline-item">
                                            <i class='ti ti-color-swatch'></i>
                                            {{ $profile['data']['position']['position_name'] }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="buttonexport">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                                Export CV
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Export CV</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body mt-0">
                    <div class="row ms-1">
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="biodataCheckBox" onchange="toggleExportButtonVisibility()"/>
                            <label class="form-check-label" for="biodataCheckBox">
                                Biodata Diri
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="educationCheckBox" onchange="toggleExportButtonVisibility()"/>
                            <label class="form-check-label" for="educationCheckBox">
                                Riwayat Pendidikan
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="skillCheckBox" onchange="toggleExportButtonVisibility()"/>
                            <label class="form-check-label" for="skillCheckBox">
                                Keahlian
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="projectCheckBox" onchange="toggleExportButtonVisibility()"/>
                            <label class="form-check-label" for="projectCheckBox">
                                Riwayat Proyek
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="workCheckBox" onchange="toggleExportButtonVisibility()"/>
                            <label class="form-check-label" for="workCheckBox">
                                Riwayat Kerja
                            </label>
                          </div>
                          <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="addinCheckBox" onchange="toggleExportButtonVisibility()"/>
                            <label class="form-check-label" for="addinCheckBox">
                                Additional Information
                            </label>
                          </div>
                    </div>
                </div>
                <div id="exportButton" style="display: none; margin-left: 180px" class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="display: none;" data-bs-dismiss="modal" onclick="convertHTMLToPDF()">Export CV</button>
                </div>
                </div>
            </div>
        </div>


        <!-- Navbar pills -->
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                    <li class="nav-item">
                        <a class="nav-link" href="/user/detail/profile/{{ $guid }}">
                            <i class='ti-xs ti ti-user-check me-1'></i>
                            Profile
                        </a>
                    </li>
                    <li class="nav-item" href="/user/detail/attendance/{{ $guid }}">
                        <a class="nav-link" >
                            <i class="ti ti-check me-1 ti-xs"></i> Attendances</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);">
                            <i class="ti ti-file-description me-1 ti-xs"></i> Curriculum Vitae</a>
                    </li>
                </ul>
            </div>
        </div>
        <!--/ Navbar pills -->

        <!-- DataTable with Buttons -->
        <div class="card" id="card-block">
            <div class="header">
                <img src="{{ asset('./assets/new-dashboard/img/pages/image2.png') }}" width="100%" height="100%" >
            </div>
            <div class="container">
                <div id="tableProfile">
                    <h5>Profil Karyawan</h5>
                    <table class="border" >
                        <tr>
                            <td class="tableclass" rowspan="9" style="width: 35%;">
                            <img src="{{ asset('./assets/new-dashboard/img/avatars/PP-rect.png') }}" style="width: 100%; text-align: center;">
                            </td>
                            <td style="width: 25%;">Nama</td>
                            <td>{{ $profile['data']['name'] }}</td>
                        </tr>
                        <tr>
                            <td>Tempat/Tanggal Lahir</td>
                            <td>{{ $profile['data']['birth_city'] }}, {{ $profile['data']['birth_date'] }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>
                            @if ($profile['data']['gender'] === 'male')
                                Pria
                            @elseif ($profile['data']['gender'] === 'female')
                                Wanita
                            @else
                                <!-- Handle other cases if needed -->
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td>No KTP</td>
                            <td>{{ $profile['data']['nik'] }}</td>
                        </tr>
                        <tr>
                            <td>Posisi</td>
                            <td>{{ $profile['data']['position']['position_name'] }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $profile['data']['email'] }}</td>
                        </tr>
                        <tr>
                            <td>NPWP</td>
                            <td>{{ $profile['data']['npwp'] }}</td>
                        </tr>
                        <tr>
                            <td>No Rekening/Bank</td>
                            <td>{{ $profile['data']['bank_account'] }}</td>
                        </tr>
                        <tr>
                            <td>ID Karyawan</td>
                            <td>{{ $profile['data']['id_employee'] }}</td>
                        </tr>
                    </table>
                </div>
                <br>
                <div id="tableEducation">
                    <h5>Riwayat Pendidikan</h5>
                    <table class="border2">
                        <tr style="text-align: center;">
                            <td style="width: 30%;" colspan="2">Periode</td>
                            <td style="width: 40%;" rowspan="3">Sekolah/Universitas/Instansi Pendidikan</td>
                            <td style="width: 10%;" rowspan="3">Jurusan</td>
                            <td style="width: 25%;" rowspan="3">Kualifikasi* <br>1-4</td>
                        </tr>
                        <tr>
                            <td style="height: 50px;" rowspan="2">Tahun Masuk</td>
                            <td rowspan="2">Tahun Keluar</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr style="text-align: center;">
                        @foreach($education['data'] as $edu)
                        <tr style="text-align: center;">
                            @if($profile['data']['guid'] == $edu['user_guid'])
                            <td>{{$edu['entry_year']}}</td>
                            <td>{{$edu['out_year']}}</td>
                            <td>{{$edu['institution_name']}}</td>
                            <td>{{$edu['department']}}</td>
                            <td>{{$edu['qualification']}}</td>
                        </tr>
                        <tr>
                            @else
                            @continue
                        @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
                <br>
                <div id="tableSkill">
                    <h5>Keahlian</h5>
                    <table class="border2">
                        <tr>
                            <td style="height: 35px;">No</td>
                            <td>Skill/Programming</td>
                            <td>Level</td>
                            <td>Notes</td>
                        </tr>
                        <tr>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach($skill['data'] as $skill)
                            @if($profile['data']['guid'] == $skill['user_guid'])
                            <td style="height: 30px;">{{ $counter++ }}</td>
                            <td>{{$skill['skillmaster']['skill']}}</td>
                            <td>{{$skill['level']}}</td>
                            <td>{{$skill['notes']}}</td>
                        </tr>
                        <tr>
                            @else
                                @continue
                            @endif
                            @endforeach
                        </tr>
                    </table>
                </div>
                <br>
                <div id="tableProject">
                <h5>Riwayat Proyek</h5>
                    <table class="border2">
                        <tr>
                            <td style="height: 35px;">No</td>
                            <td>Project Name</td>
                            <td>Year</td>
                            <td>Platform</td>
                            <td>Role</td>
                            <td>Description</td>
                        </tr>
                
                        <tr>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach($project['data'] as $project)
                            @if($profile['data']['guid'] == $project['user_guid'])
                            <td style="height: 30px;">{{ $counter++ }}</td>
                            <td>{{$project['project_name']}}</td>
                            <td>{{$project['year']}}</td>
                            <td>{{$project['platform']}}</td>
                            <td>{{$project['project_history_master']['role']}}</td>
                            <td>{{$project['description']}}</td>
                        </tr>
                        <tr>
                            @else
                                @continue
                            @endif
                            @endforeach
                        </tr>
                    </table>
                </div>
                <br>
                <div id="tableWork">
                    <h5>Riwayat Kerja</h5>
                    <table class="border">
                            @foreach($workhistory['data'] as $workhistory)
                            @if($profile['data']['guid'] == $workhistory['user_guid'])
                        <tr>
                            <td colspan="5" style="text-align: center;"><h3>{{$workhistory['company_name']}}</h3></td>
                        </tr>
                        <tr>
                            <td class="lgray" tyle="height: 30px;">Duration</td>
                            <td class="lgray">Start : </td>
                            <td>{{$workhistory['start_year']}}</td>
                            <td class="lgray">End : </td>
                            <td>{{$workhistory['end_year']}}</td>
                        </tr>
                        <tr>
                            <td class="lgray" style="height: 30px;">Phone</td>
                            <td colspan="4">{{$workhistory['company_phone']}}</td>
                        </tr>
                        <tr>
                            <td class="lgray" style="height: 30px;"class="ijo">Address</td>
                            <td colspan="4">{{$workhistory['company_adress']}}</td>
                        </tr>
                        <tr>
                            <td class="lgray" style="height: 30px;">Company Type</td>
                            <td colspan="2">{{$workhistory['company_type']}}</td>
                            <td colspan="2" rowspan="2"></td>
                        </tr>
                        <tr>
                            <td class="lgray" style="height: 30px;">Position</td>
                            <td colspan="2">{{$workhistory['position']}}</td>
                        </tr>
                        @else
                        @continue
                        @endif
                        @endforeach
                    </table>
                </div>
                <br>
                <div id="tableAddin">
                    <h5>Additional Information</h5>
                    <table class="border2">
                        <tr class="gray">
                            <td style="text-align: center;">Hubungan</td>
                            <td style="text-align: center;">Nama</td>
                            <td style="text-align: center;">Tempat/Tanggal Lahir</td>
                            <td style="text-align: center;">Alamat</td>
                            <td style="text-align: center;">No. Telepon</td>
                            <td style="text-align: center;">Pekerjaan</td>
                        </tr>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach($addinformation['data'] as $addinformation)
                        @if($profile['data']['guid'] == $addinformation['user_guid'])
                        <tr>
                            <td style="height: 30px;">{{$addinformation['connection']}}</td>
                            <td>{{$addinformation['name']}}</td>
                            <td>{{$addinformation['birth_date']}}</td>
                            <td>{{$addinformation['adress']}}</td>
                            <td>{{$addinformation['phone_number']}}</td>
                            <td>{{$addinformation['work']}}</td>
                        </tr>
                        @else
                            @continue
                        @endif
                        @endforeach
                    </table>
                </div>
                <br>
                <h4>Pernyataan :</h4>
                <ol>
                    <li>
                        <label>Saya menyatakan bahwa keterangan di atas saya buat dengan benar, dan mengerti apa bila keterangan tersebut tidak benar mengakibatkan pemutusan hubungan kerja seketika tanpa syarat</label>
                    </li>
                    <li>
                        <label>Saya menyatakan bahwa saya tidak pernah terlibat</label> <b>pinjaman online</b>
                    </li>
                    <li>
                        <label>Saya mengerti bahwa penerimaan menjdai karyawan bisa batal apabila hasil pemeriksaan yang diselenggarakan oleh perusahaan membuktikan saya memberikan keterangan palsu atau yang dipalsukan baik sebelum atau pada saat saya bekerja dengan perusahaan</label>
                    </li>
                </ol>
            </div>
            <div class="footer">
                <img src="{{ asset('./assets/new-dashboard/img/pages/image.png') }}" width="100%" height="100%">
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
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}">
    </script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/pickr/pickr.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/vendor/libs/leaflet/leaflet.js') }}"></script>
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
    <script src="{{ asset('./assets/new-dashboard/js/maps-leaflet.js') }}"></script>
    <script src="{{ asset('./assets/new-dashboard/js/pop-up.js') }}"></script>
@endsection


@section('custom-javascript')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
        <script type="text/javascript">
            function toggleExportButtonVisibility() {
                var biodataChecked = document.getElementById('biodataCheckBox').checked;
                var educationChecked = document.getElementById('educationCheckBox').checked;
                var skillChecked = document.getElementById('skillCheckBox').checked;
                var projectChecked = document.getElementById('projectCheckBox').checked;
                var workChecked = document.getElementById('workCheckBox').checked;
                var addinChecked = document.getElementById('addinCheckBox').checked;

                // Periksa apakah setidaknya satu checkbox telah dicentang
                if (biodataChecked || educationChecked || skillChecked || projectChecked || workChecked || addinChecked) {
                    document.getElementById('exportButton').style.display = 'block'; // Tampilkan tombol ekspor
                } else {
                    document.getElementById('exportButton').style.display = 'none'; // Sembunyikan tombol ekspor
                }
            }

            function convertHTMLToPDF() {
                const tablesToExport = [];

                // Check if the Profile checkbox is checked
                if (document.getElementById('biodataCheckBox').checked) {
                    tablesToExport.push(document.getElementById('tableProfile').innerHTML);
                }

                if (document.getElementById('educationCheckBox').checked) {
                    tablesToExport.push(document.getElementById('tableEducation').innerHTML);
                }

                if (document.getElementById('skillCheckBox').checked) {
                    tablesToExport.push(document.getElementById('tableSkill').innerHTML);
                }
                
                if (document.getElementById('projectCheckBox').checked) {
                    tablesToExport.push(document.getElementById('tableProject').innerHTML);
                }
                
                if (document.getElementById('workCheckBox').checked) {
                    tablesToExport.push(document.getElementById('tableWork').innerHTML);
                }
                
                if (document.getElementById('addinCheckBox').checked) {
                    tablesToExport.push(document.getElementById('tableAddin').innerHTML);
                }

                // Combine the HTML content of all tables
                const combinedHTML = tablesToExport.join('');

                // Options for PDF
                const options = {
                    filename: 'cv.pdf', // Set the filename
                    image: { type: 'jpeg', quality: 0.98 }, // Image options
                    html2canvas: { scale: 3 }, // html2canvas options
                    jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' },
                };

                // Convert combined HTML to PDF
                html2pdf().set(options).from(combinedHTML).save().then(() => {
                    // Refresh the page after the PDF is saved
                    location.reload();
                });
            }
        </script>
@endsection
