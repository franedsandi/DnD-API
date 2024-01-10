<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Skill;
use App\Models\Race;
use App\Models\Character;
use App\Http\Requests\CharacterRequest;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        $characters = Character::where('user_id', Auth::id());

        if ($searchTerm) {
            $characters->where('name', 'LIKE', "%$searchTerm%");
        }

        $characters = $characters->orderBy('id', 'desc')->paginate(4);

        return view('admin.Characters.index', compact('characters', 'searchTerm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $character= new Character();
        $races=Race::all();
        $skills = Skill::all();
        return view('admin.Characters.create',compact('races','character', 'skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CharacterRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Character::generateSlug($form_data['name']);
        $form_data['user_id'] = Auth::id();
        $new_character = new Character();
        $new_character->fill($form_data);

        $race = Race::where('name', $form_data['race'])->first();
        $new_character->save();
        $new_character->race()->associate($race);

        if (array_key_exists('skills', $form_data)) {
            $new_character->skills()->attach($form_data['skills']);
        }
        $new_character->save();

        return redirect()->route('admin.characters.show', $new_character->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        if($character->user_id != Auth::id()){
            return view('errors.404');
        }
        return view('admin.characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        $races = Race::all();
        $skills = Skill::all();

        if($character->user_id != Auth::id()){
            return view('errors.404');
        }

        return view('admin.characters.edit', compact('character', 'races', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CharacterRequest $request, Character $character)
    {
        $form_data = $request->all();
        if ($character->name === $form_data['name']) {
            $form_data['slug'] = $character->slug;
        } else {
            $form_data['slug'] = Character::generateSlug($form_data['name']);
        }
        $character->update($form_data);
        if (array_key_exists('skills', $form_data)) {
            $character->skills()->sync($form_data['skills']);
        }
        else{
            $character->skills()->detach();
        }
        $races = Race::all();

        return redirect()->route('admin.characters.show', ['character' => $character->id])->with('updated', "The character $character->name have been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('admin.characters.index')->with('deleted', "The Character $character->name have been deleted successfully and you have been automaticaly redirected to the general characters list");
    }
}
