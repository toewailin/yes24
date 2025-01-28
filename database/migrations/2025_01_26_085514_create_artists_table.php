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
        Schema::create('artists', function (Blueprint $table) {
            $table->id(); // Primary Key
    
            // Artist Fields
            $table->string('name', 255)->unique(); // Artist Name
            $table->string('slug', 255)->unique(); // SEO-friendly URL
            $table->text('bio')->nullable(); // Artist Biography
            $table->string('image')->nullable(); // Artist Image
            $table->string('genre')->nullable(); // Genre or Category for the artist
            $table->boolean('is_active')->default(true); // Active/Inactive Status
    
            // Tracking Fields
            $table->timestamps(); // Created and Updated At
            $table->softDeletes(); // Soft Delete Field
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};
