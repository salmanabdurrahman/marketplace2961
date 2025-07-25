# Proyek Marketplace Sederhana

Sebuah proyek marketplace fungsional yang dibangun sebagai bagian dari tugas kuliah. Aplikasi ini memungkinkan pengguna untuk mendaftar, melakukan jual beli produk, mengelola transaksi, dan melihat laporan penjualan, dengan desain antarmuka yang modern dan responsif.

## ✨ Fitur Utama

-   **Autentikasi Pengguna:** Registrasi dan login untuk pembeli dan penjual.
-   **Manajemen Produk:** Pengguna dapat menambah, mengedit, menghapus, dan melihat produk.
-   **Keranjang Belanja:** Fitur menambahkan produk ke keranjang sebelum checkout.
-   **Proses Checkout:** Mendukung perhitungan ongkos kirim dan pembayaran online.
-   **Manajemen Transaksi:** Melihat riwayat pembelian dan penjualan.
-   **Laporan & Statistik:** Menyediakan laporan penjualan dan statistik produk.
-   **Pencarian & Filter Produk:** Memudahkan pencarian produk sesuai kebutuhan.
-   **Ulasan & Rating:** Pembeli dapat memberikan ulasan dan penilaian pada produk.
-   **Desain Responsif:** Tampilan modern dan mudah digunakan di berbagai perangkat.

## 💻 Teknologi yang Digunakan

-   **Backend:** PHP dengan Framework CodeIgniter 3
-   **Frontend:** HTML, CSS, JavaScript, jQuery, Bootstrap 5
-   **Database:** MySQL
-   **Server Lokal:** Laragon / XAMPP
-   **Payment Gateway:** Midtrans
-   **API Ongkos Kirim:** RajaOngkir V2

## 🚀 Cara Instalasi & Setup

Berikut adalah langkah-langkah untuk menjalankan proyek ini di komputermu:

1.  **Clone Repository**
    ```bash
    git clone https://github.com/salmanabdurrahman/marketplace2961.git
    ```

2.  **Setup Database**
    -   Buat database baru di phpMyAdmin (misalnya dengan nama `marketplace_db`).
    -   Impor file `.sql` yang ada di dalam proyek ke database yang baru saja kamu buat.

3.  **Konfigurasi Koneksi**
    -   Buka file `application/config/database.php`.
    -   Sesuaikan konfigurasi `hostname`, `username`, `password`, dan `database` dengan pengaturan lokalmu.

4.  **Konfigurasi Environment**
    -   Salin file `.env.example` menjadi `.env` di folder root proyek.
    -   Isi semua variabel yang dibutuhkan, terutama:
        -   `RAJA_ONGKIR_API_KEY`
        -   `MIDTRANS_CLIENT_KEY`
        -   `MIDTRANS_SERVER_KEY`

5.  **Install Dependencies**
    -   Proyek ini memerlukan library `phpdotenv` untuk membaca file `.env`. Pastikan kamu sudah menginstalnya menggunakan Composer.
    ```bash
    composer install
    ```

6.  **Jalankan Proyek**
    -   Arahkan web server (Laragon/XAMPP) ke folder proyek.
    -   Buka URL proyek di browser (misalnya `http://marketplace.test` atau `http://localhost/nama_folder_proyek`).
