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
        Schema::create('carts', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Relation to users table
            $table->foreignId('item_id')->constrained()->cascadeOnDelete(); // Relation to items table
            $table->integer('quantity')->default(1); // Quantity of the item
            $table->decimal('price', 10, 2); // Price of the item
            $table->timestamps(); // Created and Updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
