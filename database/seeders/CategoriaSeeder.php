<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre'=>'ACCION',
            'descripcion'=>'Peliculas de accion',
        ]);
        Categoria::create([
            'nombre'=>'COMEDIA',
            'descripcion'=>'Peliculas de comedia',
        ]);
        Categoria::create([
            'nombre'=>'SUSPENSO',
            'descripcion'=>'Peliculas de suspenso',
        ]);
        Categoria::create([
            'nombre'=>'ANIMADA',
            'descripcion'=>'Peliculas animadas',
        ]);
    }
}
