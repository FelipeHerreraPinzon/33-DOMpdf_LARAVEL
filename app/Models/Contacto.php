<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
protected $fillable = [
       
        'contacto_nombres',
        'contacto_apellidos',
        'contacto_tel',
        'contacto_direccion',
        'contacto_email',
    ];

    public function radicados()
    {
        return $this->hasMany(Radicado::class);
    }
    public function personas()
    {
        return $this->hasMany(Persona::class);
    }
}
