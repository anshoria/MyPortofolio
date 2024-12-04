<?php

namespace Database\Seeders;

use App\Models\BackendSkills;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BackendSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BackendSkills::insert([
            [
                'title' => 'PHP/Laravel',
                'rate' => '90'
            ],
            [
                'title' => 'MySQL',
                'rate' => '85'
            ],
        ]);
    }
}
