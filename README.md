# 🌐 Website Portofolio & Landing Page Dinamis

[![PHP Version](https://img.shields.io/badge/PHP-8.x-777BB4?style=flat-square&logo=php&logoColor=white)](https://www.php.net/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.2-7952B3?style=flat-square&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![MySQL](https://img.shields.io/badge/MySQL-PDO-4479A1?style=flat-square&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![License](https://img.shields.io/badge/Status-UTS%20Web%20Programming-success?style=flat-square)](#)

Aplikasi web portofolio pribadi berbasis **PHP Native**, **MySQL**, dan **Bootstrap 5** yang dirancang sebagai *Landing Page* dinamis untuk proyek Ujian Tengah Semester (UTS) mata kuliah **Web Programming**. Proyek ini menerapkan arsitektur modular, praktik keamanan dasar web (*secure coding*), serta desain antarmuka responsif di berbagai ukuran layar.

---

## ✨ Fitur Utama

1. **Halaman Beranda (`index.php`)**
   - *Hero Section* dengan tombol navigasi cepat (*Call-to-Action*).
   - Daftar bidang keahlian utama yang dirender secara dinamis dari *array* PHP dengan animasi kartu interaktif.
2. **Halaman Tentang Saya (`pages/about.php`)**
   - Profil singkat, fokus bidang keilmuan, dan tautan media sosial (*GitHub* & *Instagram*).
   - Lencana keahlian teknis (*Tech Stack*) dan riwayat pendidikan yang tersusun rapi secara semantik.
3. **Halaman Proyek & Layanan (`pages/produk.php`)**
   - Menampilkan katalog portofolio proyek lengkap dengan *tech stack badges*.
   - **Filter Kategori Dinamis:** Menggunakan parameter `$_GET['kategori']` untuk menyaring proyek secara *real-time* tanpa menulis ulang halaman.
4. **Halaman Galeri Kegiatan (`pages/galeri.php`)**
   - Dokumentasi visual kegiatan dan eksperimen teknis menggunakan tag semantik `<figure>` dan `<figcaption>`.
   - **Interactive Lightbox Modal:** Gambar dapat diklik untuk diperbesar menggunakan Bootstrap Modal, dilengkapi optimasi `loading="lazy"`.
5. **Halaman Kontak Terintegrasi Database (`pages/kontak.php`)**
   - Formulir pengiriman pesan yang terhubung langsung dengan database **MySQL** menggunakan **PDO Prepared Statements**.
   - Dilengkapi validasi *server-side* & *client-side*, perlindungan **XSS**, serta pola **PRG (*Post-Redirect-Get*)** dengan `$_SESSION` untuk mencegah pengiriman data ganda saat halaman di-refresh.

---

## 🏗️ Struktur Direktori Proyek

Proyek ini disusun menggunakan pendekatan modular agar mudah dikelola dan dikembangkan (*maintainable*):

```text
Uts/
├── assets/
│   ├── css/
│   │   └── style.css          # Styling kustom, variabel warna, dan animasi hover kartu
│   ├── images/                # Aset gambar profil & dokumentasi galeri
│   └── js/
│       └── main.js            # Validasi form client-side, loading state, & auto-dismiss alert
├── config/
│   └── koneksi.php            # Konfigurasi koneksi database MySQL menggunakan PDO
├── includes/
│   ├── header.php             # Template HTML5 <head>, Navbar responsif, & deteksi $base_path dinamis
│   └── footer.php             # Template Footer, tautan media sosial, & bundle JS Bootstrap 5
├── pages/
│   ├── about.php              # Halaman profil, keahlian, dan pendidikan
│   ├── galeri.php             # Halaman dokumentasi galeri dengan modal preview
│   ├── kontak.php             # Halaman formulir kontak (CRUD Create ke MySQL)
│   └── produk.php             # Halaman daftar proyek dengan filter kategori GET
├── index.php                  # Halaman utama (Landing Page)
└── README.md                  # Dokumentasi proyek
```

---

## 🛡️ Standar Keamanan & Kualitas Kode (*Best Practices*)

Dalam pengembangan aplikasi ini, beberapa standar teknis diterapkan untuk memastikan keamanan dan keandalan sistem:

- **Anti SQL Injection:** Seluruh kueri penyimpanan pesan kontak menggunakan *Prepared Statements* dengan *named parameters* (`:nama`, `:email`, `:pesan`) melalui ekstensi **PDO**.
- **Anti Cross-Site Scripting (XSS):** Setiap data input maupun output dinamis disanitasi menggunakan `htmlspecialchars($data, ENT_QUOTES, 'UTF-8')`.
- **Pola Post-Redirect-Get (PRG):** Mencegah bug *Form Resubmission* saat pengguna menekan tombol *Refresh (`F5`)* setelah mengirim formulir kontak.
- **Portabilitas Path Dinamis (`$base_path`):** Navigasi dan pemanggilan aset pada `header.php` serta `footer.php` menyesuaikan kedalaman direktori secara otomatis sehingga bebas dari *broken link (404)* saat dipindahkan ke direktori atau server lain.
- **HTML5 Semantik & Clean Code:** Menggunakan tag struktural yang tepat (`<main>`, `<section>`, `<article>`, `<figure>`) dan menerapkan prinsip *DRY (Don't Repeat Yourself)*.

---

## ⚙️ Panduan Instalasi & Menjalankan Proyek

### 1. Prasyarat Sistem
- **Web Server & PHP:** XAMPP / Laragon / WAMP (PHP versi 8.0 atau lebih baru).
- **Database:** MySQL / MariaDB.
- **Browser:** Google Chrome, Mozilla Firefox, atau Microsoft Edge.

### 2. Konfigurasi Database
1. Jalankan modul **Apache** dan **MySQL** pada XAMPP Control Panel.
2. Buka **phpMyAdmin** (`http://localhost/phpmyadmin`).
3. Buat database baru bernama `db_uts_web`, lalu jalankan kueri SQL berikut untuk membuat tabel `pesan_kontak`:

```sql
CREATE DATABASE IF NOT EXISTS db_uts_web;
USE db_uts_web;

CREATE TABLE IF NOT EXISTS pesan_kontak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pesan TEXT NOT NULL,
    tanggal_kirim TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 3. Menjalankan Aplikasi di Lokal
1. Salin folder proyek `Uts` ke dalam direktori root server lokal Anda:
   - XAMPP: `C:\xampp\htdocs\Uts`
   - Laragon: `C:\laragon\www\Uts`
2. Sesuaikan kredensial database pada file `config/koneksi.php` jika diperlukan (default: `host=localhost`, `dbname=db_uts_web`, `user=root`, `password=""`).
3. Buka browser dan akses URL:
   ```text
   http://localhost/Uts/
   ```

---

## 🧪 Pengujian Endpoint (Postman)

Fitur pengiriman formulir pada `pages/kontak.php` telah diuji menggunakan **Postman** dengan spesifikasi berikut:
- **Method:** `POST`
- **URL:** `http://localhost/Uts/pages/kontak.php`
- **Body (`x-www-form-urlencoded`):**
  - `nama`: *Nama Pengirim*
  - `email`: *alamat@email.com*
  - `pesan`: *Isi pesan pengujian*
- **Expected Response:** Status `200 OK` disertai notifikasi sukses penyimpanan data ke tabel `pesan_kontak`.

---

## 👤 Penulis

**Diky Raihan Subagja**  
- GitHub: [@username-kamu](https://github.com/username-kamu)
- Instagram: [@username-kamu](https://instagram.com/username-kamu)

---
*Dibuat sebagai bagian dari pemenuhan tugas Ujian Tengah Semester (UTS) Mata Kuliah Web Programming.*
