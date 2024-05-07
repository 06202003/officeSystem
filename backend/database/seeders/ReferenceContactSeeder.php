<?php

namespace Database\Seeders;

use App\Models\ReferenceContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReferenceContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReferenceContact::create([
            'name' => 'Daffa Ariya Prayoga',
            'company' => 'PT. Wahana Informasi Teknologi', 
            'phone_number' => '08911315982',
            'connection' => 'Friend',
            'user_guid' => '25cbaa44-eac3-44d6-bbb3-ebb07fdc57c9'
        ]);
    }
}
