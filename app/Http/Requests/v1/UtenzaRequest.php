<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class UtenzaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "idUtente" => "integer"   , 
            "user" => "required|string"  ,  
            "sfida" => ""    ,
            "secretJWT"=>"",
            "inizioSfida" => ""    ,
            "obbligoCambio" => ""    ,
        ];
    }
}