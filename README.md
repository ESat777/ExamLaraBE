<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Description

This is backend part: API, Models, Authentication, Connection with database, Model Relations, Database Seeders and so on.


## Launch procedure



* Clone the repository files `https://github.com/ESat777/LaraApiBackend.git` in htdocs folder;
* Open MySQL workbench and choose root connection;
* Create database named `laravel`.
* Open project and launch composer command (if globally: `php composer install`, if localy: `php <path to composer.phar> install`);
* Rename .env.example file to .env;
* Migrate into database by typing in command line `php artisan migrate`;
* Seed some data into database by typing command `php artisan db:seed`;
* Launch by typing `php artisan serve`.
