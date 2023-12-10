<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto_Servicio extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'id_categoria'];
    
    protected $perPage = 20;

    public function categoria()
    {
        return $this->hasOne(Categoria::class,'id','id_categoria');
    }
}
