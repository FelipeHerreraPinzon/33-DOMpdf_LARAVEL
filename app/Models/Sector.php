<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sector';
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
    
        'id',
        'estrato',
        'legalidad',
        'detalle_topografia_id',
        'detalle_transporte_id',
        'detalle_uso_predominante_id',
        'detalle_servicios_sector',
        'detalle_vias_acceso',
        'detalle_estado_vias_acceso_id',
        'detalle_amoblamiento_urbano',
        'perspectivas_valorizacion'    
    
    ];
}


    
   
    