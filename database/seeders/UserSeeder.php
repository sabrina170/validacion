<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\User;
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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'id_estudiante' => 1,
            'mod_user' => '',
            'tipo_mod' => 1
        ])->assignRole('admin');

        User::create([
            'name' => 'sabrina',
            'email' => 'sabrina@gmail.com',
            'password' => Hash::make('123'),
            'id_estudiante' => 1,
            'mod_user' => '',
            'tipo_mod' => 1
        ])->assignRole('estudiante');

        Alumno::create([
            'nombres' => 'demo',
            'apellidos' => 'demo',
            'dni' => 0,
            'codigo_cer' => 0,
            'inicio' => date('Y-m-d H:i:s'),
            'final' => date('Y-m-d H:i:s'),
            'image' => '',
            'codigo_cur' => '',
            'mod_user' => '',
            'tipo_mod' => 1,
        ]);
    }
}
