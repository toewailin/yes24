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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary Key

            // Order fields
            $table->unsignedBigInteger('user_id')->nullable(); // Reference to users table
            $table->decimal('total_price', 10, 2); // Total price of the order
            $table->string('status')->default('pending'); // Status of the order (e.g., pending, completed, canceled)
            $table->text('shipping_address')->nullable(); // Shipping address for the order
            $table->text('billing_address')->nullable(); // Billing address
            $table->string('payment_method')->nullable(); // Payment method (e.g., credit card, PayPal)
            $table->string('transaction_id')->nullable(); // Transaction ID from payment gateway

            // Timestamps
            $table->timestamps();
            $table->softDeletes(); // For soft deletes

            // Foreign Key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
