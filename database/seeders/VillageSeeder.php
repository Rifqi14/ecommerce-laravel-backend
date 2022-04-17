<?php

namespace Database\Seeders;

use App\Models\Area\District;
use App\Models\Area\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Village::truncate();

        $json = File::get('database/data/villages.json');
        $villages = json_decode($json);

        foreach ($villages as $key => $village) {
            $district = District::find($village->district_id);
            if ($district) {
                Village::create([
                    'id' => $village->id,
                    'name' => $village->name,
                    'district_id' => $district->id,
                ]);
            }
        }
    }
}
