<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Permissão para o admin */
        Permission::updateOrCreate([
            'name' => 'manage_all'
        ]);

        /* Permissão para o atendente */
        Permission::updateOrCreate([
            'name' => 'manage_visit_and_visitor'
        ]);

        /* Permissão para o funcionário */
        Permission::updateOrCreate([
            'name' => 'read'
        ]);
    }
}
