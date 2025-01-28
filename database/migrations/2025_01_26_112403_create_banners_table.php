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
        Schema::create('banners', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title'); // Banner Title
            $table->text('description')->nullable(); // Optional Description
            $table->string('image'); // Banner Image
            $table->string('link')->nullable(); // Optional Link for the Banner
            $table->boolean('is_active')->default(true); // Banner Status
            $table->integer('order')->default(0); // Display Order
            $table->timestamps(); // Created and Updated timestamps
            $table->softDeletes(); // Soft Delete Column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
