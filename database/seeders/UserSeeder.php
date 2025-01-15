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
        $administrador = User::create([
            'name'      => 'Administrador',
            'username'  => 'admin',
            'password'  => Hash::make('password'),
            'activo'    => TRUE
        ]);

        $DE = User::create([
            'name' => 'Ruben',
            'primerApellido' => 'Gonzalez',
            'segundoApellido' => 'Mireles',
            'username' => 'rgonzalezm',
            'password' => Hash::make('password'),
            'activo' => TRUE
        ]);

        $DES = User::create([
            'name' => 'Salvador',
            'primerApellido' => 'Perez',
            'segundoApellido' => 'Casildo',
            'username' => 'sperezc',
            'password' => Hash::make('password'),
            'activo' => TRUE
        ]);

        $DEE = User::create([
            'name' => 'Alberto',
            'primerApellido' => 'Mejia',
            'segundoApellido' => 'Reyes',
            'username' => 'amejiar',
            'password' => Hash::make('password'),
            'activo' => TRUE
        ]);

        $administrador->syncRoles(['SA']);
        $DE->syncRoles(['DE']);
        $DES->syncRoles(['DES']);
        $DEE->syncRoles(['DEE']);
    }
}
