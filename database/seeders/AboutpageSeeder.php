<?php

namespace Database\Seeders;

use App\Models\Aboutpage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutpageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aboutpage::create([
            'image' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'description' => 'Saya adalah freshgraduate lulusan teknologi informasi di Universitas Muhammadiyah Yogyakarta (UMY). Saya mampu bekerja secara individu maupun berkolaborasi dengan tim, bekerja dengan cepat, Up to Date terhadap perkembangan teknologi informasi. Saya memiliki passion dan dedikasi tinggi dalam bidang pengembangan dan desain web. Dengan keterampilan dalam HTML, CSS, JavaScript, serta keahlian dalam berbagai framework dan alat desain modern, saya siap menciptakan solusi web yang tidak hanya fungsional tapi juga estetis. Saya bersemangat untuk terus belajar dan berkontribusi dalam dunia web development dan design.',
            'experience' => '1',
            'projects' => '10',
            'satisfaction' => '99',
            'support' => '24/7'
        ]);
    }
}
