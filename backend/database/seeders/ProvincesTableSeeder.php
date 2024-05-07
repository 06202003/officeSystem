<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('provinces')->delete();
        
        DB::table('provinces')->insert(array (
            0 => 
            array (
                'id' => 11,
                'province_name' => 'ACEH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            1 => 
            array (
                'id' => 12,
                'province_name' => 'SUMATERA UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            2 => 
            array (
                'id' => 13,
                'province_name' => 'SUMATERA BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            3 => 
            array (
                'id' => 14,
                'province_name' => 'RIAU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            4 => 
            array (
                'id' => 15,
                'province_name' => 'JAMBI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            5 => 
            array (
                'id' => 16,
                'province_name' => 'SUMATERA SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            6 => 
            array (
                'id' => 17,
                'province_name' => 'BENGKULU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            7 => 
            array (
                'id' => 18,
                'province_name' => 'LAMPUNG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            8 => 
            array (
                'id' => 19,
                'province_name' => 'KEPULAUAN BANGKA BELITUNG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            9 => 
            array (
                'id' => 21,
                'province_name' => 'KEPULAUAN RIAU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            10 => 
            array (
                'id' => 31,
                'province_name' => 'DKI JAKARTA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            11 => 
            array (
                'id' => 32,
                'province_name' => 'JAWA BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            12 => 
            array (
                'id' => 33,
                'province_name' => 'JAWA TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            13 => 
            array (
                'id' => 34,
                'province_name' => 'DI YOGYAKARTA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            14 => 
            array (
                'id' => 35,
                'province_name' => 'JAWA TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            15 => 
            array (
                'id' => 36,
                'province_name' => 'BANTEN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            16 => 
            array (
                'id' => 51,
                'province_name' => 'BALI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            17 => 
            array (
                'id' => 52,
                'province_name' => 'NUSA TENGGARA BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            18 => 
            array (
                'id' => 53,
                'province_name' => 'NUSA TENGGARA TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            19 => 
            array (
                'id' => 61,
                'province_name' => 'KALIMANTAN BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            20 => 
            array (
                'id' => 62,
                'province_name' => 'KALIMANTAN TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            21 => 
            array (
                'id' => 63,
                'province_name' => 'KALIMANTAN SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            22 => 
            array (
                'id' => 64,
                'province_name' => 'KALIMANTAN TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            23 => 
            array (
                'id' => 65,
                'province_name' => 'KALIMANTAN UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            24 => 
            array (
                'id' => 71,
                'province_name' => 'SULAWESI UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            25 => 
            array (
                'id' => 72,
                'province_name' => 'SULAWESI TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            26 => 
            array (
                'id' => 73,
                'province_name' => 'SULAWESI SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            27 => 
            array (
                'id' => 74,
                'province_name' => 'SULAWESI TENGGARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            28 => 
            array (
                'id' => 75,
                'province_name' => 'GORONTALO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            29 => 
            array (
                'id' => 76,
                'province_name' => 'SULAWESI BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            30 => 
            array (
                'id' => 81,
                'province_name' => 'MALUKU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            31 => 
            array (
                'id' => 82,
                'province_name' => 'MALUKU UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            32 => 
            array (
                'id' => 91,
                'province_name' => 'PAPUA BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            33 => 
            array (
                'id' => 94,
                'province_name' => 'PAPUA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
        ));
        
        
    }
}