<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run(): void {
        
        $this->call([
            RegionSeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
            StreetSeeder::class,
        ]);
    }
}
