# 📁 Website E-Arsip - Dinas Kominfo Kota Madiun

![Laravel](https://img.shields.io/badge/Laravel-10.x-red)
![MySQL](https://img.shields.io/badge/MySQL-8.x-blue)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-purple)

## 📌 Ringkasan Proyek

**Website E-Arsip** adalah sistem manajemen surat masuk dan surat undangan berbasis web yang dikembangkan untuk **Dinas Komunikasi dan Informatika Kota Madiun**. Sistem ini menggantikan pencatatan manual menggunakan Microsoft Excel dan penyimpanan fisik di filling cabinet.

## 🚀 Fitur Utama

| Fitur | Keterangan |
|-------|-------------|
| ✅ Autentikasi | Login & registrasi |
| ✅ CRUD Data Surat | Create, Read, Update, Delete |
| ✅ Upload File PDF | Scan surat disimpan sebagai backup |
| ✅ Kategori Surat | Surat Masuk / Surat Undangan |
| ✅ Dashboard | Menampilkan jumlah surat per kategori |

## 🛠️ Teknologi yang Digunakan

| Kategori | Teknologi |
|----------|-----------|
| Backend | Laravel (PHP Framework) |
| Database | MySQL |
| Frontend | Bootstrap 5, HTML, CSS, JavaScript |
| Local Server | XAMPP |

## 📂 Struktur Source Code

Source code utama berada di folder-folder berikut:

| Lokasi | Isi |
|--------|-----|
| `app/Models/` | Model database (User, Post, Category) |
| `app/Http/Controllers/` | Logic aplikasi (Login, Register, Post) |
| `routes/web.php` | Semua endpoint website |
| `database/migrations/` | Struktur tabel database |
| `database/seeders/` | Data awal (kategori surat) |

## 🖼️ Screenshot

| Halaman | Tampilan |
|---------|----------|
| Login | ![Login](screenshots/login.png) |
| Dashboard | ![Dashboard](screenshots/dashboard.png) |
| Data Surat | ![Data Surat](screenshots/data-surat.png) |

## 🧪 Hasil Pengujian

| No | Fitur | Status |
|----|-------|--------|
| 1 | Login Admin | ✅ Berhasil |
| 2 | Tambah Data Surat | ✅ Berhasil |
| 3 | Edit Data Surat | ✅ Berhasil |
| 4 | Hapus Data Surat | ✅ Berhasil |

## 👨‍💻 Tentang Pembuat

| Nama | Abiyan Naufal Hilmi |
|------|---------------------|
| Pendidikan | S1 Informatika - UPN "Veteran" Jawa Timur |
| IPK | 3.81/4.00 |
| Tahun | 2024 |

📧 h.abiyan1771@gmail.com  
🔗 [LinkedIn](https://linkedin.com/in/abiyan-naufal-hilmi/)

## 📄 Lisensi

Proyek ini dikembangkan untuk keperluan **Praktek Kerja Lapangan (PKL)** di Dinas Komunikasi dan Informatika Kota Madiun.