<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Matias Ramos',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make(11111111),
        ])->assignRole('SuperAdmin');

        User::create([
            'name'=>'Luis Camargo',
            'email'=>'luis@gmail.com',
            'password'=>Hash::make(11111111),
        ])->assignRole('Cliente');

    }
}
