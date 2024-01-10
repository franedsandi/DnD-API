<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required | min:3 | max:30',
            'description' => 'required | min:10 | max:255',
            'particular_buff' =>'max:30'
        ];
    }

    public function messages(){

        return [
            'name.required' => 'You have to insert a name for this skill.',
            'name.min' => 'Skill name must be at least 3 characters long.',
            'name.max' => 'Skill name must be at most 30 characters long.',
            'description.required'=> 'You must provide a description for this skill.',
            'description.min'=> 'Description must be at least 10 characters long.',
            'description.max'=> 'Description must be at most 255 characters long.',
            'particular_buff'=> 'Buff must be at most 30 characters long.',

        ];
    }
}
