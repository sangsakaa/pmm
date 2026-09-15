````markdown
# 📚 Aplikasi PMM

Aplikasi **Pengembangan Kompetensi Guru** berbasis Laravel yang digunakan untuk mengelola, mengisi, memantau, dan memeriksa laporan PMM secara terstruktur.

Aplikasi ini memiliki beberapa jenis pengguna dengan hak akses berbeda:

- 👑 Super Admin
- 🛠️ Admin
- 👨‍🏫 Guru
- 🔎 Pengawas

Sistem dirancang agar proses pengisian laporan PMM oleh guru dan proses pemeriksaan oleh pengawas dapat dilakukan secara terintegrasi.

---

## ✨ Fitur Utama

### 👨‍🏫 Guru

Guru dapat:

- Login ke aplikasi
- Melihat daftar laporan PMM
- Membuat laporan PMM
- Memilih dan mengisi modul PMM
- Menentukan status modul:
  - Belum Tuntas
  - Tuntas
- Melihat status pemeriksaan
- Melihat catatan pemeriksaan dari pengawas
- Memperbarui laporan PMM

---

### 🔎 Pengawas

Pengawas dapat:

- Login sebagai pengawas
- Melihat seluruh laporan PMM guru
- Mencari laporan berdasarkan nama guru atau topik
- Membuka detail laporan
- Melihat status setiap modul
- Memeriksa laporan PMM
- Memberikan status pemeriksaan:
  - Diperiksa
  - Disetujui
  - Perlu Perbaikan
- Memberikan catatan pemeriksaan
- Menyimpan hasil pemeriksaan
- Melihat waktu pemeriksaan dan pemeriksa

---

### 🛠️ Admin

Admin berfungsi sebagai pengguna monitoring dan administrasi sistem.

Admin dapat:

- Melihat seluruh laporan PMM
- Mencari laporan
- Membuka detail laporan
- Melihat perkembangan PMM guru
- Melihat status pemeriksaan

Admin tidak digunakan untuk membuat laporan PMM guru.

---

### 👑 Super Admin

Super Admin memiliki fungsi monitoring dan administrasi tingkat sistem.

Super Admin dapat:

- Melihat seluruh laporan PMM
- Melihat data guru
- Melihat data pengguna
- Memantau aktivitas aplikasi
- Mengelola data yang memiliki hak akses administratif

---

# 🧩 Teknologi

Aplikasi dibangun menggunakan teknologi berikut:

| Teknologi | Keterangan |
|---|---|
| Laravel | Framework utama |
| PHP | Bahasa pemrograman |
| MariaDB / MySQL | Database |
| Blade | Template engine |
| Tailwind CSS | Styling UI |
| Vite | Asset bundler |
| Spatie Permission | Role & permission |
| Git | Version control |
| GitHub | Repository |

---

# 📋 Persyaratan Sistem

Sebelum melakukan instalasi, pastikan komputer sudah memiliki:

- PHP 8.2 atau lebih baru
- Composer
- Node.js
- NPM
- MariaDB atau MySQL
- Git

Disarankan menggunakan:

```text
PHP      : 8.3+
Laravel  : 13.x
Node.js  : LTS
MariaDB  : 10.x+
````

Untuk memastikan instalasi tersedia:

```bash
php -v
composer -V
node -v
npm -v
git --version
```

---

# 🚀 Instalasi

## 1. Clone Repository

Clone repository dari GitHub:

```bash
git clone https://github.com/USERNAME/NAMA-REPOSITORY.git
```

Masuk ke folder aplikasi:

```bash
cd NAMA-REPOSITORY
```

---

# 2. Install Dependency PHP

Jalankan:

```bash
composer install
```

---

# 3. Install Dependency JavaScript

Jalankan:

```bash
npm install
```

---

# 4. Membuat File Environment

Copy file `.env.example`:

```bash
cp .env.example .env
```

Kemudian generate application key:

```bash
php artisan key:generate
```

---

# 5. Konfigurasi Database

Buat database baru pada MariaDB / MySQL.

Contoh:

```sql
CREATE DATABASE pmm;
```

Kemudian buka file:

```text
.env
```

Sesuaikan konfigurasi database:

```env
APP_NAME="Aplikasi PMM"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pmm
DB_USERNAME=root
DB_PASSWORD=
```

Jika menggunakan password database, isi:

```env
DB_PASSWORD=password_database
```

---

# ⚠️ PENTING: Database Existing

Jika repository menggunakan database yang sudah berisi data atau menggunakan database hasil import SQL, **jangan langsung menjalankan**:

```bash
php artisan migrate:fresh
```

Perintah tersebut akan menghapus tabel dan data yang ada.

Jika database berasal dari file SQL, import terlebih dahulu melalui:

* phpMyAdmin
* MariaDB command line
* MySQL command line
* tools database lainnya

Setelah database siap, lakukan pengecekan:

```bash
php artisan migrate:status
```

---

# 6. Membersihkan Cache Laravel

Jalankan:

```bash
php artisan optimize:clear
```

---

# 7. Seeder

Aplikasi memiliki beberapa seeder untuk membuat data awal.

Seeder utama:

```text
DatabaseSeeder
│
├── RoleSeeder
├── UserSeeder
├── PengawasSeeder
├── TopikSeeder
└── ModulSeeder
```

Jalankan:

```bash
php artisan db:seed
```

Atau:

```bash
php artisan db:seed --class=DatabaseSeeder
```

---

# 👥 Role Pengguna

Aplikasi menggunakan sistem role berbasis **Spatie Laravel Permission**.

Role yang tersedia:

```text
superAdmin
admin
guru
pengawas
```

---

# 🔐 Akun Pengguna

Akun pengguna dibuat melalui seeder.

Salah satu akun pengawas yang digunakan dalam pengembangan:

```text
Email    : pengawas@pmm.sch.id
Password : password
```

> Untuk lingkungan production, password default wajib diganti.

Akun lain dapat dibuat atau disesuaikan melalui `UserSeeder`.

---

# 👨‍🏫 Hubungan User dengan Guru

Setiap akun guru harus terhubung dengan data pada tabel:

```text
guru
```

melalui:

```text
users.guru_id
```

Relasinya:

```text
User
  │
  └── guru_id
        │
        ▼
      Guru
```

Contoh data:

```text
users
--------------------------------
id
name
email
guru_id
--------------------------------
3
Guru PMM
guru@example.com
1
```

Sedangkan:

```text
guru
--------------------------------
id
nama_guru
nuptk
--------------------------------
1
Nama Guru
123456789
```

Tanpa `guru_id`, akun dengan role `guru` tidak dapat membuat laporan PMM.

---

# 🗂️ Struktur Database

Database utama aplikasi terdiri dari beberapa tabel penting.

## users

Menyimpan data pengguna aplikasi.

Kolom penting:

```text
id
name
email
password
guru_id
created_at
updated_at
```

---

## guru

Menyimpan data guru.

Kolom:

```text
id
nuptk
nama_guru
jenis_kelamin
tempat_lahir
tanggal_lahir
created_at
updated_at
```

---

## topik

Menyimpan topik PMM.

Kolom:

```text
id
nama_topik
judul_topik
created_at
updated_at
```

---

## modul

Menyimpan modul PMM.

Kolom:

```text
id
topik_id
nama_modul
judul_modul
created_at
updated_at
```

Relasi:

```text
Topik
  │
  └── memiliki banyak Modul
```

---

## laporan

Menyimpan laporan PMM guru.

Kolom utama:

```text
id
guru_id
topik_id
status_pemeriksaan
catatan_pemeriksaan
diperiksa_oleh
diperiksa_at
created_at
updated_at
```

Relasi:

```text
Guru
  │
  └── Laporan

Topik
  │
  └── Laporan

User
  │
  └── Pemeriksa
```

---

## daftar_laporan

Menyimpan detail status modul pada laporan.

Kolom:

```text
id
laporan_id
modul_id
keterangan
created_at
updated_at
```

Relasi:

```text
Laporan
   │
   └── Daftar Laporan
          │
          └── Modul
```

---

# 🔄 Alur Aplikasi

Alur utama aplikasi:

```text
                    ┌──────────────┐
                    │     Login    │
                    └──────┬───────┘
                           │
              ┌────────────┴────────────┐
              │                         │
           Guru                    Pengawas/Admin
              │                         │
              ▼                         ▼
       Buat Laporan PMM          Daftar Laporan
              │                         │
              ▼                         ▼
        Pilih Topik                 Cari Data
              │                         │
              ▼                         ▼
        Isi Modul                 Lihat Laporan
              │                         │
              ▼                         ▼
     Tuntas / Belum Tuntas          Pengawas
              │                         │
              ▼                         ▼
       Simpan Laporan             Pemeriksaan
                                        │
                       ┌────────────────┼────────────────┐
                       │                │                │
                       ▼                ▼                ▼
                   Diperiksa        Disetujui     Perlu Perbaikan
```

---

# 📝 Proses Guru Membuat PMM

Guru melakukan:

```text
Login
  ↓
Daftar Laporan
  ↓
Buat PMM
  ↓
Laporan dibuat
  ↓
Pilih / lihat modul
  ↓
Isi status modul
  ↓
Tuntas / Belum Tuntas
  ↓
Simpan
```

---

# 🔎 Proses Pengawas Memeriksa PMM

Pengawas melakukan:

```text
Login
  ↓
Daftar Laporan
  ↓
Pilih laporan guru
  ↓
Lihat detail modul
  ↓
Periksa laporan
  ↓
Pilih status
  ↓
Tulis catatan
  ↓
Simpan Pemeriksaan
```

Status pemeriksaan:

```text
Belum Diperiksa
       │
       ▼
   Diperiksa
       │
       ├───────────────┐
       ▼               ▼
  Disetujui      Perlu Perbaikan
```

---

# 📊 Status Modul

Setiap modul memiliki status:

### Belum Tuntas

```text
belum tuntas
```

### Tuntas

```text
tuntas
```

Data tersebut disimpan pada:

```text
daftar_laporan.keterangan
```

---

# 🔍 Status Pemeriksaan

Status pemeriksaan laporan:

```text
Belum Diperiksa
Diperiksa
Disetujui
Perlu Perbaikan
```

Disimpan pada:

```text
laporan.status_pemeriksaan
```

Catatan pemeriksa disimpan pada:

```text
laporan.catatan_pemeriksaan
```

User yang melakukan pemeriksaan:

```text
laporan.diperiksa_oleh
```

Waktu pemeriksaan:

```text
laporan.diperiksa_at
```

---

# 🧱 Struktur Folder

Struktur utama aplikasi:

```text
app/
├── Http/
│   └── Controllers/
│       └── LaporanContrller.php
│
├── Models/
│   ├── User.php
│   ├── Guru.php
│   ├── Topik.php
│   ├── Modul.php
│   ├── Laporan.php
│   └── Daftar_Laporan.php
│
database/
└── seeders/
    ├── DatabaseSeeder.php
    ├── RoleSeeder.php
    ├── UserSeeder.php
    ├── PengawasSeeder.php
    ├── TopikSeeder.php
    └── ModulSeeder.php
│
resources/
└── views/
    ├── admin/
    │   └── laporan/
    │       ├── index.blade.php
    │       └── view.blade.php
    │
    └── layouts/
│
routes/
└── web.php
│
resources/
├── css/
│   └── app.css
│
└── js/
    └── app.js
```

---

# 🔗 Route Utama

Route laporan PMM menggunakan:

```text
GET  /daftar-laporan
POST /daftar-laporan

GET  /laporan-pmm/{laporan}
POST /laporan-pmm/{laporan}
```

Contoh:

```text
http://localhost:8000/daftar-laporan
```

Detail laporan:

```text
http://localhost:8000/laporan-pmm/1
```

---

# 🛡️ Middleware Authentication

Halaman laporan hanya dapat diakses oleh pengguna yang sudah login.

Contoh:

```php
Route::middleware(['auth'])->group(function () {

    Route::get('/daftar-laporan', [
        LaporanContrller::class,
        'index'
    ])->name('daftar-laporan');

});
```

---

# 🎨 Tampilan

Antarmuka menggunakan konsep:

```text
Matcha Green
Sage Green
White
Soft Border
Rounded Card
Responsive Layout
```

Warna utama:

```text
#214d39
#2f6b4f
#e8f3ec
#dce9df
#fff6dc
```

Desain dibuat agar:

* Bersih
* Modern
* Responsif
* Mudah digunakan
* Nyaman untuk monitoring data

---

# 🖥️ Menjalankan Aplikasi

Jalankan server Laravel:

```bash
php artisan serve
```

Default:

```text
http://127.0.0.1:8000
```

atau:

```text
http://localhost:8000
```

---

# ⚡ Menjalankan Vite

Untuk development:

```bash
npm run dev
```

Biasanya terminal akan menampilkan:

```text
VITE ready
```

Biarkan proses tersebut tetap berjalan selama pengembangan.

---

# 🚀 Menjalankan Laravel + Vite

Buka dua terminal.

### Terminal 1

```bash
php artisan serve
```

### Terminal 2

```bash
npm run dev
```

Kemudian buka:

```text
http://localhost:8000
```

---

# 🧹 Membersihkan Cache

Jika perubahan kode tidak terlihat, jalankan:

```bash
php artisan optimize:clear
```

Jika diperlukan:

```bash
composer dump-autoload
```

Kemudian:

```bash
php artisan optimize:clear
```

---

# 🔧 Perintah Artisan yang Sering Digunakan

Melihat route:

```bash
php artisan route:list
```

Filter route:

```bash
php artisan route:list | grep laporan
```

Masuk Tinker:

```bash
php artisan tinker
```

Melihat versi Laravel:

```bash
php artisan --version
```

Melihat status migration:

```bash
php artisan migrate:status
```

Membersihkan cache:

```bash
php artisan optimize:clear
```

Membuat controller:

```bash
php artisan make:controller NamaController
```

Membuat model:

```bash
php artisan make:model NamaModel
```

Membuat seeder:

```bash
php artisan make:seeder NamaSeeder
```

---

# 🧪 Pemeriksaan Database

Untuk memeriksa laporan:

```bash
php artisan tinker
```

Kemudian:

```php
\App\Models\Laporan::all();
```

Melihat laporan tertentu:

```php
\App\Models\Laporan::find(1);
```

Melihat status pemeriksaan:

```php
\App\Models\Laporan::find(1)->only([
    'id',
    'status_pemeriksaan',
    'catatan_pemeriksaan',
    'diperiksa_oleh',
    'diperiksa_at',
]);
```

Melihat guru:

```php
\App\Models\Guru::all();
```

Melihat modul:

```php
\App\Models\Modul::with('topik')->get();
```

---

# 🔐 Pemeriksaan Role

Untuk melihat role user:

```php
$user = \App\Models\User::find(1);

$user->getRoleNames();
```

Contoh:

```text
["guru"]
```

atau:

```text
["pengawas"]
```

---

# 👥 Membuat User Pengawas

Contoh melalui Tinker:

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

$role = Role::firstOrCreate([
    'name' => 'pengawas',
    'guard_name' => 'web',
]);

$user = User::create([
    'name' => 'Pengawas',
    'email' => 'pengawas@example.com',
    'password' => Hash::make('password'),
]);

$user->assignRole($role);
```

---

# 👨‍🏫 Membuat User Guru

Contoh:

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

$user = User::create([
    'name' => 'Nama Guru',
    'email' => 'guru@example.com',
    'password' => Hash::make('password'),
    'guru_id' => 1,
]);

$user->assignRole('guru');
```

Pastikan:

```text
guru_id
```

sesuai dengan ID pada tabel:

```text
guru
```

---

# 🐛 Troubleshooting

## 1. Route tidak ditemukan

Jika muncul:

```text
Route [daftar-laporan] not defined
```

periksa:

```bash
php artisan route:list
```

Pastikan route tersedia.

Kemudian:

```bash
php artisan optimize:clear
```

---

## 2. View tidak ditemukan

Jika muncul:

```text
View [admin.laporan.index] not found
```

pastikan file berada di:

```text
resources/views/admin/laporan/index.blade.php
```

---

## 3. Undefined relationship

Contoh:

```text
Call to undefined relationship [guru]
```

Pastikan model `Laporan` memiliki:

```php
public function guru()
{
    return $this->belongsTo(Guru::class, 'guru_id');
}
```

---

## 4. Mass Assignment Error

Contoh:

```text
Add [laporan_id] to fillable property
```

Pastikan model `Daftar_Laporan` memiliki:

```php
protected $fillable = [
    'laporan_id',
    'modul_id',
    'keterangan',
];
```

---

## 5. Guru tidak dapat membuat PMM

Periksa:

```php
$user = \App\Models\User::find(3);

$user->guru_id;
```

Jika hasilnya:

```text
null
```

maka akun guru belum terhubung dengan data guru.

Hubungkan:

```php
$user->update([
    'guru_id' => 1,
]);
```

Sesuaikan `1` dengan ID guru yang benar.

---

## 6. Status pemeriksaan tidak tersimpan

Pastikan tabel `laporan` memiliki:

```text
status_pemeriksaan
catatan_pemeriksaan
diperiksa_oleh
diperiksa_at
```

Kemudian periksa:

```php
\App\Models\Laporan::find(1)->only([
    'status_pemeriksaan',
    'catatan_pemeriksaan',
    'diperiksa_oleh',
    'diperiksa_at',
]);
```

---

# 🧪 Pengujian Workflow

Setelah instalasi, lakukan pengujian berikut.

## Test 1 — Guru

Login sebagai guru.

Pastikan:

```text
Daftar Laporan
     ↓
Buat PMM
     ↓
Laporan dibuat
     ↓
Isi modul
     ↓
Simpan
```

---

## Test 2 — Pengawas

Login sebagai pengawas.

Pastikan:

```text
Daftar Laporan
     ↓
Pilih laporan
     ↓
Periksa
     ↓
Pilih status
     ↓
Isi catatan
     ↓
Simpan Pemeriksaan
```

---

## Test 3 — Database

Setelah pemeriksaan disimpan:

```php
\App\Models\Laporan::find(1)->only([
    'id',
    'status_pemeriksaan',
    'catatan_pemeriksaan',
    'diperiksa_oleh',
    'diperiksa_at',
]);
```

Contoh hasil:

```text
id                  : 1
status_pemeriksaan  : Disetujui
catatan_pemeriksaan : Laporan telah diperiksa.
diperiksa_oleh      : 4
diperiksa_at        : 2026-09-16 ...
```

---

# 🌱 Pengembangan Selanjutnya

Beberapa fitur yang dapat dikembangkan:

* Dashboard statistik PMM
* Grafik perkembangan guru
* Filter berdasarkan status pemeriksaan
* Filter berdasarkan topik
* Filter berdasarkan guru
* Riwayat pemeriksaan
* Export PDF
* Export Excel
* Cetak laporan
* Notifikasi guru
* Notifikasi pengawas
* Riwayat revisi
* Persentase penyelesaian modul
* Rekap per guru
* Rekap per topik
* Rekap per periode
* Permission lebih detail
* Audit log aktivitas pengguna

---

# 📈 Contoh Statistik

Data laporan dapat dikembangkan menjadi statistik:

```text
Total Guru
Total Laporan
Total Modul
Modul Tuntas
Modul Belum Tuntas
Laporan Belum Diperiksa
Laporan Diperiksa
Laporan Disetujui
Laporan Perlu Perbaikan
```

Contoh dashboard:

```text
┌──────────────────┐
│ TOTAL GURU       │
│       25         │
└──────────────────┘

┌──────────────────┐
│ TOTAL LAPORAN    │
│       40         │
└──────────────────┘

┌──────────────────┐
│ DISETUJUI        │
│       20         │
└──────────────────┘

┌──────────────────┐
│ PERLU PERBAIKAN  │
│        5         │
└──────────────────┘
```

---

# 🔄 Git Workflow

Setelah melakukan perubahan:

```bash
git status
```

Tambahkan file:

```bash
git add .
```

Commit:

```bash
git commit -m "Update aplikasi PMM"
```

Push:

```bash
git push origin main
```

Jika branch menggunakan `master`:

```bash
git push origin master
```

---

# 📌 `.gitignore`

Pastikan file berikut tidak masuk ke repository:

```text
/vendor/
/node_modules/
/.env
/.idea/
/.vscode/
/storage/*.key
```

File `.env` **jangan pernah di-upload ke GitHub** karena berisi konfigurasi database dan informasi sensitif.

Gunakan:

```text
.env.example
```

sebagai template konfigurasi.

---

# 🔒 Keamanan Production

Sebelum aplikasi digunakan di production:

1. Ganti password default.
2. Jangan menggunakan:

```env
APP_DEBUG=true
```

Gunakan:

```env
APP_DEBUG=false
```

3. Gunakan password database yang kuat.
4. Jangan upload `.env`.
5. Gunakan HTTPS.
6. Pastikan permission folder Laravel benar.
7. Batasi akses administrator.
8. Perbarui dependency secara berkala.

---

# 📁 File Konfigurasi Penting

Beberapa file yang paling sering digunakan:

```text
.env
routes/web.php
app/Models/User.php
app/Models/Guru.php
app/Models/Topik.php
app/Models/Modul.php
app/Models/Laporan.php
app/Models/Daftar_Laporan.php
app/Http/Controllers/LaporanContrller.php
database/seeders/DatabaseSeeder.php
database/seeders/RoleSeeder.php
database/seeders/UserSeeder.php
database/seeders/PengawasSeeder.php
database/seeders/TopikSeeder.php
database/seeders/ModulSeeder.php
resources/views/admin/laporan/index.blade.php
resources/views/admin/laporan/view.blade.php
resources/css/app.css
resources/js/app.js
```

---

# 🏗️ Arsitektur Sederhana

```text
Browser
   │
   ▼
Routes
   │
   ▼
Controller
   │
   ▼
Model
   │
   ▼
Database
   │
   ▼
MariaDB / MySQL
```

Untuk tampilan:

```text
Controller
    │
    ▼
Blade View
    │
    ▼
Tailwind CSS
    │
    ▼
Browser
```

---

# 📚 Konsep Data

Struktur hubungan data:

```text
USER
 │
 ├── guru_id
 │
 ▼
GURU
 │
 └──────────────┐
                │
                ▼
             LAPORAN
             │      │
             │      └── TOPIK
             │
             └── DAFTAR_LAPORAN
                       │
                       ▼
                     MODUL
```

---

# 🧑‍💻 Pengembangan Lokal

Untuk developer yang ingin melanjutkan pengembangan:

```bash
git clone https://github.com/USERNAME/NAMA-REPOSITORY.git

cd NAMA-REPOSITORY

composer install

npm install

cp .env.example .env

php artisan key:generate

php artisan optimize:clear

php artisan serve
```

Terminal kedua:

```bash
npm run dev
```

---

# 📜 Lisensi

Aplikasi ini dikembangkan untuk kebutuhan pengelolaan dan monitoring PMM.

Silakan menyesuaikan lisensi sesuai kebutuhan repository dan organisasi pengembang.

---

# 👨‍💻 Pengembangan

Jika ingin mengembangkan aplikasi lebih lanjut, disarankan mengikuti urutan:

```text
1. Database
2. Model
3. Relationship
4. Seeder
5. Controller
6. Route
7. Blade
8. Authentication
9. Role & Permission
10. Testing
11. UI/UX
12. Deployment
```

Dengan urutan tersebut, perubahan pada satu modul dapat dilakukan secara lebih terstruktur dan mengurangi risiko merusak modul yang sudah berjalan.

---

# 📞 Dukungan

Jika menemukan masalah, periksa terlebih dahulu:

```bash
php artisan optimize:clear
php artisan route:list
php artisan migrate:status
php artisan --version
php -v
```

Kemudian periksa:

```text
storage/logs/laravel.log
```

untuk melihat detail error Laravel.

---

# 🎯 Tujuan Aplikasi

Aplikasi ini dibuat untuk membantu proses:

```text
Pengisian
    ↓
Pengumpulan
    ↓
Monitoring
    ↓
Pemeriksaan
    ↓
Perbaikan
    ↓
Persetujuan
```

sehingga proses pengelolaan PMM dapat dilakukan secara digital, terstruktur, dan terdokumentasi.

```

README ini sudah **tidak mencantumkan nama sekolah** dan saya buat supaya orang yang clone repository bisa mengikuti alur dari **clone → install → `.env` → database → seeder → login → penggunaan → troubleshooting → Git workflow**.
```
