<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Table Of Contents

[[_TOC_]]

## Requirements
- Laravel 10.x (PHP 8.1)
- NodeJS > 14
- Composer

## How to install

### Clone Repository
open your terminal, go to the directory that you will install this project, then run the following command:

```bash
git clone https://github.com/gilanggustina/qwords-test.git

cd qwords-test 
```

### Install packages
Install vendor using composer

```bash
composer update
```

Install node module using npm

```bash
npm install
```

### Configure .env
Copy .env.example file

```bash
cp .env.example .env
```

Then run the following command :

```php
php artisan key:generate
```

### Migrate Data
create an empty database with mysql 8.x version, then setup that fresh db at your .env file, then run the following command to generate all tables and seeding dummy data:

```php
php artisan migrate:fresh --seed
```

### Running Application
To serve the laravel app, you need to run the following command in the project director (This will serve your app, and give you an adress with port number 8000 or etc)
- **Note: You need run the following command into new terminal tab**

```php
php artisan serve
```

Running vite
- **Note: You need run the following command into new terminal tab**

```bash
npm run dev
```

## Usefull Links

- [Laravel 10 Documentations](https://laravel.com/docs/10.x/)
- [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission/v5/introduction/)
- [AdminLTE](https://adminlte.io/)
- [Check Coding Standard](https://github.com/squizlabs/PHP_CodeSniffer)
- [PHP code style fixer - Laravel Pint](https://laravel.com/docs/9.x/pint)
- [Package yang berisi data Provinsi, Kabupaten/Kota, dan Kecamatan/Desa di seluruh Indonesia](https://github.com/laravolt/indonesia)

## FAQ
#### Apakah itu laravel pint?
Alat untuk merapihkan penulisan PHP, cara penggunaan ./vendor/bin/pint
#### Bagaimana cara mengubah template?
Template berada di folder storage/app.public/. Daftarkan url js dan css ke table preference. ubah THEME="default" di environment (.env)
#### Arsitektur apa yang digunakan?
Minimal dengan arsitektur MVC, bisa juga menambahkan service pattern, dan memungkinkan juga memakai repository jika diperlukan.
#### Apakah wajib mengunakan service dan repository ini?
Penggunaan service dan repository adalah optional.
#### Kapan penggunaan service pattern itu?
Penggunaan service pattern ketika banyak logic yang bisa dipanggil ulang.
#### Apa isi dari service pattern itu?
Isi service pattern adalah logic.
#### Kapan penggunaan repository pattern itu?
Penggunaan repository pattern ketika mengakses data selain database atau ketika query manual.
#### Apa isi dari repository pattern itu?
Isi repository pattern adalah query bisa juga logic untuk ambil data selain database semisal dari API.
#### Apakah boleh memanggil model di service?
Boleh
#### Apakah boleh memanggil model di repository?
Boleh
#### Bisakah service menggunakan service lainnya?
Bisa


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
