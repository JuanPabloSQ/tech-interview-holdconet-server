<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreetSeeder extends Seeder {

    public function run() {
        
        DB::table('streets')->insert([
            ['name' => 'Avenida Libertador Bernardo O’Higgins', 'city_id' => 1], 
            ['name' => 'Avenida Vicuña Mackenna', 'city_id' => 2], 
            ['name' => 'Calle Caupolicán', 'city_id' => 3], 
            ['name' => 'Avenida Los Carrera', 'city_id' => 4], 
            ['name' => 'Avenida Arturo Prat', 'city_id' => 5], 
            ['name' => 'Calle Baquedano', 'city_id' => 5], 
            ['name' => 'Calle O’Higgins', 'city_id' => 3], 
            ['name' => 'Avenida Pedro de Valdivia', 'city_id' => 3], 
            ['name' => 'Calle Esmeralda', 'city_id' => 1], 
            ['name' => 'Avenida Providencia', 'city_id' => 1], 
        ]);
    }
}
