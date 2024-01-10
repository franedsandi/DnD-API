<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Race;
use App\Models\Skill;

class DashboardController extends Controller
{
    public function index(){

        $characters = Character::all();
        $races = Race::all();
        $skills = Skill::all();

        return view('admin.home', compact('characters', 'races', 'skills'));
    }
}
