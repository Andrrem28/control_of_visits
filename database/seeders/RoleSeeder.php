<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::updateOrCreate([
            'name' => 'admin'
        ],
        [
            'description' => 'Administrador'
        ]);

        Role::updateOrCreate([
            'name' => 'attendant'
        ],
        [
            'description' => 'Atendente'
        ]);

        Role::updateOrCreate([
            'name' => 'employee'
        ],
        [
            'description' => 'Funcionário'
        ]);
    }
}
