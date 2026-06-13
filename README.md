# Proyek Aplikasi Blog - Ujian Akhir Semester (UAS)

Proyek ini merupakan pengembangan dari **Sistem Manajemen Konten (CMS) Modul 10** dengan penambahan **Halaman Pengunjung Publik** untuk membaca artikel, melakukan pencarian/penyaringan berdasarkan kategori, dan melihat artikel terkait.

## Informasi Mahasiswa

*   **Nama Lengkap:** Muhammad Murtaqi Yahya
*   **NIM:** 240605110115
*   **Mata Kuliah:** Pemrograman Web (Genap 2025/2026)
*   **Dosen:** A’la Syauqi M.Kom.

---

## Deskripsi Aplikasi

Aplikasi Blog ini dibangun menggunakan framework **Laravel** dengan arsitektur **MVC** (Model-View-Controller) dan menggunakan database MySQL (`db_blog`). Aplikasi terbagi menjadi dua bagian utama:
1.  **Halaman Publik Pengunjung:** 
    *   Dapat diakses oleh siapa saja tanpa login.
    *   **Halaman Utama:** Menampilkan 5 artikel terbaru dengan widget daftar kategori di bagian samping (disertai jumlah artikel di masing-masing kategori). Pengunjung dapat memfilter artikel dengan mengklik salah satu kategori.
    *   **Halaman Detail:** Menampilkan isi lengkap artikel yang dipilih beserta widget daftar 5 artikel terkait (dari kategori yang sama) di bagian samping.
2.  **Sistem Manajemen Konten (CMS / Admin):**
    *   Dilindungi autentikasi (`auth` middleware).
    *   Mengelola penulis (menambah/mengedit/menghapus dengan upload foto profil).
    *   Mengelola kategori artikel (RESTful CRUD).
    *   Mengelola artikel (RESTful CRUD dengan upload cover artikel, penentuan tanggal otomatis, dan relasi multi-tabel).

---

## Tautan Demonstrasi

*   **Repositori GitHub:** https://github.com/murtaqi/aplikasi-blog-240605110115
*   **Video Demonstrasi YouTube:** https://youtu.be/VKlXU8xHvh4

---

## Langkah-langkah Menjalankan Aplikasi Secara Lokal

### Prasyarat
*   PHP >= 8.2
*   Composer
*   MySQL / MariaDB (XAMPP)
*   Node.js & NPM

### Instalasi & Setup

1.  **Clone dan Pindah ke Folder Proyek:**
    ```bash
    cd aplikasi-blog
    ```

2.  **Instal Dependensi PHP:**
    ```bash
    composer install
    ```

3.  **Setup Environment:**
    Salin file `.env.example` ke `.env` jika belum ada:
    ```bash
    copy .env.example .env
    ```

4.  **Konfigurasi Database:**
    Pastikan database MySQL Anda aktif (misalnya di port `3308` atau default `3306`) dan buat database dengan nama `db_blog`.
    Sesuaikan kredensial di file `.env`:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3308
    DB_DATABASE=db_blog
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5.  **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```

6.  **Migrasi Database (Opsional - Jika Database Kosong):**
    Jika database `db_blog` Anda sudah terisi dari modul sebelumnya, Anda tidak perlu bermigrasi. Jika kosong, silakan jalankan:
    ```bash
    php artisan migrate
    ```

7.  **Reset Password Akun Penulis (Default):**
    Akun penulis bawaan database dapat login menggunakan kredensial berikut:
    *   **Username:** `murtaqi` | **Password:** `password123`
    *   **Username:** `fian` | **Password:** `password123`

8.  **Hubungkan Simbolis Storage:**
    ```bash
    php artisan storage:link
    ```

9.  **Instal & Build Dependensi Frontend:**
    ```bash
    npm install
    npm run build
    ```

10. **Jalankan Server Lokal:**
    ```bash
    php artisan serve
    ```
    Buka [http://localhost:8000](http://localhost:8000) di browser untuk melihat halaman publik pengunjung.
    Buka [http://localhost:8000/login](http://localhost:8000/login) untuk masuk ke halaman CMS administrator.
# blog
