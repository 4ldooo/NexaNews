📰 Portal Berita - NexaNews
📌 Deskripsi
Project ini adalah sebuah Website Portal Berita berbasis PHP & MySQL yang dilengkapi dengan Admin Dashboard modern serta fitur analytics (views & trending) seperti portal berita profesional.
Website ini memungkinkan admin/editor untuk mengelola artikel, kategori, dan user, serta memantau performa artikel melalui data views dan grafik.

🚀 Fitur Utama
🔐 Authentication & Role
Login system (admin & editor)
Session management
Password hashing (security)

📝 Manajemen Artikel
Tambah artikel (judul, isi, gambar, kategori)
Edit artikel
Hapus artikel (dengan konfirmasi)
Sorting berdasarkan jumlah views

📂 Manajemen Kategori
Tambah kategori
Edit kategori
Relasi kategori dengan artikel

👤 Manajemen User
Tambah user (admin/editor)
Edit user
Hapus user
Reset password + toggle show/hide password

📊 Analytics & Monitoring
👁️ Views per artikel
🔥 Trending harian (berdasarkan views_log)
📈 Grafik views 7 hari terakhir (Chart.js)
🏆 Top artikel (berdasarkan jumlah views)
🕒 Waktu relatif (contoh: 5 menit lalu)
🎨 Frontend Features
🎞️ Hero Carousel (slider berita utama)
📰 List artikel + halaman detail
🔥 Trending section
🔍 Search & pagination (DataTables)

💻 UI/UX
Dark mode modern
Responsive design (Bootstrap 5)
Card-based layout
Hover effect & smooth interaction

Badge otomatis:
🔥 Viral
🚀 Trending
🆕 Baru

🗂️ Struktur Database (Sederhana)
Tabel artikel
id_artikel
judul
isi
gambar
tanggal
id_kategori
views
Tabel kategori
id_kategori
nama_kategori
Tabel admin
id_admin
username
password
role
Tabel views_log
id
id_artikel
tanggal

⚙️ Teknologi yang Digunakan
PHP Native
MySQL
Bootstrap 5
Chart.js
DataTables
CKEditor

🎯 Tujuan Project
Membuat portal berita sederhana namun modern
Mengimplementasikan sistem CRUD lengkap
Menambahkan fitur analytics (views & trending)
Meningkatkan UI/UX agar terlihat profesional

🔥 Keunggulan
Tidak hanya CRUD biasa (sudah ada analytics)
Ada sistem trending seperti website berita asli
UI modern & responsive
Role-based system (admin & editor)

👨‍💻 Author
Project ini dibuat untuk pembelajaran dan pengembangan skill web development.
