<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipoinmueble extends Model
{

   

    use HasFactory;
    protected $fillable = [
        'nombre',
    ];



    public function radicados()
    {
        return $this->hasMany(Radicado::class);
    }
}
