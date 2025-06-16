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
        
        Schema::create('mobiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade'); // Foreign key linking to 'brands' table
            $table->foreignId('operating_system_id')->constrained('operating_systems')->onDelete('cascade'); // Foreign key linking to 'operating_systems' table
            $table->date('release_date');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key linking to 'users' table
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobiles');
    }
};
