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
     */
    public function run(): void
    {
        $usuario = User::create([
            'name' => 'Alex Donaldo',
            'primerApellido' => 'Martínez',
            'segundoApellido' => 'Jiménez',
            'username' => 'amartinezj',
            'password' => Hash::make('password'),
            'activo' => TRUE
        ]);
    }
}
