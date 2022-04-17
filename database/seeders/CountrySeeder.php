<?php

namespace Database\Seeders;

use App\Models\Area\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();

        $json = File::get('database/data/CountryCodes.json');
        $countries = json_decode($json);

        foreach ($countries as $key => $country) {
            Country::create([
                'name' => $country->name,
                'code' => $country->code,
                'phone_code' => $country->dial_code,
            ]);
        }
    }
}
