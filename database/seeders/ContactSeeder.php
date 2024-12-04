<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'hp' => '081254402608',
            'location' => 'Kutai Timur',
            'whatsapp' => '6281254402608',
            'email' => 'anshoria.forwork@gmail.com',
        ]);
    }
}
