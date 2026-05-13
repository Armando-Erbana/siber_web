<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run()
    {
        News::truncate();

        $news = [
            [
                'category'      => 'Berita',
                'title'         => 'LinkedIn Disalahgunakan Peretas untuk Sebar Malware...',
                'excerpt'       => 'Peretas memanfaatkan fitur iklan LinkedIn untuk menyebarkan malware melalui tautan palsu.',
                'content'       => 'Konten lengkap berita LinkedIn... (bisa diisi artikel panjang)',
                'published_at'  => Carbon::create(2026, 1, 28, 12, 13, 0),
                'image'         => 'https://cdn.phototourl.com/uploads/2026-02-12-5768fda6-4984-4360-9e23-1ea620ae6d74.jpg',
            ],
            [
                'category'      => 'Berita',
                'title'         => 'Komdigi Usut Dugaan Kebocoran Data Jutaan Akun...',
                'excerpt'       => 'Kementerian Komdigi sedang menyelidiki dugaan kebocoran data pengguna dari platform digital.',
                'content'       => 'Konten lengkap kebocoran data...',
                'published_at'  => Carbon::create(2026, 1, 26, 15, 31, 0),
                'image'         => 'https://cdn.phototourl.com/uploads/2026-02-12-b3a85376-19e8-4a88-8170-ffa5bfb8b2d0.jpg',
            ],
            [
                'category'      => 'Tren',
                'title'         => '5 Tren Keamanan Siber 2026 yang Wajib Diwaspadai Perusahaan',
                'excerpt'       => 'Perkembangan teknologi digital membawa peluang besar sekaligus risiko baru...',
                'content'       => 'Konten lengkap tren keamanan siber 2026...',
                'published_at'  => Carbon::create(2026, 2, 1, 16, 31, 0),
                'image'         => 'https://cdn.phototourl.com/uploads/2026-02-12-3194f804-6842-4fb7-9dfe-b64f4a054186.jpg',
            ],
            [
                'category'      => 'Berita',
                'title'         => 'PDFsider, Malware Baru yang Bobol Jaringan Fortune 100',
                'excerpt'       => 'Malware jenis baru yang menyamar sebagai dokumen PDF berhasil menembus keamanan perusahaan kelas dunia.',
                'content'       => 'Konten lengkap PDFsider...',
                'published_at'  => Carbon::create(2026, 1, 23, 9, 5, 0),
                'image'         => 'https://cdn.phototourl.com/uploads/2026-02-12-2a1db106-6d98-48f2-b0e2-e2690030334d.jpg',
            ],
            [
                'category'      => 'Pengetahuan',
                'title'         => 'Agen AI Jadi Target Peretas, Ini Ancaman Siber Generasi Baru',
                'excerpt'       => 'Serangan terhadap agen AI meningkat seiring integrasi teknologi kecerdasan buatan di berbagai sektor.',
                'content'       => 'Konten lengkap agen AI...',
                'published_at'  => Carbon::create(2026, 1, 21, 18, 38, 0),
                'image'         => 'https://cdn.phototourl.com/uploads/2026-02-12-b69af6aa-4631-436a-94ea-4aed2ca2114d.jpg',
            ],

            
            [
                'category'      => 'Berita',
                'title'         => 'Ransomware Serang Rumah Sakit, Data Pasien Terenkripsi',
                'excerpt'       => 'Serangan ransomware melumpuhkan sistem informasi sebuah rumah sakit besar di Jakarta.',
                'content'       => 'Konten lengkap ransomware rumah sakit...',
                'published_at'  => Carbon::create(2026, 2, 10, 8, 15, 0),
                'image'         => 'https://cdn.phototourl.com/uploads/2026-02-12-8e2e6a89-a6ed-478f-bfe4-9f134abba82e.jpg',
            ],
            [
                'category'      => 'Tren',
                'title'         => 'Deepfake Semakin Canggih, Masyarakat Diimbau Lebih Waspada',
                'excerpt'       => 'Teknologi deepfake kini dapat meniru wajah dan suara dengan sangat realistis.',
                'content'       => 'Konten lengkap deepfake...',
                'published_at'  => Carbon::create(2026, 2, 8, 14, 20, 0),
                'image'         => 'https://placehold.co/600x400/2563eb/white?text=Deepfake',
            ],
            [
                'category'      => 'Kegiatan',
                'title'         => 'Metra TV by Telkom Indonesia Gelar Workshop Keamanan IoT',
                'excerpt'       => 'Acara workshop akan membahas celah keamanan pada perangkat Internet of Things.',
                'content'       => 'Konten lengkap workshop IoT...',
                'published_at'  => Carbon::create(2026, 2, 7, 10, 0, 0),
                'image'         => 'https://cdn.phototourl.com/uploads/2026-02-12-56a66f63-5a4d-48d6-9d53-2fb45cd2050c.jpg',
            ],
            [
                'category'      => 'Berita',
                'title'         => 'Kerentanan Zero-Day di Chrome, Segera Perbarui Browser Anda',
                'excerpt'       => 'Google merilis patch darurat untuk celah keamanan yang telah dieksploitasi di alam liar.',
                'content'       => 'Konten lengkap zero-day Chrome...',
                'published_at'  => Carbon::create(2026, 2, 5, 9, 45, 0),
                'image'         => 'https://cdn.phototourl.com/uploads/2026-02-12-2ddab8d4-3fa2-4005-a9e5-0d3c5d14abf0.jpg',
            ],
            [
                'category'      => 'Pengetahuan',
                'title'         => 'Mengenal Social Engineering: Seni Manipulasi Manusia',
                'excerpt'       => 'Peretas tidak hanya menyerang sistem, tetapi juga kelemahan psikologis manusia.',
                'content'       => 'Konten lengkap social engineering...',
                'published_at'  => Carbon::create(2026, 2, 3, 11, 30, 0),
                'image'         => 'https://cdn.phototourl.com/uploads/2026-02-12-f3dd9672-0c7a-4fc8-9b38-55064778123a.jpg',
            ],
            [
                'category'      => 'Berita',
                'title'         => 'Data Pribadi 10 Juta Pengguna Aplikasi Kencan Bocor',
                'excerpt'       => 'Informasi sensitif termasuk foto dan lokasi pengguna tersebar di forum gelap.',
                'content'       => 'Konten lengkap kebocoran aplikasi kencan...',
                'published_at'  => Carbon::create(2026, 2, 2, 13, 10, 0),
                'image'         => 'https://cdn.phototourl.com/uploads/2026-02-12-65c0ccba-2060-4804-9570-b390897ac551.jpg',
            ],
            [
                'category'      => 'Tren',
                'title'         => 'Keamanan Siber di Era Metaverse: Tantangan Baru',
                'excerpt'       => 'Dunia virtual membuka vektor serangan yang belum pernah ada sebelumnya.',
                'content'       => 'Konten lengkap keamanan metaverse...',
                'published_at'  => Carbon::create(2026, 1, 30, 20, 15, 0),
                'image'         => 'https://cdn.phototourl.com/uploads/2026-02-12-1e5714e2-a5e7-4c3b-8f05-90d04e488f8a.jpg',
            ],
            [
                'category'      => 'Kegiatan',
                'title'         => 'Webinar: Menjadi Ahli Forensik Digital',
                'excerpt'       => 'Pelajari teknik investigasi serangan siber dari praktisi terkemuka.',
                'content'       => 'Konten lengkap webinar forensik...',
                'published_at'  => Carbon::create(2026, 1, 27, 8, 0, 0),
                'image'         => 'https://cdn.phototourl.com/uploads/2026-02-12-a74e5e6b-b98f-4cf0-b0ac-6c82470023c6.jpg',
            ],
        ];

        $headline = [
            'category'      => 'Berita',
            'title'         => 'Waspadai Jawab "Halo" ke Nomor Asing Bisa Picu Penipuan AI',
            'excerpt'       => 'Penipu menggunakan teknologi AI untuk meniru suara korban hanya dari ucapan "Halo". Jangan mudah merespons panggilan dari nomor tak dikenal.',
            'content'       => 'Konten lengkap penipuan AI...',
            'published_at'  => Carbon::create(2026, 2, 5, 10, 0, 0),
            'image'         => 'https://placehold.co/600x400/2563eb/white?text=Penipuan+AI',
        ];

        News::create(array_merge($headline, ['slug' => Str::slug($headline['title'])]));

        foreach ($news as $item) {
            News::create(array_merge($item, ['slug' => Str::slug($item['title'])]));
        }
    }
}