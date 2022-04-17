<?php

namespace Database\Seeders;

use App\Models\Area\City;
use App\Models\Area\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::truncate();

        $json = File::get('database/data/districts.json');
        $districts = json_decode($json);

        foreach ($districts as $key => $district) {
            $city = City::find($district->regency_id);
            if ($city) {
                District::create([
                    'id' => $district->id,
                    'name' => $district->name,
                    'city_id' => $city->id,
                ]);
            }
        }
    }
}
