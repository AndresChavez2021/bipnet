<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'info_contacto', 'correo', 'phone'];

    protected $table = 'clientes';

    public $timestamps = true;

    public function oportunidadesDeVenta()
    {
        return $this->hasMany(OportunidadDeVenta::class, 'id_cliente','id');
    }
}
