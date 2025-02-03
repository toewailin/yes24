<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            ['title' => 'Big Summer Sale', 'link' => '/sale'],
            ['title' => 'New Arrivals', 'link' => '/new-arrivals'],
            ['title' => 'Exclusive VIP Offers', 'link' => '/vip'],
            ['title' => 'Limited-Time Deals', 'link' => '/deals'],
            ['title' => 'Flash Sale Today', 'link' => '/flash-sale'],
            ['title' => 'Best Sellers Collection', 'link' => '/best-sellers'],
            ['title' => 'Trending Now', 'link' => '/trending'],
            ['title' => 'Shop Now & Save More', 'link' => '/shop-now'],
            ['title' => 'Weekend Specials', 'link' => '/weekend-specials'],
            ['title' => 'Mega Clearance Sale', 'link' => '/clearance'],
        ];

        $baseImageUrl = 'https://secimage.yes24.com/banners/'; // Base image URL

        foreach ($banners as $index => $banner) {
            DB::table('banners')->insert([
                'title' => $banner['title'],
                'description' => 'Check out the latest offers and discounts for ' . $banner['title'] . '.',
                'image' => $baseImageUrl . Str::slug($banner['title']) . '.jpg', // Image file using slug format
                'link' => $banner['link'],
                'is_active' => true,
                'order' => $index + 1, // Incremental order
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
