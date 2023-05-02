<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMunicipioRequest extends FormRequest
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
            'municipio_codigo' => [
                'required'
            ],
            'municipio_nombre' => [
                'required'
            ],
            'departamento_id' => [
                'required'
            ],
        ];
    }
}