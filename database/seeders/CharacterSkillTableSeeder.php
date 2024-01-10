<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;
use App\Models\Skill;


class CharacterSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 18; $i++){
            $character = Character::inRandomOrder()->first();
            $skill_id = Skill::inRandomOrder()->first()->id;
            $character->skills()->attach($skill_id);
        }
    }
}
