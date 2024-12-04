<?php

namespace Database\Seeders;

use App\Models\GeneralSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralSettings::create([
            'logo' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'cv' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'github' => 'https://github.com/anshoria',
        'linkedin' => 'https://www.linkedin.com/in/m-anshoria/',
        'instagram' => 'https://www.instagram.com/anshoria11/?hl=en',
        'youtube' => 'https://www.youtube.com/@muhammadanshoriakbar5254'
        ]);
    }
}
