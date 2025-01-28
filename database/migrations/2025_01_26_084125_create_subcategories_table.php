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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('category_id');  // Foreign key to the 'categories' table
            $table->timestamps();
            $table->softDeletes();
    
            // Foreign key relation to categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
