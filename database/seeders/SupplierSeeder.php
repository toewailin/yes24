<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Insert 100 suppliers into the 'suppliers' table
        for ($i = 0; $i < 100; $i++) {
            DB::table('suppliers')->insert([
                'name' => $faker->company, // Random company name
                'contact_email' => $faker->unique()->safeEmail, // Random unique email
                'contact_phone' => $faker->phoneNumber, // Random phone number
                'address' => $faker->address, // Random address
                'description' => $faker->sentence(10), // Random description
                'created_at' => now(),
                'updated_at' => now(),
                // Soft delete is handled automatically in migrations (no need to add)
            ]);
        }
    }
}
