<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        
    'id',
    'avaluo_id',
    'sector_id',
    'juridica_id',
    'sometido',
    'direccion',
    'barrio',
    'zona',
    'nombre_conjunto',
    'montaje',
    'numero_pisos',
    'numero_sotanos',
    'vetustez',
    'atendido_por',
    'telefono',
    'area',
    'frente',
    'fondo',
    'estrato',
    'observaciones',
    'sistema_coordenadas',
    'latitud',
    'longitud',
    'ano_construccion',
    'vida_util',
    'vida_remanente',
    'detalle_estado_conservacion_id',
    'detalle_estado_construccion_id',
    'detalle_irregularidad_planta_id',
    'detalle_irregularidad_altura_id',
    'detalle_danos_previos_id',
    'detalle_reparados_id',
    'detalle_estructura_id',
    'detalle_fachada_id',
    'detalle_cubierta_id',
    'detalle_iluminacion_id',
    'detalle_ventilacion_id',
    'observaciones_dependencias',
    'detalle_estado_pisos_id',
    'detalle_estado_muros_id',
    'detalle_estado_techos_id',
    'detalle_estado_carpinteria_metal_id',
    'detalle_estado_carpinteria_mandera_id',
    'detalle_estado_banos_id',
    'detalle_estado_cocina_id',
    'detalle_calidad_pisos_id',
    'detalle_calidad_muros_id',
    'detalle_calidad_techos_id',
    'detalle_calidad_carpinteria_metal_id',
    'detalle_calidad_carpinteria_mandera_id',
    'detalle_calidad_banos_id',
    'detalle_calidad_cocina_id',
    'created_at',
    'detalle_documentos_suministrados',
    'detalle_servicios_predio',
    'detalle_servicios_contador',
    'detalle_topografia',
    'detalle_tipo_inmueble',
    'detalle_uso_actual',
    'detalle_estado_construccion',
    'detalle_dotacion_comunal'
    ];
}


    

    