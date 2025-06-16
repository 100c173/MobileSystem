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
        
        Schema::create('mobile_specification', function (Blueprint $table) {
            $table->id(); 

            $table->foreignId('mobile_id')->constrained()->onDelete('cascade'); // Foreign key linking to 'mobiles' table
            $table->string('cpu');                // Type of processor (CPU)
            $table->string('gpu');                // Type of processor (GPU)
            $table->string('ram');                // Amount of RAM
            $table->json('storage');             // Internal storage capacity
            $table->json('camera');             // Camera specifications
            $table->string('screen');             // Screen type and resolution
            $table->json('battery');            // Battery capacity and type
            $table->json('connectivity');       // Connectivity options (e.g. Wi-Fi, network types)
            $table->json('security_features');  // Security features (e.g. fingerprint, face recognition)

            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobiles_specification');
    }
};
