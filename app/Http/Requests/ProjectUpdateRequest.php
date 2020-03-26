<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name" => "required",
            "active" => ["nullable", Rule::in([0,1,2])],
            "website"=> "url",
            "campaign.*.start" => "date"
        ];
    }

    public function messages()
    {
        return [
            "required" => "Atrybut :attribute jest wymagany",
            "url" => "Niepoprawny format adresu internetowego",
            "in" => "Atrybut :attribute musi przyjmować dostępną wartość",
            "date" => "Atrybut :attribute musi przyjmować poprawny format daty"
        ];
    }

    public function attributes()
    {
        return [
            "name" => "Nazwa projektu",
            "website" => "adres strony",
            "active" => "aktywność"
        ];
    }

}