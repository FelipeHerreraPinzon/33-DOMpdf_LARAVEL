<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonaRequest extends FormRequest
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
            'tipodocumento_id' => [
                'required'
            ],
            'persona_numdoc' => [
                'required'
            ],
            'persona_nombres' => [
                'required'
            ],
            'persona_apellidos' => [
                'required'
            ],
            'persona_celular' => [
                'required'
            ],
            'persona_telfijo' => [
                'required'
            ],
           'persona_email' => [
                'required',
                'unique:personas,persona_email,' . $this->persona->id
            ],
            'persona_direccion' => [
                'required'
            ],
            'persona_codpostal' => [
                'required'
            ],
            'municipio_id' => [
                'required'
            ],
            'departamento_id' => [
                'required'
            ],
            'contacto_id' => [
                'required'
            ],

            //
        ];
    }
}
