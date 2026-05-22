<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@portfolio.test',
        ], [
            'name' => 'Admin Portfolio',
            'password' => Hash::make('password'),
        ]);

        Profile::query()->firstOrCreate([], Profile::defaults());

        foreach ([
            'Creative Class Showcase' => [
                'title' => 'Creative Class Showcase',
                'role' => 'Dokumentasi & Editing',
                'year' => 2025,
                'description' => 'Membuat dokumentasi visual, menyusun highlight video, dan mengelola publikasi acara kelas kreatif.',
                'image' => null,
                'images' => null,
            ],
            'Media Campaign Kampus' => [
                'title' => 'Media Campaign Kampus',
                'role' => 'Desain Konten',
                'year' => 2025,
                'description' => 'Merancang poster, feed Instagram, dan template story untuk kebutuhan promosi kegiatan kampus.',
                'image' => null,
                'images' => null,
            ],
        ] as $title => $data) {
            Portfolio::updateOrCreate(['title' => $title], $data);
        }

        foreach ([
            'Multimedia Festival' => [
                'event_name' => 'Multimedia Festival',
                'position' => 'Divisi Dokumentasi',
                'year' => 2025,
                'description' => 'Mengambil foto kegiatan, mengatur file dokumentasi, dan membantu publikasi pasca-acara.',
                'image' => null,
                'images' => null,
            ],
            'Seminar Creative Industry' => [
                'event_name' => 'Seminar Creative Industry',
                'position' => 'Panitia Publikasi',
                'year' => 2024,
                'description' => 'Membuat materi promosi digital, mengelola caption, dan membantu koordinasi publikasi peserta.',
                'image' => null,
                'images' => null,
            ],
            'Workshop Editing Video' => [
                'event_name' => 'Workshop Editing Video',
                'position' => 'Koordinator Acara',
                'year' => 2024,
                'description' => 'Menyusun rundown, menghubungi pemateri, dan memastikan alur workshop berjalan lancar.',
                'image' => null,
                'images' => null,
            ],
        ] as $eventName => $data) {
            Experience::updateOrCreate(['event_name' => $eventName], $data);
        }

        foreach ([
            ['name' => 'Canva', 'icon' => 'palette', 'level' => 92],
            ['name' => 'Photoshop', 'icon' => 'image', 'level' => 84],
            ['name' => 'CapCut', 'icon' => 'video', 'level' => 88],
            ['name' => 'Figma', 'icon' => 'figma', 'level' => 78],
            ['name' => 'Teamwork', 'icon' => 'users', 'level' => 95],
        ] as $data) {
            Skill::updateOrCreate(['name' => $data['name']], $data);
        }

        Contact::updateOrCreate(['email' => 'hello@portfolio.test'], [
            'phone' => '081234567890',
            'email' => 'hello@portfolio.test',
            'instagram' => '@aesthetic.portfolio',
            'whatsapp' => '6281234567890',
        ]);
    }
}
