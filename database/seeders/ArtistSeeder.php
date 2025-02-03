<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artists = [
            'IU' => 'IU_6ab6',
            'Twice' => 'twice_48aa',
            'EXO' => 'EXO_1df4',
            'BTS' => 'BTS_b5a7',
            'Wanna One' => 'WANNAONE_d6c7',
            'Mamamoo' => 'MAMAMOO_bf4f',
            'MONSTA X' => 'MostaX_9077',
            'GOT7' => '갓세븐_59b0',
            '2PM' => '2PM_dcd1',
            'Red Velvet' => 'RedVelvet_147a',
            'SEVENTEEN' => 'SEVENTEEN__3100',
            'BTOB' => 'BTOB_3a3b',
            'SHINee' => 'SHINee_294e',
            'NCT' => 'NCT_5ab2',
            'G-Friend' => 'GFRIEND_2ab1',
            'BLACKPINK' => '블랙핑크_e732',
            'Stray Kids' => 'SKZ_48af',
            'TXT' => 'TXT_6c2d',
            'Winner' => 'WINNER_a8b1',
            'JBJ' => 'JBJ_5366',
            'ASTRO' => 'ASTRO_30a5',
            'INFINITE' => 'INFINITE_fc8c',
            'aespa' => 'aespa__6b7b',
            'OH MY GIRL' => 'ohmygirl_4925',
            'SF9' => 'SF9_ef4a',
            'DAY6' => 'DAY6_d5b8',
            'SHINHWA' => 'SHINHWA_ddb8',
            'SNSD' => 'SNSD_44f1',
            'Highlight' => 'HIGHLIGHT_d018',
            'Weki Meki' => 'WekiMeki_5a4c',
            'TREASURE' => 'TREASURE_7d6c',
            'Sechskies' => 'Sechskies_bd5b',
            'CNBLUE' => 'CNBLUE_368b',
            'WJSN' => 'WJSN_92ce',
            'B1A4' => 'B1A4_8a1d',
            'Lovelyz' => 'Lovelyz_7679',
            'BIGBANG' => 'BIGBANG_dbe4',
            'STAYC' => 'STAYC_a6f8',
            'ATEEZ' => 'ATEEZ_2769',
            'ITZY' => 'ITZY_199b',
            'ENHYPEN' => 'ENHYPEN_f38d',
            'SF9' => 'sf9_e970',
            'THE BOYZ' => 'THEBOYZ_eb77',
            'IVE' => 'IVE__e26b',
        ];

        foreach ($artists as $artist => $imageName) {
            $slug = Str::slug(str_replace(['!', '\''], '', $artist));

            // Check if the artist already exists to avoid duplicates
            $exists = DB::table('artists')->where('slug', $slug)->exists();
            if (!$exists) {
                DB::table('artists')->insert([
                    'name' => $artist,
                    'slug' => $slug,
                    'bio' => 'Biography of ' . $artist,
                    'image' => 'https://secimage.yes24.com/sysimage/global/MBANNER/' . $imageName . '.jpg',
                    'genre' => 'K-pop',
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
