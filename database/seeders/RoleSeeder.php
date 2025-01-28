<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define roles with the 'web' guard
        $roles = ['admin', 'manager', 'seller', 'customer'];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        // Define permissions with the 'web' guard
        $permissions = [
            'manage users',
            'create users',
            'edit users',
            'delete users',
            'view users',
            'manage products',
            'create products',
            'edit products',
            'delete products',
            'view products',
            'manage orders',
            'create orders',
            'edit orders',
            'delete orders',
            'view orders',
            'manage categories',
            'create categories',
            'edit categories',
            'delete categories',
            'view categories',
            'view sales reports',
            'view customer reports',
            'view inventory reports',
            'view dashboard',
            'manage settings',
        ];

        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
        }

        // Assign permissions to roles
        $rolesPermissions = [
            'admin' => $permissions, // Admin gets all permissions
            'manager' => [
                'manage users',
                'view users',
                'manage products',
                'view products',
                'manage orders',
                'view orders',
                'manage categories',
                'view categories',
                'view sales reports',
                'view dashboard',
            ],
            'seller' => [
                'create products',
                'edit products',
                'view products',
                'create orders',
                'view orders',
                'view dashboard',
            ],
            'customer' => [
                'view products',
                'view orders',
                'create orders',
                'view dashboard',
            ],
        ];

        foreach ($rolesPermissions as $roleName => $rolePermissions) {
            $role = Role::where('name', $roleName)->first();
            if ($role) {
                $role->syncPermissions($rolePermissions);
            }
        }
    }
}
