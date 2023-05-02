<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaluo extends Model
{
    use HasFactory;
    protected $fillable = [

        'codigo',
        'radicado_id',
        'visitador_id',
        'asigna_visitador',
        'entrega_visitador',
        'estado_visitador',
        'valuador_id',
        'asigna_valuador',
        'entrega_valuador',
        'estado_valuador',
        'verificador_id',
        'asigna_verificador',
        'entrega_verificador',
        'estado_verificador',
        'lider_id',
        'novedades',
        'fecha_final',
       

    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class)->withDefault();
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function radicado()
    {
        return $this->belongsTo(Radicado::class);
    }
    
}
