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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete(); // Foreign key to orders
            $table->foreignId('item_id')->constrained()->cascadeOnDelete();  // Foreign key to items
            $table->integer('quantity'); // Quantity of the item
            $table->decimal('price', 10, 2); // Price per item
            $table->decimal('subtotal', 10, 2); // Subtotal (quantity * price)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
