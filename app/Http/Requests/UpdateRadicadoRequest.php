<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRadicadoRequest extends FormRequest
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
            'numero_radicado' => [
                'required'
            ],

            'fecha' => [
                'required'
            ],
           

            'referente_id' => [
                'required'
            ],

            'tipo_inmueble_id' => [
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
            'departamento_id' => [
                'required'
            ],
            'municipio_id' => [
                'required'
            ],
            'cliente_id' => [//se cambia persona por cliente ya que persona es la tabla y suena ambiguo
                'required'
            ],
            'solicitante_id' => [
                'required'
            ],
            'contacto_id' => [
                'required'
            ],
            'valor_referente' => [
                'required'
            ],
            'honorarios' => [
                'required'
            ],


        ];
    }
}
