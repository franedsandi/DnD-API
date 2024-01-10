<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Race;
use App\Models\Character;
use App\Http\Requests\RaceRequest;


class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $races = Race::query();

        if ($searchTerm) {
            $races = $races->where('name', 'LIKE', "%$searchTerm%");
        }

        $races = $races->orderBy('id', 'desc')->paginate(8);
        return view('admin.Races.index', compact('races'));
    }

    public function characterRaces(Race $race) {
        $characters = $race->characters()->orderBy('id', 'desc')->paginate(4);
        return view('admin.races.character_race', compact('race', 'characters'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.races.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RaceRequest $request)
    {
        $form_data = $request->all();

        $exist = Race::where('name', $form_data['name'])->first();
        if($exist){
            return redirect()->route('admin.races.index')->with('error', 'This race already exist');
        }else{
            $new_race = new Race();
            $new_race->slug = Race::generateSlug($form_data['name']);
            $new_race->fill($form_data);
            $new_race->save();
            return redirect()->route('admin.races.show', $new_race)->with('success', 'the race was successfully created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Race $race)
    {
        return view('admin.races.show', compact('race'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Race $race)
    {
        return view('admin.races.edit', compact('race'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RaceRequest $request, Race $race)
    {
        $form_data = $request->all();
         //  slug
        if ($race->name === $form_data['name']) {
            $form_data['slug'] = $race->slug;
        } else {
            $form_data['slug'] = Race::generateSlug($form_data['name']);
        }

        $race->update($form_data);
        return redirect()->route('admin.races.show', $race)->with('updated', "The $race->name have been updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Race $race)
    {
        $race->delete();
        return redirect()->route('admin.races.index')->with('deleted', "The race $race->name have been deleted (race extintion) successfully and you have been automaticaly redirected to the general characters list");
    }
}
