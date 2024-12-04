<?php

namespace Database\Seeders;

use App\Models\Homepage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomepageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Homepage::create([
            'title' => 'Full Stack Developer',
            'description' => 'Passionate about crafting exceptional digital experiences through elegant code and innovative solutions. Transforming ideas into reality, one project at a time.'
        ]);
    }
}
