<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class EpisodiStoreRequest extends FormRequest
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
    {
        return [
            "titolo" => 'required|string|max:45',
            "serieTv" =>'required|string|max:45',
            "episodio"=>'required|integer',
            "stagione"=>'required|integer',
            "durata"=>'required|integer',
            "anno"=>'required|integer',
            "trama"=>'required|string|max:255',
        ];
    }
}