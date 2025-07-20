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
        Schema::create('customer_requests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade'); // Foreign key linking to 'brands' table
            $table->foreignId('operating_system_id')->constrained('operating_systems')->onDelete('cascade'); // Foreign key linking to 'operating_systems' table

            $table->string('ram')->nullable();
            $table->string('storage')->nullable();

            $table->string('condition')->nullable();
            $table->string('model')->nullable();

            $table->enum('status',['pending' , 'approve' , 'reject'])->default('pending');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_requests');
    }
};
