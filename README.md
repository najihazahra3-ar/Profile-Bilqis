# Portfolio Laravel 13 Aesthetic

## Identitas Mahasiswa
- **Nama:** Bilqis Najiha Zahra
- **NIM:** 5124500024
- **Kelas:** MMB A

## Deskripsi
Project Laravel portfolio mahasiswa multimedia dengan fitur admin CRUD, upload multi-gambar, dan tampilan carousel untuk portfolio serta pengalaman acara.

## Cara Menjalankan
```bash
git clone https://github.com/USERNAME/REPO.git
cd REPO
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

## Fitur Utama
- Halaman publik `home.blade.php` dengan konten About, Portfolio, Skills, dan Contact.
- Carousel gambar pada card portfolio dan pengalaman acara.
- Admin dashboard dengan CRUD untuk `Portfolio`, `Experience`, `Skill`, dan `Contact`.
- Multi-file upload untuk portfolio/experience; gambar ditampilkan sebagai carousel.
- Preview gambar di admin dan galeri jika ada lebih dari satu gambar.
- Login admin, validasi form, dan manajemen konten sederhana.

## Struktur Project
- `routes/web.php` untuk route publik, auth, dan admin.
- `app/Http/Controllers` untuk controller publik, auth, dan CRUD admin.
- `app/Models` untuk model `Portfolio`, `Experience`, `Skill`, `Contact`, dan `User`.
- `database/migrations` untuk tabel `users`, `portfolios`, `experiences`, `skills`, `contacts`, dan kolom `images` JSON.
- `database/seeders/DatabaseSeeder.php` untuk akun admin dan data awal.
- `resources/views/home.blade.php` halaman portfolio publik.
- `resources/views/admin` halaman dashboard dan CRUD.
- `public/css/home.css`, `public/js/home.js` untuk styling dan interaksi frontend.

## Login Admin
```text
URL: http://127.0.0.1:8000/login
Email: admin@portfolio.test
Password: password
```

## Catatan Penting
- Pastikan `storage/app/public` sudah terhubung ke `public/storage` dengan `php artisan storage:link`.
- Untuk SQLite, pastikan file `database/database.sqlite` ada dan dapat ditulis.
- Jika migrasi atau seeding perlu dijalankan ulang:
```bash
php artisan migrate --seed
```
