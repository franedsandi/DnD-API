<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterRequest extends FormRequest
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

            "name" => "required|min:2|max:50",
            "height" => "numeric|between:1,999",
            "weight" => "numeric|between:1,999999",
            "background" => "required|min:2",
            "picture" => "min:2",
            "armor_class" => "numeric|between:10,20",
            "for" => "numeric|between:3,18",
            "des" => "numeric|between:3,18",
            "cos" => "numeric|between:3,18",
            "int" => "numeric|between:3,18",
            "sag" => "numeric|between:3,18",
            "car" => "numeric|between:3,18",
        ];
    }
    public function messages(){
        return[
            "name.required" => "Devi inserire il nome del personaggio",
            "name.min" => "Il nome del personaggio non deve avere meno  di :min caratteri",
            "name.max" => "Il nome del personaggio non deve superare i :max caratteri",
            "height.numeric" => "Devi inserire un numero",
            "height.between" => "Il numero deve essere compreso tra 1 e 999",
            "weight.numeric" => "Devi inserire un numero",
            "weight.between" => "Il numero deve essere compreso tra 1 e 999999",
            "background.required" => "Devi inserire una descrizione",
            "picture.min" => "Il link della immagine deve avere almeno :min charatteri",
            "armor_class.numeric" => "Devi inserire un numero",
            "armor_class.between" => "Il numero deve essere compreso tra 10 e 20",
            "for.numeric" => "Devi inserire un numero",
            "for.between" => "Il numero deve essere compreso tra 3 e 18",
            "des.numeric" => "Devi inserire un numero",
            "des.between" => "Il numero deve essere compreso tra 3 e 18",
            "cos.numeric" => "Devi inserire un numero",
            "cos.between" => "Il numero deve essere compreso tra 3 e 18",
            "int.numeric" => "Devi inserire un numero",
            "int.between" => "Il numero deve essere compreso tra 3 e 18",
            "sag.numeric" => "Devi inserire un numero",
            "sag.between" => "Il numero deve essere compreso tra 3 e 18",
            "car.numeric" => "Devi inserire un numero",
            "car.between" => "Il numero deve essere compreso tra 3 e 18",
        ];
    }
}
