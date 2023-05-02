<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAsignadoRequest extends FormRequest
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
          'codigo' => [
                'required'
            ],
           'radicado_id' => [
                'required'
            ],

            'visitador_id' => [
                'required'
            ],
           'asigna_visitador' => [
                'required'
            ],

            /*'entrega_visitador' => [
                'required'
            ],*/

           'estado_visitador' => [
                'required'
            ],
            'valuador_id' => [
                'required'
            ],
            'asigna_valuador' => [
                'required'
            ],
            /*'entrega_valuador' => [
                'required'
            ],*/
            'estado_valuador' => [
                'required'
            ],
            'verificador_id' => [
                'required'
            ],
            /*'asigna_verificador' => [
                'required'
            ],
            /*'entrega_verificador' => [
                'required'
            ],
            'estado_verificador' => [
                'required'
            ],*/
            'lider_id' => [
                'required'
            ],
            /*'novedades' => [
                'required'
            ],
            /*'fecha_final' => [
                'required'
            ],

            'hora_final' => [
                'required'
            ],*/





        ];
    }
}
