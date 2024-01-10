<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Http\Requests\SkillRequest;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::orderBy('name', 'ASC')->get();

        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillRequest $request)
    {
        $form_data = $request->all();

        $exist = Skill::where('name', $form_data['name'])->first();

        if($exist){
            return redirect()->route('admin.skills.create')->with('error', 'this skill already exists');
        }else{

            $new_skill = new Skill();

            $new_skill->slug = Skill::generateSlug($form_data['name']);

            $new_skill->fill($form_data);
            $new_skill->save();

            return redirect()->route('admin.skills.show', $new_skill)->with('success', 'New skill added successfully!');

        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        return view('admin.Skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillRequest $request, Skill $skill)
    {
        $form_data = $request->all();

        //generating a new slug only if necessary
        if($skill->name === $form_data['name']){
            $form_data['slug'] = $skill->slug;
        }else{
            $form_data['slug'] = Skill::generateSlug($form_data['name']);
        }

        $skill->update($form_data);

        return redirect()->route('admin.skills.show', $skill)->with('updated', 'Skill updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')->with('deleted', "The skill $skill->name has been deleted successfully");
    }
}
