<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;

class SubCategorySeeder extends Seeder
{
    public function run()
    {
        // Ensure categories exist before proceeding
        $categories = Category::pluck('id', 'name')->toArray();
        if (empty($categories)) {
            throw new \Exception("No categories found. Please seed categories first.");
        }

        // Define subcategories
        $subcategories = [
            'Music & Vinyl' => ['K-POP', 'Concert DVD', 'OST', 'Vinyl (LP)'],
            'Movie & TV' => ['K-Drama', 'Blu-Ray', 'DVD', 'Others'],
            'Star Shop' => ['Photobook', 'Book/Magazine', 'MD', 'Season’s Greeting'],
            'Customer Center' => ['Your Messages', 'FAQ', '1:1 Consultation'],
        ];

        foreach ($subcategories as $categoryName => $subCategoryList) {
            if (!isset($categories[$categoryName])) {
                continue; // Skip if category does not exist
            }

            foreach ($subCategoryList as $subCategory) {
                DB::table('subcategories')->updateOrInsert([
                    'slug' => Str::slug($subCategory),
                    'category_id' => $categories[$categoryName],
                ], [
                    'name' => $subCategory,
                    'slug' => Str::slug($subCategory),
                    'description' => $subCategory . ' products in ' . $categoryName,
                    'is_active' => true,
                    'category_id' => $categories[$categoryName],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
