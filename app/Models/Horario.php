<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';

    protected $fillable =[
        'hr_inicio','hr_fin',
    ];
    public function peliculas(){
        return $this->hasMany(Pelicula::class);
    }
}
