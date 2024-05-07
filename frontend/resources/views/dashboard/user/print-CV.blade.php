<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembaran CV</title>
    <style>
        @page{
            margin: 0cm 0cm;
        }

        body {
            margin-top: 3cm;
            margin-left: 1.27cm;
            margin-right: 1.27cm;
            margin-bottom: 3cm;
        }

        .container {
            margin-bottom: auto; /* Center the content horizontally */
        }

        .tableclass {
            width: 300px;
            height: 250px;
        }

        .border {
            border-collapse: collapse;
            width: 100%;
        }

        .border2 {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
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

        .header,
        .footer {
            position: fixed;
        }
        .header {
            top: 0cm;
            left: 0cm;
            right: 0cm;
        }
        .footer {
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
        }
    </style>
</head>
<body>
<div class="header">
    <img src="{{ asset('./assets/new-dashboard/img/pages/image2.png') }}" width="100%" height="100%" >
</div>
<div class="container">
    <h2>Profil Karyawan</h2>
    <table class="border">
        <tr>
            <td class="tableclass" rowspan="9" style="width: 35%;">
            <img src="{{ asset('./assets/new-dashboard/img/avatars/PP-rect.png') }}" style="width: 100%; text-align: center;">
            </td>
            <td style="width: 25%;">Nama</td>
            <td>{{ $profile['data']['name'] }}</td>
        </tr>
        <tr>
            <td>Tempat/Tanggal Lahir</td>
            <td></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>{{ $profile['data']['gender'] }}</td>
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
            <td>{{ $profile['data']['religion'] }}</td>
        </tr>
        <tr>
            <td>ID Karyawan</td>
            <td>{{ $profile['data']['id_employee'] }}</td>
        </tr>
    </table>
    <h2>Riwayat Pendidikan</h2>
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
    <h2>Keahlian</h2>
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
    <h2>Riwayat Proyek</h2>
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
    <h2>Riwayat Kerja</h2>
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
    <h2>Additional Information</h2>
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

<script>
    window.onload = function() {
        window.print(); // Automatically initiates printing when the page loads
    }
</script>

</body>
</html>
