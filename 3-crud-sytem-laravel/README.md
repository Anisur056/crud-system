# Install laravel from github

1. clone from github.
2. install laravel dependency & install
```
composer install
```
 
3. `.env.example` to `.env` rename, config database info & session to file.
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=test-laravel
DB_USERNAME=root
DB_PASSWORD=

S
```

4. generate app environment key [required]
```
php artisan key:generate
```

5. create database table & insert dummy data
```
php artisan migrate --seed
```

only create database table.
```
php artisan migrate
```

only insert dummy data
```
php artisan db:seed
```

6. run laravel server
```
php artisan serve
```

7. Browse web url
```
http://127.0.0.1:8000/
```

[Other]
create migration file
```
php artisan make:migration create_students_table
```
