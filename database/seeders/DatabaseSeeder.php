<?php

namespace Database\Seeders;

use App\Models\Area\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([CountrySeeder::class, ProvinceSeeder::class, CitySeeder::class, DistrictSeeder::class, VillageSeeder::class, ZipCodeSeeder::class]);
    }
}
