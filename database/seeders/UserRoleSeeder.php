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
        // Assign 'admin' role to the first user
        $user = User::find(1);
        $adminRole = Role::where(['name' => 'admin', 'guard_name' => 'web'])->first();

        if ($user && $adminRole) {
            $user->syncRoles([$adminRole->name]);
        }

        // Assign 'customer' role to the second user
        $customerUser = User::find(2);
        $customerRole = Role::where(['name' => 'customer', 'guard_name' => 'web'])->first();

        if ($customerUser && $customerRole) {
            $customerUser->syncRoles([$customerRole->name]);
        }
    }
}
