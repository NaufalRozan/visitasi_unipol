<p align="center">
    <a href="#">
        <img src="https://unipol.ac.id/wp-content/uploads/2025/06/ChatGPT-Image-May-31-2025-09_19_02-AM.png" width="200" alt="Unipol Logo">
    </a>
</p>

<p align="center">
    <b>Sistem Informasi Visitasi</b><br>
    Universitas Lamappapoleonro
</p>

---

# Sistem Informasi Visitasi

Aplikasi berbasis web untuk manajemen proses visitasi dan akreditasi di Universitas Lamappapoleonro.

## ✨ Fitur

- **Manajemen Dokumen**: Upload, organisasi, dan pencarian dokumen akreditasi
- **Penyimpanan Berkas**: Repositori terpusat untuk berkas-berkas penting visitasi
- **Kategorisasi Dokumen**: Pengelompokan dokumen berdasarkan standar akreditasi
- **Kontrol Akses**: Pengaturan hak akses dokumen berdasarkan peran pengguna
- **Pencarian Dokumen**: Sistem pencarian cepat dengan filter dan indeksasi dokumen


---

## 🚀 Panduan Instalasi

### 🧰 Kebutuhan Sistem

- PHP >= 8.1
- Laravel Framework
- Composer
- MySQL / MariaDB
- Node.js & npm

### 📦 Langkah Instalasi

1. **Clone repository**

     ```bash
     git clone https://github.com/NaufalRozan/visitasi_unipol.git
     cd visitasi_unipol
     ```

2. **Install dependensi PHP**

    ```bash
    composer install
    ```

3. **Copy .env dan generate app key**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Buat symlink storage**

    ```bash
    php artisan storage:link
    ```

5. **Konfigurasi database di .env**

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=visitasi_unipol
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. **Install dependensi frontend**

    ```bash
    npm install
    npm run dev
    ```

7. **Migrasi dan seed database**

    ```bash
    php artisan migrate --seed
    ```

8. **Jalankan aplikasi**

    ```bash
    php artisan serve
    ```

