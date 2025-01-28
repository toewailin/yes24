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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();

            // Supplier fields
            $table->string('name', 255); // Supplier name
            $table->string('contact_email', 255)->unique(); // Contact email
            $table->string('contact_phone', 20)->nullable(); // Contact phone
            $table->string('address')->nullable(); // Supplier address
            $table->text('description')->nullable(); // Additional details

            $table->timestamps(); // Created at and updated at
            $table->softDeletes(); // Soft delete column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
