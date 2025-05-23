<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer les rôles
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'User']);

        // Créer les permissions
        $permissions = [
            'create documents',
            'edit documents',
            'delete documents',
            'view documents'
        ];

        foreach ($permissions as $permission) {
            $perm = Permission::create(['name' => $permission]);
            $admin->permissions()->attach($perm); // Donner toutes les permissions à l'Admin
        }
    }
}
