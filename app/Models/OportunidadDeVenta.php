<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OportunidadDeVenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'monto_esperado',
        'fecha_estimada_cierre',
        'id_estado',
        'id_empleado',
        'id_cliente',
    ];
    // Relación con Estado
    public function estado()
    {
        return $this->hasOne(Estado::class,'id','id_estado');
    }

    // Relación con Empleado
    public function empleado()
    {
        return $this->hasOne(User::class,'id','id_empleado');
    }

    // Relación con Cliente
    public function cliente()
    {
        return $this->hasOne(Cliente::class,'id','id_cliente');
    }

    public function actividades()
    {
    return $this->hasMany(Actividad::class, 'id_oportunidad', 'id');
    }
}
