<?php

namespace Database\Seeders;

use App\Models\Area\Country;
use App\Models\Area\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::truncate();

        $json = File::get('database/data/provinces.json');
        $provinces = json_decode($json);

        $country = Country::firstWhere(['code' => 'ID']);

        if ($country) {
            foreach ($provinces as $key => $province) {
                Province::create([
                    'id' => $province->id,
                    'name' => $province->name,
                    'country_id' => $country->id,
                ]);
            }
        }
    }
}
