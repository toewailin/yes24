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
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title', 255); // Event Title
            $table->text('description')->nullable(); // Event Description
            $table->dateTime('start_date'); // Start Date and Time
            $table->dateTime('end_date'); // End Date and Time
            $table->string('location')->nullable(); // Location of the Event
            $table->string('image')->nullable(); // Event Image
            $table->boolean('is_active')->default(true); // Active/Inactive Status
            $table->timestamps(); // Created at and Updated at
            $table->softDeletes(); // Soft Delete Field
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
