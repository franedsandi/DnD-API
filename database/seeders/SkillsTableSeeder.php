<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Skill;


class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsData = include(base_path('database/seeders/skills_data.php'));
        foreach ($skills as $skillData){
            $skill= new Skill();
            $skill->name = $skillData['name'];
            $skill->slug = Skill::generateSlug($skill->name);
            $skill->description = $skillData['description'];
            $skill->particular_buff= $skillData['particular_buff'];
            $skill->save();
        }
    }
}
