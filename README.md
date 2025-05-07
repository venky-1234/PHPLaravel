🛠️ Requirements
----------------------------------------------------------
PHP >= 8.1
Composer
Laravel >= 10
MySQL
---------------------------------------------------------
XAMPP/WAMP or similar for local development
--------------------------------------------------------
🚀 Installation Steps
-------------------------------------------------------
Clone or Create Project
------------------------------------------------------
composer create-project laravel/laravel authors-books-app
------------------------------------------------------
cd authors-books-app
---------------------------------------------------------
Set Up .env for MySQL
--------------------------------------------------------------
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=authors
DB_USERNAME=root
DB_PASSWORD=
---------------------------------------------------------------
Create Database in phpMyAdmin:

Name: authors
--------------------------------------------------------
Run Migrations
php artisan migrate
---------------------------------------------------------
Create Models with Relationships
----------------------------------------------------------

php artisan make:model Author -m
php artisan make:model Book -m
-------------------------------------------------------------
Update your migration files like:

php artisan migrate:fresh
-------------------------------------------------------------
Set Up Controllers

php artisan make:controller AuthorController --resource
php artisan make:controller BookController --resource
--------------------------------------------------------------

Create Blade Views
-------------------------------------------------------
Create these files under resources/views/books/:

index.blade.php

create.blade.php

edit.blade.php
-----------------------------------------------------
Create these files under resources/views/authors/:

index.blade.php

create.blade.php

edit.blade.php

show.blade.php
-----------------------------------------------------------
Set Up Routes

In routes/web.php:
-------------------------------------------------------------

🤖 Chatbot Integration
Create Controller

php artisan make:controller ChatbotController
Create Blade View:
------------------------------------------------------

Finallay run:

php artisan serve

Visit: http://127.0.0.1:8000/authors

