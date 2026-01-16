# 🌿 FreshLog - Smart Inventory Management System

> **Kelola inventaris Anda dengan mudah, cerdas, dan menyenangkan!**

---

## 📌 Tentang Project

**FreshLog** adalah sebuah aplikasi web yang kami rancang untuk mengelola inventaris barang dengan sistem penyimpanan yang terorganisir. Dengan antarmuka yang intuitif dengan berbagai fitur, dengan ini Anda memungkinkan untuk mencatat, mengkategorikan, dan melacak setiap item dengan cepat. 

---

---

## 🧑‍💻 Contributor

Freshlog hadir tidak lepas dari orang-orang hebat dibelakangnya
@kykik1012 sebagai database engineer, frontend, and backend builder
@angganyobaIT sebagai frontend and backend builder
@afif-darmawan sebagai UI/UX specialist

---

---

## ✨ Fitur Utama

### 🔐 Autentikasi & Keamanan
- **Login** - Masuk dengan email dan password
- **Register** - Daftar akun baru dengan verifikasi OTP
- **Reset Password** - Lupa password? tentu Kami punya solusinya
- **Profile Management** - Kelola profil pribadi dan ubah password

### 📦 Manajemen Inventory
- **Item Management** - Tambah, edit, dan hapus item dengan mudah
- **Kategori Item** - Organisir item berdasarkan kategori
- **Lokasi Penyimpanan** - Tentukan lokasi penyimpanan untuk setiap item
- **Detail Penyimpanan** - Kelola detail dan kuantitas barang yang disimpan
- **Riwayat Item** - Lihat history dan restore item yang terhapus

### 📊 Fitur Tambahan
- **Dashboard** - Ringkasan visual inventory Anda
- **Riwayat Penyimpanan** - Track semua aktivitas penyimpanan
- **Security** - Ganti password dan kelola keamanan akun

---

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|------------|
| **Backend** | Laravel 12 |
| **Frontend** | Laravel Blade + Tailwind CSS 4 |
| **Database** | MySQL |
| **Build Tool** | Vite 7 |
| **PHP Version** | 8.2+ |

---

---

## 🚀 Instalasi & Setup

### Prerequisites
- PHP 8.2 atau lebih tinggi
- Composer
- Node.js & npm
- MySQL / Database Driver

### Langkah Instalasi

1. **Clone atau download project**
   ```bash
   cd FreshLog
   ```

2. **Jalankan setup otomatis**
   ```bash
   composer run setup
   ```
   
   Script ini akan secara otomatis:
   - Install PHP dependencies
   - Generate APP_KEY
   - Run database migrations
   - Install Node dependencies
   - Build frontend assets

3. **Atau setup manual**
   ```bash
   # Install PHP dependencies
   composer install
   
   # Copy environment file
   cp .env.example .env
   
   # Generate APP_KEY
   php artisan key:generate
   
   # Konfigurasi database di .env, lalu jalankan migrations
   php artisan migrate
   
   # Install Node dependencies
   npm install
   
   # Build frontend
   npm run build
   ```

---

## 💻 Development

### Menjalankan Server Development
```bash
composer run dev
```

Perintah ini akan menjalankan secara bersamaan:
- 🖥️ Laravel Server (port 8000)
- ⚙️ Queue Listener
- 📝 Application Logs (Pail)
- ⚡ Vite Dev Server (Hot Module Reload)

### Build untuk Production
```bash
npm run build
```

### Menjalankan Tests
```bash
composer run test
```

---

## 🌐 Browser Support

- ✅ Chrome (Latest)
- ✅ Firefox (Latest)
- ✅ Safari (Latest)
- ✅ Edge (Latest)

---

---

## 🎉 Terima Kasih!

Terima kasih telah menggunakan FreshLog. Semoga aplikasi ini membantu Anda mengelola inventory dengan lebih efisien, mudah, dan menyenangkan!

**Have a Nice Day! ✨✨**

---

