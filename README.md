# 🎬 Mediatama Video Access System  
![Laravel](https://img.shields.io/badge/Laravel-10.x-red)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-blue)
![PHP](https://img.shields.io/badge/PHP-8.2-blueviolet)
![License](https://img.shields.io/badge/license-MIT-green)

---

## 📖 Deskripsi Singkat
**Mediatama Video Access System** adalah aplikasi berbasis web yang dibuat untuk mengatur sistem **perizinan menonton video antara Admin dan Customer**.  
Aplikasi ini dibuat menggunakan **Laravel 10**, **Bootstrap 5**, dan **MySQL (XAMPP)** sebagai bagian dari **Tes Web Developer Mediatama**.

---

## 🚀 Fitur Utama
✅ Sistem login dan registrasi dengan 2 level user: **Admin** dan **Customer**  
✅ Admin dapat melakukan **CRUD data Video & Customer**  
✅ Customer dapat melakukan **Request Akses** ke video tertentu  
✅ Admin dapat **Approve / Revoke** request akses  
✅ Akses video memiliki **waktu tayang terbatas (2 jam)**  
✅ Countdown otomatis di sisi Customer  
✅ Customer bisa **Request Ulang** setelah waktu akses habis  
✅ UI berbasis **Bootstrap 5** agar tampak profesional dan responsif  

---

## 🧱 Teknologi yang Digunakan
- **Laravel 10**
- **Bootstrap 5**
- **MySQL (XAMPP)**
- **Blade Template**
- **PHP 8.2**

---

## ⚙️ Cara Menjalankan Project di Lokal

1️⃣ Clone Repository
```bash
git clone https://github.com/ABL571/Mediatama-Video-Access-System.git
cd Mediatama-Video-Access-System

2️⃣ Install Dependency PHP
composer install

3️⃣ Copy File .env
copy .env.example .env
Lalu buka file .env dan sesuaikan koneksi database (contoh untuk XAMPP):
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mediatama
DB_USERNAME=root
DB_PASSWORD=

4️⃣ Buat Database Baru
Buka http://localhost/phpmyadmin
Klik New → buat database bernama mediatama

5️⃣ Generate App Key
php artisan key:generate

6️⃣ Migrasi & Seeder (Buat Tabel dan Data Contoh)
php artisan migrate --seed

7️⃣ Jalankan Server
php artisan serve


🔐 Akun Demo
Role	Email	Password
👑 Admin	admin@example.com
	password
👤 Customer	customer@example.com
	123456

Jika akun di atas tidak tersedia, buat akun baru via /register lalu ubah role di tabel users (phpMyAdmin).
