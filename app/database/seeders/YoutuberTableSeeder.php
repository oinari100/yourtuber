<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class YoutuberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('youtuber')->insert([
            'url' => Str::random(10),
            'youtuber' => Str::random(10),
            'title' => bcrypt('secret'),
        ]);
    }
}
