<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropiedadHorizontal extends Model
{
    protected $table = 'propiedad_horizontal';
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'inmueble_id',
        'conjunto_cerrado',
        'ubicacion_inmueble',
        'numero_edificios',
        'unidades_por_piso',
        'total_unidades',
        'total_garajes',
        'total_garajes_comunales',
        'garajes_cubiertos',
        'garajes_descubiertos',
        'total_garajes_servidumbre_comunales',
        'garaje_sencillo',
        'garaje_doble',
        'total_depositos'

    ];
}



    