<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        'Codigo',
        'fecha',
        'monto_total',
        'id_cliente',
        'id_empleado',
        'id_oportunidad',
        'id_estado',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function empleado()
    {
        return $this->belongsTo(User::class, 'id_empleado');
    }

    public function oportunidad()
    {
        return $this->hasOne(OportunidadDeVenta::class, 'id_oportunidad');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }
}
