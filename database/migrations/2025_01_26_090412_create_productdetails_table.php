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
        Schema::create('item_details', function (Blueprint $table) {
            $table->id();

            // Relation to items table
            $table->foreignId('item_id')->constrained()->cascadeOnDelete(); // Foreign key to items table

            // Additional item detail fields
            $table->string('attribute_name'); // Attribute name (e.g., size, color)
            $table->string('attribute_value'); // Attribute value (e.g., Large, Red)
            $table->boolean('is_visible')->default(true); // Visibility status
            $table->integer('display_order')->default(0); // Display order for sorting details

            // Timestamps for tracking
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_details');
    }
};
