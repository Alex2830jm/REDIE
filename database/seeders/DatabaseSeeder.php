<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UnidadInformativa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            GrupoSeeder::class,
            //SectorSeeder::class,
            //TemasSeeder::class,
            RoleSeeder::class,
            PermissionSeed::class,
            RoleHasPermission::class,
            SectorRoleSeed::class,
            TemasRoleSeed::class,
            UserSeeder::class,
            DependenciaInformativaSeed::class,
            //DependeciaSeed::class,
            //UnidadInformativaSeeder::class,
        ]);
    }
}
