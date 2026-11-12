# Web Service Aplikasi Pelayanan Servis Kendaraan

Web service (REST API) berbasis Laravel untuk tugas Pemrograman Mobile.

Nama: Naufal Khairad

## Sumber Jurnal

Analisis dan Perancangan Aplikasi Pelayanan Servis Kendaraan, SISTEMASI: Jurnal Sistem Informasi, Vol. 10 No. 3, 2021, hal. 586-602. DOI: 10.32520/stmsi.v10i3.1460

## Database

- Nama database: `mobile_2410020131` (MySQL)
- Tabel diambil dari jurnal (Tabel 5 dan Tabel 6): `users` dan `mekanik`
- Struktur tabel ada di file `database/mobile_2410020131.sql`
- Catatan: kolom `Created_by` pada tabel `mekanik` memakai `varchar(255)` karena tipe `timestamp` dengan panjang 255 di jurnal tidak valid di MySQL.

## Daftar Endpoint

| Method | Alamat            | Fungsi                   |
| ------ | ----------------- | ------------------------ |
| GET    | /api/users        | Ambil semua data users   |
| POST   | /api/users        | Tambah user              |
| GET    | /api/users/{id}   | Ambil satu user          |
| PUT    | /api/users/{id}   | Ubah user                |
| DELETE | /api/users/{id}   | Hapus user               |
| GET    | /api/mekanik      | Ambil semua data mekanik |
| POST   | /api/mekanik      | Tambah mekanik           |
| GET    | /api/mekanik/{id} | Ambil satu mekanik       |
| PUT    | /api/mekanik/{id} | Ubah mekanik             |
| DELETE | /api/mekanik/{id} | Hapus mekanik            |

Status respons: POST 201 Created, GET dan PUT 200 OK, DELETE 204 No Content, data tidak ditemukan 404.

## Cara Menjalankan

1. Nyalakan MySQL, lalu impor `database/mobile_2410020131.sql`.
2. Salin `.env.example` menjadi `.env`, lalu isi `DB_DATABASE=mobile_2410020131`.
3. Jalankan:

```bash
composer install
php artisan key:generate
php artisan serve
```

4. Uji endpoint dengan Postman, misalnya GET `http://127.0.0.1:8000/api/users`.

## Alat yang Dipakai

Laravel, MySQL (XAMPP), Laravel Herd, dan Postman di macOS (sebagai pengganti Laragon yang hanya tersedia untuk Windows).
