<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            // Item-specific fields
            $table->string('name', 255); // Item name
            $table->text('description')->nullable(); // Item description
            $table->decimal('price', 10, 2); // Item price (max value: 99999999.99)
            $table->integer('stock')->default(0); // Stock quantity
            $table->string('sku', 100)->unique(); // Stock Keeping Unit
            $table->boolean('is_active')->default(true); // Active/inactive status

            // Relations
            $table->foreignId('category_id')->constrained()->cascadeOnDelete(); // Relation to categories table
            $table->foreignId('subcategory_id')->nullable()->constrained()->nullOnDelete(); // Relation to subcategories table
            $table->foreignId('supplier_id')->nullable()->constrained()->nullOnDelete(); // Relation to suppliers table
            $table->foreignId('artist_id')->nullable()->constrained()->nullOnDelete(); // Relation to artists table (optional for books, music, etc.)

            // Images & Metadata
            $table->string('image')->nullable(); // Item main image
            $table->json('additional_images')->nullable(); // JSON for multiple images
            $table->json('attributes')->nullable(); // JSON for custom attributes (e.g., size, color, etc.)
            $table->decimal('discount', 5, 2)->default(0); // Discount percentage (e.g., 20.00%)
            $table->decimal('tax', 5, 2)->default(0); // Tax percentage (e.g., 15.00%)

            // SEO fields
            $table->string('slug')->unique(); // URL-friendly name
            $table->string('meta_title')->nullable(); // SEO title
            $table->text('meta_description')->nullable(); // SEO description

            // Other tracking fields
            $table->integer('views')->default(0); // Count of views
            $table->integer('sales')->default(0); // Count of items sold
            $table->timestamps(); // Created at and updated at fields
            $table->softDeletes(); // Soft delete column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
