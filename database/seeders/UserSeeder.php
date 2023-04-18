<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::findByName('admin');

        $admin =  User::firstOrCreate(
            [
                'name' => 'admin',
                'email' => 'admin@teste.com.br',
            ],
            [
                'password' => Hash::make('123123123')
            ]
        );

        $admin->givePermissionTo(Permission::all());
        $admin->assignRole($role);
    }
}
