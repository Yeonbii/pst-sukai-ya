# PST! Sukai ya

**An information survey website built with Laravel framework and Tailwind CSS.**

# Initialize
- First, Run this command
```sh
cp .env.example .env
```
- Edit .env
- Run this command
```sh
php artisan key:generate
composer install
npm install
php artisan migrate --seed
```
# Running
- keep this running
```sh
npm run dev
php artisan serve
```
# If the Project is completed and you want to host it
- Run this command before hosting
```sh
npm run build
```