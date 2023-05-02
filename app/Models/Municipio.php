<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $fillable = [
        'municipio_codigo',
        'municipio_nombre',
        'departamento_id',

    ];
    public function radicados()
    {
        return $this->hasMany(Radicado::class);
    }
   
    public function personas()
    {
        return $this->hasMany(Persona::class);
    }
    public function departamento()
    {
        return $this->belongsTo(Departamento::class)->withDefault();
    }

}
