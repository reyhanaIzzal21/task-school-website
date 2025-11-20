# 🎓 School Website

Website sekolah SMAN 1 Ponorogo yang dibangun dengan Laravel - Sistem informasi sekolah modern dengan fitur lengkap untuk manajemen konten, galeri, berita, dan profil siswa.

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

## 📋 Daftar Isi

- [Tentang Project](#-tentang-project)
- [Fitur Utama](#-fitur-utama)
- [Teknologi](#-teknologi)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Konfigurasi](#-konfigurasi)
- [Penggunaan](#-penggunaan)
- [Role & Permission](#-role--permission)
- [Screenshots](#-screenshots)
- [Kontribusi](#-kontribusi)
- [Lisensi](#-lisensi)

## 🎯 Tentang Project

Website SMAN 1 Ponorogo adalah platform digital yang dirancang untuk memfasilitasi komunikasi dan informasi antara sekolah, siswa, guru, dan masyarakat umum. Website ini menampilkan profil sekolah, berita terkini, galeri kegiatan, dan sistem dashboard untuk manajemen konten.

### Tujuan

- Meningkatkan transparansi informasi sekolah
- Memudahkan akses informasi bagi siswa dan orang tua
- Menampilkan prestasi dan kegiatan sekolah
- Menyediakan platform untuk berbagi berita dan pengumuman

## ✨ Fitur Utama

### 🏠 Landing Page
- **Hero Section** dengan typed text animation
- **About Section** dengan informasi sekolah
- **Features Section** menampilkan keunggulan sekolah
- **Gallery Preview** dengan layout modern
- **Teacher Section** profil guru dan staff
- **Testimonials** dari siswa dan alumni
- **FAQ Section** pertanyaan umum
- **CTA Section** untuk pendaftaran

### 📰 Sistem Berita
- CRUD berita oleh redaksi
- Kategori berita
- Upload gambar featured
- Rich text editor
- Pagination dan search
- Detail berita dengan related posts

### 🖼️ Galeri Sekolah
- Upload multiple images per galeri
- Smart image layout (1-4+ foto)
- Lightbox gallery dengan navigation
- Grid responsive
- Meta information (author, tanggal)

### 👤 Dashboard Siswa
- Profile management
- CV/Resume builder
- Upload foto profil
- Edit informasi personal
- View berita (untuk role redaksi)

### 🔐 Sistem Autentikasi
- Register & Login
- Email verification
- Password reset
- Role-based access control
- Session management

### 📱 Responsive Design
- Mobile-first approach
- Tablet optimized
- Desktop friendly
- Touch-friendly interface

## 🛠️ Teknologi

### Backend
- **Laravel 10.x** - PHP Framework
- **PHP 8.1+** - Programming Language
- **MySQL 8.0+** - Database
- **Laravel Breeze** - Authentication
- **Spatie Laravel Permission** - Role & Permission

### Frontend
- **Bootstrap 5** - CSS Framework
- **JavaScript (Vanilla)** - Interactivity
- **AOS (Animate On Scroll)** - Scroll animations
- **Typed.js** - Text typing animation
- **PureCounter** - Counter animations

### Tools & Libraries
- **Composer** - PHP Dependency Manager
- **NPM/Yarn** - JavaScript Package Manager
- **Laravel Mix/Vite** - Asset Bundler

## 💻 Persyaratan Sistem

Pastikan sistem Anda memenuhi persyaratan berikut:

- **PHP**: >= 8.1
- **Composer**: >= 2.0
- **Node.js**: >= 16.x
- **NPM/Yarn**: Latest version
- **MySQL**: >= 8.0 atau MariaDB >= 10.3
- **Web Server**: Apache/Nginx
- **Extensions PHP**:
  - OpenSSL
  - PDO
  - Mbstring
  - Tokenizer
  - XML
  - Ctype
  - JSON
  - BCMath
  - Fileinfo
  - GD atau Imagick

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/reyhanaIzzal21/task-school-website.git
cd task-school-website
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
# atau
yarn install
```

### 3. Setup Environment

```bash
# Copy file environment
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Konfigurasi Database

Edit file `.env` dan sesuaikan dengan konfigurasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama-database
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Migrasi Database

```bash
# Jalankan migrasi
php artisan migrate

# Jalankan seeder (optional - untuk data dummy)
php artisan db:seed
```

### 6. Setup Storage

```bash
# Create symbolic link untuk storage
php artisan storage:link
```

### 7. Build Assets

```bash
# Compile assets untuk development
npm run dev

# Atau untuk production
npm run build
```

### 8. Jalankan Server

```bash
# Jalankan development server
php artisan serve
```

Akses website di: `http://localhost:8000`

## ⚙️ Konfigurasi

### Email Configuration

Edit `.env` untuk konfigurasi email:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

### File Upload Configuration

Sesuaikan ukuran maksimal upload di `php.ini`:

```ini
upload_max_filesize = 10M
post_max_size = 10M
```

### Role & Permissions

Jalankan seeder untuk membuat role default:

```bash
php artisan db:seed --class=RolePermissionSeeder
```

Default roles:
- **Admin** - Full access
- **Redaksi** - Manage berita
- **Siswa** - Basic access

## 📖 Penggunaan

### Akses Halaman

#### Public Pages
- **Home**: `/`
- **Galeri**: `/galleries`
- **Detail Galeri**: `/galleries/{id}`
- **Login**: `/login`
- **Register**: `/register`

#### Protected Pages
- **Dashboard**: `/dashboard`
- **Profile**: `/dashboard` (tab profile)
- **CV**: `/dashboard` (tab CV)
- **Berita** (Redaksi): `/dashboard` (tab berita)

### Default User (Setelah Seeder)

```
Email: admin@gmail.com
Password: SCHOOL-WEBSITE-admin
Role: Admin
```

```
Email: redaksi@gmail.com
Password: password
Role: Redaksi
```

```
Email: siswa@gmail.com
Password: password
Role: Siswa
```

### Menambah Berita (Role: Redaksi)

1. Login sebagai redaksi
2. Buka Dashboard
3. Klik tab "Berita"
4. Klik tombol "Tambah Berita"
5. Isi form:
   - Judul berita
   - Konten (gunakan rich text editor)
   - Upload gambar featured
   - Pilih kategori
6. Klik "Publish"

### Menambah Galeri (Role: Admin)

1. Login sebagai admin
2. Akses admin panel
3. Pilih menu "Galeri"
4. Klik "Tambah Galeri"
5. Isi judul galeri
6. Upload multiple images
7. Simpan

### Membuat CV (Role: Siswa)

1. Login sebagai siswa
2. Buka Dashboard
3. Klik tab "CV"
4. Jika belum ada CV, klik "Create CV"
5. Isi informasi:
   - Data personal
   - Pendidikan
   - Pengalaman
   - Skills
   - Sertifikat
6. Simpan dan export ke PDF

## 👥 Role & Permission

### Admin
- ✅ Full access ke semua fitur
- ✅ Manage users
- ✅ Manage galeri
- ✅ Manage berita
- ✅ Manage settings
- ✅ View analytics

### Redaksi
- ✅ Create, edit, delete berita
- ✅ Upload images untuk berita
- ✅ Manage kategori berita
- ✅ View dashboard berita
- ❌ Tidak bisa manage users
- ❌ Tidak bisa manage galeri

### Siswa
- ✅ View public content
- ✅ Edit profile sendiri
- ✅ Create & manage CV
- ✅ Upload foto profil
- ❌ Tidak bisa manage berita
- ❌ Tidak bisa manage galeri

## 📸 Screenshots

### Landing Page
![Landing Page](docs/screenshots/landing.png)

### Gallery Page
![Gallery](docs/screenshots/gallery.png)

### Dashboard
![Dashboard](docs/screenshots/dashboard.png)

### Lightbox Gallery
![Lightbox](docs/screenshots/lightbox.png)

## 🤝 Kontribusi

Kontribusi sangat diterima! Berikut cara berkontribusi:

1. Fork repository ini
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

### Coding Standards

- Ikuti PSR-12 untuk PHP
- Gunakan camelCase untuk JavaScript
- Tambahkan comments untuk kode kompleks
- Write clean and readable code
- Test sebelum commit

## 📝 Changelog

### Version 1.0.0 (2025-01-XX)
- ✨ Initial release
- ✨ Landing page dengan multiple sections
- ✨ Sistem berita dengan CRUD
- ✨ Galeri dengan lightbox
- ✨ Dashboard siswa
- ✨ CV Builder
- ✨ Authentication system
- ✨ Role & Permission

## 🐛 Bug Reports

Jika menemukan bug, silakan buat issue di:
[GitHub Issues](https://github.com/username/sman1-ponorogo/issues)

Sertakan:
- Deskripsi bug
- Langkah untuk reproduce
- Screenshot (jika ada)
- Browser & OS info


## 📄 Lisensi

Project ini dilisensikan di bawah [MIT License](LICENSE).

---

<p align="center">
  Dibuat dengan ❤️ oleh Reyhana izzal<br>
  © 2025 Reyhana izzal. All rights reserved.
</p>
