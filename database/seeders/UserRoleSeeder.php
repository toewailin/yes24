<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assign roles to users based on their IDs
        $roles = [
            1 => 'admin', // Admin (already assigned)
            2 => 'manager',
            3 => 'seller',
            4 => 'customer', // Customer (already assigned)
        ];

        foreach ($roles as $userId => $roleName) {
            $user = User::find($userId);
            $role = Role::where(['name' => $roleName, 'guard_name' => 'web'])->first();

            if ($user && $role) {
                $user->syncRoles([$role->name]);
            }
        }
    }
}