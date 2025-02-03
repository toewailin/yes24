<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,       // Ensure roles & permissions exist first ✅
            UserSeeder::class,       // Create users ✅
            UserRoleSeeder::class,   // Assign roles to users ✅
            ArtistSeeder::class,
            BannerSeeder::class,
            FaqSeeder::class,
            EventSeeder::class,
            FaqSeeder::class,
            CategorySeeder::class, // Seed categories ✅
            SubCategorySeeder::class, // Seed subcategories ✅
            SupplierSeeder::class,
            ProductSeeder::class,  // Seed products ✅
        ]);
    }
}
