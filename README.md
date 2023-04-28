<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# be-laravel-and-test

# FIXED:
- Set Unit test for even better testing.
- Set migration, if you have already migrated, please re-type 'php artisan migrate'.
- Set seeder user password, trying use 'password' or '123123'

# How to run:

- Enter into the backend folder for laravel setup.

- Run composer install.

- Run php artisan jwt:secret, for add secret key on .env.

- Setup .env 
    - DB_DATABASE
    - DB_USERNAME
    - DB_PASSWORD
    - JWT_SECRET

- Run php artisan migrate --seed.

## How to run Collection API Transactions
- Postman
    - Open Postman.
    - Open menu collection -> import -> files.
    - Open menu environment -> import -> files.
    - Setup base_url on env API if base url not 127.0.0.1:8000/api.
    - Input token on env collection after receive token from login.
    
## How to run Unit Test
- Run 'php artisan test'.
