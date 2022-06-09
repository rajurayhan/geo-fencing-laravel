<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GeoData;

class GeoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = base_path().'/geo_data.json';
        $geo_datas =  json_decode(file_get_contents($path), true);
        foreach($geo_datas as $location => $data){
            GeoData::updateOrCreate([
                'lang' => $data['lang'],
                'lat' => $data['lat']
            ], [
                'name' => $location
            ]);
        }
    }
}
