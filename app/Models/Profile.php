<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name',
        'brand_accent',
        'owner_name',
        'hero_eyebrow',
        'hero_description',
        'about_heading',
        'avatar_initials',
        'avatar_image',
        'profile_summary',
        'story_title',
        'story_text',
        'interests',
        'footer_name',
    ];

    protected $casts = [
        'interests' => 'array',
    ];

    public static function current(): self
    {
        return self::query()->first() ?? new self(self::defaults());
    }

    public static function defaults(): array
    {
        return [
            'brand_name' => 'Bilqis',
            'brand_accent' => 'portofolio',
            'owner_name' => 'Bilqis Najiha Zahra',
            'hero_eyebrow' => 'Multimedia Broadcasting',
            'hero_description' => 'Saya adalah mahasiswa multimedia yang tertarik dalam kepanitiaan acara, pengembangan ide konten kreatif, serta pembuatan aset visual dan 3D',
            'about_heading' => 'Creative, organized, and happily detail-oriented.',
            'avatar_initials' => 'BN',
            'avatar_image' => null,
            'profile_summary' => 'Mahasiswa multimedia yang tertarik pada desain visual, publikasi acara, pengembangan ide konten kreatif, serta pembuatan aset visual 3D.',
            'story_title' => 'Cerita Singkat',
            'story_text' => 'Saya merupakan mahasiswa multimedia yang memiliki ketertarikan pada desain visual, publikasi acara, dan pengembangan ide konten kreatif. Saya senang mengikuti kegiatan kepanitiaan kampus karena memberikan banyak pengalaman baru, melatih kemampuan bekerja sama dalam tim, serta menambah wawasan dalam dunia organisasi dan media digital. Dalam beberapa kegiatan, saya ikut berkontribusi pada proses publikasi dan dokumentasi acara agar informasi dapat tersampaikan dengan lebih menarik dan terstruktur. Selain aktif dalam kegiatan kampus, saya juga tertarik mempelajari pembuatan aset 3D dasar sebagai bagian dari pengembangan kemampuan kreatif dan tugas project multimedia.',
            'interests' => ['Creative Content', 'Event Publication', 'Basic 3D Modeling'],
            'footer_name' => 'BilqisStudio',
        ];
    }

    public function getResolvedInitialsAttribute(): string
    {
        if ($this->avatar_initials) {
            return strtoupper($this->avatar_initials);
        }

        return collect(explode(' ', $this->owner_name))
            ->filter()
            ->map(fn (string $part) => substr($part, 0, 1))
            ->take(2)
            ->implode('');
    }
}
