<?php

namespace Database\Seeders;

use App\Models\FrontendSkills;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrontendSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FrontendSkills::insert([
            [
                'title' => 'HTML',
                'rate' => '100',
            ],
            [
                'title' => 'CSS',
                'rate' => '90',
            ],
            [
                'title' => 'Javascript',
                'rate' => '70',
            ],
            [
                'title' => 'Bootstrap',
                'rate' => '85',
            ],
            [
                'title' => 'TailwindCSS',
                'rate' => '85',
            ],
        ]);
    }
}
