<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $fillable = [
        'departamento_codigo',
        'departamento_nombre',
    ];

    public function radicados()
    {
        return $this->hasMany(Radicado::class);
    }
    public function municipios()
    {
        return $this->hasMany(Municipio::class);
    }
    public function personas()
    {
        return $this->hasMany(Persona::class);
    }
}
