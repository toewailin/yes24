<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artists = [
            'EXO', 'BTS', '2PM', 'BigBang', 'SNSD', 'Twice', 'DAY6', 'GOT7',
            'IZ*ONE', 'IVE', 'Red Velvet', 'aespa', 'Mamamoo', 'MONSTA X', 'Block B',
            'SEVENTEEN', 'SHINee', 'G-Friend', 'Sechskies', 'STAYC', 'CNBLUE',
            'BTOB', 'NCT', 'ASTRO', 'WJSN', 'Girls-Day', 'SHINHWA', 'fromis_9',
            'B1A4', 'Lovelyz', 'TREASURE', 'Highlight', 'TVXQ!', 'Wanna One', 'Heize',
            'JBJ', 'Pentagon', 'T-ara', 'KNK', 'Infinite', 'Weki Meki', 'Winner',
            'The Boyz', 'OH MY GIRL', 'NU\'EST', 'Super Junior', 'Apink', 'Stray Kids',
            'BLACKPINK', 'ENHYPEN', 'ITZY', 'SF9', 'IU', 'ATEEZ', 'WayV'
        ];

        foreach ($artists as $artist) {
            DB::table('artists')->insert([
                'name' => $artist,
                'slug' => Str::slug($artist), // Generate slug from artist name
                'bio' => 'Biography of ' . $artist, // Simple bio example
                'image' => 'https://example.com/images/' . Str::slug($artist) . '.jpg', // Random image URL (adjust as needed)
                'genre' => 'K-pop', // Common genre for the artists
                'is_active' => true, // All artists are set as active by default
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
    }
}
