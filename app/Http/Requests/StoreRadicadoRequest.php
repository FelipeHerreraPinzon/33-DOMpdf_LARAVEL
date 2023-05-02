<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRadicadoRequest extends FormRequest
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
            'user_id' => [
                'required'
            ],
            'numradicado' => [
                'required'
            ],
           
            'fecha' => [
                'required'
            ],
           
            'referente_id' => [
                'required'
            ],
            
            'tipoinmueble_id' => [
                'required'
            ],
            'direccion' => [
                'required'
            ],
            'barrio' => [
                'required'
            ],
            'zona' => [
                'required'
            ],
            'municipio_id' => [
                'required'
            ],
            'departamento_id' => [
                'required'
            ],
            'persona_id' => [
                'required'
            ],
            'solicitante_id' => [
                'required'
            ], 
            'contacto_id' => [
                'required'
            ],
            'vrreferente' => [
                'required'
            ],
            'honorarios' => [
                'required'
            ],


        ];
    }
}
