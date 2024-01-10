<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;
use Illuminate\Support\Str;
use App\Models\Race;
use App\Models\User;


class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // in this file there is the default array of characters

        $characterData = include(base_path('database/seeders/characters_data.php'));

            foreach ($characters as $characterData) {
                $character = new Character;
                $character->name = $characterData['name'];
                $character->slug = Character::generateSlug($character->name);
                $character->race_id = $characterData['race_id'];
                $character->user_id = $characterData['user_id'];
                $character->height = $characterData['height'];
                $character->weight = $characterData['weight'];
                $character->background = $characterData['background'];
                $character->picture = $characterData['picture'];
                $character->armor_class = $characterData['armor_class'];
                $character->for = $characterData['for'];
                $character->des = $characterData['des'];
                $character->cos = $characterData['cos'];
                $character->int = $characterData['int'];
                $character->sag = $characterData['sag'];
                $character->car = $characterData['car'];
                $character->price = $characterData['price'];
                $character->save();
            }
        }

    }




// this is the old for loop seeder made with faker


// for($i=0; $i<10;$i++){
//     $character = new Character();
//     $character->name = $faker->name;
//     $character->race_id = Race::inRandomOrder()->first()->id;
//     $character->height= $faker->randomFloat(2, 1, 999);
//     $character->weight= $faker->randomFloat(2, 1, 999999);
//     $character->background= $faker->text();
//     $character->picture= $faker->imageUrl();
//     $character->armor_class= $faker->numberBetween(10, 20);
//     $character->for= $faker->numberBetween(3, 18);
//     $character->des= $faker->numberBetween(3, 18);
//     $character->cos= $faker->numberBetween(3, 18);
//     $character->int= $faker->numberBetween(3, 18);
//     $character->sag= $faker->numberBetween(3, 18);
//     $character->car= $faker->numberBetween(3, 18);
//     $character->save();
// }
