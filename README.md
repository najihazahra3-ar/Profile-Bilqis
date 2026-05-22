# Portfolio Laravel 13 Aesthetic

Website portfolio mahasiswa multimedia dengan halaman publik pastel aesthetic, karakter 3D Three.js, login admin, dashboard, CRUD portfolio, pengalaman acara, skill, kontak, upload gambar, pagination, validasi form, dan SweetAlert.

## Struktur Penting

- `routes/web.php` berisi route publik, auth, dan admin.
- `app/Http/Controllers` berisi controller publik, login, dan CRUD admin.
- `app/Models` berisi model `Portfolio`, `Experience`, `Skill`, `Contact`, dan `User`.
- `database/migrations` berisi tabel `users`, `portfolios`, `experiences`, `skills`, dan `contacts`.
- `database/seeders/DatabaseSeeder.php` berisi akun admin dan data contoh.
- `resources/views/home.blade.php` adalah halaman portfolio publik.
- `resources/views/admin` berisi dashboard dan semua halaman CRUD.
- `public/css/home.css`, `public/css/admin.css`, `public/js/home.js`, dan `public/js/admin.js` berisi styling dan animasi.

## Cara Install di VS Code

1. Buka folder project di VS Code.
2. Install dependency PHP:

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

5. Atur database MySQL di `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_laravel
DB_USERNAME=root
DB_PASSWORD=
```

6. Buat database `portfolio_laravel` di MySQL atau phpMyAdmin.
7. Jalankan migration dan seeder:

```bash
php artisan migrate --seed
```

8. Buat link storage agar upload gambar bisa tampil:

```bash
php artisan storage:link
```

9. Jalankan server Laravel:

```bash
php artisan serve
```

10. Buka website:

```text
http://127.0.0.1:8000
```

## Login Admin

```text
URL: http://127.0.0.1:8000/login
Email: admin@portfolio.test
Password: password
```

Setelah login, admin bisa mengelola portfolio, pengalaman acara, skill, kontak, dan melihat statistik sederhana di dashboard.
