<?php

namespace Database\Seeders;

use App\Models\Area\Country;
use App\Models\Area\Province;
use App\Models\Area\ZipCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ZipCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ZipCode::truncate();

        $json = File::get('database/data/postal_array.json');
        $data = json_decode($json);

        foreach ($data as $obj) {
            $province = Province::find($obj->province_code);
            $country = Country::firstWhere('code', 'ID');
            ZipCode::create([
                'zip_code' => $obj->postal_code,
                'village' => $obj->urban,
                'district' => $obj->sub_district,
                'city' => $obj->city,
                'province' => $province ? $province->name : null,
                'country' => $country ? $country->name : null,
            ]);
        }
    }
}
