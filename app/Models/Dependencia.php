<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
    'inmueble_id',
    'salas',
    'salas_area',
    'detalle_acabados_salas_id',
    'comedores',
    'comedores_area',
    'detalle_acabados_comedores_id',
    'estudios',
    'estudios_area',
    'detalle_acabados_estudios_id',
    'banos_sociales',
    'banos_sociales_area',
    'detalle_acabados_banos_sociales_id',
    'star_habitaciones',
    'star_habitaciones_area',
    'detalle_acabados_star_habitaciones_id',
    'habitaciones',
    'habitaciones_area',
    'detalle_acabados_habitaciones_id',
    'banos_privados',
    'banos_privados_area',
    'detalle_acabados_banos_privados_id',
    'cocinas',
    'cocinas_area',
    'detalle_acabados_cocinas_id',
    'cuartos_servicio',
    'cuartos_servicio_area',
    'detalle_acabados_cuartos_servicio_id',
    'banos_servicio',
    'banos_servicio_area',
    'detalle_acabados_banos_servicio_id',
    'patios_ropas',
    'patios_ropas_area',
    'detalle_acabados_patios_ropas_id',
    'terrazas',
    'terrazas_area',
    'detalle_acabados_terrazas_id',
    'jardines',
    'jardines_area',
    'balcones',
    'balcones_area',
    'detalle_acabados_balcones_id',
    'patio_interior',
    'patio_interior_area',
    'detalle_acabados_patio_interior_id',
    'garajes',
    'garajes_area',
    'garajes_cubiertos',
    'garajes_cubiertos_area',
    'garajes_descubiertos',
    'garajes_descubiertos_area',
    'depositos',
    'depositos_area',
    'garajes_privados',
    'garajes_privados_area',
    'garajes_uso_exclusivo',
    'garajes_uso_exclusivo_area',
    'garajes_sencillo',
    'garajes_sencillo_area',
    'garajes_dobles',
    'garajes_dobles_area',
    'local',
    'local_area',
    'detalle_acabados_local_id',
    'bahia_comunal',
    'bahia_comunal_area',
    'oficina',
    'oficina_area',
    'detalle_acabados_oficina_id',
    'iluminacion',
    'iluminacion_area',
    'detalle_acabados_iluminacion_id',
    'ventilacion',
    'ventilacion_area',
    'detalle_acabados_ventilacion_id',
    'zonas_verdes',
    'zonas_verdes_area',
    'observaciones_dependencias'
    ];
}


    
