<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'telefono' => '9991234567',
            'password' => Hash::make('admin123'),
            'nombre' => 'Admin',
            'apellidos' => 'Principal',
            'direccion' => 'Centro',
            'correo' => 'admin@ejemplo.com',
            'estado' => 'Yucatán',
            'ciudad' => 'Mérida',
            'rol' => 'admin',
        ]);

        User::create([
            'telefono' => '9999876543',
            'password' => Hash::make('cliente123'),
            'nombre' => 'Juan',
            'apellidos' => 'Cliente',
            'direccion' => 'Col. México',
            'correo' => 'cliente@ejemplo.com',
            'estado' => 'Yucatán',
            'ciudad' => 'Mérida',
            'rol' => 'cliente',
        ]);
    }
}
