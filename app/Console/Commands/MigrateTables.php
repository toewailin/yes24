<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateTables extends Command
{
    protected $signature = 'migrate:ordered';
    protected $description = 'Run migrations in a specific order to prevent foreign key issues';

    public function handle()
    {
        $this->call('migrate:reset'); // Reset previous migrations

        $migrationPaths = [
            'database/migrations/0001_01_01_000000_create_users_table.php',
            'database/migrations/0001_01_01_000001_create_cache_table.php',
            'database/migrations/0001_01_01_000002_create_jobs_table.php',
            'database/migrations/2025_01_26_112403_create_banners_table.php',
            'database/migrations/2025_01_26_202936_create_permission_tables.php',
            'database/migrations/2025_01_26_082011_create_categories_table.php',
            'database/migrations/2025_01_26_084125_create_subcategories_table.php',
            'database/migrations/2025_01_26_121919_create_suppliers_table.php',
            'database/migrations/2025_01_26_085514_create_artists_table.php',
            'database/migrations/2025_01_26_051339_create_products_table.php',
            'database/migrations/2025_01_26_090412_create_product_details_table.php',
            'database/migrations/2025_01_26_090941_create_carts_table.php',
            'database/migrations/2025_01_26_091512_create_orders_table.php',
            'database/migrations/2025_01_26_092432_create_order_products_table.php',
            'database/migrations/2025_01_26_092804_create_faqs_table.php',
            'database/migrations/2025_01_26_093243_create_events_table.php',
        ];

        foreach ($migrationPaths as $path) {
            $this->call('migrate', ['--path' => $path]);
        }

        $this->info('✅ All tables migrated successfully!');
    }
}
