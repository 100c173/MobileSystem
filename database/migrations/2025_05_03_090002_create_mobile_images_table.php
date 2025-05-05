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
        Schema::create('mobile_images', function (Blueprint $table) {
            $table->id(); // Primary key

            $table->foreignId('mobile_id')->constrained()->onDelete('cascade'); // Link to 'mobiles' table, delete images if mobile is deleted

            $table->string('image_url');        // URL or path to the image file
            $table->boolean('is_primary')->default(false);       // Flag indicating if this is the main image

            $table->text('caption')->nullable(); // Optional image caption or description

            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_images');
    }
};
