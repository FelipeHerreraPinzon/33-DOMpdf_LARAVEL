<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'contacto_nombres' => [
                'required'
            ],
            'contacto_apellidos' => [
                'required'
            ],
            'contacto_tel' => [
                'required'
            ],
            'contacto_direccion' => [
                'required'
            ],
            'contacto_email' => [
                'required'
            ],
        ];
    }
}
