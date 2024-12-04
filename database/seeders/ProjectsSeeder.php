<?php

namespace Database\Seeders;

use App\Models\Projects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Projects::insert([
            [
                'title' => 'Catatan Keuangan',
                'description' => 'Catatan Keuangan adalah prototype design yang saya buat menggunakan figma.',
                'category' => 'Mobile App Design',
                'url' => 'https://www.figma.com/proto/nt2pkhdSVXWiYOlIwlCq2F/Catatan-Keuangan?node-id=23-456&starting-point-node-id=2%3A0&t=UBBWZmafdM5X4Shf-1',
                'image' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'year' => '2024',
                'is_featured' => false,
                'is_catalog' => true,
                'price' => 150000,
                'catalog_img' => null,
            ],
            [
                'title' => 'Beasiswa Pendidikan',
                'description' => 'Web ini berisi informasi tentang beasiswa pendidikan dan pendaftaran beasiswa pendidikan.',
                'category' => 'Portal Layanan',
                'url' => null,
                'image' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'year' => '2024',
                'is_featured' => false,
                'is_catalog' => true,
                'price' => 200000,
                'catalog_img' => null,
            ],
            [
                'title' => 'Pemesanan Tiket Wisata',
                'description' => 'Web ini berisi informasi tentang cara memesan tiket wisata melalui form pemesanan.',
                'category' => 'Sistem Booking atau Reservasi',
                'url' => null,
                'image' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'year' => '2024',
                'is_featured' => false,
                'is_catalog' => false,
                'price' => null,
                'catalog_img' => null,
            ],
            [
                'title' => 'Stop Merokok',
                'description' => 'Stop Merokok adalah website persuasif untuk mengajak para perokok untuk berhenti merokok.',
                'category' => 'Blog atau Media Informasi',
                'url' => 'https://stop-merokok-b9c8c.web.app/',
                'image' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'year' => '2024',
                'is_featured' => false,
                'is_catalog' => false,
                'price' => null,
                'catalog_img' => null,
            ],
            [
                'title' => 'Dashboard Dayang Express',
                'description' => 'Dashboard Dayang Express digunakan untuk mengelola urusan pengiriman barang Dayang Express.',
                'category' => 'Portal Layanan',
                'url' => null,
                'image' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'year' => '2024',
                'is_featured' => false,
                'is_catalog' => false,
                'price' => null,
                'catalog_img' => null,
            ],
            [
                'title' => 'Menu Internal KPPNY',
                'description' => 'Menu Internal KPPNY adalah website untuk mengelola urusan internal kantor.',
                'category' => 'Portal Layanan',
                'url' => 'https://internal.kppnjogja.id/',
                'image' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'year' => '2023',
                'is_featured' => false,
                'is_catalog' => false,
                'price' => null,
                'catalog_img' => null,
            ],
            [
                'title' => 'Sistem Informasi Silver Gym',
                'description' => 'Sistem Informasi Silver Gym adalah web yang dibangun untuk memanajemen member.',
                'category' => 'Portal Layanan',
                'url' => 'http://silvergym.rf.gd/',
                'image' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'year' => '2024',
                'is_featured' => false,
                'is_catalog' => false,
                'price' => null,
                'catalog_img' => null,
            ],
            [
                'title' => 'Sistem Informasi Layanan Dayang Express',
                'description' => 'Sistem informasi layanan dayang express adalah website yang digunakan untuk layanan pengiriman barang dayang express.',
                'category' => 'Portal Layanan',
                'url' => 'https://dayangexpress.com/',
                'image' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'year' => '2024',
                'is_featured' => true,
                'is_catalog' => false,
                'price' => null,
                'catalog_img' => null,
            ],
            [
                'title' => 'Typing Speed Game',
                'description' => 'Project ini adalah project iseng yang saya buat untuk permainan kecepatan mengetik. Enjoy!',
                'category' => 'Game',
                'url' => 'http://myportofolio.test/typing-test',
                'image' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'year' => '2024',
                'is_featured' => true,
                'is_catalog' => false,
                'price' => null,
                'catalog_img' => null,
            ],
            [
                'title' => 'Event Organizer',
                'description' => 'Project ini adalah website company profile untuk sebuah organizer bernama OrenCollaboration.',
                'category' => 'Company Profile',
                'url' => null,
                'image' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'year' => '2024',
                'is_featured' => false,
                'is_catalog' => false,
                'price' => null,
                'catalog_img' => null,
            ],
            [
                'title' => 'Portofolio 2',
                'description' => 'Project ini adalah website portofolio saya yang kedua.',
                'category' => 'Landing Page',
                'url' => 'https://anshoria.github.io/',
                'image' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'year' => '2024',
                'is_featured' => false,
                'is_catalog' => false,
                'price' => null,
                'catalog_img' => null,
            ],
        ]);
    }
}
