<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Race;

class RacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $racesData = include(base_path('database/seeders/races_data.php'));

        foreach ($races as $raceData) {
            $race = new Race();
            $race->name = $raceData['name'];
            $race->picture_link = $raceData['picture_link'];
            $race->description = $raceData['description'];
            $race->slug = Race::generateSlug($race->name);
            $race->mod_for = $raceData['mod_for'];
            $race->mod_des = $raceData['mod_des'];
            $race->mod_cos = $raceData['mod_cos'];
            $race->mod_int = $raceData['mod_int'];
            $race->mod_sag = $raceData['mod_sag'];
            $race->mod_car = $raceData['mod_car'];
            $race->save();
        }
    }
}
