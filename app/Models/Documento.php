<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $fillable = [

        'radicado_id',
        'inmueble_id',
        'nombre',
        'nombre_imagen',
        'tipo',
        'url',
    ];





    public function radicados()
    {
        return $this->belongsTo(Radicado::class)->withDefault();
    }

}
