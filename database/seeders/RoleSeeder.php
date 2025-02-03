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
        // Ensure the Admin Role Exists First
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        $roles = ['manager', 'seller', 'customer'];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        // Define permissions for each menu item
        $permissions = [
            // User Management (FIXED ISSUE)
            'manage users', 'create users', 'edit users', 'delete users', 'view users',

            // Artists
            'manage artists', 'create artists', 'edit artists', 'delete artists', 'view artists',

            // Banners
            'manage banners', 'create banners', 'edit banners', 'delete banners', 'view banners',

            // Categories
            'manage categories', 'create categories', 'edit categories', 'delete categories', 'view categories',

            // Subcategories
            'manage subcategories', 'create subcategories', 'edit subcategories', 'delete subcategories', 'view subcategories',

            // Products & Product Details
            'manage products', 'create products', 'edit products', 'delete products', 'view products',
            'manage product details', 'create product details', 'edit product details', 'delete product details', 'view product details',

            // Carts & Orders
            'manage carts', 'view carts',
            'manage orders', 'create orders', 'edit orders', 'delete orders', 'view orders',
            'manage order products', 'view order products',

            // FAQs & Events
            'manage faqs', 'create faqs', 'edit faqs', 'delete faqs', 'view faqs',
            'manage events', 'create events', 'edit events', 'delete events', 'view events',

            // Suppliers & Customers
            'manage suppliers', 'create suppliers', 'edit suppliers', 'delete suppliers', 'view suppliers',
            'manage customers', 'create customers', 'edit customers', 'delete customers', 'view customers',

            // Shifts & Roles
            'manage shifts', 'create shifts', 'edit shifts', 'delete shifts', 'view shifts',
            'manage roles', 'create roles', 'edit roles', 'delete roles', 'view roles',

            // Reports & Dashboard
            'view sales reports', 'view dashboard'
        ];

        // Create all permissions before assigning them
        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
        }

        // Role-Permission Mapping (Ensure all permissions exist before assignment)
        $rolesPermissions = [
            'admin' => $permissions, // Admin gets all permissions
            'manager' => [
                'manage users', 'view users',
                'manage categories', 'view categories',
                'manage products', 'view products',
                'manage orders', 'view orders',
                'manage customers', 'view customers',
                'manage events', 'view events',
                'manage shifts', 'view shifts',
                'view sales reports', 'view dashboard',
            ],
            'seller' => [
                'create products', 'edit products', 'view products',
                'create orders', 'view orders',
                'manage banners', 'view dashboard',
            ],
            'customer' => [
                'view products', 'view orders', 'create orders', 'manage carts', 'view faqs', 'view dashboard',
            ],
        ];

        // Assign permissions to roles AFTER they exist
        foreach ($rolesPermissions as $roleName => $rolePermissions) {
            $role = Role::where('name', $roleName)->first();
            if ($role) {
                $role->syncPermissions($rolePermissions);
            }
        }

        // Ensure Admin Gets All Permissions
        if ($adminRole) {
            $adminRole->syncPermissions(Permission::all());
        }
    }
}
