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

        Schema::create('agent_profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('agent_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->foreignId('country_id')->constrained('countries')->cascadeOnDelete();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();

            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            
            $table->string('business_name')->nullable();

            $table->decimal('latitude', 10, 7)->nullable();  // Nullable latitude for location
            $table->decimal('longitude', 10, 7)->nullable(); // Nullable longitude for location
            $table->text('description')->nullable(); // Nullable longitude for location
            
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents_profiles');
    }
};
