<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radicado extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'numero_radicado',
        'referente_id',
        'fecha',
      
        'persona_id',
        'tipo_inmueble_id',
        'direccion',
        'barrio',
        'zona',
        'municipio_id',
        'departamento_id',
        'persona_id',
        'solicitante_id',
        'contacto_id',
        'valor_referente',
        'honorarios'

    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class)->withDefault();
    }

    public function tipoinmueble()
    {
        return $this->belongsTo(Tipoinmueble::class)->withDefault();
    }
    public function municipio()
    {
        return $this->belongsTo(Municipio::class)->withDefault();
    }
    public function departamento()
    {
        return $this->belongsTo(Departamento::class)->withDefault();
    }
   
    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

}
