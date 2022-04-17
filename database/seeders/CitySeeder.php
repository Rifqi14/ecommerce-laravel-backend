<?php

namespace Database\Seeders;

use App\Models\Area\City;
use App\Models\Area\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();

        $json = File::get('database/data/cities.json');
        $cities = json_decode($json);


        foreach ($cities as $key => $city) {
            $province = Province::find($city->province_id);
            if ($province) {
                City::create([
                    'id' => $city->id,
                    'name' => $city->name,
                    'province_id' => $province->id,
                ]);
            }
        }
    }
}
