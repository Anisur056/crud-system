# Installation
## run composer command
```
composer install
```
## rename .env.example to .env, add database information
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
```
## generate key
```
php artisan key:generate
```
## install table (migrate) & insert dummy data (--seed)
```
php artisan migrate --seed
```
## run server
```
php artisan serve
```
