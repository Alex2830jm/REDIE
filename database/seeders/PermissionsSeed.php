<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $permissions = Permission::insert([
            ['name' => '', 'description' => ''],
            ['name' => '', 'description' => ''],
            ['name' => '', 'description' => ''],
            ['name' => '', 'description' => ''],
            ['name' => '', 'description' => ''],
            ['name' => '', 'description' => ''],
            ['name' => '', 'description' => ''],
            ['name' => '', 'description' => ''],
            ['name' => '', 'description' => ''],
            ['name' => '', 'description' => ''],
            ['name' => '', 'description' => ''],
            ['name' => '', 'description' => ''],
            
        ]);
    }
}
