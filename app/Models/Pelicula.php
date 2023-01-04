<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = 'peliculas';

    protected $fillable =[

        'titulo',
        'descripcion',
        'idioma',
        'cantidad_t',
        'precio',
        'image',
        'status',
        'categoria_id',
        'horario_id',
    ];
    public function categorias(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }
    public function horarios(){
        return $this->belongsTo(Horario::class,'horario_id');
    }
}
