<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder {

    public function run() {
        
        DB::table('provinces')->insert([
            ['name' => 'Santiago', 'region_id' => 1], 
            ['name' => 'Concepción', 'region_id' => 2], 
            ['name' => 'Iquique', 'region_id' => 3], 
        ]);
    }
}
