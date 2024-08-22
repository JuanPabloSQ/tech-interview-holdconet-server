<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder {

    public function run() {
        
        DB::table('cities')->insert([
            ['name' => 'Santiago', 'province_id' => 1], 
            ['name' => 'La Florida', 'province_id' => 1], 
            ['name' => 'Concepción', 'province_id' => 2], 
            ['name' => 'Chillán', 'province_id' => 2], 
            ['name' => 'Iquique', 'province_id' => 3], 
        ]);
    }
}
