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
            $table->string('ram');                // Amount of RAM
            $table->string('storage');            // Internal storage capacity
            $table->string('camera');             // Camera specifications
            $table->string('screen');             // Screen type and resolution
            $table->string('battery');            // Battery capacity and type
            $table->string('connectivity');       // Connectivity options (e.g. Wi-Fi, network types)
            $table->string('security_features');  // Security features (e.g. fingerprint, face recognition)

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
