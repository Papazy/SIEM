# Panduan Setup SIEM

Panduan ini akan membantu Anda untuk menjalankan project SIEM di mesin lokal menggunakan XAMPP.

## Prasyarat

1. **XAMPP** terinstal (Unduh: [https://www.apachefriends.org](https://www.apachefriends.org)).
2. Pastikan **PHP** dan **MySQL** berjalan di XAMPP.

## Langkah-langkah Setup

1. **Unduh Project:**
   - Clone atau unduh file project dari repositori GitHub.

2. **Pindahkan File ke `htdocs` XAMPP:**
   - Salin folder project ke `C:\xampp\htdocs` atau direktori XAMPP Anda.

3. **Impor Database:**
   - Buka **phpMyAdmin** (http://localhost/phpmyadmin).
   - Buat database baru (misalnya `siem`).
   - Pilih database baru, lalu klik tab **Import**.
   - Pilih file `data_penduduk.sql` dan klik **Go** untuk mengimpor database.

4. **Konfigurasi Koneksi Database:**
   - Buka folder project dan cari file konfigurasi (biasanya `config.php`).
   - Perbarui pengaturan koneksi database sebagai berikut:
     ```php
     define('DB_SERVER', 'localhost');
     define('DB_USERNAME', 'root');
     define('DB_PASSWORD', '');
     define('DB_DATABASE', 'siem');
     ```

5. **Akses Aplikasi:**
   - Jalankan Apache dan MySQL di XAMPP.
   - Buka browser dan akses `http://localhost/SIEM` (perhatikan letak file index.php).

   Anda sekarang dapat mengakses aplikasi.

## Pemecahan Masalah
- Pastikan Apache dan MySQL berjalan dengan baik.
- Periksa versi PHP jika Anda menghadapi masalah.

