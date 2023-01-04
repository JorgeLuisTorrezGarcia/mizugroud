<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HorariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Horario::create([
            'hr_inicio'=>'8:30',
            'hr_fin'=>'11:30'
        ]);
        Horario::create([
            'hr_inicio'=>'12:00',
            'hr_fin'=>'16:50'
        ]);
        Horario::create([
            'hr_inicio'=>'17:00',
            'hr_fin'=>'18:50'
        ]);
        Horario::create([
            'hr_inicio'=>'19:00',
            'hr_fin'=>'21:50'
        ]);
    }
}
