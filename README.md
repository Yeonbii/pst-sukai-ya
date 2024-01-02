# PST! Sukai ya

**Sebuah Website Sistem Informasi yang dibuat dengan menggunakan Laravel sebagai Framework PHP, Tailwind CSS sebagai Framework CSS, dan Chart.js untuk pembuatan Pie Chart**

### Initialize
- Pertama, jalankan command ini
```sh
cp .env.example .env
```
- Edit .env
- Jalankan command ini
```sh
php artisan key:generate
composer install
npm install
php artisan migrate --seed
```
### Running
- Jalankan dan biarkan command ini berjalan
```sh
npm run dev
php artisan serve
```
### Jika proyek sudah selesai dan ingin di-hosting
- Jalankan command ini sebelum di-hosting
```sh
npm run build
```

---

# Dokumentasi

### Admin Username dan Password
- Silahkan buka file **DatabaseSeeder.php** pada *database/seeders/* dan pergi ke baris 22
- Jika ada yang diubah, maka setelah selesai mengganti jalankan command ini
```sh
php artisan migrate --seed
```
### Tema Warna Website
- Silahkan buka file **tailwind.config.js** dan pergi ke baris 14
- Jika ada yang ingin diubah, maka ubah bagian nilainya saja dan jangan ubah nama variabelnya
### Warna pada Pie Chart
- Silahkan buka file **DashboardController.php** dan pergi ke baris 84
### Kontak yang bisa dihubungi oleh User Umum
- Silahkan buka file **web.php** pada *routes/* dan pergi ke baris 30