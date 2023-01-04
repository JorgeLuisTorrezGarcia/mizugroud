<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'ci'=>'9044956',
            'nombre'=>'Matias Franco Ramos',
            'email'=>'matias@gmail.com',
            'telefono'=>'77777799',
        ]);
    }
}
