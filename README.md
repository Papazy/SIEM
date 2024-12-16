# Panduan Setup SIEM

Panduan ini akan membantu Anda untuk menjalankan project SIEM di mesin lokal menggunakan XAMPP.

## Prasyarat

1. **XAMPP** terinstal (Unduh: [https://www.apachefriends.org](https://www.apachefriends.org)).
2. Pastikan **PHP** dan **MySQL** berjalan di XAMPP.

## Langkah-langkah Setup

1. **Buka`htdocs` XAMPP:**
   - Masuk ke `C:\xampp\htdocs` atau direktori `htdocs` XAMPP Anda.

1. **Unduh Project:**
   - Clone atau unduh file project dari repositori GitHub.

   ```
   git clone https://github.com/Papazy/SIEM.git
   ```



3. **Impor Database:**
   - Buka **phpMyAdmin** (http://localhost/phpmyadmin).
   - Buat database baru (misalnya `data_penduduk`).
   - Pilih database baru, lalu klik tab **Import**.
   - Pilih file `data_penduduk.sql` dan klik **Go** untuk mengimpor database.

4. **Konfigurasi Koneksi Database:**
   - Buka folder 'inc' dan cari file konfigurasi (`koneksi.php`).
   - Perbarui pengaturan koneksi database

5. **Akses Aplikasi:**
   - Jalankan Apache dan MySQL di XAMPP.
   - Buka browser dan akses `http://localhost/SIEM` (atau `http://localhost/SIEM/SIEM`).
   - Untuk login, gunakan 
   ```
   username: admin
   password: admin
   ```
   
   Anda sekarang dapat mengakses aplikasi.

## Pemecahan Masalah
- Pastikan Apache dan MySQL berjalan dengan baik.
- Periksa versi PHP jika Anda menghadapi masalah.

