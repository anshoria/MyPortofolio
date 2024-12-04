<?php

namespace Database\Seeders;

use App\Models\TypingTest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypingTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypingTest::insert([
            [
                'name' => 'Muhammad Anshori Akbar',
                'wpm' => '50',
                'accuracy' => '99',
                'timeleft' => '55',
                'avg_score' => '84',
                'language' => 'en'
            ],
            [
                'name' => 'Muhammad Anshori Akbar',
                'wpm' => '50',
                'accuracy' => '100',
                'timeleft' => '55',
                'avg_score' => '85',
                'language' => 'id'
            ],
        ]);
    }
}
