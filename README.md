# YES24

## installation command
```bash
$ brew install php
$ brew install mysql
$ mysql_secure_installation
$ brew install composer
$ composer global require laravel/installer
$ export PATH="$HOME/.composer/vendor/bin:$PATH"

$ laravel new project_name
$ cd project_name
➜ npm install && npm run build
➜ composer run dev

$ code .
$ config .env

$ CREATE database db_name;

$ chmod -R 775 storage bootstrap/cache
$ chmod -R 775 storage/logs

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

$ npm install && npm run build
$ composer run dev

http://localhost:8000
```

## artisan command
```bash
php artisan make:model Artist -mcr
php artisan make:model Banner -mcr
php artisan make:model Category -mcr
php artisan make:model SubCategory -mcr
php artisan make:model Product -mcr
php artisan make:model ProductDetail -mcr
php artisan make:model Cart -mcr
php artisan make:model Order -mcr
php artisan make:model OrderItem -mcr
php artisan make:model Faq -mcr
php artisan make:model Event -mcr
php artisan make:model Supplier -mcr
php artisan make:model Customer -mcr
php artisan make:model Shift -mcr
php artisan make:model Role -mcr
php artisan make:controller HomeController
php artisan make:controller ReportController
php artisan make:middleware RoleMiddleware
```

## make migration to create table
```bash 
php artisan migrate
php artisan migrate:rollback --step=1

php artisan migrate:reset (rerun the desire migration file)
php artisan migrate:fresh
php artisan migrate:ordered
```

## Make the layout file
```bash
php artisan make:component AppLayout (default)
php artisan make:component AdminLayout
php artisan make:component UserLayout
```

## for the view files make
```bash
php artisan make:command MakeView
php artisan make:view products
php artisan make:component DashboardCard
```

## role and permission
```bash
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan make:seeder RoleSeeder
php artisan db:seed --class=RoleSeeder
php artisan make:seeder UserRoleSeeder
php artisan db:seed --class=UserRoleSeeder

php artisan make:factory UserFactory --model=User
php artisan make:seeder UserSeeder
php artisan db:seed --class=UserSeeder

php artisan make:seeder ArtistTableSeeder
php artisan make:seeder CategoryTableSeeder
php artisan make:seeder ProductTableSeeder
php artisan make:seeder SupplierTableSeeder

php artisan db:seed

```

## add middleware
```bash
php artisan make:middleware RoleMiddleware
```

## database
```bash
mysql -u root -p
DROP DATABASE IF EXISTS db_yes24;
CREATE DATABASE db_yes24;
```

## migration
```bash
php artisan migrate --path=database/migrations/0001_01_01_000000_create_users_table.php
php artisan migrate --path=database/migrations/0001_01_01_000001_create_cache_table.php
php artisan migrate --path=database/migrations/0001_01_01_000002_create_jobs_table.php
php artisan migrate --path=database/migrations/2025_01_26_202936_create_permission_tables.php
php artisan migrate --path=database/migrations/2025_01_26_082011_create_categories_table.php
php artisan migrate --path=database/migrations/2025_01_26_084125_create_subcategories_table.php
php artisan migrate --path=database/migrations/2025_01_26_121919_create_suppliers_table.php
php artisan migrate --path=database/migrations/2025_01_26_085514_create_artists_table.php
php artisan migrate --path=database/migrations/2025_01_26_051339_create_products_table.php
php artisan migrate --path=database/migrations/2025_01_26_090412_create_product_details_table.php
php artisan migrate --path=database/migrations/2025_01_26_090941_create_carts_table.php
php artisan migrate --path=database/migrations/2025_01_26_091512_create_orders_table.php
php artisan migrate --path=database/migrations/2025_01_26_092432_create_order_products_table.php
php artisan migrate --path=database/migrations/2025_01_26_092804_create_faqs_table.php
php artisan migrate --path=database/migrations/2025_01_26_093243_create_events_table.php
php artisan migrate --path=database/migrations/2025_01_26_112403_create_banners_table.php
```

## foreign key solution
```bash
$ SET FOREIGN_KEY_CHECKS = 0;
$ drop or create table
$ SET FOREIGN_KEY_CHECKS = 1;

## create the user account
```bash
php artisan make:seeder UserRoleSeeder
php artisan db:seed --class=UserRoleSeeder
```

Role seeder ကို ပြန်စစ်ရန်
User seeder နဲ့ ပြန်စစ်ရန်
User Role Seeder ကို ပြန်စစ်ရန်
Menu အလိုက်  Factory, Seeder ဆောက်ရန်
Product နဲ့ ပတ်သတ်သမျှ ပြန် Trace လိုက်ရန်