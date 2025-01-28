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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question'); // The FAQ question
            $table->text('answer'); // The FAQ answer
            $table->boolean('is_active')->default(true); // Active/Inactive Status
            $table->integer('order')->default(0); // Order for sorting
            $table->timestamps(); // Created at and updated at
            $table->softDeletes(); // Soft delete column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
