# Aplikasi Kuis Sains Berbasis Web

Proyek ini adalah aplikasi kuis sains sederhana berbasis PHP dan MySQL. Dibuat untuk membantu siswa mengerjakan kuis secara online dengan login dan penilaian otomatis.

## ✨ Fitur Utama
- Halaman login & register pengguna
- Soal kuis pilihan ganda
- Penilaian otomatis & skor akhir
- Penyimpanan data pengguna dan hasil kuis di database

## 🛠 Teknologi yang Digunakan
- PHP
- MySQL
- HTML/CSS

## 🚀 Cara Menjalankan
1. **Clone/download** repositori ini ke komputer kamu.
2. Letakkan semua file di dalam folder `htdocs` (jika menggunakan XAMPP).
3. Buka phpMyAdmin dan **import database** (misalnya file `kuis.sql`).
4. Jalankan aplikasi melalui browser dengan URL seperti:  
   `http://localhost/kuis/`

## 📂 Struktur File
- `login.php`, `register.php`, `kuis.php` – halaman utama aplikasi
- `konfigurasi.php` – koneksi ke database
- `proses_login.php`, `proses_register.php` – proses autentikasi
- `jawaban.php`, `selesai.php` – logika kuis & hasil

## 📄 Lisensi
Proyek ini menggunakan lisensi MIT – bebas digunakan dan dimodifikasi.  
Lihat file [LICENSE](LICENSE) untuk detailnya.
