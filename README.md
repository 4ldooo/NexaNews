# 📰 Portal Berita - NexaNews

## 📌 Deskripsi

Project ini merupakan **Website Portal Berita berbasis PHP & MySQL** yang dilengkapi dengan **Admin Dashboard modern** serta fitur **analytics (views & trending)** layaknya portal berita profesional.

Website ini memungkinkan **admin dan editor** untuk:

* Mengelola artikel & kategori
* Mengatur user
* Memantau performa artikel melalui data views & grafik

---

## 🚀 Fitur Utama

### 🔐 Authentication & Role

* Sistem login (Admin & Editor)
* Session management
* Password hashing untuk keamanan

---

### 📝 Manajemen Artikel

* Tambah artikel (judul, isi, gambar, kategori)
* Edit artikel
* Hapus artikel (dengan konfirmasi)
* Sorting artikel berdasarkan jumlah views

---

### 📂 Manajemen Kategori

* Tambah kategori
* Edit kategori
* Relasi kategori dengan artikel

---

### 👤 Manajemen User

* Tambah user (admin/editor)
* Edit user
* Hapus user
* Reset password
* Toggle show/hide password

---

### 📊 Analytics & Monitoring

* 👁️ Views per artikel
* 🔥 Trending harian (berdasarkan `views_log`)
* 📈 Grafik views 7 hari terakhir (Chart.js)
* 🏆 Top artikel berdasarkan views
* 🕒 Format waktu relatif (contoh: *5 menit lalu*)

---

### 🎨 Frontend Features

* 🎞️ Hero Carousel (slider berita utama)
* 📰 List artikel + halaman detail
* 🔥 Section trending
* 🔍 Search & pagination (DataTables)

---

### 💻 UI/UX

* Dark mode modern
* Responsive design (Bootstrap 5)
* Card-based layout
* Hover effect & smooth interaction
* Badge otomatis:

  * 🔥 Viral
  * 🚀 Trending
  * 🆕 Baru

---

## 🗂️ Struktur Database (Sederhana)

### Tabel `artikel`

* `id_artikel`
* `judul`
* `isi`
* `gambar`
* `tanggal`
* `id_kategori`
* `views`

### Tabel `kategori`

* `id_kategori`
* `nama_kategori`

### Tabel `admin`

* `id_admin`
* `username`
* `password`
* `role`

### Tabel `views_log`

* `id`
* `id_artikel`
* `tanggal`

---

## ⚙️ Teknologi yang Digunakan

* PHP Native
* MySQL
* Bootstrap 5
* Chart.js
* DataTables
* CKEditor

---

## 🎯 Tujuan Project

* Membangun portal berita sederhana namun modern
* Mengimplementasikan sistem CRUD secara lengkap
* Menambahkan fitur analytics (views & trending)
* Meningkatkan tampilan UI/UX agar lebih profesional

---

## 🔥 Keunggulan

* Tidak hanya CRUD (sudah dilengkapi analytics)
* Memiliki sistem trending seperti website berita asli
* UI modern & responsive
* Mendukung role-based system (admin & editor)

---

## 👨‍💻 Author

Project ini dibuat untuk **pembelajaran dan pengembangan skill web development**.

---
