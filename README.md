---

# Sistem Keamanan Informasi Karyawan

Ini adalah sebuah sistem manajemen data karyawan berbasis web yang dibangun dalam rangka memenuhi tugas mata kuliah Keamanan Informasi. Sistem ini berfokus pada **perlindungan data sensitif karyawan** menggunakan framework Laravel dan penyimpanan data di database lokal MySQL melalui phpMyAdmin.

---

## Gambaran Umum

Aplikasi ini mengelola informasi karyawan lengkap dalam sebuah perusahaan, mencakup:

* **Identitas Karyawan**: Nama, Nomor Induk Karyawan (NIK), Jabatan, Divisi.
* **Detail Kontak**: Email, Nomor Telepon, Alamat.
* **Informasi Pekerjaan**: Status Kerja, Tanggal Bergabung, Lokasi Kerja.
* **Gaji dan Tunjangan**: Gaji Pokok, Bonus, Potongan, Total Gaji.

Fokus utama pengembangan sistem ini adalah pada **perlindungan data sensitif dan rahasia**, khususnya informasi gaji dan identitas pribadi, yang rentan terhadap penyalahgunaan.

---

## Teknologi dan Alat yang Digunakan

* **Laravel 12**: Kerangka kerja backend PHP.
* **phpMyAdmin**: Alat pengelolaan database MySQL lokal (localhost).
* **Blade Template**: Sistem templating untuk tampilan frontend.
* **Middleware Laravel**: Digunakan untuk manajemen autentikasi dan otorisasi.
* **Enkripsi Laravel**: Fitur bawaan (`Crypt` dan `Hash`) untuk perlindungan data sensitif.

---

## Aspek Keamanan yang Diimplementasikan

### 1. Autentikasi dan Otorisasi

* **Sistem Login**: Menggunakan paket Laravel Breeze atau Laravel Jetstream untuk otentikasi pengguna yang aman.
* **Akses Terverifikasi**: Hanya pengguna yang telah terverifikasi dan masuk ke sistem yang dapat mengakses halaman manajemen data karyawan.
* **Role-Based Access Control (RBAC)**: Setiap pengguna dibatasi aksesnya berdasarkan peran (contoh: admin, HR, viewer) untuk memastikan mereka hanya bisa melihat dan memanipulasi data sesuai dengan wewenang mereka.

### 2. Validasi dan Sanitasi Input

* **Laravel FormRequest**: Seluruh form input divalidasi secara ketat menggunakan FormRequest untuk mencegah serangan umum seperti **SQL Injection** dan **Cross-Site Scripting (XSS)**.

### 3. Enkripsi Data Sensitif

* **`Laravel Crypt::encrypt()`**: Data sangat sensitif seperti informasi gaji dan identitas pribadi karyawan dienkripsi terlebih dahulu sebelum disimpan ke database.
* **Dekripsi Sesuai Kebutuhan**: Data yang dienkripsi hanya akan didekripsi saat benar-benar dibutuhkan untuk ditampilkan atau diproses dalam aplikasi.

### 4. Keamanan Database

* **`.env` File**: Kredensial database tidak disimpan langsung dalam kode aplikasi, melainkan dikelola secara terpisah dalam file `.env` Laravel dengan izin akses yang terbatas.
* **Hak Akses Minimal**: Aplikasi ini menggunakan user database dengan hak akses minimal yang hanya diperlukan untuk operasi aplikasi, bukan sebagai user `root`, untuk mengurangi risiko kebocoran.

---

## Prinsip Keamanan Informasi (CIA Triad)

Dengan pendekatan ini, sistem yang dikembangkan tidak hanya menjalankan fungsi manajemen data karyawan, tetapi juga memenuhi prinsip dasar Keamanan Informasi, yaitu:

* **Kerahasiaan (Confidentiality)**: Melindungi data dari akses yang tidak sah melalui enkripsi dan kontrol akses.
* **Integritas (Integrity)**: Memastikan data tetap akurat dan tidak dimodifikasi oleh pihak yang tidak berwenang melalui validasi input.
* **Ketersediaan (Availability)**: Memastikan sistem dan data dapat diakses oleh pengguna yang berwenang kapan pun dibutuhkan.

---

## Lingkungan Implementasi

Sistem ini diimplementasikan dan diuji langsung pada lingkungan **macOS** dengan server lokal **`http://localhost`**, dan penggunaan database melalui **phpMyAdmin** yang telah dikonfigurasi secara aman.

---
