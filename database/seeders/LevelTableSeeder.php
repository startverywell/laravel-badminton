<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name' => '初級',
            'point' => '100'
        ]);

        Level::create([
            'name' => '中級',
            'point' => '200'
        ]);

        Level::create([
            'name' => '上級',
            'point' => '300'
        ]);
    }
}
