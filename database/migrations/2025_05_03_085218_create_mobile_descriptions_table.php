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
        
        Schema::create('mobile_descriptions', function (Blueprint $table) {
            $table->id(); // Primary key

            $table->foreignId('mobile_id') ->constrained()->onDelete('cascade'); // Foreign key linking to 'mobiles' table

            $table->text('design_dimensions');   // Detailed info about the design and physical dimensions
            $table->json('display')->nullable(); // Description of screen type, size, resolution, and quality

            $table->text('performance_cpu');     // Explanation of processor performance and hardware capabilities
            $table->text('storage_desc');        // Description of storage options and expandability

            $table->text('connectivity_desc');   // Info on network support, ports, and wireless options

            $table->text('battery_desc');        // Battery life, charging speed, and endurance review
            $table->json('key_features');      // Additional non-core features (e.g., water resistance, stylus)

            $table->text('security_privacy');    // Security mechanisms and privacy protections available

            $table->json('pros');                // Main advantages of the mobile device
            $table->json('cons');                // Main drawbacks or disadvantages

            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_descriptions');
    }
};
