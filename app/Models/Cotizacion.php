<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $fillable = ['Codigo', 'fecha', 'monto_total', 'id_oportunidad', 'id_estado'];

    // Relación con OportunidadDeVenta
    public function oportunidadDeVenta()
    {
        return $this->hasOne(OportunidadDeVenta::class,'id','id_oportunidad',);
    }

    // Relación con Estado
    public function estado()
    {
        return $this->hasOne(Estado::class, 'id', 'id_estado');
    }
}
