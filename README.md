# PST! Sukai ya

**Deskripsi Singkat**: Media untuk melakukan penilaian dan umpan balik pelayanan yang didapatkan dari PST BPS Kab. Hulu Sungai Utara

# Initialize
- First, Run this command
```sh
cp .env.example .env
```
- Edit .env
- Run this command
```sh
composer install
npm install
php artisan migrate --seed
```
# Running
- keep this running
```sh
php artisan serve
npm run dev
```
# If the Project is completed and you want to host it
- Run this command before hosting
```sh
npm run build
```