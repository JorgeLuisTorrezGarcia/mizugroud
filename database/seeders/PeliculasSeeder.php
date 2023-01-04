<?php

namespace Database\Seeders;

use App\Models\Pelicula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelicula::create([
            'titulo'=>'EL HOMBRE ARAÑA',
            'descripcion'=>'...',
            'cantidad_t'=>'40',
            'precio'=>'25',
            'categoria_id'=>'1',
            'horario_id'=>'1',
            'idioma'=>'Español',
        ]);
        Pelicula::create([
            'titulo'=>'VENOM',
            'descripcion'=>'...',
            'cantidad_t'=>'40',
            'precio'=>'25',
            'categoria_id'=>'1',
            'horario_id'=>'2',
            'idioma'=>'Español',
        ]);
        Pelicula::create([
            'titulo'=>'PINOCHO',
            'descripcion'=>'...',
            'cantidad_t'=>'40',
            'precio'=>'30',
            'categoria_id'=>'4',
            'horario_id'=>'3',
            'idioma'=>'Español',
        ]);
        Pelicula::create([
            'titulo'=>'JURASSIC PARK',
            'descripcion'=>'...',
            'cantidad_t'=>'40',
            'precio'=>'35',
            'categoria_id'=>'3',
            'horario_id'=>'4',
            'idioma'=>'Español',
        ]);
    }
}
