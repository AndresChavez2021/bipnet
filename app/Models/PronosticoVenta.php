<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PronosticoVenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'fecha',
        'p10',
        'p50',
        'p90',
        'ref',
    ];

}
