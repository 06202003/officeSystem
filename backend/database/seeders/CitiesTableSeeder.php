<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('cities')->delete();
        
        DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1101,
                'province_id' => 11,
                'city_name' => 'KABUPATEN SIMEULUE',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            1 => 
            array (
                'id' => 1102,
                'province_id' => 11,
                'city_name' => 'KABUPATEN ACEH SINGKIL',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            2 => 
            array (
                'id' => 1103,
                'province_id' => 11,
                'city_name' => 'KABUPATEN ACEH SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            3 => 
            array (
                'id' => 1104,
                'province_id' => 11,
                'city_name' => 'KABUPATEN ACEH TENGGARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            4 => 
            array (
                'id' => 1105,
                'province_id' => 11,
                'city_name' => 'KABUPATEN ACEH TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            5 => 
            array (
                'id' => 1106,
                'province_id' => 11,
                'city_name' => 'KABUPATEN ACEH TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            6 => 
            array (
                'id' => 1107,
                'province_id' => 11,
                'city_name' => 'KABUPATEN ACEH BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            7 => 
            array (
                'id' => 1108,
                'province_id' => 11,
                'city_name' => 'KABUPATEN ACEH BESAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            8 => 
            array (
                'id' => 1109,
                'province_id' => 11,
                'city_name' => 'KABUPATEN PIDIE',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            9 => 
            array (
                'id' => 1110,
                'province_id' => 11,
                'city_name' => 'KABUPATEN BIREUEN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            10 => 
            array (
                'id' => 1111,
                'province_id' => 11,
                'city_name' => 'KABUPATEN ACEH UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            11 => 
            array (
                'id' => 1112,
                'province_id' => 11,
                'city_name' => 'KABUPATEN ACEH BARAT DAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            12 => 
            array (
                'id' => 1113,
                'province_id' => 11,
                'city_name' => 'KABUPATEN GAYO LUES',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            13 => 
            array (
                'id' => 1114,
                'province_id' => 11,
                'city_name' => 'KABUPATEN ACEH TAMIANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            14 => 
            array (
                'id' => 1115,
                'province_id' => 11,
                'city_name' => 'KABUPATEN NAGAN RAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            15 => 
            array (
                'id' => 1116,
                'province_id' => 11,
                'city_name' => 'KABUPATEN ACEH JAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            16 => 
            array (
                'id' => 1117,
                'province_id' => 11,
                'city_name' => 'KABUPATEN BENER MERIAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            17 => 
            array (
                'id' => 1118,
                'province_id' => 11,
                'city_name' => 'KABUPATEN PIDIE JAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            18 => 
            array (
                'id' => 1171,
                'province_id' => 11,
                'city_name' => 'KOTA BANDA ACEH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            19 => 
            array (
                'id' => 1172,
                'province_id' => 11,
                'city_name' => 'KOTA SABANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            20 => 
            array (
                'id' => 1173,
                'province_id' => 11,
                'city_name' => 'KOTA LANGSA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            21 => 
            array (
                'id' => 1174,
                'province_id' => 11,
                'city_name' => 'KOTA LHOKSEUMAWE',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            22 => 
            array (
                'id' => 1175,
                'province_id' => 11,
                'city_name' => 'KOTA SUBULUSSALAM',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            23 => 
            array (
                'id' => 1201,
                'province_id' => 12,
                'city_name' => 'KABUPATEN NIAS',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            24 => 
            array (
                'id' => 1202,
                'province_id' => 12,
                'city_name' => 'KABUPATEN MANDAILING NATAL',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            25 => 
            array (
                'id' => 1203,
                'province_id' => 12,
                'city_name' => 'KABUPATEN TAPANULI SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            26 => 
            array (
                'id' => 1204,
                'province_id' => 12,
                'city_name' => 'KABUPATEN TAPANULI TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            27 => 
            array (
                'id' => 1205,
                'province_id' => 12,
                'city_name' => 'KABUPATEN TAPANULI UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            28 => 
            array (
                'id' => 1206,
                'province_id' => 12,
                'city_name' => 'KABUPATEN TOBA SAMOSIR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            29 => 
            array (
                'id' => 1207,
                'province_id' => 12,
                'city_name' => 'KABUPATEN LABUHAN BATU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            30 => 
            array (
                'id' => 1208,
                'province_id' => 12,
                'city_name' => 'KABUPATEN ASAHAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            31 => 
            array (
                'id' => 1209,
                'province_id' => 12,
                'city_name' => 'KABUPATEN SIMALUNGUN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            32 => 
            array (
                'id' => 1210,
                'province_id' => 12,
                'city_name' => 'KABUPATEN DAIRI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            33 => 
            array (
                'id' => 1211,
                'province_id' => 12,
                'city_name' => 'KABUPATEN KARO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            34 => 
            array (
                'id' => 1212,
                'province_id' => 12,
                'city_name' => 'KABUPATEN DELI SERDANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            35 => 
            array (
                'id' => 1213,
                'province_id' => 12,
                'city_name' => 'KABUPATEN LANGKAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            36 => 
            array (
                'id' => 1214,
                'province_id' => 12,
                'city_name' => 'KABUPATEN NIAS SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            37 => 
            array (
                'id' => 1215,
                'province_id' => 12,
                'city_name' => 'KABUPATEN HUMBANG HASUNDUTAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            38 => 
            array (
                'id' => 1216,
                'province_id' => 12,
                'city_name' => 'KABUPATEN PAKPAK BHARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            39 => 
            array (
                'id' => 1217,
                'province_id' => 12,
                'city_name' => 'KABUPATEN SAMOSIR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            40 => 
            array (
                'id' => 1218,
                'province_id' => 12,
                'city_name' => 'KABUPATEN SERDANG BEDAGAI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            41 => 
            array (
                'id' => 1219,
                'province_id' => 12,
                'city_name' => 'KABUPATEN BATU BARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            42 => 
            array (
                'id' => 1220,
                'province_id' => 12,
                'city_name' => 'KABUPATEN PADANG LAWAS UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            43 => 
            array (
                'id' => 1221,
                'province_id' => 12,
                'city_name' => 'KABUPATEN PADANG LAWAS',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            44 => 
            array (
                'id' => 1222,
                'province_id' => 12,
                'city_name' => 'KABUPATEN LABUHAN BATU SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            45 => 
            array (
                'id' => 1223,
                'province_id' => 12,
                'city_name' => 'KABUPATEN LABUHAN BATU UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            46 => 
            array (
                'id' => 1224,
                'province_id' => 12,
                'city_name' => 'KABUPATEN NIAS UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            47 => 
            array (
                'id' => 1225,
                'province_id' => 12,
                'city_name' => 'KABUPATEN NIAS BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            48 => 
            array (
                'id' => 1271,
                'province_id' => 12,
                'city_name' => 'KOTA SIBOLGA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            49 => 
            array (
                'id' => 1272,
                'province_id' => 12,
                'city_name' => 'KOTA TANJUNG BALAI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            50 => 
            array (
                'id' => 1273,
                'province_id' => 12,
                'city_name' => 'KOTA PEMATANG SIANTAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            51 => 
            array (
                'id' => 1274,
                'province_id' => 12,
                'city_name' => 'KOTA TEBING TINGGI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            52 => 
            array (
                'id' => 1275,
                'province_id' => 12,
                'city_name' => 'KOTA MEDAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            53 => 
            array (
                'id' => 1276,
                'province_id' => 12,
                'city_name' => 'KOTA BINJAI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            54 => 
            array (
                'id' => 1277,
                'province_id' => 12,
                'city_name' => 'KOTA PADANGSIDIMPUAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            55 => 
            array (
                'id' => 1278,
                'province_id' => 12,
                'city_name' => 'KOTA GUNUNGSITOLI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            56 => 
            array (
                'id' => 1301,
                'province_id' => 13,
                'city_name' => 'KABUPATEN KEPULAUAN MENTAWAI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            57 => 
            array (
                'id' => 1302,
                'province_id' => 13,
                'city_name' => 'KABUPATEN PESISIR SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            58 => 
            array (
                'id' => 1303,
                'province_id' => 13,
                'city_name' => 'KABUPATEN SOLOK',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            59 => 
            array (
                'id' => 1304,
                'province_id' => 13,
                'city_name' => 'KABUPATEN SIJUNJUNG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            60 => 
            array (
                'id' => 1305,
                'province_id' => 13,
                'city_name' => 'KABUPATEN TANAH DATAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            61 => 
            array (
                'id' => 1306,
                'province_id' => 13,
                'city_name' => 'KABUPATEN PADANG PARIAMAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            62 => 
            array (
                'id' => 1307,
                'province_id' => 13,
                'city_name' => 'KABUPATEN AGAM',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            63 => 
            array (
                'id' => 1308,
                'province_id' => 13,
                'city_name' => 'KABUPATEN LIMA PULUH KOTA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            64 => 
            array (
                'id' => 1309,
                'province_id' => 13,
                'city_name' => 'KABUPATEN PASAMAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            65 => 
            array (
                'id' => 1310,
                'province_id' => 13,
                'city_name' => 'KABUPATEN SOLOK SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            66 => 
            array (
                'id' => 1311,
                'province_id' => 13,
                'city_name' => 'KABUPATEN DHARMASRAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            67 => 
            array (
                'id' => 1312,
                'province_id' => 13,
                'city_name' => 'KABUPATEN PASAMAN BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            68 => 
            array (
                'id' => 1371,
                'province_id' => 13,
                'city_name' => 'KOTA PADANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            69 => 
            array (
                'id' => 1372,
                'province_id' => 13,
                'city_name' => 'KOTA SOLOK',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            70 => 
            array (
                'id' => 1373,
                'province_id' => 13,
                'city_name' => 'KOTA SAWAH LUNTO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            71 => 
            array (
                'id' => 1374,
                'province_id' => 13,
                'city_name' => 'KOTA PADANG PANJANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            72 => 
            array (
                'id' => 1375,
                'province_id' => 13,
                'city_name' => 'KOTA BUKITTINGGI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            73 => 
            array (
                'id' => 1376,
                'province_id' => 13,
                'city_name' => 'KOTA PAYAKUMBUH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            74 => 
            array (
                'id' => 1377,
                'province_id' => 13,
                'city_name' => 'KOTA PARIAMAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            75 => 
            array (
                'id' => 1401,
                'province_id' => 14,
                'city_name' => 'KABUPATEN KUANTAN SINGINGI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            76 => 
            array (
                'id' => 1402,
                'province_id' => 14,
                'city_name' => 'KABUPATEN INDRAGIRI HULU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            77 => 
            array (
                'id' => 1403,
                'province_id' => 14,
                'city_name' => 'KABUPATEN INDRAGIRI HILIR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            78 => 
            array (
                'id' => 1404,
                'province_id' => 14,
                'city_name' => 'KABUPATEN PELALAWAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            79 => 
            array (
                'id' => 1405,
                'province_id' => 14,
                'city_name' => 'KABUPATEN S I A K',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            80 => 
            array (
                'id' => 1406,
                'province_id' => 14,
                'city_name' => 'KABUPATEN KAMPAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            81 => 
            array (
                'id' => 1407,
                'province_id' => 14,
                'city_name' => 'KABUPATEN ROKAN HULU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            82 => 
            array (
                'id' => 1408,
                'province_id' => 14,
                'city_name' => 'KABUPATEN BENGKALIS',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            83 => 
            array (
                'id' => 1409,
                'province_id' => 14,
                'city_name' => 'KABUPATEN ROKAN HILIR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            84 => 
            array (
                'id' => 1410,
                'province_id' => 14,
                'city_name' => 'KABUPATEN KEPULAUAN MERANTI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            85 => 
            array (
                'id' => 1471,
                'province_id' => 14,
                'city_name' => 'KOTA PEKANBARU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            86 => 
            array (
                'id' => 1473,
                'province_id' => 14,
                'city_name' => 'KOTA D U M A I',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            87 => 
            array (
                'id' => 1501,
                'province_id' => 15,
                'city_name' => 'KABUPATEN KERINCI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            88 => 
            array (
                'id' => 1502,
                'province_id' => 15,
                'city_name' => 'KABUPATEN MERANGIN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            89 => 
            array (
                'id' => 1503,
                'province_id' => 15,
                'city_name' => 'KABUPATEN SAROLANGUN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            90 => 
            array (
                'id' => 1504,
                'province_id' => 15,
                'city_name' => 'KABUPATEN BATANG HARI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            91 => 
            array (
                'id' => 1505,
                'province_id' => 15,
                'city_name' => 'KABUPATEN MUARO JAMBI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            92 => 
            array (
                'id' => 1506,
                'province_id' => 15,
                'city_name' => 'KABUPATEN TANJUNG JABUNG TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            93 => 
            array (
                'id' => 1507,
                'province_id' => 15,
                'city_name' => 'KABUPATEN TANJUNG JABUNG BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            94 => 
            array (
                'id' => 1508,
                'province_id' => 15,
                'city_name' => 'KABUPATEN TEBO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            95 => 
            array (
                'id' => 1509,
                'province_id' => 15,
                'city_name' => 'KABUPATEN BUNGO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            96 => 
            array (
                'id' => 1571,
                'province_id' => 15,
                'city_name' => 'KOTA JAMBI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            97 => 
            array (
                'id' => 1572,
                'province_id' => 15,
                'city_name' => 'KOTA SUNGAI PENUH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            98 => 
            array (
                'id' => 1601,
                'province_id' => 16,
                'city_name' => 'KABUPATEN OGAN KOMERING ULU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            99 => 
            array (
                'id' => 1602,
                'province_id' => 16,
                'city_name' => 'KABUPATEN OGAN KOMERING ILIR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            100 => 
            array (
                'id' => 1603,
                'province_id' => 16,
                'city_name' => 'KABUPATEN MUARA ENIM',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            101 => 
            array (
                'id' => 1604,
                'province_id' => 16,
                'city_name' => 'KABUPATEN LAHAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            102 => 
            array (
                'id' => 1605,
                'province_id' => 16,
                'city_name' => 'KABUPATEN MUSI RAWAS',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            103 => 
            array (
                'id' => 1606,
                'province_id' => 16,
                'city_name' => 'KABUPATEN MUSI BANYUASIN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            104 => 
            array (
                'id' => 1607,
                'province_id' => 16,
                'city_name' => 'KABUPATEN BANYU ASIN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            105 => 
            array (
                'id' => 1608,
                'province_id' => 16,
                'city_name' => 'KABUPATEN OGAN KOMERING ULU SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            106 => 
            array (
                'id' => 1609,
                'province_id' => 16,
                'city_name' => 'KABUPATEN OGAN KOMERING ULU TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            107 => 
            array (
                'id' => 1610,
                'province_id' => 16,
                'city_name' => 'KABUPATEN OGAN ILIR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            108 => 
            array (
                'id' => 1611,
                'province_id' => 16,
                'city_name' => 'KABUPATEN EMPAT LAWANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            109 => 
            array (
                'id' => 1612,
                'province_id' => 16,
                'city_name' => 'KABUPATEN PENUKAL ABAB LEMATANG ILIR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            110 => 
            array (
                'id' => 1613,
                'province_id' => 16,
                'city_name' => 'KABUPATEN MUSI RAWAS UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            111 => 
            array (
                'id' => 1671,
                'province_id' => 16,
                'city_name' => 'KOTA PALEMBANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            112 => 
            array (
                'id' => 1672,
                'province_id' => 16,
                'city_name' => 'KOTA PRABUMULIH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            113 => 
            array (
                'id' => 1673,
                'province_id' => 16,
                'city_name' => 'KOTA PAGAR ALAM',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            114 => 
            array (
                'id' => 1674,
                'province_id' => 16,
                'city_name' => 'KOTA LUBUKLINGGAU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            115 => 
            array (
                'id' => 1701,
                'province_id' => 17,
                'city_name' => 'KABUPATEN BENGKULU SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            116 => 
            array (
                'id' => 1702,
                'province_id' => 17,
                'city_name' => 'KABUPATEN REJANG LEBONG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            117 => 
            array (
                'id' => 1703,
                'province_id' => 17,
                'city_name' => 'KABUPATEN BENGKULU UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            118 => 
            array (
                'id' => 1704,
                'province_id' => 17,
                'city_name' => 'KABUPATEN KAUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            119 => 
            array (
                'id' => 1705,
                'province_id' => 17,
                'city_name' => 'KABUPATEN SELUMA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            120 => 
            array (
                'id' => 1706,
                'province_id' => 17,
                'city_name' => 'KABUPATEN MUKOMUKO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            121 => 
            array (
                'id' => 1707,
                'province_id' => 17,
                'city_name' => 'KABUPATEN LEBONG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            122 => 
            array (
                'id' => 1708,
                'province_id' => 17,
                'city_name' => 'KABUPATEN KEPAHIANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            123 => 
            array (
                'id' => 1709,
                'province_id' => 17,
                'city_name' => 'KABUPATEN BENGKULU TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            124 => 
            array (
                'id' => 1771,
                'province_id' => 17,
                'city_name' => 'KOTA BENGKULU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            125 => 
            array (
                'id' => 1801,
                'province_id' => 18,
                'city_name' => 'KABUPATEN LAMPUNG BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            126 => 
            array (
                'id' => 1802,
                'province_id' => 18,
                'city_name' => 'KABUPATEN TANGGAMUS',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            127 => 
            array (
                'id' => 1803,
                'province_id' => 18,
                'city_name' => 'KABUPATEN LAMPUNG SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            128 => 
            array (
                'id' => 1804,
                'province_id' => 18,
                'city_name' => 'KABUPATEN LAMPUNG TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            129 => 
            array (
                'id' => 1805,
                'province_id' => 18,
                'city_name' => 'KABUPATEN LAMPUNG TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            130 => 
            array (
                'id' => 1806,
                'province_id' => 18,
                'city_name' => 'KABUPATEN LAMPUNG UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            131 => 
            array (
                'id' => 1807,
                'province_id' => 18,
                'city_name' => 'KABUPATEN WAY KANAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            132 => 
            array (
                'id' => 1808,
                'province_id' => 18,
                'city_name' => 'KABUPATEN TULANGBAWANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            133 => 
            array (
                'id' => 1809,
                'province_id' => 18,
                'city_name' => 'KABUPATEN PESAWARAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            134 => 
            array (
                'id' => 1810,
                'province_id' => 18,
                'city_name' => 'KABUPATEN PRINGSEWU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            135 => 
            array (
                'id' => 1811,
                'province_id' => 18,
                'city_name' => 'KABUPATEN MESUJI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            136 => 
            array (
                'id' => 1812,
                'province_id' => 18,
                'city_name' => 'KABUPATEN TULANG BAWANG BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            137 => 
            array (
                'id' => 1813,
                'province_id' => 18,
                'city_name' => 'KABUPATEN PESISIR BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            138 => 
            array (
                'id' => 1871,
                'province_id' => 18,
                'city_name' => 'KOTA BANDAR LAMPUNG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            139 => 
            array (
                'id' => 1872,
                'province_id' => 18,
                'city_name' => 'KOTA METRO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            140 => 
            array (
                'id' => 1901,
                'province_id' => 19,
                'city_name' => 'KABUPATEN BANGKA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            141 => 
            array (
                'id' => 1902,
                'province_id' => 19,
                'city_name' => 'KABUPATEN BELITUNG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            142 => 
            array (
                'id' => 1903,
                'province_id' => 19,
                'city_name' => 'KABUPATEN BANGKA BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            143 => 
            array (
                'id' => 1904,
                'province_id' => 19,
                'city_name' => 'KABUPATEN BANGKA TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            144 => 
            array (
                'id' => 1905,
                'province_id' => 19,
                'city_name' => 'KABUPATEN BANGKA SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            145 => 
            array (
                'id' => 1906,
                'province_id' => 19,
                'city_name' => 'KABUPATEN BELITUNG TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            146 => 
            array (
                'id' => 1971,
                'province_id' => 19,
                'city_name' => 'KOTA PANGKAL PINANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            147 => 
            array (
                'id' => 2101,
                'province_id' => 21,
                'city_name' => 'KABUPATEN KARIMUN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            148 => 
            array (
                'id' => 2102,
                'province_id' => 21,
                'city_name' => 'KABUPATEN BINTAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            149 => 
            array (
                'id' => 2103,
                'province_id' => 21,
                'city_name' => 'KABUPATEN NATUNA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            150 => 
            array (
                'id' => 2104,
                'province_id' => 21,
                'city_name' => 'KABUPATEN LINGGA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            151 => 
            array (
                'id' => 2105,
                'province_id' => 21,
                'city_name' => 'KABUPATEN KEPULAUAN ANAMBAS',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            152 => 
            array (
                'id' => 2171,
                'province_id' => 21,
                'city_name' => 'KOTA B A T A M',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            153 => 
            array (
                'id' => 2172,
                'province_id' => 21,
                'city_name' => 'KOTA TANJUNG PINANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            154 => 
            array (
                'id' => 3101,
                'province_id' => 31,
                'city_name' => 'KABUPATEN KEPULAUAN SERIBU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            155 => 
            array (
                'id' => 3171,
                'province_id' => 31,
                'city_name' => 'KOTA JAKARTA SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            156 => 
            array (
                'id' => 3172,
                'province_id' => 31,
                'city_name' => 'KOTA JAKARTA TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            157 => 
            array (
                'id' => 3173,
                'province_id' => 31,
                'city_name' => 'KOTA JAKARTA PUSAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            158 => 
            array (
                'id' => 3174,
                'province_id' => 31,
                'city_name' => 'KOTA JAKARTA BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            159 => 
            array (
                'id' => 3175,
                'province_id' => 31,
                'city_name' => 'KOTA JAKARTA UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            160 => 
            array (
                'id' => 3201,
                'province_id' => 32,
                'city_name' => 'KABUPATEN BOGOR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            161 => 
            array (
                'id' => 3202,
                'province_id' => 32,
                'city_name' => 'KABUPATEN SUKABUMI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            162 => 
            array (
                'id' => 3203,
                'province_id' => 32,
                'city_name' => 'KABUPATEN CIANJUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            163 => 
            array (
                'id' => 3204,
                'province_id' => 32,
                'city_name' => 'KABUPATEN BANDUNG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            164 => 
            array (
                'id' => 3205,
                'province_id' => 32,
                'city_name' => 'KABUPATEN GARUT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            165 => 
            array (
                'id' => 3206,
                'province_id' => 32,
                'city_name' => 'KABUPATEN TASIKMALAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            166 => 
            array (
                'id' => 3207,
                'province_id' => 32,
                'city_name' => 'KABUPATEN CIAMIS',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            167 => 
            array (
                'id' => 3208,
                'province_id' => 32,
                'city_name' => 'KABUPATEN KUNINGAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            168 => 
            array (
                'id' => 3209,
                'province_id' => 32,
                'city_name' => 'KABUPATEN CIREBON',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            169 => 
            array (
                'id' => 3210,
                'province_id' => 32,
                'city_name' => 'KABUPATEN MAJALENGKA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            170 => 
            array (
                'id' => 3211,
                'province_id' => 32,
                'city_name' => 'KABUPATEN SUMEDANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            171 => 
            array (
                'id' => 3212,
                'province_id' => 32,
                'city_name' => 'KABUPATEN INDRAMAYU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            172 => 
            array (
                'id' => 3213,
                'province_id' => 32,
                'city_name' => 'KABUPATEN SUBANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            173 => 
            array (
                'id' => 3214,
                'province_id' => 32,
                'city_name' => 'KABUPATEN PURWAKARTA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            174 => 
            array (
                'id' => 3215,
                'province_id' => 32,
                'city_name' => 'KABUPATEN KARAWANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            175 => 
            array (
                'id' => 3216,
                'province_id' => 32,
                'city_name' => 'KABUPATEN BEKASI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            176 => 
            array (
                'id' => 3217,
                'province_id' => 32,
                'city_name' => 'KABUPATEN BANDUNG BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            177 => 
            array (
                'id' => 3218,
                'province_id' => 32,
                'city_name' => 'KABUPATEN PANGANDARAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            178 => 
            array (
                'id' => 3271,
                'province_id' => 32,
                'city_name' => 'KOTA BOGOR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            179 => 
            array (
                'id' => 3272,
                'province_id' => 32,
                'city_name' => 'KOTA SUKABUMI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            180 => 
            array (
                'id' => 3273,
                'province_id' => 32,
                'city_name' => 'KOTA BANDUNG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            181 => 
            array (
                'id' => 3274,
                'province_id' => 32,
                'city_name' => 'KOTA CIREBON',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            182 => 
            array (
                'id' => 3275,
                'province_id' => 32,
                'city_name' => 'KOTA BEKASI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            183 => 
            array (
                'id' => 3276,
                'province_id' => 32,
                'city_name' => 'KOTA DEPOK',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            184 => 
            array (
                'id' => 3277,
                'province_id' => 32,
                'city_name' => 'KOTA CIMAHI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            185 => 
            array (
                'id' => 3278,
                'province_id' => 32,
                'city_name' => 'KOTA TASIKMALAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            186 => 
            array (
                'id' => 3279,
                'province_id' => 32,
                'city_name' => 'KOTA BANJAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            187 => 
            array (
                'id' => 3301,
                'province_id' => 33,
                'city_name' => 'KABUPATEN CILACAP',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            188 => 
            array (
                'id' => 3302,
                'province_id' => 33,
                'city_name' => 'KABUPATEN BANYUMAS',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            189 => 
            array (
                'id' => 3303,
                'province_id' => 33,
                'city_name' => 'KABUPATEN PURBALINGGA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            190 => 
            array (
                'id' => 3304,
                'province_id' => 33,
                'city_name' => 'KABUPATEN BANJARNEGARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            191 => 
            array (
                'id' => 3305,
                'province_id' => 33,
                'city_name' => 'KABUPATEN KEBUMEN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            192 => 
            array (
                'id' => 3306,
                'province_id' => 33,
                'city_name' => 'KABUPATEN PURWOREJO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            193 => 
            array (
                'id' => 3307,
                'province_id' => 33,
                'city_name' => 'KABUPATEN WONOSOBO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            194 => 
            array (
                'id' => 3308,
                'province_id' => 33,
                'city_name' => 'KABUPATEN MAGELANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            195 => 
            array (
                'id' => 3309,
                'province_id' => 33,
                'city_name' => 'KABUPATEN BOYOLALI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            196 => 
            array (
                'id' => 3310,
                'province_id' => 33,
                'city_name' => 'KABUPATEN KLATEN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            197 => 
            array (
                'id' => 3311,
                'province_id' => 33,
                'city_name' => 'KABUPATEN SUKOHARJO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            198 => 
            array (
                'id' => 3312,
                'province_id' => 33,
                'city_name' => 'KABUPATEN WONOGIRI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            199 => 
            array (
                'id' => 3313,
                'province_id' => 33,
                'city_name' => 'KABUPATEN KARANGANYAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            200 => 
            array (
                'id' => 3314,
                'province_id' => 33,
                'city_name' => 'KABUPATEN SRAGEN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            201 => 
            array (
                'id' => 3315,
                'province_id' => 33,
                'city_name' => 'KABUPATEN GROBOGAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            202 => 
            array (
                'id' => 3316,
                'province_id' => 33,
                'city_name' => 'KABUPATEN BLORA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            203 => 
            array (
                'id' => 3317,
                'province_id' => 33,
                'city_name' => 'KABUPATEN REMBANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            204 => 
            array (
                'id' => 3318,
                'province_id' => 33,
                'city_name' => 'KABUPATEN PATI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            205 => 
            array (
                'id' => 3319,
                'province_id' => 33,
                'city_name' => 'KABUPATEN KUDUS',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            206 => 
            array (
                'id' => 3320,
                'province_id' => 33,
                'city_name' => 'KABUPATEN JEPARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            207 => 
            array (
                'id' => 3321,
                'province_id' => 33,
                'city_name' => 'KABUPATEN DEMAK',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            208 => 
            array (
                'id' => 3322,
                'province_id' => 33,
                'city_name' => 'KABUPATEN SEMARANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            209 => 
            array (
                'id' => 3323,
                'province_id' => 33,
                'city_name' => 'KABUPATEN TEMANGGUNG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            210 => 
            array (
                'id' => 3324,
                'province_id' => 33,
                'city_name' => 'KABUPATEN KENDAL',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            211 => 
            array (
                'id' => 3325,
                'province_id' => 33,
                'city_name' => 'KABUPATEN BATANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            212 => 
            array (
                'id' => 3326,
                'province_id' => 33,
                'city_name' => 'KABUPATEN PEKALONGAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            213 => 
            array (
                'id' => 3327,
                'province_id' => 33,
                'city_name' => 'KABUPATEN PEMALANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            214 => 
            array (
                'id' => 3328,
                'province_id' => 33,
                'city_name' => 'KABUPATEN TEGAL',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            215 => 
            array (
                'id' => 3329,
                'province_id' => 33,
                'city_name' => 'KABUPATEN BREBES',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            216 => 
            array (
                'id' => 3371,
                'province_id' => 33,
                'city_name' => 'KOTA MAGELANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            217 => 
            array (
                'id' => 3372,
                'province_id' => 33,
                'city_name' => 'KOTA SURAKARTA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            218 => 
            array (
                'id' => 3373,
                'province_id' => 33,
                'city_name' => 'KOTA SALATIGA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            219 => 
            array (
                'id' => 3374,
                'province_id' => 33,
                'city_name' => 'KOTA SEMARANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            220 => 
            array (
                'id' => 3375,
                'province_id' => 33,
                'city_name' => 'KOTA PEKALONGAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            221 => 
            array (
                'id' => 3376,
                'province_id' => 33,
                'city_name' => 'KOTA TEGAL',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            222 => 
            array (
                'id' => 3401,
                'province_id' => 34,
                'city_name' => 'KABUPATEN KULON PROGO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            223 => 
            array (
                'id' => 3402,
                'province_id' => 34,
                'city_name' => 'KABUPATEN BANTUL',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            224 => 
            array (
                'id' => 3403,
                'province_id' => 34,
                'city_name' => 'KABUPATEN GUNUNG KIDUL',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            225 => 
            array (
                'id' => 3404,
                'province_id' => 34,
                'city_name' => 'KABUPATEN SLEMAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            226 => 
            array (
                'id' => 3471,
                'province_id' => 34,
                'city_name' => 'KOTA YOGYAKARTA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            227 => 
            array (
                'id' => 3501,
                'province_id' => 35,
                'city_name' => 'KABUPATEN PACITAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            228 => 
            array (
                'id' => 3502,
                'province_id' => 35,
                'city_name' => 'KABUPATEN PONOROGO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            229 => 
            array (
                'id' => 3503,
                'province_id' => 35,
                'city_name' => 'KABUPATEN TRENGGALEK',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            230 => 
            array (
                'id' => 3504,
                'province_id' => 35,
                'city_name' => 'KABUPATEN TULUNGAGUNG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            231 => 
            array (
                'id' => 3505,
                'province_id' => 35,
                'city_name' => 'KABUPATEN BLITAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            232 => 
            array (
                'id' => 3506,
                'province_id' => 35,
                'city_name' => 'KABUPATEN KEDIRI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            233 => 
            array (
                'id' => 3507,
                'province_id' => 35,
                'city_name' => 'KABUPATEN MALANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            234 => 
            array (
                'id' => 3508,
                'province_id' => 35,
                'city_name' => 'KABUPATEN LUMAJANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            235 => 
            array (
                'id' => 3509,
                'province_id' => 35,
                'city_name' => 'KABUPATEN JEMBER',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            236 => 
            array (
                'id' => 3510,
                'province_id' => 35,
                'city_name' => 'KABUPATEN BANYUWANGI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            237 => 
            array (
                'id' => 3511,
                'province_id' => 35,
                'city_name' => 'KABUPATEN BONDOWOSO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            238 => 
            array (
                'id' => 3512,
                'province_id' => 35,
                'city_name' => 'KABUPATEN SITUBONDO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            239 => 
            array (
                'id' => 3513,
                'province_id' => 35,
                'city_name' => 'KABUPATEN PROBOLINGGO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            240 => 
            array (
                'id' => 3514,
                'province_id' => 35,
                'city_name' => 'KABUPATEN PASURUAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            241 => 
            array (
                'id' => 3515,
                'province_id' => 35,
                'city_name' => 'KABUPATEN SIDOARJO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            242 => 
            array (
                'id' => 3516,
                'province_id' => 35,
                'city_name' => 'KABUPATEN MOJOKERTO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            243 => 
            array (
                'id' => 3517,
                'province_id' => 35,
                'city_name' => 'KABUPATEN JOMBANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            244 => 
            array (
                'id' => 3518,
                'province_id' => 35,
                'city_name' => 'KABUPATEN NGANJUK',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            245 => 
            array (
                'id' => 3519,
                'province_id' => 35,
                'city_name' => 'KABUPATEN MADIUN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            246 => 
            array (
                'id' => 3520,
                'province_id' => 35,
                'city_name' => 'KABUPATEN MAGETAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            247 => 
            array (
                'id' => 3521,
                'province_id' => 35,
                'city_name' => 'KABUPATEN NGAWI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            248 => 
            array (
                'id' => 3522,
                'province_id' => 35,
                'city_name' => 'KABUPATEN BOJONEGORO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            249 => 
            array (
                'id' => 3523,
                'province_id' => 35,
                'city_name' => 'KABUPATEN TUBAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            250 => 
            array (
                'id' => 3524,
                'province_id' => 35,
                'city_name' => 'KABUPATEN LAMONGAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            251 => 
            array (
                'id' => 3525,
                'province_id' => 35,
                'city_name' => 'KABUPATEN GRESIK',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            252 => 
            array (
                'id' => 3526,
                'province_id' => 35,
                'city_name' => 'KABUPATEN BANGKALAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            253 => 
            array (
                'id' => 3527,
                'province_id' => 35,
                'city_name' => 'KABUPATEN SAMPANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            254 => 
            array (
                'id' => 3528,
                'province_id' => 35,
                'city_name' => 'KABUPATEN PAMEKASAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            255 => 
            array (
                'id' => 3529,
                'province_id' => 35,
                'city_name' => 'KABUPATEN SUMENEP',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            256 => 
            array (
                'id' => 3571,
                'province_id' => 35,
                'city_name' => 'KOTA KEDIRI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            257 => 
            array (
                'id' => 3572,
                'province_id' => 35,
                'city_name' => 'KOTA BLITAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            258 => 
            array (
                'id' => 3573,
                'province_id' => 35,
                'city_name' => 'KOTA MALANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            259 => 
            array (
                'id' => 3574,
                'province_id' => 35,
                'city_name' => 'KOTA PROBOLINGGO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            260 => 
            array (
                'id' => 3575,
                'province_id' => 35,
                'city_name' => 'KOTA PASURUAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            261 => 
            array (
                'id' => 3576,
                'province_id' => 35,
                'city_name' => 'KOTA MOJOKERTO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            262 => 
            array (
                'id' => 3577,
                'province_id' => 35,
                'city_name' => 'KOTA MADIUN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            263 => 
            array (
                'id' => 3578,
                'province_id' => 35,
                'city_name' => 'KOTA SURABAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            264 => 
            array (
                'id' => 3579,
                'province_id' => 35,
                'city_name' => 'KOTA BATU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            265 => 
            array (
                'id' => 3601,
                'province_id' => 36,
                'city_name' => 'KABUPATEN PANDEGLANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            266 => 
            array (
                'id' => 3602,
                'province_id' => 36,
                'city_name' => 'KABUPATEN LEBAK',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            267 => 
            array (
                'id' => 3603,
                'province_id' => 36,
                'city_name' => 'KABUPATEN TANGERANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            268 => 
            array (
                'id' => 3604,
                'province_id' => 36,
                'city_name' => 'KABUPATEN SERANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            269 => 
            array (
                'id' => 3671,
                'province_id' => 36,
                'city_name' => 'KOTA TANGERANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            270 => 
            array (
                'id' => 3672,
                'province_id' => 36,
                'city_name' => 'KOTA CILEGON',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            271 => 
            array (
                'id' => 3673,
                'province_id' => 36,
                'city_name' => 'KOTA SERANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            272 => 
            array (
                'id' => 3674,
                'province_id' => 36,
                'city_name' => 'KOTA TANGERANG SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            273 => 
            array (
                'id' => 5101,
                'province_id' => 51,
                'city_name' => 'KABUPATEN JEMBRANA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            274 => 
            array (
                'id' => 5102,
                'province_id' => 51,
                'city_name' => 'KABUPATEN TABANAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            275 => 
            array (
                'id' => 5103,
                'province_id' => 51,
                'city_name' => 'KABUPATEN BADUNG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            276 => 
            array (
                'id' => 5104,
                'province_id' => 51,
                'city_name' => 'KABUPATEN GIANYAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            277 => 
            array (
                'id' => 5105,
                'province_id' => 51,
                'city_name' => 'KABUPATEN KLUNGKUNG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            278 => 
            array (
                'id' => 5106,
                'province_id' => 51,
                'city_name' => 'KABUPATEN BANGLI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            279 => 
            array (
                'id' => 5107,
                'province_id' => 51,
                'city_name' => 'KABUPATEN KARANG ASEM',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            280 => 
            array (
                'id' => 5108,
                'province_id' => 51,
                'city_name' => 'KABUPATEN BULELENG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            281 => 
            array (
                'id' => 5171,
                'province_id' => 51,
                'city_name' => 'KOTA DENPASAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            282 => 
            array (
                'id' => 5201,
                'province_id' => 52,
                'city_name' => 'KABUPATEN LOMBOK BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            283 => 
            array (
                'id' => 5202,
                'province_id' => 52,
                'city_name' => 'KABUPATEN LOMBOK TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            284 => 
            array (
                'id' => 5203,
                'province_id' => 52,
                'city_name' => 'KABUPATEN LOMBOK TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            285 => 
            array (
                'id' => 5204,
                'province_id' => 52,
                'city_name' => 'KABUPATEN SUMBAWA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            286 => 
            array (
                'id' => 5205,
                'province_id' => 52,
                'city_name' => 'KABUPATEN DOMPU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            287 => 
            array (
                'id' => 5206,
                'province_id' => 52,
                'city_name' => 'KABUPATEN BIMA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            288 => 
            array (
                'id' => 5207,
                'province_id' => 52,
                'city_name' => 'KABUPATEN SUMBAWA BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            289 => 
            array (
                'id' => 5208,
                'province_id' => 52,
                'city_name' => 'KABUPATEN LOMBOK UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            290 => 
            array (
                'id' => 5271,
                'province_id' => 52,
                'city_name' => 'KOTA MATARAM',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            291 => 
            array (
                'id' => 5272,
                'province_id' => 52,
                'city_name' => 'KOTA BIMA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            292 => 
            array (
                'id' => 5301,
                'province_id' => 53,
                'city_name' => 'KABUPATEN SUMBA BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            293 => 
            array (
                'id' => 5302,
                'province_id' => 53,
                'city_name' => 'KABUPATEN SUMBA TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            294 => 
            array (
                'id' => 5303,
                'province_id' => 53,
                'city_name' => 'KABUPATEN KUPANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            295 => 
            array (
                'id' => 5304,
                'province_id' => 53,
                'city_name' => 'KABUPATEN TIMOR TENGAH SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            296 => 
            array (
                'id' => 5305,
                'province_id' => 53,
                'city_name' => 'KABUPATEN TIMOR TENGAH UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            297 => 
            array (
                'id' => 5306,
                'province_id' => 53,
                'city_name' => 'KABUPATEN BELU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            298 => 
            array (
                'id' => 5307,
                'province_id' => 53,
                'city_name' => 'KABUPATEN ALOR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            299 => 
            array (
                'id' => 5308,
                'province_id' => 53,
                'city_name' => 'KABUPATEN LEMBATA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            300 => 
            array (
                'id' => 5309,
                'province_id' => 53,
                'city_name' => 'KABUPATEN FLORES TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            301 => 
            array (
                'id' => 5310,
                'province_id' => 53,
                'city_name' => 'KABUPATEN SIKKA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            302 => 
            array (
                'id' => 5311,
                'province_id' => 53,
                'city_name' => 'KABUPATEN ENDE',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            303 => 
            array (
                'id' => 5312,
                'province_id' => 53,
                'city_name' => 'KABUPATEN NGADA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            304 => 
            array (
                'id' => 5313,
                'province_id' => 53,
                'city_name' => 'KABUPATEN MANGGARAI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            305 => 
            array (
                'id' => 5314,
                'province_id' => 53,
                'city_name' => 'KABUPATEN ROTE NDAO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            306 => 
            array (
                'id' => 5315,
                'province_id' => 53,
                'city_name' => 'KABUPATEN MANGGARAI BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            307 => 
            array (
                'id' => 5316,
                'province_id' => 53,
                'city_name' => 'KABUPATEN SUMBA TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            308 => 
            array (
                'id' => 5317,
                'province_id' => 53,
                'city_name' => 'KABUPATEN SUMBA BARAT DAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            309 => 
            array (
                'id' => 5318,
                'province_id' => 53,
                'city_name' => 'KABUPATEN NAGEKEO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            310 => 
            array (
                'id' => 5319,
                'province_id' => 53,
                'city_name' => 'KABUPATEN MANGGARAI TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            311 => 
            array (
                'id' => 5320,
                'province_id' => 53,
                'city_name' => 'KABUPATEN SABU RAIJUA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            312 => 
            array (
                'id' => 5321,
                'province_id' => 53,
                'city_name' => 'KABUPATEN MALAKA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            313 => 
            array (
                'id' => 5371,
                'province_id' => 53,
                'city_name' => 'KOTA KUPANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            314 => 
            array (
                'id' => 6101,
                'province_id' => 61,
                'city_name' => 'KABUPATEN SAMBAS',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            315 => 
            array (
                'id' => 6102,
                'province_id' => 61,
                'city_name' => 'KABUPATEN BENGKAYANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            316 => 
            array (
                'id' => 6103,
                'province_id' => 61,
                'city_name' => 'KABUPATEN LANDAK',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            317 => 
            array (
                'id' => 6104,
                'province_id' => 61,
                'city_name' => 'KABUPATEN MEMPAWAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            318 => 
            array (
                'id' => 6105,
                'province_id' => 61,
                'city_name' => 'KABUPATEN SANGGAU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            319 => 
            array (
                'id' => 6106,
                'province_id' => 61,
                'city_name' => 'KABUPATEN KETAPANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            320 => 
            array (
                'id' => 6107,
                'province_id' => 61,
                'city_name' => 'KABUPATEN SINTANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            321 => 
            array (
                'id' => 6108,
                'province_id' => 61,
                'city_name' => 'KABUPATEN KAPUAS HULU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            322 => 
            array (
                'id' => 6109,
                'province_id' => 61,
                'city_name' => 'KABUPATEN SEKADAU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            323 => 
            array (
                'id' => 6110,
                'province_id' => 61,
                'city_name' => 'KABUPATEN MELAWI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            324 => 
            array (
                'id' => 6111,
                'province_id' => 61,
                'city_name' => 'KABUPATEN KAYONG UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            325 => 
            array (
                'id' => 6112,
                'province_id' => 61,
                'city_name' => 'KABUPATEN KUBU RAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            326 => 
            array (
                'id' => 6171,
                'province_id' => 61,
                'city_name' => 'KOTA PONTIANAK',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            327 => 
            array (
                'id' => 6172,
                'province_id' => 61,
                'city_name' => 'KOTA SINGKAWANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            328 => 
            array (
                'id' => 6201,
                'province_id' => 62,
                'city_name' => 'KABUPATEN KOTAWARINGIN BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            329 => 
            array (
                'id' => 6202,
                'province_id' => 62,
                'city_name' => 'KABUPATEN KOTAWARINGIN TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            330 => 
            array (
                'id' => 6203,
                'province_id' => 62,
                'city_name' => 'KABUPATEN KAPUAS',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            331 => 
            array (
                'id' => 6204,
                'province_id' => 62,
                'city_name' => 'KABUPATEN BARITO SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            332 => 
            array (
                'id' => 6205,
                'province_id' => 62,
                'city_name' => 'KABUPATEN BARITO UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            333 => 
            array (
                'id' => 6206,
                'province_id' => 62,
                'city_name' => 'KABUPATEN SUKAMARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            334 => 
            array (
                'id' => 6207,
                'province_id' => 62,
                'city_name' => 'KABUPATEN LAMANDAU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            335 => 
            array (
                'id' => 6208,
                'province_id' => 62,
                'city_name' => 'KABUPATEN SERUYAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            336 => 
            array (
                'id' => 6209,
                'province_id' => 62,
                'city_name' => 'KABUPATEN KATINGAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            337 => 
            array (
                'id' => 6210,
                'province_id' => 62,
                'city_name' => 'KABUPATEN PULANG PISAU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            338 => 
            array (
                'id' => 6211,
                'province_id' => 62,
                'city_name' => 'KABUPATEN GUNUNG MAS',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            339 => 
            array (
                'id' => 6212,
                'province_id' => 62,
                'city_name' => 'KABUPATEN BARITO TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            340 => 
            array (
                'id' => 6213,
                'province_id' => 62,
                'city_name' => 'KABUPATEN MURUNG RAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            341 => 
            array (
                'id' => 6271,
                'province_id' => 62,
                'city_name' => 'KOTA PALANGKA RAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            342 => 
            array (
                'id' => 6301,
                'province_id' => 63,
                'city_name' => 'KABUPATEN TANAH LAUT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            343 => 
            array (
                'id' => 6302,
                'province_id' => 63,
                'city_name' => 'KABUPATEN KOTA BARU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            344 => 
            array (
                'id' => 6303,
                'province_id' => 63,
                'city_name' => 'KABUPATEN BANJAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            345 => 
            array (
                'id' => 6304,
                'province_id' => 63,
                'city_name' => 'KABUPATEN BARITO KUALA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            346 => 
            array (
                'id' => 6305,
                'province_id' => 63,
                'city_name' => 'KABUPATEN TAPIN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            347 => 
            array (
                'id' => 6306,
                'province_id' => 63,
                'city_name' => 'KABUPATEN HULU SUNGAI SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            348 => 
            array (
                'id' => 6307,
                'province_id' => 63,
                'city_name' => 'KABUPATEN HULU SUNGAI TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            349 => 
            array (
                'id' => 6308,
                'province_id' => 63,
                'city_name' => 'KABUPATEN HULU SUNGAI UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            350 => 
            array (
                'id' => 6309,
                'province_id' => 63,
                'city_name' => 'KABUPATEN TABALONG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            351 => 
            array (
                'id' => 6310,
                'province_id' => 63,
                'city_name' => 'KABUPATEN TANAH BUMBU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            352 => 
            array (
                'id' => 6311,
                'province_id' => 63,
                'city_name' => 'KABUPATEN BALANGAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            353 => 
            array (
                'id' => 6371,
                'province_id' => 63,
                'city_name' => 'KOTA BANJARMASIN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            354 => 
            array (
                'id' => 6372,
                'province_id' => 63,
                'city_name' => 'KOTA BANJAR BARU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            355 => 
            array (
                'id' => 6401,
                'province_id' => 64,
                'city_name' => 'KABUPATEN PASER',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            356 => 
            array (
                'id' => 6402,
                'province_id' => 64,
                'city_name' => 'KABUPATEN KUTAI BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            357 => 
            array (
                'id' => 6403,
                'province_id' => 64,
                'city_name' => 'KABUPATEN KUTAI KARTANEGARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            358 => 
            array (
                'id' => 6404,
                'province_id' => 64,
                'city_name' => 'KABUPATEN KUTAI TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            359 => 
            array (
                'id' => 6405,
                'province_id' => 64,
                'city_name' => 'KABUPATEN BERAU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            360 => 
            array (
                'id' => 6409,
                'province_id' => 64,
                'city_name' => 'KABUPATEN PENAJAM PASER UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            361 => 
            array (
                'id' => 6411,
                'province_id' => 64,
                'city_name' => 'KABUPATEN MAHAKAM HULU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            362 => 
            array (
                'id' => 6471,
                'province_id' => 64,
                'city_name' => 'KOTA BALIKPAPAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            363 => 
            array (
                'id' => 6472,
                'province_id' => 64,
                'city_name' => 'KOTA SAMARINDA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            364 => 
            array (
                'id' => 6474,
                'province_id' => 64,
                'city_name' => 'KOTA BONTANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            365 => 
            array (
                'id' => 6501,
                'province_id' => 65,
                'city_name' => 'KABUPATEN MALINAU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            366 => 
            array (
                'id' => 6502,
                'province_id' => 65,
                'city_name' => 'KABUPATEN BULUNGAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            367 => 
            array (
                'id' => 6503,
                'province_id' => 65,
                'city_name' => 'KABUPATEN TANA TIDUNG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            368 => 
            array (
                'id' => 6504,
                'province_id' => 65,
                'city_name' => 'KABUPATEN NUNUKAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            369 => 
            array (
                'id' => 6571,
                'province_id' => 65,
                'city_name' => 'KOTA TARAKAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            370 => 
            array (
                'id' => 7101,
                'province_id' => 71,
                'city_name' => 'KABUPATEN BOLAANG MONGONDOW',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            371 => 
            array (
                'id' => 7102,
                'province_id' => 71,
                'city_name' => 'KABUPATEN MINAHASA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            372 => 
            array (
                'id' => 7103,
                'province_id' => 71,
                'city_name' => 'KABUPATEN KEPULAUAN SANGIHE',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            373 => 
            array (
                'id' => 7104,
                'province_id' => 71,
                'city_name' => 'KABUPATEN KEPULAUAN TALAUD',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            374 => 
            array (
                'id' => 7105,
                'province_id' => 71,
                'city_name' => 'KABUPATEN MINAHASA SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            375 => 
            array (
                'id' => 7106,
                'province_id' => 71,
                'city_name' => 'KABUPATEN MINAHASA UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            376 => 
            array (
                'id' => 7107,
                'province_id' => 71,
                'city_name' => 'KABUPATEN BOLAANG MONGONDOW UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            377 => 
            array (
                'id' => 7108,
                'province_id' => 71,
                'city_name' => 'KABUPATEN SIAU TAGULANDANG BIARO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            378 => 
            array (
                'id' => 7109,
                'province_id' => 71,
                'city_name' => 'KABUPATEN MINAHASA TENGGARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            379 => 
            array (
                'id' => 7110,
                'province_id' => 71,
                'city_name' => 'KABUPATEN BOLAANG MONGONDOW SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            380 => 
            array (
                'id' => 7111,
                'province_id' => 71,
                'city_name' => 'KABUPATEN BOLAANG MONGONDOW TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            381 => 
            array (
                'id' => 7171,
                'province_id' => 71,
                'city_name' => 'KOTA MANADO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            382 => 
            array (
                'id' => 7172,
                'province_id' => 71,
                'city_name' => 'KOTA BITUNG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            383 => 
            array (
                'id' => 7173,
                'province_id' => 71,
                'city_name' => 'KOTA TOMOHON',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            384 => 
            array (
                'id' => 7174,
                'province_id' => 71,
                'city_name' => 'KOTA KOTAMOBAGU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            385 => 
            array (
                'id' => 7201,
                'province_id' => 72,
                'city_name' => 'KABUPATEN BANGGAI KEPULAUAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            386 => 
            array (
                'id' => 7202,
                'province_id' => 72,
                'city_name' => 'KABUPATEN BANGGAI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            387 => 
            array (
                'id' => 7203,
                'province_id' => 72,
                'city_name' => 'KABUPATEN MOROWALI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            388 => 
            array (
                'id' => 7204,
                'province_id' => 72,
                'city_name' => 'KABUPATEN POSO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            389 => 
            array (
                'id' => 7205,
                'province_id' => 72,
                'city_name' => 'KABUPATEN DONGGALA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            390 => 
            array (
                'id' => 7206,
                'province_id' => 72,
                'city_name' => 'KABUPATEN TOLI-TOLI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            391 => 
            array (
                'id' => 7207,
                'province_id' => 72,
                'city_name' => 'KABUPATEN BUOL',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            392 => 
            array (
                'id' => 7208,
                'province_id' => 72,
                'city_name' => 'KABUPATEN PARIGI MOUTONG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            393 => 
            array (
                'id' => 7209,
                'province_id' => 72,
                'city_name' => 'KABUPATEN TOJO UNA-UNA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            394 => 
            array (
                'id' => 7210,
                'province_id' => 72,
                'city_name' => 'KABUPATEN SIGI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            395 => 
            array (
                'id' => 7211,
                'province_id' => 72,
                'city_name' => 'KABUPATEN BANGGAI LAUT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            396 => 
            array (
                'id' => 7212,
                'province_id' => 72,
                'city_name' => 'KABUPATEN MOROWALI UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            397 => 
            array (
                'id' => 7271,
                'province_id' => 72,
                'city_name' => 'KOTA PALU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            398 => 
            array (
                'id' => 7301,
                'province_id' => 73,
                'city_name' => 'KABUPATEN KEPULAUAN SELAYAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            399 => 
            array (
                'id' => 7302,
                'province_id' => 73,
                'city_name' => 'KABUPATEN BULUKUMBA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            400 => 
            array (
                'id' => 7303,
                'province_id' => 73,
                'city_name' => 'KABUPATEN BANTAENG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            401 => 
            array (
                'id' => 7304,
                'province_id' => 73,
                'city_name' => 'KABUPATEN JENEPONTO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            402 => 
            array (
                'id' => 7305,
                'province_id' => 73,
                'city_name' => 'KABUPATEN TAKALAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            403 => 
            array (
                'id' => 7306,
                'province_id' => 73,
                'city_name' => 'KABUPATEN GOWA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            404 => 
            array (
                'id' => 7307,
                'province_id' => 73,
                'city_name' => 'KABUPATEN SINJAI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            405 => 
            array (
                'id' => 7308,
                'province_id' => 73,
                'city_name' => 'KABUPATEN MAROS',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            406 => 
            array (
                'id' => 7309,
                'province_id' => 73,
                'city_name' => 'KABUPATEN PANGKAJENE DAN KEPULAUAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            407 => 
            array (
                'id' => 7310,
                'province_id' => 73,
                'city_name' => 'KABUPATEN BARRU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            408 => 
            array (
                'id' => 7311,
                'province_id' => 73,
                'city_name' => 'KABUPATEN BONE',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            409 => 
            array (
                'id' => 7312,
                'province_id' => 73,
                'city_name' => 'KABUPATEN SOPPENG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            410 => 
            array (
                'id' => 7313,
                'province_id' => 73,
                'city_name' => 'KABUPATEN WAJO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            411 => 
            array (
                'id' => 7314,
                'province_id' => 73,
                'city_name' => 'KABUPATEN SIDENRENG RAPPANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            412 => 
            array (
                'id' => 7315,
                'province_id' => 73,
                'city_name' => 'KABUPATEN PINRANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            413 => 
            array (
                'id' => 7316,
                'province_id' => 73,
                'city_name' => 'KABUPATEN ENREKANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            414 => 
            array (
                'id' => 7317,
                'province_id' => 73,
                'city_name' => 'KABUPATEN LUWU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            415 => 
            array (
                'id' => 7318,
                'province_id' => 73,
                'city_name' => 'KABUPATEN TANA TORAJA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            416 => 
            array (
                'id' => 7322,
                'province_id' => 73,
                'city_name' => 'KABUPATEN LUWU UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            417 => 
            array (
                'id' => 7325,
                'province_id' => 73,
                'city_name' => 'KABUPATEN LUWU TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            418 => 
            array (
                'id' => 7326,
                'province_id' => 73,
                'city_name' => 'KABUPATEN TORAJA UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            419 => 
            array (
                'id' => 7371,
                'province_id' => 73,
                'city_name' => 'KOTA MAKASSAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            420 => 
            array (
                'id' => 7372,
                'province_id' => 73,
                'city_name' => 'KOTA PAREPARE',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            421 => 
            array (
                'id' => 7373,
                'province_id' => 73,
                'city_name' => 'KOTA PALOPO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            422 => 
            array (
                'id' => 7401,
                'province_id' => 74,
                'city_name' => 'KABUPATEN BUTON',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            423 => 
            array (
                'id' => 7402,
                'province_id' => 74,
                'city_name' => 'KABUPATEN MUNA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            424 => 
            array (
                'id' => 7403,
                'province_id' => 74,
                'city_name' => 'KABUPATEN KONAWE',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            425 => 
            array (
                'id' => 7404,
                'province_id' => 74,
                'city_name' => 'KABUPATEN KOLAKA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            426 => 
            array (
                'id' => 7405,
                'province_id' => 74,
                'city_name' => 'KABUPATEN KONAWE SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            427 => 
            array (
                'id' => 7406,
                'province_id' => 74,
                'city_name' => 'KABUPATEN BOMBANA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            428 => 
            array (
                'id' => 7407,
                'province_id' => 74,
                'city_name' => 'KABUPATEN WAKATOBI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            429 => 
            array (
                'id' => 7408,
                'province_id' => 74,
                'city_name' => 'KABUPATEN KOLAKA UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            430 => 
            array (
                'id' => 7409,
                'province_id' => 74,
                'city_name' => 'KABUPATEN BUTON UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            431 => 
            array (
                'id' => 7410,
                'province_id' => 74,
                'city_name' => 'KABUPATEN KONAWE UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            432 => 
            array (
                'id' => 7411,
                'province_id' => 74,
                'city_name' => 'KABUPATEN KOLAKA TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            433 => 
            array (
                'id' => 7412,
                'province_id' => 74,
                'city_name' => 'KABUPATEN KONAWE KEPULAUAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            434 => 
            array (
                'id' => 7413,
                'province_id' => 74,
                'city_name' => 'KABUPATEN MUNA BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            435 => 
            array (
                'id' => 7414,
                'province_id' => 74,
                'city_name' => 'KABUPATEN BUTON TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            436 => 
            array (
                'id' => 7415,
                'province_id' => 74,
                'city_name' => 'KABUPATEN BUTON SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            437 => 
            array (
                'id' => 7471,
                'province_id' => 74,
                'city_name' => 'KOTA KENDARI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            438 => 
            array (
                'id' => 7472,
                'province_id' => 74,
                'city_name' => 'KOTA BAUBAU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            439 => 
            array (
                'id' => 7501,
                'province_id' => 75,
                'city_name' => 'KABUPATEN BOALEMO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            440 => 
            array (
                'id' => 7502,
                'province_id' => 75,
                'city_name' => 'KABUPATEN GORONTALO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            441 => 
            array (
                'id' => 7503,
                'province_id' => 75,
                'city_name' => 'KABUPATEN POHUWATO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            442 => 
            array (
                'id' => 7504,
                'province_id' => 75,
                'city_name' => 'KABUPATEN BONE BOLANGO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            443 => 
            array (
                'id' => 7505,
                'province_id' => 75,
                'city_name' => 'KABUPATEN GORONTALO UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            444 => 
            array (
                'id' => 7571,
                'province_id' => 75,
                'city_name' => 'KOTA GORONTALO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            445 => 
            array (
                'id' => 7601,
                'province_id' => 76,
                'city_name' => 'KABUPATEN MAJENE',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            446 => 
            array (
                'id' => 7602,
                'province_id' => 76,
                'city_name' => 'KABUPATEN POLEWALI MANDAR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            447 => 
            array (
                'id' => 7603,
                'province_id' => 76,
                'city_name' => 'KABUPATEN MAMASA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            448 => 
            array (
                'id' => 7604,
                'province_id' => 76,
                'city_name' => 'KABUPATEN MAMUJU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            449 => 
            array (
                'id' => 7605,
                'province_id' => 76,
                'city_name' => 'KABUPATEN MAMUJU UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            450 => 
            array (
                'id' => 7606,
                'province_id' => 76,
                'city_name' => 'KABUPATEN MAMUJU TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            451 => 
            array (
                'id' => 8101,
                'province_id' => 81,
                'city_name' => 'KABUPATEN MALUKU TENGGARA BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            452 => 
            array (
                'id' => 8102,
                'province_id' => 81,
                'city_name' => 'KABUPATEN MALUKU TENGGARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            453 => 
            array (
                'id' => 8103,
                'province_id' => 81,
                'city_name' => 'KABUPATEN MALUKU TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            454 => 
            array (
                'id' => 8104,
                'province_id' => 81,
                'city_name' => 'KABUPATEN BURU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            455 => 
            array (
                'id' => 8105,
                'province_id' => 81,
                'city_name' => 'KABUPATEN KEPULAUAN ARU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            456 => 
            array (
                'id' => 8106,
                'province_id' => 81,
                'city_name' => 'KABUPATEN SERAM BAGIAN BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            457 => 
            array (
                'id' => 8107,
                'province_id' => 81,
                'city_name' => 'KABUPATEN SERAM BAGIAN TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            458 => 
            array (
                'id' => 8108,
                'province_id' => 81,
                'city_name' => 'KABUPATEN MALUKU BARAT DAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            459 => 
            array (
                'id' => 8109,
                'province_id' => 81,
                'city_name' => 'KABUPATEN BURU SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            460 => 
            array (
                'id' => 8171,
                'province_id' => 81,
                'city_name' => 'KOTA AMBON',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            461 => 
            array (
                'id' => 8172,
                'province_id' => 81,
                'city_name' => 'KOTA TUAL',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            462 => 
            array (
                'id' => 8201,
                'province_id' => 82,
                'city_name' => 'KABUPATEN HALMAHERA BARAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            463 => 
            array (
                'id' => 8202,
                'province_id' => 82,
                'city_name' => 'KABUPATEN HALMAHERA TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            464 => 
            array (
                'id' => 8203,
                'province_id' => 82,
                'city_name' => 'KABUPATEN KEPULAUAN SULA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            465 => 
            array (
                'id' => 8204,
                'province_id' => 82,
                'city_name' => 'KABUPATEN HALMAHERA SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            466 => 
            array (
                'id' => 8205,
                'province_id' => 82,
                'city_name' => 'KABUPATEN HALMAHERA UTARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            467 => 
            array (
                'id' => 8206,
                'province_id' => 82,
                'city_name' => 'KABUPATEN HALMAHERA TIMUR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            468 => 
            array (
                'id' => 8207,
                'province_id' => 82,
                'city_name' => 'KABUPATEN PULAU MOROTAI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            469 => 
            array (
                'id' => 8208,
                'province_id' => 82,
                'city_name' => 'KABUPATEN PULAU TALIABU',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            470 => 
            array (
                'id' => 8271,
                'province_id' => 82,
                'city_name' => 'KOTA TERNATE',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            471 => 
            array (
                'id' => 8272,
                'province_id' => 82,
                'city_name' => 'KOTA TIDORE KEPULAUAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            472 => 
            array (
                'id' => 9101,
                'province_id' => 91,
                'city_name' => 'KABUPATEN FAKFAK',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            473 => 
            array (
                'id' => 9102,
                'province_id' => 91,
                'city_name' => 'KABUPATEN KAIMANA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            474 => 
            array (
                'id' => 9103,
                'province_id' => 91,
                'city_name' => 'KABUPATEN TELUK WONDAMA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            475 => 
            array (
                'id' => 9104,
                'province_id' => 91,
                'city_name' => 'KABUPATEN TELUK BINTUNI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            476 => 
            array (
                'id' => 9105,
                'province_id' => 91,
                'city_name' => 'KABUPATEN MANOKWARI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            477 => 
            array (
                'id' => 9106,
                'province_id' => 91,
                'city_name' => 'KABUPATEN SORONG SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            478 => 
            array (
                'id' => 9107,
                'province_id' => 91,
                'city_name' => 'KABUPATEN SORONG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            479 => 
            array (
                'id' => 9108,
                'province_id' => 91,
                'city_name' => 'KABUPATEN RAJA AMPAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            480 => 
            array (
                'id' => 9109,
                'province_id' => 91,
                'city_name' => 'KABUPATEN TAMBRAUW',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            481 => 
            array (
                'id' => 9110,
                'province_id' => 91,
                'city_name' => 'KABUPATEN MAYBRAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            482 => 
            array (
                'id' => 9111,
                'province_id' => 91,
                'city_name' => 'KABUPATEN MANOKWARI SELATAN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            483 => 
            array (
                'id' => 9112,
                'province_id' => 91,
                'city_name' => 'KABUPATEN PEGUNUNGAN ARFAK',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            484 => 
            array (
                'id' => 9171,
                'province_id' => 91,
                'city_name' => 'KOTA SORONG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            485 => 
            array (
                'id' => 9401,
                'province_id' => 94,
                'city_name' => 'KABUPATEN MERAUKE',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            486 => 
            array (
                'id' => 9402,
                'province_id' => 94,
                'city_name' => 'KABUPATEN JAYAWIJAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            487 => 
            array (
                'id' => 9403,
                'province_id' => 94,
                'city_name' => 'KABUPATEN JAYAPURA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            488 => 
            array (
                'id' => 9404,
                'province_id' => 94,
                'city_name' => 'KABUPATEN NABIRE',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            489 => 
            array (
                'id' => 9408,
                'province_id' => 94,
                'city_name' => 'KABUPATEN KEPULAUAN YAPEN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            490 => 
            array (
                'id' => 9409,
                'province_id' => 94,
                'city_name' => 'KABUPATEN BIAK NUMFOR',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            491 => 
            array (
                'id' => 9410,
                'province_id' => 94,
                'city_name' => 'KABUPATEN PANIAI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            492 => 
            array (
                'id' => 9411,
                'province_id' => 94,
                'city_name' => 'KABUPATEN PUNCAK JAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            493 => 
            array (
                'id' => 9412,
                'province_id' => 94,
                'city_name' => 'KABUPATEN MIMIKA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            494 => 
            array (
                'id' => 9413,
                'province_id' => 94,
                'city_name' => 'KABUPATEN BOVEN DIGOEL',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            495 => 
            array (
                'id' => 9414,
                'province_id' => 94,
                'city_name' => 'KABUPATEN MAPPI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            496 => 
            array (
                'id' => 9415,
                'province_id' => 94,
                'city_name' => 'KABUPATEN ASMAT',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            497 => 
            array (
                'id' => 9416,
                'province_id' => 94,
                'city_name' => 'KABUPATEN YAHUKIMO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            498 => 
            array (
                'id' => 9417,
                'province_id' => 94,
                'city_name' => 'KABUPATEN PEGUNUNGAN BINTANG',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            499 => 
            array (
                'id' => 9418,
                'province_id' => 94,
                'city_name' => 'KABUPATEN TOLIKARA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
        ));
        DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 9419,
                'province_id' => 94,
                'city_name' => 'KABUPATEN SARMI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            1 => 
            array (
                'id' => 9420,
                'province_id' => 94,
                'city_name' => 'KABUPATEN KEEROM',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            2 => 
            array (
                'id' => 9426,
                'province_id' => 94,
                'city_name' => 'KABUPATEN WAROPEN',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            3 => 
            array (
                'id' => 9427,
                'province_id' => 94,
                'city_name' => 'KABUPATEN SUPIORI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            4 => 
            array (
                'id' => 9428,
                'province_id' => 94,
                'city_name' => 'KABUPATEN MAMBERAMO RAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            5 => 
            array (
                'id' => 9429,
                'province_id' => 94,
                'city_name' => 'KABUPATEN NDUGA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            6 => 
            array (
                'id' => 9430,
                'province_id' => 94,
                'city_name' => 'KABUPATEN LANNY JAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            7 => 
            array (
                'id' => 9431,
                'province_id' => 94,
                'city_name' => 'KABUPATEN MAMBERAMO TENGAH',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            8 => 
            array (
                'id' => 9432,
                'province_id' => 94,
                'city_name' => 'KABUPATEN YALIMO',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            9 => 
            array (
                'id' => 9433,
                'province_id' => 94,
                'city_name' => 'KABUPATEN PUNCAK',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            10 => 
            array (
                'id' => 9434,
                'province_id' => 94,
                'city_name' => 'KABUPATEN DOGIYAI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            11 => 
            array (
                'id' => 9435,
                'province_id' => 94,
                'city_name' => 'KABUPATEN INTAN JAYA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            12 => 
            array (
                'id' => 9436,
                'province_id' => 94,
                'city_name' => 'KABUPATEN DEIYAI',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
            13 => 
            array (
                'id' => 9471,
                'province_id' => 94,
                'city_name' => 'KOTA JAYAPURA',
                'created_at' => '2023-06-12 23:00:00',
                'updated_at' => '2023-06-12 23:00:00',
            ),
        ));
        
        
    }
}