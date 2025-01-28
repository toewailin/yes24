<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        // Define categories and subcategories
        $categories = [
            [
                'name' => 'Music & Vinyl',
                'slug' => Str::slug('Music & Vinyl'),
                'description' => 'Category for music and vinyl products.',
                'image' => 'music_vinyl_image.jpg', 
                'is_active' => true,
                'order' => 1, 
                'subcategories' => [
                    ['name' => 'K POP', 'slug' => Str::slug('K POP')],
                    ['name' => 'Concert DVD', 'slug' => Str::slug('Concert DVD')],
                    ['name' => 'OST', 'slug' => Str::slug('OST')],
                    ['name' => 'Vinyl (LP)', 'slug' => Str::slug('Vinyl LP')],
                ],
            ],
            // Other categories follow here...
        ];

        // Insert categories and subcategories
        foreach ($categories as $categoryData) {
            // Create the category
            $category = Category::create([
                'name' => $categoryData['name'],
                'slug' => $categoryData['slug'],
                'description' => $categoryData['description'],
                'image' => $categoryData['image'],
                'is_active' => $categoryData['is_active'],
                'parent_id' => null,
                'order' => $categoryData['order'],
            ]);

            // Create subcategories if they exist
            if (!empty($categoryData['subcategories'])) {
                foreach ($categoryData['subcategories'] as $subCategoryData) {
                    SubCategory::create([
                        'name' => $subCategoryData['name'],
                        'slug' => $subCategoryData['slug'],
                        'description' => $subCategoryData['name'] . ' products in ' . $category->name,
                        'is_active' => true,
                        'category_id' => $category->id, // Associate subcategory with category
                    ]);
                }
            }
        }
    }
}
