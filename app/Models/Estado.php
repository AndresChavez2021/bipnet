<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'tipo_O', 'tipo_C', 'tipo_V'];

    // Relación con OportunidadDeVenta
    public function oportunidadesDeVenta()
    {
        return $this->hasMany(OportunidadDeVenta::class, 'id_estado','id');
    }
}
