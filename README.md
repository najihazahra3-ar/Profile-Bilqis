# Portfolio Laravel 13 Aesthetic

Website portfolio mahasiswa multimedia dengan desain pastel aesthetic, halaman publik responsif, karakter 3D Three.js, dan backend admin sederhana.

## Fitur Utama

- Halaman publik `home.blade.php` dengan konten About, Portfolio, Skills, Contact.
- Carousel gambar di setiap card portfolio dan pengalaman acara.
- CRUD lengkap untuk `Portfolio`, `Experience`, `Skill`, dan `Contact` di dashboard admin.
- Upload banyak gambar sekaligus untuk portfolio/experience via admin, lalu otomatis tampil sebagai carousel.
- Login admin, dashboard statistik, manajemen konten, validasi form, dan pagination.
- Preview gambar di halaman admin dan tampilan galeri jika lebih dari satu gambar tersedia.
- Upload file disimpan di storage publik melalui `php artisan storage:link`.

## Struktur Penting

- `routes/web.php` berisi route publik, auth, dan admin.
- `app/Http/Controllers` berisi controller publik, login, dan CRUD admin.
- `app/Models` berisi model `Portfolio`, `Experience`, `Skill`, `Contact`, dan `User`.
- `database/migrations` berisi tabel `users`, `portfolios`, `experiences`, `skills`, `contacts`, dan `images` multi-upload.
- `database/seeders/DatabaseSeeder.php` berisi akun admin dan data contoh.
- `resources/views/home.blade.php` adalah halaman portfolio publik dengan carousel.
- `resources/views/admin` berisi dashboard dan semua halaman CRUD.
- `public/css/home.css` dan `public/js/home.js` mengatur styling dan interaksi frontend.

## Setup dan Install

1. Buka folder project di VS Code.
2. Install dependensi PHP:

```bash
composer install
```

3. Salin file environment:

```bash
copy .env.example .env
```

4. Buat application key:

```bash
php artisan key:generate
```

5. Atur koneksi database di `.env`.

### Menggunakan SQLite (default)

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

Buat file SQLite kosong jika belum ada:

```bash
copy nul database\database.sqlite
```

### Menggunakan MySQL

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_laravel
DB_USERNAME=root
DB_PASSWORD=
```

6. Jalankan migration dan seeder:

```bash
php artisan migrate --seed
```

7. Buat link storage agar upload gambar bisa tampil:

```bash
php artisan storage:link
```

8. Jalankan server Laravel:

```bash
php artisan serve
```

9. Buka website di browser:

```text
http://127.0.0.1:8000
```

## Login Admin

```text
URL: http://127.0.0.1:8000/login
Email: admin@portfolio.test
Password: password
```

## Cara Menggunakan Admin

- Masuk ke halaman admin untuk menambah dan mengedit portfolio, pengalaman acara, skill, dan kontak.
- Untuk portfolio/experience, gunakan input "Foto dokumentasi" dengan opsi `multiple` untuk meng-upload beberapa gambar.
- Gambar akan ditampilkan sebagai carousel di halaman publik jika lebih dari satu file tersedia.

## Catatan Tambahan

- Pastikan `storage/app/public` sudah terhubung ke `public/storage` dengan `php artisan storage:link`.
- Jika ada perubahan struktur tabel atau fitur baru, jalankan ulang migration dengan:

```bash
php artisan migrate
```

- Jika Anda menggunakan SQLite, pastikan file `database/database.sqlite` ada dan dapat ditulis oleh PHP.
