<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>




## HOW TO CLONE (For Developer)

Jalakan perintah berikut pada terminal (Linux dan MacOS) atau PowerShell (Windows):

```
git clone https://github.com/aqidfahrihafin/crud-laravel
cd crud-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
```

Atau

```
php artisan migrate:fresh --seed
```

Jalankan perintah berikut sebagai persyaratan JWT-AUTH:

```
php artisan jwt:secret
```

### Update Hasil Perubahan Kode ke Cloud.

Jika perubahan pada kode program telah dilakukan, harus di lakukan uji atau test untuk mengetahui hasilnya, apakah ada masalah atau tidak, bila tidak ada masalah buat branch baru:

```
git branch nama_branch
```

dan push hasilnya dengan perintah berikut:

```
git add .
git commit -m "message | pesan perubahan"
git push origin nama_branch
```

### Run App

Jalankan perintah berikut untuk menjalankan aplikasi:

```
npm run dev
```

Buka terminal baru dan jalankan perintah ini:

```
php artisan serve
```
