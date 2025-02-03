<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'manager', 'seller', 'customer'];

        foreach ($roles as $role) {
            User::updateOrCreate(
                ['email' => "{$role}@gmail.com"], // Ensure uniqueness by email
                [
                    'name' => ucfirst($role),
                    'password' => Hash::make('password'),
                    'role' => $role,
                ]
            );
        }
    }
}
