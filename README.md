# Aplikasi Laravel Sederhana

## Identitas Mahasiswa
- **Nama:** Bilqis Najiha Zahra
- **NRP:** 5124500024
- **Kelas:** MMB A

## Deskripsi
Project ini adalah aplikasi Laravel sederhana untuk tugas perkuliahan. Aplikasi memiliki halaman utama yang dapat diakses melalui route `/` dan menampilkan view `home.blade.php` dengan teks "Welcome to My App".

## Fitur
- Route utama `/` pada `routes/web.php`.
- Halaman utama menggunakan `resources/views/home.blade.php`.
- Styling halaman utama menggunakan `public/css/home.css`.
- Struktur database menggunakan migration bawaan Laravel.
- Build frontend menggunakan Vite dan Tailwind CSS.

## Struktur Folder Penting
- `app/` berisi kode utama aplikasi Laravel.
- `routes/web.php` berisi definisi route web.
- `resources/views/` berisi file tampilan Blade.
- `public/css/` berisi file CSS publik.
- `database/migrations/` berisi file migration database.
- `.env.example` berisi contoh konfigurasi environment.

## Cara Menjalankan
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
php artisan serve
```

Setelah server berjalan, buka aplikasi melalui:

```text
http://127.0.0.1:8000
```

## Teknologi
- Laravel
- PHP
- Blade
- Vite
- Tailwind CSS
- SQLite
