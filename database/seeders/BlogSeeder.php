<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::insert([
            [
                'author' => 'Muhammad Anshori Akbar',
                'job' => 'Author',
                'title' => 'Tips Memulai Bisnis Online dengan Modal Minim',
                'cover_img' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'content' => '1. Mulai dari Hobi atau Keahlian yang Dimiliki

Apakah kamu suka menulis, menggambar, atau mungkin memasak? Jadikan hobi atau keahlianmu sebagai bisnis! Misalnya, jika suka memasak, kamu bisa menjual resep atau makanan buatan sendiri. Dengan begini, kamu tidak perlu mengeluarkan banyak modal untuk belajar hal baru.

2. Manfaatkan Media Sosial Secara Gratis

Platform seperti Instagram, TikTok, dan Facebook adalah ladang emas untuk promosi gratis. Buat akun bisnis, unggah konten menarik, dan bangun audiens. Konsistensi dalam memposting sangat penting untuk membangun kepercayaan pelanggan.

3. Gunakan Marketplace untuk Mulai Jualan

Bergabung di platform marketplace seperti Tokopedia, Shopee, atau Bukalapak memudahkanmu untuk menjangkau lebih banyak pelanggan tanpa harus membuat website sendiri. Selain itu, banyak marketplace menyediakan promo menarik yang bisa kamu manfaatkan untuk meningkatkan penjualan.

4. Jual Produk Digital

Produk digital seperti e-book, kursus online, atau desain grafis hanya perlu dibuat sekali dan bisa dijual berkali-kali. Ini sangat hemat biaya karena kamu tidak perlu stok barang fisik.

5. Bangun Relasi dan Kolaborasi

Kolaborasi dengan kreator lain atau teman yang sudah memiliki audiens adalah cara efektif untuk memperkenalkan bisnismu. Misalnya, jika kamu menjual makanan, bekerja samalah dengan food blogger untuk mempromosikan produkmu.

6. Gunakan E-wallet dan Sistem Pembayaran Online

Permudah pelanggan dengan menyediakan opsi pembayaran yang praktis. Kamu bisa menggunakan e-wallet atau aplikasi pembayaran seperti yang ada di Dayang Express (kalau ini bisa kamu masukkan jasa atau produkmu sendiri 😊).

Kesimpulan

Memulai bisnis online dengan modal minim bukanlah hal yang mustahil. Kuncinya adalah memanfaatkan apa yang kamu miliki saat ini, mulai dari keahlian, media sosial, hingga relasi. Jangan takut mencoba dan terus belajar dari pengalaman.

Sudah siap memulai bisnismu? Bagikan pengalamanmu di kolom komentar ya! 😊',
                'category' => 'Tutorial',
                'likes' => '1',
                'published' => '2024-11-29 15:57:44'
            ],
            [
                'author' => 'Muhammad Anshori Akbar',
                'job' => 'Author',
                'title' => 'Revolusi Digital: Bagaimana AI Mengubah Cara Kita Hidup',
                'cover_img' => 'https://images.unsplash.com/photo-1732468928980-a294bc2845d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'content' => 'Pernahkah Anda membayangkan bahwa suatu hari Anda akan berbicara dengan asisten virtual yang dapat memahami dan merespons seperti manusia? Atau bagaimana jika mobil Anda bisa mengemudi sendiri tanpa campur tangan Anda? Sekarang, semua itu bukan lagi sekadar fantasi - ini adalah realitas yang sedang kita jalani.

Era Baru Kecerdasan Buatan
Kecerdasan Buatan (AI) telah mengalami perkembangan yang luar biasa dalam beberapa tahun terakhir. Dari chatbot yang dapat menulis puisi hingga sistem yang mampu mendiagnosis penyakit dengan akurasi tinggi, AI telah melampaui ekspektasi kita semua. Namun, dengan kemajuan ini muncul pertanyaan penting: Bagaimana teknologi ini akan mengubah kehidupan kita sehari-hari?

Dampak AI di Berbagai Sektor
1. Kesehatan
Di sektor kesehatan, AI telah membantu dokter dalam mendiagnosis penyakit lebih cepat dan akurat. Sistem AI dapat menganalisis ribuan hasil rontgen dalam hitungan detik, membantu mendeteksi kanker stadium awal, dan bahkan memprediksi potensi masalah kesehatan sebelum muncul gejala yang serius.

2. Pendidikan
Pembelajaran adaptif yang dipersonalisasi kini menjadi mungkin berkat AI. Sistem pembelajaran dapat menyesuaikan materi berdasarkan kemampuan dan kecepatan belajar setiap siswa, memastikan bahwa tidak ada yang tertinggal atau merasa bosan karena materi yang terlalu mudah.

3. Pekerjaan dan Karier
Meskipun ada kekhawatiran bahwa AI akan menggantikan banyak pekerjaan, realitanya lebih kompleks. AI memang mengotomatisasi tugas-tugas rutin, tetapi juga menciptakan peluang kerja baru yang belum pernah ada sebelumnya. Profesi seperti prompt engineer, AI trainer, dan data curator menjadi semakin penting.

Tantangan dan Peluang
Tentu saja, revolusi digital ini membawa tantangannya sendiri. Privasi data, keamanan siber, dan kesenjangan digital menjadi isu yang semakin krusial. Namun, dengan tantangan ini juga muncul peluang baru:

Inovasi Berkelanjutan: AI dapat membantu mengatasi masalah lingkungan dengan optimalisasi penggunaan energi dan sumber daya.
Demokratisasi Pengetahuan: Akses ke informasi dan pendidikan berkualitas menjadi lebih mudah dan terjangkau.
Peningkatan Kualitas Hidup: Otomatisasi tugas-tugas rutin memberi kita lebih banyak waktu untuk hal-hal yang benar-benar penting dalam hidup.
Mempersiapkan Diri untuk Masa Depan
Bagaimana kita bisa mempersiapkan diri menghadapi perubahan ini? Berikut beberapa langkah yang bisa diambil:

Belajar Sepanjang Hayat: Terus mengembangkan keterampilan baru dan beradaptasi dengan teknologi terkini.
Mengembangkan Soft Skills: Kemampuan seperti kreativitas, empati, dan pemecahan masalah kompleks akan semakin berharga.
Memahami Teknologi: Tidak perlu menjadi programmer, tapi pemahaman dasar tentang cara kerja teknologi sangat membantu.
Kesimpulan
Revolusi digital yang dipimpin oleh AI bukanlah sesuatu yang harus ditakuti, melainkan peluang untuk menciptakan masa depan yang lebih baik. Yang terpenting adalah bagaimana kita memanfaatkan teknologi ini secara bijak dan bertanggung jawab.

Kita berada di ambang era baru yang menarik. Dengan persiapan yang tepat dan pikiran yang terbuka, kita dapat memanfaatkan potensi revolusi digital ini untuk menciptakan dunia yang lebih baik bagi generasi mendatang.',
                'category' => 'Technology',
                'likes' => '3',
                'published' => '2024-11-29 15:57:44'
            ],
        ]);
    }
}
