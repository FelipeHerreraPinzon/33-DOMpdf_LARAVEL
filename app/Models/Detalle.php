<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'variable_numeracion'
    ];

    public function variable()
    {
        return $this->belongsTo(Variable::class)->withDefault();
    }
}
