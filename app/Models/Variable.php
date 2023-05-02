<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    use HasFactory;

    protected $fillable = [

        'numeracion',
        'nombre',
        'descripcion'
    ];

    public function detalles()
    {
        return $this->hasMany(Detalle::class);
    }
}
