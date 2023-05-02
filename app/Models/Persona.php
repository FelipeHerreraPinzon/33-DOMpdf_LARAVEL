<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = [
        'detalle_tipo_documento_id',
        'numero_documento',
        'nombres',
        'apellidos',
        'celular',
        'telefono_fijo',
       /* 'correo',*/
        'codigo_postal',
        'direccion',
        /*'municipio_id',*/
        'departamento_id',
       
    ];


    public function municipio()
    {
        return $this->belongsTo(Municipio::class)->withDefault();
    }
    public function departamento()
    {
        return $this->belongsTo(Departamento::class)->withDefault();
    }
    
    public function radicados()
    {
        return $this->hasMany(Radicado::class);
    }
}
