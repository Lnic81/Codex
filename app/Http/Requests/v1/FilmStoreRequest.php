<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class FilmStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    //public function authorize(): bool
    //{
    //    return false;
    //}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    { //metto i campi della tabella da creare
        return [
        'titolo'=> 'required|string|max:80',
        'durata'=> 'required|integer',
        'regista'=> 'required|string|max:80',
        'categoria' => 'required|string|max:80',
        'anno'=> 'required|integer',
        'trama'=> 'required|string',
        ];
    }
}