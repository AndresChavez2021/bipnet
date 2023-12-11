<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha', 'detalles', 'id_oportunidad'];

    // Relación con oportunidad_de_ventas
    public function oportunidadDeVenta()
    {
        return $this->hasOne(OportunidadDeVenta::class,'id','id_oportunidad');
    }
}
