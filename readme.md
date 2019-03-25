# PMG Tech-Test

- git clone https://github.com/daniel-dongsoo-shin/pmg.git

- cd pmg

- composer install

- npm install
  
- copy .env.example to .env & set DB env
```
DB_CONNECTION=mysql
DB_HOST=192.168.10.1
DB_PORT=3306
DB_DATABASE=pmg
DB_USERNAME=user1
DB_PASSWORD=12345_Abc  
```

- php artisan key:generate

- php artisan migrate

- npm run dev

- Browsing, http://pmg.homestead/ 