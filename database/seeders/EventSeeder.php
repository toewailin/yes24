<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            ['title' => 'Flash Sale Event', 'start_date' => '2025-02-01 10:00:00', 'end_date' => '2025-02-02 23:59:59', 'location' => 'Online Store'],
            ['title' => 'New Year Mega Sale', 'start_date' => '2025-01-10 00:00:00', 'end_date' => '2025-01-15 23:59:59', 'location' => 'Online Store'],
            ['title' => 'Valentine’s Day Special', 'start_date' => '2025-02-14 00:00:00', 'end_date' => '2025-02-14 23:59:59', 'location' => 'Online Store'],
            ['title' => 'Black Friday Blowout', 'start_date' => '2025-11-29 00:00:00', 'end_date' => '2025-12-01 23:59:59', 'location' => 'Online & Physical Stores'],
            ['title' => 'Cyber Monday Deals', 'start_date' => '2025-12-02 00:00:00', 'end_date' => '2025-12-02 23:59:59', 'location' => 'Website & Mobile App'],
            ['title' => 'Spring Festival Discounts', 'start_date' => '2025-03-21 10:00:00', 'end_date' => '2025-03-25 22:00:00', 'location' => 'Online & Selected Stores'],
            ['title' => 'Summer Clearance Sale', 'start_date' => '2025-07-01 00:00:00', 'end_date' => '2025-07-10 23:59:59', 'location' => 'Online Store'],
            ['title' => 'Exclusive VIP Shopping Night', 'start_date' => '2025-06-15 18:00:00', 'end_date' => '2025-06-15 22:00:00', 'location' => 'Private Online Event'],
            ['title' => 'Christmas Gift Specials', 'start_date' => '2025-12-15 00:00:00', 'end_date' => '2025-12-25 23:59:59', 'location' => 'All Platforms'],
            ['title' => 'Back to School Sale', 'start_date' => '2025-08-10 00:00:00', 'end_date' => '2025-08-20 23:59:59', 'location' => 'Online Store'],
            ['title' => 'Anniversary Celebration Discounts', 'start_date' => '2025-09-01 00:00:00', 'end_date' => '2025-09-05 23:59:59', 'location' => 'Exclusive Online Store Event'],
            ['title' => 'Weekend Super Deals', 'start_date' => '2025-04-05 00:00:00', 'end_date' => '2025-04-07 23:59:59', 'location' => 'Online & Mobile App'],
        ];

        $baseImageUrl = 'https://secimage.yes24.com/'; // Image base URL

        foreach ($events as $event) {
            DB::table('events')->insert([
                'title' => $event['title'],
                'description' => 'Exclusive discounts and offers during the ' . $event['title'] . '. Don’t miss out!',
                'start_date' => $event['start_date'],
                'end_date' => $event['end_date'],
                'location' => $event['location'],
                'image' => $baseImageUrl . 'events/' . Str::slug($event['title']) . '.jpg',
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
