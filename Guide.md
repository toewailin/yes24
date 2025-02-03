## Run User Guide

```bash
$ git clone git@github.com:toewailin/yes24.git
$ cd yes24
$ composer install
$ npm install && npm run build
$ code .
```

Create .env
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_yes24
DB_USERNAME=root
DB_PASSWORD=root
```

Login to mysql
```bash
$ mysql -u root -p
Enter your password:
```

Create the database
```mysql
CREATE DATABASE db_yes24;
```

Run
```bash
$ php artisan key:generate
$ php artisan migrate:ordered
$ php artisan db:seed
$ composer run dev
```

Enter to Webpage
http://localhost:8000

email - admin@gmail.com
password - password

Thank you!