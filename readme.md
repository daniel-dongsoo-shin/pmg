# PMG Tech-Test

Database - mysql
	Host - 127.0.0.1
	Username - tempuser
	Password - tempuser
	DB name - mii-web

local domain - http://pmg-interview.local:8080

Source files location  - /Users/leixue/Sites/PMG_INTERVIEW

Flatlay Reference - https://xd.adobe.com/view/e9423ea6-f5b7-4bfa-78e2-369deac68068-9f73/?fullscreen

To do - Use Laravel and Vue to achieve the below

1. Landing page
2. Age gate (Over 18)
3. Login as Guest with restrict content (You don't need to work on the page after logged in. Just display some text e.g. You are a guest.)
4. Register Page
5. Register (Over 18)
6. Login as Registered Customer with full content (Same as point 3. You don't need to work on the page after logged in. Just display some text e.g. You are a regitered customer.)

### Install Laravel
- composer create-project laravel/laravel pmg

### Create DB, Edit .env
- CREATE DATABASE pmg;
- .env
```
DB_CONNECTION=mysql
DB_HOST=192.168.10.1
DB_PORT=3306
DB_DATABASE=pmg
DB_USERNAME=user1
DB_PASSWORD=12345_Abc
```

### Create Auth
- php artisan make:auth

### Edit Users table
- database/migrations/2014_10_12_000000_create_users_table.php
```
Schema::create('users', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->string('title');
    $table->string('first_name');
    $table->string('last_name');
    $table->string('mobile');
    $table->string('post_code');
    $table->date('birth_date');
    $table->boolean('term_of_use');
    $table->rememberToken();
    $table->timestamps();
});
```

### Create Tables
- php artisan migrate

### Vue & component install
- npm install
- npm run dev
- 
