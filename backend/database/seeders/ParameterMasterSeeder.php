<?php

namespace Database\Seeders;

use App\Models\ParameterMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParameterMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ParameterMaster::create([
            'guid' => '0a1bce23-7248-4c04-92bc-6dd1e8ab7b7d',
            'parameter_master_name' => 'Jenis Pegawai'
        ]);

        ParameterMaster::create([
            'guid' => '1d18e428-629d-4a9c-af51-60a0b8d8f05a',
            'parameter_master_name' => 'Agama'
        ]);

        ParameterMaster::create([
            'guid' => '4946c041-559e-4021-a41a-e841a02f5129',
            'parameter_master_name' => 'Jenis Alamat'
        ]);

        ParameterMaster::create([
            'guid' => '4a8838fb-95cb-49ec-a629-4a2c25e09948',
            'parameter_master_name' => 'Jenjang Pendidikan'
        ]);

        ParameterMaster::create([
            'guid' => 'bf3fe541-cea9-41c4-8bdc-82f4127e61ab',
            'parameter_master_name' => 'Jenis Pelatihan'
        ]);

        ParameterMaster::create([
            'guid' => '09b0508c-bfbe-49e1-9728-af0b58c08852',
            'parameter_master_name' => 'Nama Pelatihan'
        ]);

        ParameterMaster::create([
            'guid' => '197a62de-dd4f-4d0c-a1d0-ea9f963673e3',
            'parameter_master_name' => 'Bidang Kegiatan Seminar'
        ]);

        ParameterMaster::create([
            'guid' => '837442fc-a01a-489c-8bbe-fe2dcdc3116f',
            'parameter_master_name' => 'Bidang Kegiatan Kursus'
        ]);

        ParameterMaster::create([
            'guid' => '4cf32824-2e1a-4d34-8b74-fe80411bec06',
            'parameter_master_name' => 'Instansi Penyelenggara'
        ]);

        ParameterMaster::create([
            'guid' => '16bbdcbb-ad64-4ccd-8913-4fc42260afa0',
            'parameter_master_name' => 'Jenis Jabatan'
        ]);
    }
}
