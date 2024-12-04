<?php

namespace Database\Seeders;

use App\Models\Skills;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skills::insert([
            [
                'title' => 'MS Word',
                'icon' => 'file-word'
            ],
            [
                'title' => 'MS Excel',
                'icon' => 'file-excel',
            ],
            [
                'title' => 'Figma',
                'icon' => 'brands fa-figma',
            ],
            [
                'title' => 'Canva',
                'icon' => 'c',
            ],
        ]);
    }
}
