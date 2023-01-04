<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Venta extends Model
{
    protected $fillable =[
        'venta_id',
        'pelicula_id',
        'cantidad',
        'precio',
    ];
    public function pelicula(){
        return $this->belongsTo(Pelicula::class);
    }

}
